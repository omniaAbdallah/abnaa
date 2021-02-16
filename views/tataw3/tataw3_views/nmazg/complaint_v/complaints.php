<style type="text/css">
.padd {padding: 0 15px !important;}
.no-padding {padding: 0;}
h4 {margin-top: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12">

<div class="col-sm-2 col-md-2 col-xs-2">
    <button type="submit"  class="btn btn-purple w-md m-b-5" onclick="window.location.href = '<?=base_url()?>tataw3/nmazg/complaints/Complaint/new_complaint';"><i class="fa fa-plus"></i>إضافة  شكوي / تظلم المتطوعين     </button>
  </div>
  <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <br>
    <div class="panel panel-default">
      <div class="panel-heading panel-title">
       بيانات شكوي والتظلم المتطوعين
      </div>
      <div class="panel-body">
        <?php 
        if(isset($volunteers) && $volunteers != null) { 

        ?>
          <table id="js_table_customer"  class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="info">
                <th>م</th>
                <th>رقم الشكوي</th>
                <th>الاسم</th>
                <th>نوع الشكوي</th>
                <th>رقم الجوال </th>
                <th>الفرصه التطوعية</th>
                <th> الحالة</th>
                <th> القائم بالاضافة</th>
                <th>الإجراء</th>
              </tr>
            </thead>
          
          </table>
          <?php 
        }
        else {
          echo '<div class="alert alert-danger">لا توجد بيانات</div>';
        }
        ?>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php

//echo $customer_js;

?>
<script type="text/javascript">
    $(document).ready(function() {

        load_page();
    });
</script>
<script>
    function load_page(){

        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>tataw3/nmazg/complaints/Complaint/data',



            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
              

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
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy:true


        });

    }
</script>
  <script>
    function print_card(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'tataw3/nmazg/complaints/Complaint/print_complaint'?>",
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

