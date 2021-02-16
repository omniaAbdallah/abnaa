

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
                            <th>اجراء تم علي الرساله</th>
                            <th> تاريخ الاجراء</th>
                             <th> وقت الاجراء</th>
                            <th>القائم بالاجراء</th>
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
                                   <span style="background-color: <?php if (!empty($row->contact_type_color)){ echo $row->contact_type_color;}?>">
                                         <?php
                                         if (!empty($row->contact_type_n)){
                                             echo $row->contact_type_n;
                                         }
                                         ?>
                                    </span>
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
                                     <span style="background-color: <?php if (!empty($row->egraa_color)){ echo $row->egraa_color;}?>">
                                        <?php
                                        if (!empty($row->egraa_n)){
                                            echo $row->egraa_n;
                                        }
                                        ?>
                                    </span>



                                </td>
                                <td>

                                    <?php
                                    if (!empty($row->suspend_date)){
                                        echo $row->suspend_date;
                                    }
                                    ?>

                                </td>
                                
                                 <td>

                                    <?php
                                    if (!empty($row->suspend_time)){
                                        echo $row->suspend_time;
                                    }
                                    ?>

                                </td>
                                <td>

                                    <?php
                                    if (!empty($row->suspend_publisher_name)){
                                        echo $row->suspend_publisher_name;
                                    }
                                    ?>

                                </td>

                                <td>
                                    <a  class="btn  btn-xs" target="_blank" data-toggle="modal" style="padding: 1px 5px;" title="ارسال"
                                        onclick="get_member_send_whats(<?=$row->id?>,'<?= $row->mother_mob?>');"  data-target="#send_data_whats">
                                        <img  width="25" height="25"
                                              src="https://kawccq-sa.org/asisst/web_asset/img/dedication/wp.png">

                                    </a>
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
                                        window.location="<?= base_url()."public_relations/gam3ia_contact/Contact/delete_message/".$row->id?>/messages_read";
                                        });'>
                                        <i class="fa fa-trash"> </i></a>

                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>

                        <!-- <tbody>
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

                                     <?php
                                     if (!empty($row->egraa_n)){
                                         echo $row->egraa_n;
                                     }
                                     ?>

                                 </td>
                                 <td>

                                     <?php
                                     if (!empty($row->suspend_date)){
                                         echo $row->suspend_date;
                                     }
                                     ?>

                                 </td>
                                 <td>
                                  <?php
                                     if (!empty($row->suspend_time)){
                                         echo $row->suspend_time;
                                     }
                                     ?>
                                 </td>
                                 <td>

                                     <?php
                                     if (!empty($row->suspend_publisher_name)){
                                         echo $row->suspend_publisher_name;
                                     }
                                     ?>

                                 </td>

                             </tr>
                             <?php
                         }
                         ?>
                         </tbody>-->
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
                                     class="form-control selectpicker " data-show-subtext="true" data-live-search="true" data-validation="required">
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
                            <button type="button" onclick="update_egraa()"  class="btn btn-labeled btn-success " name="add" value="add"   style="margin-top: 30px ">
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



    <div class="modal fade " id="send_data_whats" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-success modal-lg " role="document" style="width:70%;">
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">  ارسال عبر الواتس </h3>
                </div>
                <div class="modal-body ">
                    <input type="hidden" name="message_id" id="message_id"/>
                    <input type="hidden" name="mother_mob" id="mother_mob"/>
                    <div id="">
                        <!--------------------------------------------------->
                        <div class="form-group">

                        </div>
                        <?php
                        $mes = 'السلام عليكم ورحمة الله وبركاته/' .' '.'تسر جمعية أيتام عرعر أن تتواصل مع حضراتكم..'
                        ?>

                        <input type="text" id="message_header" class="form-control" name="message_header" value="<?= $mes ?>" >
                        <label class="label">الرسالة</label>

                        <textarea style="width: 100%;" placeholder="اكتب نص الرساله هناااا" name="message_whats" id="message_whats" >
                            </textarea>
                        <!------------------------------------------------------------------------------------------->
                    </div>
                </div>
                <div class="modal-footer " style="display: inline-block; width: 100%;">
                    <button type="button" style="float: left;" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    <button type="button" formtarget="_blank" style="float: right;" onclick="send_sms_whats();"  class="btn btn-success" ><li class="fa fa-envelope-o"> ارسال</li></li></button>
                </div>

            </div>
        </div>
    </div>


    <script>
        function send_sms_whats()
        {
            var message_header  =$('#message_header').val();
            var message_whats=$('#message_whats').val();
            var message_id =$('#message_id').val();
            var mother_mob = '966'+$('#mother_mob').val();
            //  var mother_mob = '966'+'543629615';
            var full_message = message_header+message_whats ;
            if ($.trim($('#message_whats').val()).length < 1){
                swal({
                    title:"من فضلك ادخل نص الرساله !",
                    type:"warning" ,
                    confirmButtonText:"تم"
                });
            }
            else {

                var link="https://web.whatsapp.com/send?phone="+mother_mob+"&text="+full_message+"&source&data";
                if (window.showModalDialog){
                    window.showModalDialog(link,"popup","dialogWidth:600px;dialogHeight:600px");
                }else{
                    window.open(link,"name","height=600,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes");
                }
                $('#send_data_whats').modal('hide');
                $('#message_whats').val('');
                $('#message_id').val('');
                $('#mother_mob').val('');
            }




        }
    </script>
    <script>
        function get_member_send_whats(valu,mother_mob)
        {
            $('#message_id').val(valu);
            $('#mother_mob').val(mother_mob);
        }
    </script>
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
