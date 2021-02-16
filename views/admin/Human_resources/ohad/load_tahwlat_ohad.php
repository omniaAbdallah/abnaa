

<div class="col-md-12" >
        <?php
        if (isset($all_tahwlat_ohad) && !empty($all_tahwlat_ohad)) {

            ?>
            <table class="display table table-bordered responsive nowrap tb_table" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>تاريخ التحويل</th>
                    <th>الموظف المحول منه</th>
                    <th>الموظف المحول اليه</th>
                    <th>تصنيف الأصل</th>
                    <th>إسم الأصل</th>
                    <th>العدد</th>
                    <th>الحالة</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($all_tahwlat_ohad as $row) {
                    ?>
                    <tr>
                        <td><?= $row->tahwel_date ?></td>
                        <td><?= $row->from_emp_name ?></td>
                        <td><?= $row->to_emp_name ?></td>
                        <td><?= $ohad_devices[$row->main_device_code] ?></td>
                        <td><?= $array_sub_ohad_devices[$row->sub_device_code] ?></td>
                        <td><?= $row->device_num ?></td>
                        <td><?php
                            $house_device_status=array(1=>'جيد',2=>'متوسط',3=>'غير جيد',4=>'يحتاج');
                            echo $house_device_status[$row->device_status];
                            ?></td>


                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <?php
        } else {
            echo '<div class="alert alert-danger"> لا توجد عهد محوله</div>';
        }
        ?>



</div>


