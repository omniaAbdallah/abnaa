<?php if ($row->no3_ezn == 1) {
    $ezn = "استئذان شخصي";
} else if ($row->no3_ezn == 2) {
    $ezn = "استئذان للعمل";
} else {
    $ezn = "غير محدد";
} ?>
<div class="col-md-12">
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="3" class="info">نوع الاستئذان:<?= $ezn ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>الموظف:-<?php echo $row->emp; ?></td>
                <td>الاداره :<?php echo $row->adminstration; ?></td>
                <td>القسم:<?php echo $row->departs; ?></td>
            </tr>
            <tr>
                <td>تاريخ الاذن:- <?php echo date("d-m-Y", $row->ezn_date); ?></td>
                <td>الفتره:- <?php echo $row->fatra_n; ?> </td>
                <td> وقت البدايه:- <?php echo $row->from_hour; ?></td>
            </tr>
            <td> وقت النهايه:- <?php echo $row->to_hour; ?> </td>
            <td> المده:-<?php echo $row->total_hours; ?></td>
            </tr>
            <tr>
                <td colspan="3">السبب:-<?php echo $row->reason; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <?php if ((isset($row->personal_emp_img)) && (!empty($row->personal_emp_img)) && (file_exists( 'uploads/human_resources/emp_photo/thumbs/' . $row->personal_emp_img))) { ?>
            <img id="empImg"
                 src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $row->personal_emp_img; ?>"
                 alt="">        <?php } else { ?>
            <img id="empImg" src="<?php echo base_url(); ?>asisst/admin_asset/img/user.png" alt="">
        <?php } ?>    </div>
</div>