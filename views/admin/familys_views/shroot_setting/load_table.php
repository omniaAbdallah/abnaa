


    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th>م</th>
            <th>العنوان</th>
            <th>الإجراء</th>
        </tr>
        </thead>
        <tbody  id="table_data_<?=$from_code?>" >
        <?php
        $x = 1;
        if (isset($results) && !empty($results) && $results !=null){
            foreach ($results as $value) {
                ?>
                <tr id="<?=$value->id?>" data-from_code="<?=$value->from_code?>">
                    <?php $num_row =$x++;?>
                    <td><?=($num_row)?></td>
                    <td><?=$value->title?></td>

                    <td>
                        <a href="#" onclick='swal({
                                title: "هل انت متأكد من التعديل ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "تعديل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                load_edit(<?=$value->id?>,"<?=$value->title?>",<?=$value->from_code?>,<?=$num_row?>);

                                });'>
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" onclick='swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                delete_setting(<?=$value->id?>,<?= $value->from_code ?>);
                                });'>
                            <i class="fa fa-trash"> </i></a>


                        <!--<a href="<?php echo base_url().'services_orders/shroot_setting/Main_setting/UpdateSetting/'.$value->id."/".$value->from_code  ?>" title="تعديل">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <span> </span>
                        <a href="<?=base_url()."services_orders/shroot_setting/Main_setting/DeleteSetting/".$value->id."/".$value->from_code?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>-->
                    </td>
                </tr>
            <?php }
        }else{
            echo '<tr id="no_data_'.$from_code.'">
                                                    <td colspan="5"> لايوجد بيانات </td>
                                                    </tr>';
        } ?>
        </tbody>
    </table>



    <script>
        function load_edit(row_id,title,from_code,num_row) {

            $('#id_'+from_code).val(row_id);
            $('#title_'+from_code).val(title);
            //$('#from_code_'+from_code).val(from_code);
            // $('#color_'+from_code).val(color);
            //var dataString   ='type=' + type +'&title='+ title +'&khdma_id_fk='+ khdma_id_fk;

            $('#button_'+from_code).html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");
            $('#button_'+from_code).attr("onclick","update_setting("+row_id+","+from_code+","+num_row+");");


        }
    </script>


    <script>
        function delete_setting(row_id,from_code) {
            console.log("delete_setting");
            console.log("row_id: "+row_id);
            console.log("from_code: "+from_code);

            var div_id= 'tab'+from_code;
            console.log("div_id: "+div_id);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>family_controllers/shroot_setting/Main_setting/delete_setting',
                data: {id:row_id,from_code:from_code},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                        title: 'تم الحذف بنجاح !',
                        type: 'warning',
                        confirmButtonText: 'تم'
                    });


                    $("#"+row_id).remove();
                    // $("#"+row_id).parents("tr").remove();

                }
            });

        }
    </script>