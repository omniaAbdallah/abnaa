<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">

            <div class="col-md-12">
                <table class="table table-bordered table-responsive table-hover example">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th>كود الموظف</th>

                        <th class="text-center">إسم الموظف</th>

                        <th>رقم الجول</th>

                        <th>رقم الهوية</th>

                        <th>الجنسية</th>

                        <th>البريد</th>
                        <th>الحالة</th>

                        <th>المسمي الوظيفي</th>
                        <th> تاريخ بداية العمل</th>
                        <th>عدد سنوات العمل</th>
                        <th>صافي المرتب</th>
                        <th> الاستحقاقات</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($emp_data) && (!empty($emp_data))) {
                        $x = 0;
                        $emp_type = array('لم تحدد', 'نشط', 'موقوف');

                        foreach ($emp_data as $emp) {


                            if ($emp->employee_type == 1) {
                                $ok_non_ok = ' <i class="fa fa-thumbs-up" aria-hidden="true"></i> ';
                                $class = "success";

                            } elseif ($emp->employee_type == 2) {
                                $ok_non_ok = ' <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> ';
                                $class = "danger";

                            } else {
                                $ok_non_ok = '';
                                $class = "warning";

                            }

                           /* $member_birth_date_hijri = explode('/', $emp->start_work_date_h)[2] . '/' . explode('/', $emp->start_work_date_h)[1] . '/' . explode('/', $emp->start_work_date_h)[0];
                            $date1 = new DateTime($member_birth_date_hijri);
                            $date2 = new DateTime($now_date_hijri);

                            echo " date 1::" . $date1->format('Y-m-d') . "<br> date 2 ::" . $date2->format('Y-m-d') . "<br>";
                            $interval = $date1->diff($date2);
                            */
                            try {


                                if (!empty($emp->start_work_date_h)) {
                                    $date1 = new DateTime($emp->start_work_date_h);
/*                                    $date2 = new DateTime(date('Y-m-d'));*/
                                    $date2 = new DateTime($now_date_hijri);
                                    $interval = $date1->diff($date2);
                                    $num_year = $interval->y;

                                } else {
                                    $num_year = 0;
                                }
                            }catch (Exception $e){
                                if (!empty($emp->start_work_date_h)) {
                                    $member_date = explode('/', $emp->start_work_date_h)[2] . '/' . explode('/', $emp->start_work_date_h)[1] . '/' . explode('/', $emp->start_work_date_h)[0];
                                    $date1 = new DateTime($member_date);
                                    $date2 = new DateTime($now_date_hijri);
                                    $interval = $date1->diff($date2);
                                    $num_year = $interval->y;

                                } else {
                                    $num_year = 0;
                                }
                                /*echo ('error: '.$e->getMessage());
                                echo ('<br>getPrevious: '.$e->getPrevious());
                                echo ('<br>getCode: '.$e->getCode());
                                echo ('<br>class: ');
                                echo get_class($e);*/

                            }
//                            $num_year=0;

                                $rateb = $emp->get_having_value-$emp->get_discut_value;

                            ?>
                            <tr>
                                <td><?= ++$x ?></td>
                                <td><?= $emp->emp_code ?></td>
                                <td><?= $emp->employee ?></td>
                                <td><?= $emp->phone ?></td>
                                <td><?= $emp->card_num ?></td>
                                <td><?= $emp->nationality ?></td>
                                <td><?= $emp->email ?></td>
                                <td><span class="badge badge-<?= $class ?> m-r-15" style="font-size: 13px; width: 60px;"><?= $ok_non_ok . $emp_type[$emp->employee_type] ?> </span></td>
                                <td><?= $emp->mosma_wazefy_n ?></td>
                                <td><?= $emp->start_work_date_h ?></td>
                                <td><?=$num_year ?></td>
                                <td><?= $rateb ?></td>
                                <td><?= $emp->get_having_value ?></td>

                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
