
<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
                <?php
                $data['last_galsa'] = $last_galsa;
                $this->load->view('admin/md/all_glasat/drop_down_menu', $data);
                ?>
            </div>
            <div class="panel-body">
                <?php if (!empty($last_galsa)) { ?>
                    <?php
                    echo form_open_multipart(base_url() . 'md/all_glasat/All_glasat/mehwr_glsa/' . $last_galsa, array('id' => 'myform'));
                    ?>
                    <div class="col-sm-12">
                        <div class="form-group col-md-1 col-sm-1  padding-4">
                            <label class="label">رقم المحور</label>
                            <input type="text" name="mehwar_rkm[]" readonly 
                                   class="form-control text-center" value="<?= $last_mehwer ?>">
                        </div>
                        <div class="form-group col-md-3 col-sm-1  padding-4">
                            <label class="label">عبارة عن</label>
                            <input type="text" name="mehwar_title[]" data-validation="required"
                                   class="form-control text-center">
                        </div>
                        <div class="form-group col-md-2 col-sm-1  padding-4">
                            <label class="label"> المرفق</label>
                            <input type="file" name="mehwar_morfaq[]" class="form-control ">
                        </div>
                        <div class="form-group col-md-2 col-sm-1  padding-4">
                            <label class="label"> مدة مناقشة المحور</label>
                            <input type="number"
                                   data-validation="required"
                                   name="mehwar_duration[]" class="form-control ">
                        </div>
                        <div class="form-group col-md-2 col-sm-1  padding-4">
                            <label class="label"> خاضع للتصويت</label>
                            <input type="checkbox" onclick="if (this.checked){ $('#get_option').show();}else { $('#get_option').hide();}"
                                   value="1" name="mehwar_vote[]" class="form-control ">
                        </div>
                        <div id="get_option" style="display: none">
                            <div class="form-group col-md-2 col-sm-2  padding-4">
                                <label class="label"> نوع التصويت</label>
                                <div class="form-group">
                                    <div class="radio-content">
                                        <input type="radio" id="esnad1" name="vote_type[]" checked class="f2a_types"
                                               value="1">
                                        <label for="esnad1" class="radio-label"> سري</label>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" id="esnad2" name="vote_type[]" class="f2a_types" value="2">
                                        <label for="esnad2" class="radio-label"> علني</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12  padding-4">
                            <input type="hidden" name="btn" value="btn">
                            <button type="submit" style=""
                                    class="btn-success btn-labeled btn" name="btn" value="1">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
              </div>
                    <?php echo form_close() ?>
                <?php } else {
                    echo '<div class="alert alert-danger"> لا توجد جلسات !!</div>';
                } ?>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> محاور الجلسه</h3>
        </div>
        <div class="panel-body">
            <div id="members_data"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        get_table_mehwer(<?=$last_galsa?>);
    });
</script>
<script>
    function add_row() {
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length + 1;
        var dataString = 'length=' + len;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/md/all_glasat/All_glasat/get_table',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#resultTable").append(html);
            }
        });
    }
</script>
<script>
    function check_button() {
        var x = document.getElementById('resultTable');
        if (x.rows.length > 0) {
            $('#myform').submit();
        } else {
            alert("من فضلك أضف محاور للجلسة !!");
        }
    }
</script>
<script>
    function get_table_mehwer(glsa_rkm) {
        // $("#table_mehwer").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat/All_glasat/get_table_mehwer',
            data: {glsa_rkm: glsa_rkm},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (html) {
                $("#members_data").html(html);
            }
        });
    }
</script>
<script>
    function get_option() {
        // $("#table_mehwer").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/md/all_glasat/All_glasat/get_option',
            dataType: 'html',
            cache: false
            , success: function (html) {
                $("#get_option").html(html);
            }
        });
    }
</script>