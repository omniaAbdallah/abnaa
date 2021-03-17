<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title;?></h3>
        </div>
        <div class="panel-body">
           
            <div class="col-md-12">
            <div class="form-group col-sm-6">
                <label class="label ">سبب رفض الطلب</label>
                <input type="text" class="form-control" placeholder="" data-validation="required" name="reason_refuse"
                value="" id="reason_refuse">
                <input type="hidden"  id="id" name="id" value="<?=$id?>" >
            </div>
            
<!--             <div class="col-md-12">-->
                <div class="form-group col-md-4 padding-4">
                    <div class="col-sm-3  col-md-2 padding-4"  style="display: block;">
                                <button type="button" onclick="add_reason_refuse(<?=$id?>)"
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
  function add_reason_refuse(id) {
    
     
     var reason_refuse=$("#reason_refuse").val();
   
     var id=id;
      if (reason_refuse != 0 && reason_refuse != '' ) {
      
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/add_reason_refuse',
              data: {reason_refuse:reason_refuse,id:id},
              dataType: 'html',
              cache: false,
               
            beforeSend: function () {
                swal({
                            title: "جاري  ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
            },
              success: function (html) {
               
                  swal({
                      title: "تم تحديد  السبب!",
                  });
                  window.location.href = '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat_refuse';
              }
          });
      }
      else
      {
        swal({ title: "برجاء ادخال البيانات!", });
      }
  }
</script>
