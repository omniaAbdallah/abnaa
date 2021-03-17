<?php
$this->load->view('admin/maham_mowazf_view/basic_data/nav_links');
?>
    <div class="col-xs-12 no-padding centered">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?>
                </h3>
            </div>
            <div>
                <div id="myDiv_end_mo3mla">
                    <table id="js_table_end"
                           class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>نوع المعامله</th>
                            <th> المهمه</th>
                            <th>محوله من</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>التفاصيل</th>
                            <!-- <th>خيارات</th> -->
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function get_details_end() {
            // $('#pop_rkm').text(rkm);
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_end",
                beforeSend: function () {
                    $('#myDiv_end_mo3mla').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#myDiv_end_mo3mla').html(d);
                }
            });
        }
    </script>
    <div class="modal fade" id="myModal_det_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <div id="details_end"></div>
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
        function get_details_sader_end(row_id) {
            // $('#pop_rkm').text(rkm);
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_sader",
                data: {row_id: row_id},
                beforeSend: function () {
                    $('#details_end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#details_end').html(d);
                }
            });
        }
    </script>
    <script>
        function get_details_wared_end(row_id) {
            // $('#pop_rkm').text(rkm);
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_wared",
                data: {row_id: row_id},
                beforeSend: function () {
                    $('#details_end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#details_end').html(d);
                }
            });
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php
echo $end_js;
?>