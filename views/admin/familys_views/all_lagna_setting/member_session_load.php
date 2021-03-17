<style>
bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #9a9a9a !important;
}
</style>

<div class="form-group col-sm-12 col-xs-12">
    <table class="table table-bordered table-striped">
        <thead>
        <tr class="redblacktd">
            <th>م</th>
            <th>إسم العضو</th>
            <th>المنصب الإداري</th>
            <th>الدعوة</th>
            <th>وقت قبول-رفض الدعوة</th>
            <th>تاريخ قبول - رفض الدعوة</th>
            
            
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
                
                
                    switch ($member->replay_invitation) {
                            case 1:
                                $replay_invitation = "تأكيد الحضور";
                                $color_inv = '#9effbc';
                                break;
                            case 2:
                                $replay_invitation = "اعتذار عن الحضور";
                                $color_inv = '#9effbc';
                                break;
                            default:
                                $replay_invitation = " لم يتم الرد ";
                                $color_inv = '#9effbc';
                                break;
                        }
                ?>
                <tr>
                    <td><?php echo $z++; ?></td>
                    <td><?php echo $member->member_name; ?></td>
                    <td><?php echo $member->member_job; ?></td>
                    <td style="background-color: <?= $color_inv ?>"><?= $replay_invitation ?> </td>
                    <td style="background-color: <?= $color_inv ?>"><?= $member->replay_invitation_time ?> </td>
                    <td style="background-color: <?= $color_inv ?>"><?= $member->replay_invitation_date_s ?> </td>

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
