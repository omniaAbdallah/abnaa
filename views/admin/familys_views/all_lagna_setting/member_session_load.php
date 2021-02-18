<div class="form-group col-sm-12 col-xs-12">
    <table class="table table-bordered table-striped">
        <thead>
        <tr class="redblacktd">
            <th>م</th>
            <th>إسم العضو</th>
            <th>المنصب الإداري</th>
            <th>الاجراء</th>
            <th>وقت الاجراء</th>
            <th>تاريخ الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /*
        echo '<pre>';
        print_r($member_session);*/
        if (isset($member_session) && !empty($member_session)) {
            $z = 1;
            foreach ($member_session as $member) {

                switch ($member->member_decision) {
                    case 1:
                        $member_decision = "معتمد";
                        $color = '#67c285';
                        break;
                    case 2:
                        $member_decision = "معتمدمع التحفظ";
                        $color = '#f1ca72';
                        break;
                    case 3:
                        $member_decision = "معتذر";
                        $color = '#e95467';
                        break;
                    default:
                        $member_decision = " لم يتخذ قرار ";
                        $color = '#55CCBE';
                        break;
                }
                ?>
                <tr>
                    <td><?php echo $z++; ?></td>
                    <td><?php echo $member->member_name; ?></td>
                    <td><?php echo $member->member_job; ?></td>
                    <td style="background-color: <?= $color ?>"><?= $member_decision ?> </td>
                    <td style="background-color: <?= $color ?>"><?= $member->member_decision_time ?> </td>
                    <td style="background-color: <?= $color ?>"><?= $member->member_decision_date ?> </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
