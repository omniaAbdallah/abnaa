<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>
        <div class="panel-body">

            <form action="<?php echo base_url(); ?>md/all_glasat/All_glasat/a3da_glsa/<?php echo $last_galsa; ?>"
                  method="post" id="form1">

                <div class="col-sm-12">

                    <?php if (isset($members) && !empty($members)) {
                        if (isset($galsa_member) && !empty($galsa_member)) {
                            $title_collapse = "تعديل اختيارات الاعضاء الحاضرون بالحلسه";
                        } else {
                            $title_collapse = "اختيار الاعضاء الحاضرون بالجلسه";

                        }
                        ?>
                        <div class="container col-md-12">
                            <button type="button" class="btn btn-info" data-toggle="collapse"
                                    data-target="#demo"><?= $title_collapse ?></button>
                            <div id="demo" class="collapse">
                                <table class="table table-bordered  example ">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">إسم العضو</th>
                                        <th scope="col">المنصب الإداري</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //  $types = array( 1 => "رئيس مجلس الإدارة ", 2 => "نائب رئيس مجلس الإدارة ", 3 => "عضو");
                                    $types = array(1 => 'رئيس مجلس الإدارة', 2 => 'نائب رئيس مجلس الإدارة', 3 => 'أمين الصندوق', 4 => 'عضو مجلس إدارة');
                                    foreach ($members as $row) {


                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="member_id[]"
                                                       value="<?= $row->mem_id_fk ?>"
                                                    <?php
                                                    if (isset($galsa_member) && !empty($galsa_member) && in_array($row->mem_id_fk, $galsa_member)) {
                                                        echo 'checked';

                                                    }
                                                    ?>
                                                       class="Radiotype  member_id"/>
                                            </td>
                                            <td><?php echo $row->mem_name; ?></td>

                                            <td><?php echo $types[$row->mansp_fk]; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    <!--<button type="submit"
                                            class="btn btn-labeled btn-success " name="add" value="ADD" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>-->
                                    <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {

                                        $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة بالمجلس </span>';
                                        $disabled = 'disabled';
                                    } else {
                                        $span = '';
                                        $disabled = '';
                                    } ?>

                                    <button type="button" <?= $disabled ?>
                                            class="btn btn-labeled btn-success " onclick="save_galsa(<?=$last_galsa?>)" name="add"
                                            value="ADD"
                                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                    <input type="hidden" name="add" value="ADD"/>
                                    <?= $span ?>

                                </div>
                            </div>
                        </div>

                        <?php
                    } else {
                        ?>

                        <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء باللجنة</div>
                        <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<!------------------------------------------------------->
<script>
    function save_galsa(glsa_rkm) {
        var members = [];
        var oTable = $('.example').dataTable();
        var rowcollection = oTable.$(".member_id:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            members.push($(elem).val());
        });
        var members_num = document.getElementsByName('member_id[]').length;
        console.log('members_num : ' + members_num);
        if (members.length > 0) {
            <?php
            $url = base_url() . 'md/all_glasat/All_glasat/a3da_glsa/' . $last_galsa;
            ?>
            $.ajax({
                type: 'post',
                url: "<?=$url?>",
                data: {
                    member_id: members,
                    glsa_rkm: glsa_rkm,
                    add: 'add'
                },
                dataType: 'html',
                cache: false,
                beforeSend:function(){
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (d) {
                    swal({
                        title: "تم التعديل بنجاح!",
                    });
                }
            });
        } else {
            swal({
                title: "من فضلك اختر اعضاء للجلسة ",
                type: 'warning',
                confirmButtonText: "تم"
            });
        }

    }
</script>


<script>
    function check_all(elem, table_id) {
        var oTable = $('.' + table_id).dataTable();
        var rowcollection = oTable.$(".checkbox", {"page": "all"});
        rowcollection.each(function (index, obj) {
            obj.checked = elem.checked;
        });
    }
</script>
