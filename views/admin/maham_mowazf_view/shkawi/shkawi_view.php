<?php 
  $this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 
?>
<div class="col-xs-12 no-padding" >
<div class="panel panel-default ">
        <div class="panel-heading no-padding" >
            <h4 class="panel-title"><?php echo $title ; ?></h4>
        </div>
        <div class="panel-body" >
            <div class="col-xs-12 no-padding">
                <?php
                 if ($_SESSION['role_id_fk']==1){
                     ?>
                     <div class="alert alert-danger">عفوا... لابد من أن تكون موظف !</div>
                <?php
                 } else{
                      if (isset($emp_data) && !empty($emp_data)){
                          $emp_name = $emp_data->employee;
                          $emp_code = $emp_data->emp_code ;
                          $emp_edara_id = $emp_data->administration ;
                          $emp_edara_n = $emp_data->edara_n ;
                          $emp_qsm_id = $emp_data->department ;
                          $emp_qsm_n = $emp_data->qsm_n ;
                      } else{
                          $emp_name = '';
                          $emp_code = '' ;
                          $emp_edara_id = '' ;
                          $emp_edara_n = '' ;
                          $emp_qsm_id = '' ;
                          $emp_qsm_n = '' ;
                      }
                      if (isset($get_shkwa)&& !empty($get_shkwa)){
                          echo form_open_multipart('maham_mowazf/shkawi/Shkawi/update_shkwa/'.$get_shkwa->rkm);
                          $rkm = $get_shkwa->rkm ;
                          $type = $get_shkwa->type ;
                          $type_n = $get_shkwa->type_n ;
                          $sender_code = $get_shkwa->sender_code ;
                          $sender_id_fk = $get_shkwa->sender_id_fk ;
                          $sender_name = $get_shkwa->sender_name ;
                      } else{
                          echo form_open_multipart('maham_mowazf/shkawi/Shkawi/add_shkwa');
                      }
                     ?>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label"> تاريخ اليوم </label>
                         <input type="date" name="send_date"
                                value="<?= date('Y-m-d')?>"
                                class="form-control  "  readonly>
                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label">   اسم الموظف</label>
                         <input type="text" name="sender_name"
                                value="<?= $emp_name?>"
                                class="form-control  "  readonly>
                         <input type="hidden" name="sender_code" class="form-control" value="<?= $emp_code?>">
                         <input type="hidden" name="sender_id_fk" class="form-control" value="<?= $_SESSION['emp_code']?>">
                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label">    الادارة</label>
                         <input type="text" name="sender_edara_n"
                                value="<?= $emp_edara_n?>"
                                class="form-control"  readonly>
                         <input type="hidden" name="sender_edara_fk" class="form-control" value="<?= $emp_edara_id?>">
                     </div>
                     <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                         <label class="label">    القسم</label>
                         <input type="text" name="sender_qsm_n"
                                value="<?= $emp_qsm_n?>"
                                class="form-control  "  readonly>
                         <input type="hidden" name="sender_qsm_fk" class="form-control" value="<?= $emp_qsm_id?>">
                     </div>
                    
                     <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">الفئة</label>
                    <input type="text" name="type_n" id="type_n" value=""
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_message_type').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           data-validation="required"
                           readonly>
                           <input type="hidden" name="type" id="type" 
                           value="" class="form-control "
                            readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_message_type" 
                    onclick="get_details_message_type()"
                            class="btn btn-success btn-next" style="">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div id="shkwa_type_s">
                </div>
                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الي</label>
                            <input name="reciver_name" id="emp_name" class="form-control" style="width:88%; float: right;"
                                   readonly
                                   data-validation="required"
                                   value="">
<input type="hidden" id="emp_id_fk" name="reciver_id_fk"
value="">
<input type="hidden" id="edara_id_fk" name="reciver_edara_fk"
value="">
<input type="hidden" id="edara_n" name="reciver_edara_n"
value="">
<input type="hidden" id="emp_code" name="reciver_code"
value="">
<input type="hidden" id="qsm_id_fk" name="reciver_qsm_fk"
value="">
<input type="hidden" id="qsm_n" name="reciver_qsm_n"
value="">

                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')" >
                                <i class="fa fa-plus"></i></button>
                        </div>
                     <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                         <label class="label">    نص الرساله</label>
                         <textarea name="content" class="form-control " id="" data-validation='required'>
                         </textarea>
                     </div>
                     <div class="col-md-4 ">
                         <button type="submit"  style="border-radius: 2px; margin-top: 44px;" id="add" name="add" value="add" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> إرسال
                         </button>
                     </div>
                <?php
                 }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
                 if (isset($records) && !empty($records)){
                     ?>
<div class="col-xs-12 no-padding" >
<div class="panel panel-default ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>
        </div>
        <div class="panel-body" >
            <div class="col-xs-12 no-padding">
                
                <table id="" class="example  table table-bordered responsive nowrap text-center">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>الفئة</th>
                        <th> تاريخ الارسال</th>
                        <th> وقت الارسال</th>
                        <th>  نص الرساله</th>
                        <th>  المرسل اليه</th>
                        <th>  الاداره</th>
                        <th>  القسم</th>
                        <th>  الحاله</th>
                        <th>  الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x=1;
                    foreach($records as $row){
                        if( $row->readed!=0){
                            $suspend_type= 'تم الاستلام';
                            $class_suspend='danger';
                            }else{
                            $suspend_type= 'لم يتم الاستلام ';
                            $class_suspend='warning';
                        }
                        ?>
                    <tr>
                    <td><?=$x?></td>
                    <td>
                    <?=$row->type_n?>
                    </td>
                    <td><?=$row->send_date_ar?></td>
                    <td><?=$row->send_time?></td>
                    <td><?=$row->content?></td>
                    <td><?=$row->reciver_name?></td>
                    <td><?=$row->reciver_edara_n?></td>
                    <td><?=$row->reciver_qsm_n?></td>
                    <td>
                   <span style="width: 100%;color: black !important;" class="label label-<?=$class_suspend?>"><?=$suspend_type?></span>
                    </td>
                    <td>
                    <a onclick="load_details(<?=$row->id?>);"
       aria-hidden="true"
          data-toggle="modal"
          data-target="#detailsModal"><i     class="fa fa-search-plus" aria-hidden="true"></i> </a>
<?php   if( $row->readed ==0){?>
          <a  onclick='swal({
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
window.location="<?=base_url()?>maham_mowazf/shkawi/Shkawi/delete_shakwa/<?= $row->id?>";
});'>
<i class="fa fa-trash"> </i></a>
<?php }?>

                    </td>
                    </tr>
                    <?php 
                   $x++; }?>
                   </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<?php
                 } 
                ?>
<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 90%">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                   aria-label="Close"><span
                       aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"></h4>
       </div>
       <div class="modal-body">
           <div id="myDiv_emp"></div>
       </div>
       <div class="modal-footer" style="display: inline-block;width: 100%">
           <button type="button" class="btn btn-danger"
                   style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
           </button>
       </div>
   </div>
</div>
</div>
<script>
            function GetDiv_emps(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
                    '<th style="width: 170px;" >الأدارة   </th>' +
                    '<th style="width: 170px;" >القسم</th>' +
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>maham_mowazf/shkawi/Shkawi/getConnection_emp/',
                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}
                    ],
                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },
                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true,
                    destroy: true,
                    "order": [[1, "asc"]]
                });
            }
            //8-6-om
            function Get_emp_Name(obj) {
                console.log(' obj :' + obj.dataset.name + ': ');
                var name = obj.dataset.name;
                var emp_code = obj.dataset.emp_code;
                var edara_id = obj.dataset.edara_id;
                var edara_n = obj.dataset.edara_n;               
                var qsm_id = obj.dataset.qsm_id;
                var qsm_n = obj.dataset.qsm_n;
                document.getElementById('emp_name').value = name;
                document.getElementById('emp_id_fk').value = obj.value;
                document.getElementById('emp_code').value = emp_code;
                //6-7-om
               // $('#emp_id_fk').val(obj.value);
                //    check_vacation(obj.value);
                document.getElementById('edara_n').value = edara_n;
                document.getElementById('edara_id_fk').value = edara_id;
                // document.getElementById('job_title').value = job_title;
               
                document.getElementById('qsm_n').value = qsm_n;
                document.getElementById('qsm_id_fk').value = qsm_id;
                // $("#myModal_emps")modal.('hide');
                $("#myModal_emps .close").click();
            }
        </script>
<!-- yara -->
<div class="modal fade" id="Modal_message_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> الفئة</h4>
            </div>
            <div class="modal-body">


                <div id="message_type_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span> أضافة 
                                    الفئة
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">الفئة</label>
                                    <input type="text" name="message_type" id="message_type" 
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_message_type" style="display: block;">
                                    <button type="button" onclick="add_message_type($('#message_type').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_message_type" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-warning " name="save" value="save" id="update_message_type">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha1111"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>



<!-- yara -->
<script>
    function get_details_message_type() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/shkawi/Shkawi/load_message_type",
            
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_message_type(id,value) {


        $('#type').val(id);
        $('#type_n').val(value);

        $('#Modal_message_type').modal('hide');
    }
</script>
<script>
  
  function add_message_type(value) {

      $('#div_update_message_type').hide();
      $('#div_add_message_type').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'message_type=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/add_message_type',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#message_type').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      get_details_message_type();

              }
          });
      }

  }


</script>
<script>
    function update_message_type(id) {
        var id = id;
        $('#geha_input1111').show();
        $('#div_add_message_type').hide();
        $('#div_update_message_type').show();


        $.ajax({
            url: "<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/getById_message_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#message_type').val(obj.title);


            }

        });

        $('#update_message_type').on('click', function () {
            var message_type = $('#message_type').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/update_message_type",
                type: "Post",
                dataType: "html",
                data: {message_type: message_type,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#message_type').val('');
                    $('#div_update_message_type').hide();
                    $('#div_add_message_type').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_message_type();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_tasnef(id) {
        swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم!",
  cancelButtonText: "لا!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/delete_message_type',
                data: {id: id},
                dataType: 'html',
                cache: false,
                beforeSend: function()
                {
                    swal({
    title: "جاري الحذف ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {
                    //   alert(html);
                    $('#tasnef').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details_message_type();

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});

    }
</script>


<script>
    function get_shkwa_type(type) {

        if(type=="شكوي")
        {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/shkawi/Shkawi/get_shkwa_type",
            
            
            success: function (d) {
                $('#shkwa_type_s').html(d);

            }

        });
        }
    }
</script>

<!-- yara -->
<script>
    function get_details_shkwa_type() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/shkawi/Shkawi/load_shkwa_type",
            
            beforeSend: function () {
                $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_shkwa_type(id,value) {


        $('#shkwa_typee').val(id);
        $('#shkwa_type_n').val(value);

        $('#Modal_shkwa_type').modal('hide');
    }
</script>
<script>
  
  function add_shkwa_type(value) {

      $('#div_update_shkwa_type').hide();
      $('#div_add_shkwa_type').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'shkwa_type=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/add_shkwa_type',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#shkwa_type').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      get_details_shkwa_type();

              }
          });
      }

  }


</script>
<script>
    function update_shkwa_type(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add_shkwa_type').hide();
        $('#div_update_shkwa_type').show();


        $.ajax({
            url: "<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/getById_shkwa_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#shkwa_type').val(obj.title);


            }

        });

        $('#update_shkwa_type').on('click', function () {
            var shkwa_type = $('#shkwa_type').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/update_shkwa_type",
                type: "Post",
                dataType: "html",
                data: {shkwa_type: shkwa_type,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#shkwa_type').val('');
                    $('#div_update_shkwa_type').hide();
                    $('#div_add_shkwa_type').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_shkwa_type();    

                }

            });

        });

    }

  
</script>

<script>
  
    
        function delete_shkwa_type(id) {
        swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم!",
  cancelButtonText: "لا!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/shkawi/Shkawi/delete_message_type',
                data: {id: id},
                dataType: 'html',
                cache: false,
                beforeSend: function()
                {
                    swal({
    title: "جاري الحذف ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {
                    //   alert(html);
                  
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details_shkwa_type();

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});

    }
</script>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
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
<script>
    function load_details(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/shkawi/Shkawi/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>