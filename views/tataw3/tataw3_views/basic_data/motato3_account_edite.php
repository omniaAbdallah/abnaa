<div id="show_edite">

<div class="col-sm-12 col-md-12 col-xs-12 ">

    <div class="panel panel-default">
        <div class="panel-heading panel-title">
               بيانات الحساب

        </div>

        <div class="panel-body" >
            <div class="form-group col-sm-12 col-xs-12 no-padding">
               
                    <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>إسم المستخدم</th>
                            <th>كلمة المرور</th>
                            <!-- <th>الحالة</th> -->
                          
                            <th>الإجراء</th>
                            <!-- <th>الطباعه</th> -->
                        </tr>
                        </thead>
                        </tr>
                        <tbody>
                        <?php
                        $x = 1;
                      
                            ?>
                            <tr>
                                <td><?= ($x++) ?></td>
                                <td><?= $result->user_name;?></td>
                                <td><?=$result->password?></td>
                               
                                <!-- <td>
                             
                                
                                <?php
                                $arr = array(1 => 'نشط', 0 => 'غير نشط');
                                            foreach ($arr as $key => $value) {
                                                $select = '';
                                                if ($result->suspend != '') {
                                                    if ($key == $result->suspend) {
                                                        echo $value; 
                                                    }
                                                }} ?>
                                                
                                                
                                </td> -->

                                <td>
                                  
                                        <a onclick='swal({
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
                                                editElectronic_cardOrders(<?= $result->id ?>);
                                                });'>
                                            <i class="fa fa-pencil"> </i></a>
                                     

                                 
                                </td>

                            </tr>
                     
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function editElectronic_cardOrders(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
        
            url: "<?php echo base_url();?>tataw3/Tataw3_c/editaccount",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_edite').html(d);
              //  $('#show_details').hide();

            }

        });
    }
</script>
