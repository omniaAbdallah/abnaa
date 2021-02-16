<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');
?>
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?= $title?></h4>
        </div>
        <div class="panel-body" >
            <div class="col-xs-12 no-padding" style="margin-bottom:15px;margin-top:15px; ">
                <button class="btn btn-labeled btn-warning adder" onclick="window.location='<?php echo site_url("human_resources/tataw3/nmazg/need_training/Need_training/add_need_training");?>'" style="margin-left: 25px;font-size: 16px;">
                    <span class="btn-label"><i class="fa fa-plus"> </i></span> طلب إحتياج تدريب للمتطوع </button>

            </div>
            <div class="col-xs-12 no-padding" >
                <table id="js_table"
                       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                    <thead>
                    <tr class="greentd">
                        <th>م </th>
                        <th> الفرصة التطوعية </th>
                        <th> اسم المتطوع </th>
                        <th> المشرف </th>
                        <th>   التأهيل المقترح </th>
                        <th>    القائم بالاضافة </th>
                        <th>اجراءات </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->
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
<!-- detailsModal -->
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function load_details(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/nmazg/need_training/Need_training/load_details",
            data: {row_id:row_id},
            beforeSend: function () {
                $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>
    <script>
        function print_card(row_id) {
            var request = $.ajax({
                // print_resrv -- print_contract
                url: "<?=base_url() . 'human_resources/tataw3/nmazg/need_training/Need_training/print_card'?>",
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
<?php
echo $need_training_js;
?>
<?php      $this->load->view('admin/requires/footer'); ?>