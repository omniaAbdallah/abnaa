<div class="panel-footer" id="myTabs">
    <!--                            <div class="m-t-20 border-all p-20">-->
    <div class="col-md-12 ">
        <div class="col-md-7"></div>
        <div class="col-md-5" >
            <?php if (($message->email_from_id == $_SESSION['emp_code'])||($message->email_from_id == $_SESSION['user_id'])) { ?>

                <a data-toggle="modal" data-target="#add_emp_Modal" class="btn btn-success "
                   onclick="get_emps(<?= $message->email_rkm ?>)">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    اضافة شخص </a>
            <?php  }?>
            <?php if (isset($message->need_replay) && !empty($message->need_replay) && $message->need_replay == 1) { ?>
                <a data-toggle="modal" data-target="#replay_Modal" class="btn btn-info ">
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                    تحميل مرفقات </a>
                <a class="btn btn-success "
                   href="<?= base_url() . "all_secretary/email/Emails/reply_message/" . $message->id ?>">
                    <i class="fa fa-share-square-o" aria-hidden="true"></i>
                    التحويل </a>
                <button type="button" class="btn btn-danger"
                        onclick='swal({
                                title: "هل انت متاكد من تحويل الرساله الي الارشيف ؟",
                                text: "",
                                type: "danger",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "تحويل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: false
                                },
                                function(){
                                archive_message(<?= $message->id ?>);
                                });'>
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    أرشفة
                </button>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="add_emp_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> أضافة شخص </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <input type="hidden" name="email_rkm_emp" id="email_rkm_emp">
                    <div class="col-md-12" id="emps_div">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"  onclick="add_emps_email()">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        اضافة
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        اغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/fileinput/js/fileinput.js"></script>

<script>
    function get_emps(email_rkm) {
        $('#email_rkm_emp').val(email_rkm);

        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>all_secretary/email/Emails/get_emps/" + email_rkm,
            beforeSend: function () {
                $('#emps_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#emps_div').html(d);
            }
        });
    }
</script>
<script>
    function add_emps_email() {
        var email_rkm = $('#email_rkm_emp').val();
        var members = [];
        var oTable = $('.add_emp').dataTable();
        var rowcollection = oTable.$(".checkbox:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            members.push($(elem).data('id'));
        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/email/Emails/add_emps_email",
            data: {emp_ids:members,email_rkm: email_rkm},
            beforeSend: function () {
                swal({
                    title: "جاري الإرسال ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false

                });
            },
            success: function (d) {
                swal({
                    title: 'تم اضافة  بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $("#add_emp_Modal .close").click();
                get_my_emails('page_content','message_details',<?= $message->id ?>)

            }
        });
    }

</script>
