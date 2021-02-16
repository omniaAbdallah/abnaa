<style type="text/css">
    .inner-heading-green{
        background-color: #09704e;
        padding: 10px;
        color: #fff;
    }
    label {

        color: #002542 !important;

        font-size: 16px !important;

    }

    .top-label {
        font-size: 13px;
    }


    .i-check {
        margin: 5px 8px;
        width: auto;
    }
    .skin-square {
        text-align: center;
        display: flex;
    }

    input[type="checkbox"][readonly] {
        pointer-events: none;
    }

</style>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> </h3>
    </div>

    <div class="panel-body">

        <div class="col-xs-12 no-padding"  id="result">
            <!--
            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label"> نوع الخدمة </label>
                <input type="text" name="khdma_name"
                       value="<?= $result->khdma_name?>"
                       class="form-control" readonly>

            </div>
            <div class="form-group col-md-4 col-sm-5 col-xs-12 padding-4">
                <label class="label"> وصف الخدمة </label>
                <input type="text" name="wasf_khdma"
                       value="<?= $result->wasf_khdma?>"
                       class="form-control  "  readonly>

            </div>
            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">  الفئات المستهدفة </label>
                <?php
                $fe2at = array('f_a'=>'أ',
                    'f_b'=>'ب',
                    'f_c'=>'ج',
                    'f_d'=>'د',
                    'f_e'=>'هـ'
                );
                ?>
                <select name="fe2at[]" id="fe2at" multiple
                        title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                        class=" no-padding form-control  selectpicker  " data-live-search="true"
                        data-actions-box="true" disabled>
                    <?php
                    foreach ($fe2at as $key=>$value){
                        if (isset($result) && !empty($result)){
                            if ($result->$key==1){
                                $check='selected';
                            } else{
                                $check ='';
                            }
                        } else{
                            $check ='';
                        }
                        ?>
                        <option value="<?= $key?>" <?= $check?>> <?= $value?></option>
                        <?php

                    }
                    ?>
                </select>

            </div>

            <div class="form-group col-sm-5 col-xs-12">
                <label class="label"> المدخلات </label>
                <div class="skin-square">
                    <?php
                    $relat = array('relat_num'=>'العدد',
                        'relat_mabl3'=>'المبلغ',
                        'relat_rkm_fatora'=>'رقم الفاتورة',
                        'relat_rkm_gehaz'=>'رقم الجهاز',
                        'relat_age'=>'السن'
                    );
                    foreach ($relat as $key=>$value){
                        if (isset($result) && !empty($result)){
                            if ($result->$key==1){
                                $check='checked';
                            } else{
                                $check ='';
                            }
                        } else{
                            $check ='';
                        }
                        ?>

                        <div class="check-style" style=" margin-left: 20px;">
                            <input tabindex="9" type="checkbox" id="<?php echo $key;?>"   name="<?php echo $key;?>" class="day checkbox_esal"  value="1" <?= $check?>
                                   disabled>
                            <label class="text-center" for="<?php echo $key;?>"><?php echo $value;?></label>
                        </div>

                    <?php }  ?>
                </div>
            </div>
            -->

        </div>
        <div class="clearfix"></div><br>
        <div class="col-xs-12 no-padding" >


            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a onclick="load_data(<?= $result->id?>,1,'con_result')" href="#cond" aria-controls="reservation_orders" role="tab" data-toggle="tab">
                        <i class="fa fa-check-square-o" style=""></i>

                           الضوابط والشروط</a></li>
                <li role="presentation"  class=""><a onclick="load_data(<?= $result->id?>,2,'files_result')" href="#files" aria-controls="tab_m" role="tab" data-toggle="tab">
                        <i class="fa fa-check-square-o" style=""></i>
                           المستندات المطلوبة</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade  in active" id="cond">
                    <?php // $this->load->view('admin/services_orders/family_serv_setting/load_cond_result',$result)
                    ;?>
                    <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                        <label class="label " >  الضوابط والشروط </label>
                        <input type="text" name="title"
                               value="" id="title_con"
                               class="form-control  "  >
                        <input type="hidden" name="type" id="type" value="1">
                        <input type="hidden" name="khdma_id_fk" id="khdma_id_fk" value="<?= $result->id ?>">

                        <input type="hidden" name="edit_id" id="edit_id" value="">
                        <input type="hidden" name="edit_div_id" id="edit_div_id" value="">

                    </div>
                    <div class="form-group col-md-2 ">
                        <button type="button"  id="button_cond" onclick="add_cond('con_result')" class="btn btn-labeled btn-success "   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اضافة
                        </button>

                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12" id="con_result">
                        <?php
                         if (isset($result->conds) && !empty($result->conds)){
                             $x=1;
                             ?>
                             <table id="" class="table exampleee  table-bordered table-striped table-hover">
                                 <thead>
                                 <tr class="greentd">
                                     <th>م</th>
                                     <th class="">الضوابط والشروط </th>
                                     <th >  الاجراء</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 foreach ($result->conds  as $row){
                                     ?>
                                     <tr>
                                         <td><?= $x++?></td>
                                         <td><?= $row->title?></td>
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
                                                 load_edit(<?= $row->id ?>,"<?= $row->title?>",<?= $row->khdma_id_fk ?>,<?= $row->type ?>);

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
                                                 delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)
                                                 });'>
                                                 <i class="fa fa-trash"> </i></a>

                                             <!--<a href="#" data-toggle="modal" data-target="#editModal" onclick="load_edit(<?= $row->id ?>,'<?= $row->title?>',<?= $row->khdma_id_fk ?>,<?= $row->type ?>)" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                             <a href="#" onclick="delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)"> <i class="fa fa-trash"> </i></a>
                                                -->
                                         </td>
                                     </tr>
                                     <?php
                                 }
                                 ?>
                                 </tbody>
                             </table>

                             <?php
                         }
                        ?>

                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade  " id="files">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                        <label class="label label_title" >  المستندات المطلوبة </label>
                        <input type="text" name="title" id="title_files"
                               value=""
                               class="form-control "  >

                    </div>
                    <div class="form-group col-md-2 ">
                        <button type="button"  id="button_file" onclick="add_cond('files_result')" class="btn btn-labeled btn-success "   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اضافة
                        </button>

                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12" id="files_result">
                        <?php
                        if (isset($result->files) && !empty($result->files)){
                            $x=1;
                            ?>
                            <table id="" class="table exampleee  table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th class="">المستندات المطلوبة </th>
                                    <th >  الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($result->files  as $row){
                                    ?>
                                    <tr>
                                        <td><?= $x++?></td>
                                        <td><?= $row->title?></td>
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
                                                load_edit(<?= $row->id ?>,"<?= $row->title?>",<?= $row->khdma_id_fk ?>,<?= $row->type ?>);

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
                                                delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)
                                                });'>
                                                <i class="fa fa-trash"> </i></a>

                                            <!--<a href="#" data-toggle="modal" data-target="#editModal" onclick="load_edit(<?= $row->id ?>,'<?= $row->title?>',<?= $row->khdma_id_fk ?>,<?= $row->type ?>)" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                            <a href="#" onclick="delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)"> <i class="fa fa-trash"> </i></a>
                                            -->
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>

                            <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- detailsModal -->


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">تعديل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" >
                <div class="container-fluid" id="result_edit">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                        <label class="label " id="label_edit" >   </label>
                        <input type="text"
                               value="" id="title_edit"
                               class="form-control  "  >

                        <input type="hidden" id="edit_id" value="">
                        <input type="hidden" id="edit_khdma_id" value="">
                        <input type="hidden" id="edit_div_id" value="">
                        <input type="hidden" id="edit_type" value="">

                    </div>
                    <div class="form-group col-md-2 ">
                        <button type="button"  onclick="update_cond()" class="btn btn-labeled btn-success "   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                        </button>

                    </div>

                </div>

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    $(document).ready(function () {
        console.log("ready!  load condition");
        load_page(<?= $this->uri->segment(5)?>);
    });

</script>
    <script>
        function load_page(row_id) {

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/load_details",
                data: {row_id:row_id},
                beforeSend: function() {
                    $('#result').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (d) {
                    $('#result').html(d);

                }

            });

        }
    </script>
<script>
    function add_cond(div_id) {
        var type = $('#type').val();
        var title ;
        var khdma_id_fk = $('#khdma_id_fk').val();
          if (type==1){
              title = $('#title_con').val();
          }  else if (type==2){
              title = $('#title_files').val();
          }

        if (title !='' ) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/add_serv_details",
                data: {type:type,title:title,khdma_id_fk:khdma_id_fk},
                beforeSend: function() {
                    $('#'+div_id).html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (d) {
                    $('#'+div_id).html(d);
                    $('#title_files').val('');
                    $('#title_con').val('');
                    swal({
                        title:" تم الاضافة بنجاح",
                        confirmButtonText:'تم',

                    });


                }
            });
        } else {
            swal({
                title:"برجاء ادخال البيانات !",
                type:'warning',
                confirmButtonText:'تم',

            });
        }



    }
</script>


<script>
    function load_data(row_id,type,div_id) {
        $('#type').val(type);
        $('#title_files').val('');
        $('#title_con').val('');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/load_data",
            data: {row_id:row_id,type:type},
            beforeSend: function() {
                $('#'+div_id).html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (d) {
                $('#'+div_id).html(d);

            }

        });

    }
</script>

<script>
    function load_edit(row_id,title,khdma_id_fk,type) {
        /*$('#title_edit').val(title);
        $('#edit_id').val(row_id);
        $('#edit_khdma_id').val(khdma_id_fk);
        $('#edit_type').val(type);*/
        //$('#title_edit').val(title);

        $('#edit_id').val(row_id);
        $('#khdma_id_fk').val(khdma_id_fk);
        $('#type').val(type);
        //var dataString   ='type=' + type +'&title='+ title +'&khdma_id_fk='+ khdma_id_fk;

        if (type==1){
            $('#edit_div_id').val('con_result');
            $('#title_con').val(title);
            $('#button_cond').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");
            $("#button_cond").attr("onclick","update_cond();");
        }  else if (type==2) {
            $('#edit_div_id').val('files_result');
            $('#title_files').val(title);
            $('#button_file').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");
            $("#button_file").attr("onclick","update_cond();");
        }

    }
</script>
<script>
    function update_cond() {

        /*var title = $('#title_edit').val();
        var row_id = $('#edit_id').val();
        var khdma_id_fk = $('#edit_khdma_id').val();
        var div_id = $('#edit_div_id').val();
        var type = $('#edit_type').val();
        */
        var row_id = $('#edit_id').val();
        var khdma_id_fk = $('#khdma_id_fk').val();
        var div_id = $('#edit_div_id').val();

        var type = $('#type').val();
        var title;
        if (type==1){
            title =$('#title_con').val();
        }  else if (type==2) {
            title = $('#title_files').val();
        }

        if (title !='' ) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/update_serv_details",
                data: {row_id:row_id,title:title,khdma_id_fk:khdma_id_fk,type:type},
                beforeSend: function() {
                    $('#'+div_id).html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (d) {
                    //$('#editModal').modal('hide');
                    swal({
                        title:" تم التعديل بنجاح",
                        confirmButtonText:'تم',

                    });

                    $('#'+div_id).html(d);
                    $('#title_files').val('');
                    $('#title_con').val('');
                    if (type==1){
                        $('#button_cond').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> اضافة ");
                        $("#button_cond").attr("onclick","add_cond('con_result');");
                    }  else if (type==2) {
                        $('#button_file').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> اضافة ");
                        $("#button_file").attr("onclick","add_cond('files_result');");
                    }



                }
            });
        } else {
            swal({
                title:"برجاء ادخال البيانات !",
                type:'warning',
                confirmButtonText:'تم',

            });
        }



    }
</script>
<script>

    $('.exampleee').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        "bDestroy": true
    } );



</script>
<script>
    function delete_setting(row_id,khdma_id_fk,type) {
        console.log("delete_setting");
        console.log("row_id: "+row_id);
        console.log("khdma_id_fk: "+khdma_id_fk);
        console.log("type: "+type);
        var div_id;
        if (type==1){
            div_id= 'con_result';

        }  else if (type==2) {
            div_id= 'files_result';
        }
        console.log("div_id: "+div_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>services_orders/family_serv_setting/Serv_setting/delete_serv_details',
            data: {row_id:row_id,khdma_id_fk:khdma_id_fk,type:type},
            dataType: 'html',
            cache: false,
            beforeSend: function() {
                $('#'+div_id).html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {
                swal({
                    title: 'تم الحذف بنجاح !',
                    type: 'warning',
                    confirmButtonText: 'تم'
                });
                $('#'+div_id).html(html);


            }
        });

    }
</script>


