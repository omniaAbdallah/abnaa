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

            <form action="<?php echo base_url(); ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/a3da_glsa/<?php echo $last_galsa;?>"
             method="post" id="form1">

                    <div class="col-sm-12">

                        <?php if (isset($members) && !empty($members)) {
                            if (isset($galsa_member) && !empty($galsa_member)) {
                                $title_collapse = "تعديل اختيارات الاعضاء  المرسل لهم الدعوات";
                            } else {
                                $title_collapse = "اختيار الاعضاء لإرسال الدعوات";
                            }
                            ?>
                            <div class="container col-md-12">
                                <button type="button" class="btn btn-info"><?= $title_collapse ?></button>
                                <div id="demo" >
                                    <table id=" " class="example display table table-bordered   responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th scope="col">#
                                                <input type="checkbox" onclick="check_all(this,'example')"/>
                                            </th>
                                            <th scope="col">رقم العضوية</th>
                                            <th scope="col">إسم العضو</th>
                                            <th scope="col">رقم هويته</th>
                                            <th scope="col">رقم جوال</th>
                                            <th scope="col">بداية الاشتراك</th>
                                            <th scope="col">نهاية الاشتراك</th>
                                            <th scope="col">حالة العضوية</th>
                                            <th scope="col">مدة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($members as $row) {
                                            if (isset($row->odwiat) && (!empty($row->odwiat))) {
                                                $rkm_odwia_full = $row->odwiat->rkm_odwia_full;
                                                $odwia_status_title = $row->odwiat->odwia_status_title;
                                                if (!empty($row->odwiat->subs_from_date_m)) {
                                                    $subs_from_date_m = explode('/', $row->odwiat->subs_from_date_m)[2] . '/' . explode('/', $row->odwiat->subs_from_date_m)[0] . '/' . explode('/', $row->odwiat->subs_from_date_m)[1];
                                                } else {
                                                    $subs_from_date_m = 'غير محدد';
                                                }
                                                if (!empty($row->odwiat->subs_to_date_m)) {
                                                    $subs_to_date_m = explode('/', $row->odwiat->subs_to_date_m)[2] . '/' . explode('/', $row->odwiat->subs_to_date_m)[0] . '/' . explode('/', $row->odwiat->subs_to_date_m)[1];
                                                } else {
                                                    $subs_to_date_m = 'غير محدد';
                                                }
                                                $bday = new DateTime(date('d-m-Y', $row->odwiat->from_date)); // Your date of birth
                                                if ($row->odwiat->to_date <= strtotime(date('d-m-Y'))) {
                                                    $today = new Datetime(date('d-m-Y', $row->odwiat->to_date));
                                                } else {
                                                    $today = new Datetime(date('d-m-Y'));
                                                }
                                                $diff = $today->diff($bday);
                                                $diff = $diff->y . " سنة  " . $diff->m . " شهر " . $diff->d . " يوم ";
                                            } else {
                                                $rkm_odwia_full = 'غير محدد';
                                                $odwia_status_title = 'غير محدد';
                                                $subs_from_date_m = 'غير محدد';
                                                $subs_to_date_m = 'غير محدد';
                                                $diff = 'غير محدد';
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="member_id[]" value="<?= $row->id ?>"
                                                        <?php
                                                        if (isset($galsa_member) && !empty($galsa_member) && in_array($row->id, $galsa_member)) {
                                                            echo 'checked';
                                                        }
                                                        ?>
                                                           class="checkbox  member_id"/>
                                                </td>
                                                <td><?php echo $rkm_odwia_full; ?></td>
                                                <td><?php echo $row->laqb_title . '/' . $row->name; ?></td>
                                                <td><?php echo $row->card_num; ?></td>
                                                <td><?php echo $row->jwal; ?></td>
                                                <td><?php echo $subs_from_date_m; ?></td>
                                                <td><?php echo $subs_to_date_m; ?></td>
                                                <td><?php echo $odwia_status_title; ?></td>
                                                <td><?php echo $diff; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-12 text-center">

                                        <button type="button" value="ADD" class="btn btn-labeled btn-success "
                                                onclick="save_member_galsa(<?=$last_galsa?>);" name="add"
                                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>
                                        <input type="hidden" name="add" value="ADD"/>

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
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<!------------------------------------------------------->
<script>
    function save_member_galsa(glsa_rkm) {
        var members = [];
        var oTable = $('.example').dataTable();
        var rowcollection = oTable.$(".member_id:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            members.push($(elem).val());
        });
        //alert(members);
        //return ;
        var members_num = document.getElementsByName('member_id[]').length;
        console.log( 'members_num : ' + members_num);
        if (members.length > 0) {
            <?php
            $url = base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/a3da_glsa/'.$last_galsa;
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
                success: function (d) {
                    swal({
                        title: "تم التعديل بنجاح!",
                    });
                    //window.location.href = "<?php //echo base_url();?>//md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/a3da_glsa/<?//=$last_galsa?>//";
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
    function check_all(elem,table_id) {
        var oTable = $('.'+table_id).dataTable();
        var rowcollection = oTable.$(".checkbox", {"page": "all"});
        rowcollection.each(function (index, obj) {
            obj.checked = elem.checked;
        });
    }
</script>
