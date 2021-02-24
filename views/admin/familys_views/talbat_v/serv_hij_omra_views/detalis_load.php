<style>
td .fa-eye {
    padding: 2px 6px !important;
    /* font-size: 12px; */
    line-height: 1.5;
    background-color: #00af0d;
    /* color: #fff; */
    /* border-radius: 2px; */
    border-radius: 11px;
}
</style>
<?php
   $fe2a_talab_title = array(1 => 'حج', 2 => 'عمرة');
   $first_hij_omra_title = array(1 => 'نعم', 2 => 'لا');
?>
<table class="table table-bordered">
    <tbody>
    <tr>
        <td class="info">رقم الطلب</td>
        <td><?= $result['rkm_talab'] ?></td>
        <td class="info">تاريخ الطلب</td>
        <td><?= $result['talab_date_ar'] ?></td>
        <th class="info"> فئة الخدمة</th>
        <td><?php echo $result['f2a_service_name'] ?></td>
        <th class="info"> نوع الخدمة</th>
        <td><?php echo $result['type_sevice_name'] ?></td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <td class="info">رقم الملف</td>
        <td><?= $result['file_num'] ?></td>
        <th class="info">إسم الأسرة</th>
        <td ><?php echo $result['osra_name'] ?></td>
        <td class="info">مقدم الطلب</td>
        <td ><?= $result['mokadem_name'] ?></td>
    </tr>
    </thead>
</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info">فئة الطلب</th>
        <td>
        <?php foreach ($fe2a_talab_title as $key => $item) { ?>
                           <?php if ($result['fe2a_talab'] == $key) {
                                echo $item;
                            } ?>
                            <?php
                        } ?>
        
        </td>
        <th class="info">إسم المحرم</th>
        <td><?php echo $result['mhrem_name'] ?></td>
        <th class="info"> صلة المحرم</th>
        <td><?php echo $result['mhrem_national_num'] ?></td>
        <th class="info"> تاريخ الميلاد</th>
        <td><?php echo $result['mhrem_birth_date'] ?> </td>
    </tr>
    </thead>
</table>


<?php if (!empty($mother_id)&&!empty($member_id)&&isset($member_data) && $member_data != null) { ?>
                    <table class="  table table-bordered " style="width:100%">
                        <thead>
                        <tr>
                            <th>
                             #
                            </th>
                            <th>الإسم</th>
                            <th>رقم الهوية</th>
                            <th>الصلة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?php if (!empty($mother_id)&&$mother_id == $family_data->id) {
                                        echo $family_data->id ;
                                    } ?>
                                  
                            </td>
                            <td><?php 
                          if (!empty($mother_id)&&$mother_id == $family_data->id) {
                            
                            echo $family_data->mother_name; }?></td>
                            <td><?php 
                                if (!empty($mother_id)&&$mother_id == $family_data->id) {
                            echo $family_data->mother_national_num_fk; }?></td>
                            <td><?php 
                                if (!empty($mother_id)&&$mother_id == $family_data->id) {
                            echo "أم"; }?></td>
                        </tr>
                        <?php
                        $x = 2;
                        foreach ($member_data as $row) { ?>
                            <tr>
                                <td>
                                     <?php if (!empty($member_id)&&in_array($row->id, $member_id)) {
                                            echo $row->id ;
                                        } ?>
                                </td>
                                <td><?php
                                 if (!empty($member_id)&&in_array($row->id, $member_id)) {
                                echo $row->member_full_name; }?></td>
                                <td><?php 
                                 if (!empty($member_id)&&in_array($row->id, $member_id)) {
                                echo $row->member_card_num; }?></td>
                                <td><?php 
                                 if (!empty($member_id)&&in_array($row->id, $member_id)) {
                                echo $row->relation_name;} ?></td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } ?>