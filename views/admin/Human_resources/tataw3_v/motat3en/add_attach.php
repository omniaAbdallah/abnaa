<style>
    .latest_notification .nav-tabs > li > a {
        margin-left: 10px;
    }

    .latest_notification .badge {
        position: absolute;
        top: 3px;
        left: -7px;
    }

    .latest_notification .btn-group > .btn {
        height: 22px;
        line-height: 10px;
    }

    .active .badge {
        color: #ffffff !important;
    }

    .panel-footer {
        display: inline-block;
        width: 100%;
    }

    .detailswork span.label {
        width: 100px;
    }

    .detailswork a {
        font-size: 16px;
    }

    .detailswork p {
        font-size: 16px;
    }

    .work-touchpoint-date .month {
        font-size: 10px;
        background-color: #fcb632;
    }

    .panel-body {
        border: 1px solid #eee;
    }
</style>

<div class="col-xs-12 no-padding">

    <?php
    $this->load->model("human_resources_model/tataw3/Tataw3_m");
    $data_load["id"] = $this->uri->segment(5);
    $data_load["tat_data"] = $this->Tataw3_m->getRecordById(array('id' => $this->uri->segment(5)));
    $data_load["files_status_color"] = $this->Tataw3_m->get_files_status_setting($data_load["tat_data"]["halt_motatw3"]);
    $this->load->view('admin/Human_resources/tataw3_v/motat3en/drop_down_button', $data_load);

    ?>

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 no-padding form-group">

                <div id="morfaq_input" >
                    <div class="col-sm-3  col-md-3 padding-2 ">
                        <?php $tat_id_fk = $id?$id:$this->uri->segment(5); ?>
                        <input type="hidden" class="form-control" id="tat_id_fk" value="<?=$tat_id_fk?>">

                        <label class="label   ">اسم المرفق </label>

                        <input type="text" class="form-control  testButton inputclass"
                               name="title_m" id="title_m"
                               readonly="readonly"
                               onclick="$('#settingModal').modal('show');"
                               style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                               value="">
                        <!-- <input type="hidden" name="title_m_id" id="title_m_id" value="">-->

                        <button type="button"
                                onclick="$('#settingModal').modal('show');"
                                class="btn btn-success btn-next">
                            <i class="fa fa-plus"></i></button>

                    </div>
                    <div class="col-sm-3  col-md-3 padding-2 ">
                        <label class="label   "> المرفق </label>
                        <input type="file" name="file_attached[]" id="file_attached"
                               data-validation="required"
                               value=""
                               class="form-control ">

                    </div>
                    <div class="col-sm-12  col-md-12  text-center" id="div_add_morfq"
                         style="display: block; ">
                        <button type="button" onclick="upload_img($('#tat_id_fk').val())"
                                style="    margin-top: 27px;"
                                class="btn btn-labeled btn-success" name="save" value="save">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>

                </div>

                <br>
                <div id="myDiv_morfq">


                </div>
            </div>

        </div>
    </div>
</div>
<!--    Modal_attach -->

<!-- settingModal  -->

<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">المرفقات</h4>
            </div>
            <div class="modal-body">

                <?php
                if (isset($morfaq_names) && !empty($morfaq_names)) {
                    ?>

                    <table id="" class="table example  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>اسم المرفق</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($morfaq_names as $item) {
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="check_m"
                                           id="check_id<?= $item->id ?>"
                                           ondblclick="GetName(<?= $item->id ?>,'<?= $item->title ?>')">
                                </td>
                                <td><?= $item->title ?></td>

                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>

                    </table>

                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger">عفوا... لا توجد بيانات !</div>
                    <?php
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<!-- modal view -->
<div class="modal fade" id="myModal-view" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img id="imagee" src=""
                     width="100%" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- modal view -->
<div class="modal fade" id="myModal-pdf" tabindex="-1"

     role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal"

                        aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">الملف</h4>

            </div>

            <div class="modal-body">

                <iframe id="m_pdf" src="" style="width: 100%; height:  640px;" frameborder="0"></iframe>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">

                    إغلاق

                </button>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function() {
        load_all_attach(<?php echo $tat_id_fk;?>);
    });
</script>
<script>
    function get_image(url) {
        var path = "<?= base_url() . 'uploads/human_resources/tato3/morfqat/'?>" + url;
        $('#imagee').attr('src', path);

    }
</script>
<script>
    function get_pdf(url) {
        var path = "<?= base_url() . 'human_resources/tataw3/Tataw3_c/read_morfq/'?>" + url;
        $('#m_pdf').attr('src', path);

    }
</script>

<script>
    function GetName(id, name) {
        $('#title_m').val(name);

        $('#settingModal').modal('hide');

    }
</script>

<script>
    function load_all_attach(tat_id_fk) {
        $('#tat_id_fk').val(tat_id_fk);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/tataw3/Tataw3_c/load',
            data: {id: tat_id_fk},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#myDiv_morfq').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {

                //    $('#attach_result').html(html);
                $('#myDiv_morfq').html(html);


            }
        });

    }
</script>
<script>

    function upload_img(tat_id_fk) {

        var files = $('#file_attached')[0].files;
        //  console.log(files);
        var title = $('#title_m').val();

        // alert(title);
        // var tat_id_fk = $('#row').val();
        var error = '';
        var form_data = new FormData();

        for (var count = 0; count < files.length; count++) {
            var name = files[count].name;

            var extension = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'PNG', 'jpeg', 'pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt']) == -1) {
                error += "Invalid " + count + " Image File"
            } else {
                form_data.append("files[]", files[count]);
                form_data.append("title", title);
                form_data.append("tat_id_fk", tat_id_fk);
            }
        }

        if (title != '' && files.length != 0) {
            if (error == '') {

                $.ajax({
                    url: "<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/upload_morfaq",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#myDiv_morfq').html(
                            '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                        );
                        swal({
                            title: "جاري الحفظ ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function (data) {


                        $('#title_m').val('');
                        $('#file_attached').val('');
                        $("input:radio").removeAttr("checked");
                        $('#myDiv_morfq').html(data);
                        //  swal("تم الاضافه بنجاح !");
                        swal({
                            title: 'تم اضافة  بنجاح',
                            type: 'success',
                            confirmButtonText: 'تم'
                        });

                    }
                });


            }
        } else {
            // alert('من فضلك تأكد الحقول الناقصه ! ');
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }


    }


</script>
