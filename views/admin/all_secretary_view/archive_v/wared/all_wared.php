
<?php
    $this->load->view('admin/requires/header');
       $this->load->view('admin/requires/tob_menu');
?>
<style>
td .fa-print{
    background: white !important;
    color: black !important;
    padding: 1px 0px !important;
    font-size: 14px !important;  
      padding: 2px 0px 0px 3px !important;
}
td .fa-search-plus {
    padding: 2px 0px 0px 3px !important;
    font-size: 12px !important;
    line-height: 1.5 !important;
    background-color: #ffffff !important;
    color: #000 !important;
}
td .fa-archive {
    padding: 2px 0px 0px 3px !important;
    font-size: 12px !important;
    line-height: 1.5 !important;
    background-color: #ffffff !important;
    color: #000 !important;
}
td .fa-trash {
    padding: 2px 0px 0px 3px !important;
    font-size: 12px !important;
    line-height: 1.5 !important;
    background-color: #ffffff !important;
    color: #000 !important;
}
.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
    font-size: 14px !important;
}
</style>
 <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="panel-body">
<table id="js_table_customer" 
    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
             <thead>
             <tr class="info">
                    <th>م</th>
                    <th>   رقم الوارد</th>
                    <th>  نوع الوارد</th>
                    <th> تاريخ التسجيل</th>
                    <th> وقت التسجيل</th>
                    <!-- <th>جهه الاختصاص</th>  -->
                     <th> جهه الارسال</th> 
                     <th>  عنوان الموضوع</th>
                     <!-- <th> طريقه الاستلام</th> -->
                     <th> الاولويه</th>
                     <th>القائم بالإضافة</th>
                           <th>الحالة</th>
                           <th>تاريخ الإستحقاق</th>
                            <th>المدة المتبقية</th>
                    <th >الاجراء</th>
                </tr>
             </thead>
         </table>
         </div>
         </div>
         </div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<div class="modal fade" id="myModal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">نموذج الطباعة </h4>
      </div>
      <div class="modal-body col-sm-12">
       <div class="col-sm-12">
                <div id="div_print" ></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
        <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> انهاء المعامله :
                </h4>
            </div>
            <div class="modal-body">
            <div id="reason_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input6').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه سبب انهاء المعامله
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input6" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">سبب انهاء المعامله </label>
                                    <input type="text" name="reason_setting" id="reason_setting" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_reason_setting" style="display: block;">
                                    <button type="button" onclick="add_reason_setting($('#reason_setting').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_reason_setting" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_reason_setting">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
            </div>
              <div id="end">
               </div>
             </div>
       </div>
   </div>
</div>
</div>
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel_emp()">
                    <label for="esnad1" class="radio-label"> موظف</label>
                </div>
                <!-- <div class="radio-content">
                    <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                    <label for="esnad2" class="radio-label"> قسم</label>
                </div> -->
                </div>
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>
            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_print_zarf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title">  طباعه الظرف :
                </h4>
            </div>
            <div class="modal-body">
             <div id="print_zarf">
               </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
               </div>
            </div>
       </div>
   </div>
</div>
</div>
<script>
    function get_print(id){
       var print_id=id;
        var dataString = 'id=' + print_id;
       $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/PrintCode',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>
<script>
  function add_reason(id) {
var id=id;
    var value=$('#reason_id_fk').val();
    var name=$('#reason_name').val();
    var to_user_n=$('#to_user_n').val();
    var to_user_id=$('#to_user_id').val();
    var from_user_n=$('#from_user_n').val();
    var date_end=$('#date_end').val();
    var num_end=$('#num_end').val();
      if (value != 0 && value != '' && name != 0 && name != '' && to_user_n != 0 && to_user_n != '' && from_user_n != 0 && from_user_n && num_end != 0 && num_end  ) {
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_end',
              data: {id:id,value:value,name:name,to_user_n:to_user_n,to_user_id:to_user_id,from_user_n:from_user_n,date_end:date_end,num_end:num_end},
              dataType: 'html',
              cache: false,
              success: function (html) {
                $('#myModal_end').modal('hide');
                  swal({
                      title: "تم انهاء المعامله بنجاح!",
      }
      );
      window.location.reload();
// $('#update_reason').hide();
// $('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",
      }
      );
      }
  }
</script>
<script>
    function getTitle_reason(id,value) {
        $('#reason_id_fk').val(id);
        $('#reason_name').val(value);
        $('#myModal_end').modal('hide');
    }
</script>
<script>
    function get_reason_end() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_reason",
            beforeSend: function () {
                $('#end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#end').html(d);
            }
        });
    }
</script>
<script>
  function add_reason_setting(value) {
      $('#div_update_reason_setting').hide();
      $('#div_add_reason_setting').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'reason_setting=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_setting',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#reason_setting').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تمت الاضافه بنجاح!",
      }
      );
      get_reason_end();
              }
          });
      }
  }
</script>
<script>
    function update_reason_setting(id) {
        var id = id;
        $('#geha_input6').show();
        $('#div_add_reason_setting').hide();
        $('#div_update_reason_setting').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_reason_setting",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
                $('#reason_setting').val(obj.title);
            }
        });
        $('#update_reason_setting').on('click', function () {
            var reason_setting = $('#reason_setting').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_reason_setting",
                type: "Post",
                dataType: "html",
                data: {reason_setting: reason_setting,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_setting').val('');
                    $('#div_update_reason_setting').hide();
                    $('#div_add_reason_setting').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
        }
        );
        get_reason_end();    
                }
            });
        });
    }
</script>
<script>
  function delete_reason_setting(id) {
  //  confirm('?? ??? ????? ?? ????? ????? ?');
       var r = confirm('هل انت متاكد من الحذف ?');
  if (r == true) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
              $('#reason_setting').val('');
             // $('#Modal_esdar').modal('hide');
              swal({
                  title: "تم الحذف!",
  }
  );
  get_reason_end();
          }
      });
  }
}
</script>
<script>
    function load_tahwel_emp() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel_emp' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id,name) {
        var checkBox = document.getElementById("myCheck"+id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
 //$('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
        $('#to_user_id').val(id);
        $('#to_user_n').val(name);
        $('#tahwelModal').modal('hide');
    }
</script>
<!-- zarffff -->
<script>
function add_print_zarf(mo3mla_id_fk)
{
    var mo3mla_id_fk=mo3mla_id_fk;
    var mo3mla_type=$('#mo3mla_type'+mo3mla_id_fk).val();
    var type_zarf=$('#type_zarf'+mo3mla_id_fk).val();
    var start_title=$('#start_title'+mo3mla_id_fk).val();
    var geha_name=$('#geha_name'+mo3mla_id_fk).val();
    var end_title=$('#end_title'+mo3mla_id_fk).val();
    if (mo3mla_id_fk != ''  && mo3mla_type != '' && type_zarf != '' && start_title != ''  && geha_name != ''   && end_title!=''  ) {
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_print_zarf',
              data: {mo3mla_id_fk:mo3mla_id_fk,mo3mla_type:mo3mla_type,type_zarf:type_zarf,start_title:start_title,geha_name:geha_name,end_title:end_title},
              dataType: 'html',
              cache: false,
              success: function (data) {
    $('#mo3mla_id_fk'+mo3mla_id_fk).val('');
    $('#mo3mla_type'+mo3mla_id_fk).val('');
    $('#type_zarf'+mo3mla_id_fk).val('');
    $('#start_title'+mo3mla_id_fk).val('');
    $('#geha_name'+mo3mla_id_fk).val('');
    $('#end_title'+mo3mla_id_fk).val('');
    get_print_zarf(mo3mla_id_fk,2);
    print_zarf(data);
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",
      }
      );
      }
}
</script>
<script>
    function get_print_zarf(id,type) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{id:id,type:type},
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/get_all_print_zarf",
            beforeSend: function () {
                $('#print_zarf').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#print_zarf').html(d);
            }
        });
    }
</script>
<script>
        function delete_print_zarf(id,mo3mla_id_fk){
        swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم",
  cancelButtonText: "لا",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/delete_print_zarf',
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
                    swal({
                        title: "تم الحذف!",
        }
        );
        get_print_zarf(mo3mla_id_fk,2);
                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});
    }
</script>
<script>
    function print_zarf(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'all_secretary/archive/sader/Add_sader/print_zarf'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script> 
<script>
    function make_print(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'all_secretary/archive/wared/Add_wared/print_tawresa'?>" ,
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            // WinPrint.print();
            // WinPrint.close();
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>    
<?php
       echo $customer_js;
    ?>
<?php      $this->load->view('admin/requires/footer'); ?>