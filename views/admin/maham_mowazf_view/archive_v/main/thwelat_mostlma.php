<?php 
  $this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 
?>
<div >
<div class="col-xs-12 no-padding centered">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> 
        </h3>
        </div>
        <div id="myDiv">
        <table id="js_table_estlam" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
               <tr class="greentd">
                  <th>م</th>
                  <th>نوع المعامله</th>
                  <th> المهمه</th>
                  <th>التاريخ</th>
                  <th>الوقت</th>
                  <th>محوله من </th>
                  <th>التفاصيل</th>
                  <th> تاريخ الاستلام</th>
                  <th> وقت الاستلام</th>
                  <th> الاجراء</th>
                  <!-- <th>خيارات</th> -->
               </tr>
             </thead>
             </table>
             </div>
        </div>
        </div>
        </div>
        <script>
    function get_details_mostlma() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_mostlma",
            beforeSend: function () {
                $('#myDiv').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv').html(d);
            }
        });
    }
</script> 

<script>
  function end_mo3mla(id,type) {
  swal({
                  title: "  هل تريد انهاء المعامله؟",
                  showCancelButton: true,
                  confirmButtonText: "نعم",
                  cancelButtonText: "لا",
                  type: "warning",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/main/Main/end_mo3mla',
          data: {id: id,type:type},
          dataType: 'html',
          cache: false,
          success: function (html) {
              swal({
                  title: "تم انهاء بنجاح!",
  }
  );
  get_details_mostlma();
//  get_details_end();
          }
      });
  } else {
    swal("تم الالغاء",'', "error");
  }
});
}
</script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php
echo $estlam_js;
?>

<div class="modal fade" id="myModal_det_mostlam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <div id="details_"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_details_sader_mostalam(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_sader",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details_').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_').html(d);
            }
        });
    }
</script>
<script>
    function get_details_wared_mostalam(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_wared",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details_').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_').html(d);
            }
        });
    }
</script>