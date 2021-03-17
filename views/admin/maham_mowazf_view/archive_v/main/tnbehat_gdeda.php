<?php
$this->load->view('admin/maham_mowazf_view/basic_data/nav_links');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?>
        </h3>
    </div>
    <div>
        <div id="myDiv_geha1111">
            <table id="js_table_customer"
                   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>نوع المعامله</th>
                    <th> المهمه</th>
                    <th>التاريخ</th>
                    <th>الوقت</th>
                    <th>محوله من</th>
                    <th>التفاصيل</th>
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
    function get_details_travel_type() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_travel_type",
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                //    get_details_mostlma();
                //update_seen_wared();
                $('#myDiv_geha1111').html(d);
            }
        });
    }
</script>
<script>
    function resive_mo3mla(id, type) {
        swal({
                title: "هل تريد استلام المعامله؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>all_secretary/archive/main/Main/update_mo3mla',
                        data: {id: id, type: type},
                        dataType: 'html',
                        cache: false,
                        success: function (html) {
                            swal({
                                    title: "تم الاستلام بنجاح!",
                                }
                            );
                            get_details_travel_type();
                            // get_details_mostlma();
                        }
                    });
                } else {
                    swal("تم الالغاء", " ", "error");
                }
            });
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php
echo $customer_js;
?>
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


<script>
    function get_details_sader(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_sader",
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
    function get_details_wared(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_wared",
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

<!--2-9-20-om-->
<script>
    $(document).ready(function () {
        function update_seen() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>all_secretary/archive/main/Main/update_seen',
                success: function (html) {
                }
            });
        }

        update_seen();
    });
</script>
 




