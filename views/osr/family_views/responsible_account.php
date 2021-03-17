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
    input, select {
        pointer-events: none;
        color: #AAA;
        background: #F5F5F5;
    }
</style>
<!--<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>
        <div class="panel-body">
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
