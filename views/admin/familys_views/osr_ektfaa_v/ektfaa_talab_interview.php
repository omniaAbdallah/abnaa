<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title;?></h3>
        </div>
        <div class="panel-body">
           
            <div class="col-md-12">
            <div class="form-group col-sm-4">
                <label class="label ">تاريخ المقابلة</label>
                <input type="date" class="form-control" placeholder="" data-validation="required" name="determine_mo2bla_date"
                value="<?=date('Y-m-d')?>" id="determine_mo2bla_date">
                <input type="hidden"  id="id" name="id" value="<?=$id?>" >
            </div>
            <div class="form-group col-sm-4">
                <label class="label ">وقت المقابلة</label>
                <input type="time" class="form-control" placeholder="" 
                value="<?=date('H:i:s')?>"
                data-validation="required" name="determine_mo2bla_time" id="determine_mo2bla_time">
                
            </div>
<!--             <div class="col-md-12">-->
                <div class="form-group col-md-4 padding-4">
                    <div class="col-sm-3  col-md-2 padding-4"  style="display: block;">
                                <button type="button" onclick="add_interview_date(<?=$id?>)"
                                        style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                    </div>
                   
                </div>
<!--              </div>-->
            </form>
        </div>
    </div>
</div>

</div>
<script>
  function add_interview_date(id) {
    
     
     var determine_mo2bla_date=$("#determine_mo2bla_date").val();
     var determine_mo2bla_time=$("#determine_mo2bla_time").val();
     var id=id;
      if (determine_mo2bla_date != 0 && determine_mo2bla_date != '' && determine_mo2bla_time != 0 && determine_mo2bla_time != '') {
      
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/add_interview_date',
              data: {determine_mo2bla_date:determine_mo2bla_date,determine_mo2bla_time:determine_mo2bla_time,id:id},
              dataType: 'html',
              cache: false,
               
            beforeSend: function () {
                swal({
                            title: "جاري التحويل ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
            },
              success: function (html) {
               
                  swal({
                      title: "تم تحديد المقابلة بنجاح!",
                  });
                  window.location.href = '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat_accept';
              }
          });
      }
      else
      {
        swal({ title: "برجاء ادخال البيانات!", });
      }
  }
</script>
