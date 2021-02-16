<style>

    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    
    <style>
input,select {
    pointer-events:none;
    color:#AAA;
    background:#F5F5F5;
}
</style>
</style>


                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 btn btn-danger "> بيانات الحساب البنكي </div>
                        <br>

                        <?php
                        if (isset($records) && !empty($records)) {
                            ?>
                            <table id="example" class=" display table table-bordered   responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr class="visible-md visible-lg greentd">
                                    <th>م</th>
                                    <th>اسم المسئول الحساب البنكي</th>
                                    <th>رقم الهويه</th>
                                    <th> رقم الجوال</th>
                                    <th>اسم البنك</th>
                                    <th>رمز البنك</th>
                                    <th>رقم الحساب</th>
                                    <th>صورة الحساب</th>
                                   
<!--                                    <th>الاجراء</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                if (isset($records) && !empty($records)) {
                                    foreach ($records as $row) {
                                        ?>
                                        <?php if ($row->active == 0) {
                                            $stat = "btn-danger";
                                        } else {
                                            $stat = "btn-success";
                                        } ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $row->person; ?></td>
                                            <td><?php echo $row->person_national_card; ?></td>
                                            <td><?php echo $row->person_mob; ?></td>
                                            <td><?php echo $row->bank_name; ?></td>
                                            <td><?php echo $row->bank_code; ?></td>
                                            <td> <?php echo $row->bank_account_num; ?> </td>
                                            <?php if (!empty($row->bank_image)) {
                                                $img_url = "uploads/images/" . $row->bank_image;
                                            } else {
                                                $img_url = "asisst/web_asset/img/logo.png";
                                            } ?>
                                            <td><a data-toggle="modal" type="button" style="cursor: pointer"
                                                   data-target="#modal-img"
                                                   onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                           
                                          <!--  <td>

                                                <?php /* // if ($row->edit_status == 0) {
                                                if ($row->edit_status == 1 || $row->edit_status == 2) {
                                                    ?>
                                                    <button data-toggle="modal"
                                                            data-target="#modal-info<?= $row->id ?>"
                                                            class="btn btn-sm btn-info">تعديل
                                                    </button>
                                                    <button data-toggle="modal"
                                                            data-target="#modal-transfer<?= $row->id ?>"
                                                            class="btn btn-sm btn-success">تغير
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger btn-sm">لايمكن التعديل
                                                        علي رقم الحساب
                                                    </button>
                                                <?php } ?>
                                                <?php if ($row->delete_status == 0) { ?>

                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger btn-sm">لايمكن الحذف
                                                    </button>
                                                <?php } */ ?>

                                            </td>-->
                                        </tr>
                                        <?php
                                        $x++;
                                    }

                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>

<!---------------------------------------------------modal-img--------------------------------------------->
<div class="modal fade" id="modal-img" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <img id="my_image" src="" width="100%" height="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="float: left"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

