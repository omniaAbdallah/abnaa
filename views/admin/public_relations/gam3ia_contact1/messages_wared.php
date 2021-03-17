

    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?php echo $title ; ?></h4>

            </div>
            <div class="panel-body" style="min-height: 300px;">
                <?php
                if (isset($records)&& !empty($records)){
                $x=1;
                ?>
                <div class="col-xs-12" id="main_content">
                    <table id="" class="table example  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th> نوع التواصل</th>
                            <th>  اسم المرسل</th>
                            <th>  تاريخ الارسال</th>
                            <th>    وقت الارسال</th>
                            <th>   نص الرساله</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($records as $row){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td>
                                    <?php
                                     if (!empty($row->contact_type_n)){
                                         echo $row->contact_type_n;
                                     }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if (!empty($row->publisher_name)){
                                        echo $row->publisher_name;
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if (!empty($row->date_ar)){
                                        echo $row->date_ar;
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if (!empty($row->time)){
                                        echo $row->time;
                                    }
                                    ?>

                                </td>

                                <td>
                                    <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $row->id?>);">
                                        <i class="fa fa-list "></i></a>
                                </td>

                                <td>
                                    <a data-toggle="modal" data-target="#egraaModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="$('#row_id').val(<?= $row->id?>)">
                                        <i class="fa fa-list "></i> اجراء علي الرسالة</a>


                                    <a href="#" onclick='swal({
                                        title: "هل انت متأكد من الحذف ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "حذف",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){
                                        swal("تم الحذف!", "", "success");
                                        window.location="<?= base_url()."aqr/akarat/Akarat/delete_akar/" . $row->id?>";
                                        });'>
                                        <i class="fa fa-trash"> </i></a>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                    <?php
                } else{
                    ?>
                    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>


<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">نص الرسالة</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

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


    <!-- egraaModal -->


    <div class="modal fade" id="egraaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="text-align: center;"> اجراء علي الرساله</h4>
                </div>
                <div class="modal-body" style="padding: 10px 0" id="">
                    <div class="col-xs-12">

                        <input type="hidden" name="row_id" id="row_id" value="">
                        <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                            <label class="label">  اجراءات رسائل التواصل</label>
                            <select  name="egraa_id_fk" id="egraa_id_fk"
                                     class="form-control  "   data-validation="required">
                                <option value="">اختر</option>
                                <?php
                                if (isset($egraat)&& !empty($egraat)){
                                    foreach ($egraat as $item){
                                        ?>
                                        <option value="<?= $item->id?>-<?= $item->title?>"> <?= $item->title?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                            <button type="button" onclick="update_egraa()"  class="btn btn-labeled btn-success " name="add" value="add"   style="margin-top: 27px ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                        <?php

                        ?>


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

    <!-- egraaModal -->
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>public_relations/gam3ia_contact/Contact/load_message",
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
        function update_egraa() {
            var row_id = $('#row_id').val();
            var egraa_id_fk = $('#egraa_id_fk').val();
            console.log(egraa_id_fk) ;
         //   return;
            if (egraa_id_fk !=''){
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url();?>public_relations/gam3ia_contact/Contact/update_egraa",
                    data: {row_id:row_id,egraa_id_fk:egraa_id_fk},
                    beforeSend: function() {
                        $('#main_content').html(
                            '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                        );
                    },
                    success: function (d) {
                        $('#row_id').val('');
                        $('#egraa_id_fk').val('');
                        swal({
                            title:" تمت العملية بنجاح ",

                        });
                        $('#egraaModal').modal('hide');

                        $('#main_content').html(d);

                    }

                });
            }  else {
                swal({
                    title:"من فضلك تأكد من الحقول الناقضه !",
                    type:"warning"
                });
            }

        }
    </script>
