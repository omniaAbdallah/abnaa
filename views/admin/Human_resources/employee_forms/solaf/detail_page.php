<div class="col-xs-10 padding-4">
    <?php
    
    /*echo'<pre>';
    print_r($rows);*/
    
    if (isset($rows) && !empty($rows)) {
        $x = 1;
        foreach ($rows as $row) { ?>
            <table class="table " style="table-layout: fixed">
                <tbody>
                <tr>
                    <td style="width: 105px;">
                        <strong>رقم الطلب: </strong>
                    </td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td><?php echo $row->t_rkm; ?></td>
                    <td style="width: 135px;"><strong> تاريخ الطلب</strong></td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td><?php echo $row->t_rkm_date_m; ?></td>
                    <td style="width: 150px;"><strong>اسم الموظف</strong></td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td><?php echo $row->emp_name; ?></td>
                </tr>
                <tr>
                    <td><strong>الرقم الوظيفي </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->emp_code_fk; ?></td>
                    <td><strong>المسمى الوظيفي </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->mosma_wazefy_n; ?></td>
                    <td><strong>الأدارة </strong></td>
                    <td><strong>:</strong></td>
                    <td><?= $row->edara_n; ?></td>
                </tr>
                <tr>
                    <td><strong> القسم </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->qsm_n; ?></td>
                    <td><strong>قيمه السلفه </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->qemt_solaf; ?></td>
                    <td><strong> تاريخ بدايه الخصم</strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->khsm_form_date_m; ?></td>
                </tr>
                <tr>
                    <td><strong> طريقه سداد السلفه </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php if ($row->sadad_solfa == 1) {
                            echo 'دفع نقدا';
                        } elseif ($row->sadad_solfa == 2) {
                            echo ' تخصم مره واحده علي الراتب';
                        } elseif ($row->sadad_solfa == 3) {
                            echo 'تخصم شهريا علي الراتب';
                        }
                        ?>
                    </td>
                    <td><strong> تاريخ اخر سلفه</strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->previous_request_date_m; ?></td>
                    <td><strong>سبب السلفه</strong></td>
                    <td><strong>:</strong></td>
                    <td><?php echo $row->solaf_reason; ?></td>
                </tr>
                </tbody>
            </table>
        <?php }
    } ?>
</div>
<div class="col-xs-2 padding-4" width="100%">
    <?php
    /*echo '<pre>';
    print_r($personal_data);*/
    if (isset($personal_data) && !empty($personal_data)) { ?>
        <div class="col-md-2 no-padding" style="width:100%">
            <div class="user-profile">
        <span class="profile-picture">
            <!-- <img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar"
                 src="<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png"/> -->
            <!-- <input class="changeImg" type="file" accept="image/*" onchange="loadFile(event)"> -->
            <img id="empImg_1"
                 src="<?php echo base_url() ?>uploads/human_resources/emp_photo/thumbs/<?php echo $personal_data[0]->personal_photo ?>"
                 onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png';"
                 class="center-block img-responsive" style="width: 180px; height: 150px">
        </span>
                <div class="space-4"></div>
                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                <span class="white text-center"><?php if (isset($personal_data)) {
                                        echo $personal_data[0]->employee;
                                    } ?>     </span>
                        </a>
                        <!--
                            <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                                <li class="dropdown-header"> تغيير الحالة</li>
                                <li>
                                    <table class="table-bordered table table-details" style="table-layout: fixed;">
                                        <tbody>
                                        <tr>
                                            <td><strong class="text-danger "> إسم الموظف : </strong>
                                                <?php if (isset($personal_data)) {
                            echo $personal_data[0]->employee;
                        } ?>                        </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="text-danger ">الإدارة:</strong><?php if (isset($personal_data)) {
                            echo $personal_data[0]->admin_name;
                        } ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="text-danger ">القسم:</strong><?php if (isset($personal_data)) {
                            echo $personal_data[0]->depart_name;
                        } ?>                           </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="text-danger ">المسمى الوظيفى: </strong><?php if (isset($personal_data)) {
                            echo $personal_data[0]->degree_name;
                        } ?>                           </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="text-danger ">المدير المباشر: </strong><?php if (isset($personal_data)) {
                            echo $personal_data[0]->manger_name;
                        } ?>                       </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                            </ul> -->
                    </div>
                </div>
            </div>
        </div>  <?php } ?>
</div>
<div class="tab-content col-xs-12 col-sm-12 padding-4">
    <?php if (isset($quests) && $quests != null) {
        $x = 0;
        ?>
        <div class="col-xs-12">
            <table id="all_data" class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th class="text-center">رقم القسط</th>
                    <th class="text-center">تاريخ القسط</th>
                    <th class="text-center">قيمه القسط</th>
                    <th class="text-center">خلال شهر</th>
                    <th class="text-center">خلال عام</th>
                    <th class="text-center">الإجراء</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $total_solfa = 0;
                $total_paid = 0;
                foreach ($quests as $record) {
                    $total_solfa += $record['value_of_qst'];
                    if ($record['paid'] == 'yes') {
                        $total_paid += $record['value_of_qst'];
                    }
                    ?>
                    <tr>
                        <td><?php echo($x + 1); ?></td>
                        <td><?php echo $record['qst_date_ar']; ?> </td>
                        <td><?php echo $record['value_of_qst']; ?> </td>


                        <td><?php echo $record['month']; ?></td>
                        <td><?php echo $record['year']; ?></td>
                        <td>
                            <?php if ($record['paid'] == 'no') { ?>
                            
                            <?php if($_SESSION['role_id_fk']==1 ){ ?>
                               <a href="#" class="btn btn-primary"
                                   onclick="quest_paid(<?= $record['id'] ?>,<?= $record['t_rkm_fk'] ?>)">غير مسدد <i
                                            class="fa fa-edit"> </i>
                                </a> 
                          <?php   }else{ ?>
                            <span class="badge badge-danger"> لم يتم السداد
                                </span>
                         <?php  } ?>
                                
                                
                                
                            <?php } else { ?>
                                <button class="btn btn-success"> تم السداد
                                </button>
                            <?php } ?>
                            
                            
                        </td>
                    </tr>
                    <?php $x++;
                } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td style="text-align: center;font-size: 20px;">اجمالي السلفه</td>
                    <td style="background-color: #086bbf;color: white;text-align: center;font-size: 20px;"><?= $total_solfa ?></td>
                    <td style="text-align: center;font-size: 20px;"> المسدد</td>
                    <td style="background-color: #0aa942;color: white;text-align: center;font-size: 20px;"><?= $total_paid ?></td>
                    <td style="text-align: center;font-size: 20px;"> المتبقي</td>
                    <td style="background-color: #d44b4b;color: white;text-align: center;font-size: 20px;"><?= $total_solfa - $total_paid ?></td>
                </tr>

                <!--<tr>
                                    <td> التم السداد</td>
                                    <td  colspan="3" style="background-color: green;color:aliceblue"><?= $total_paid ?></td>
                                    </tr>
                                    <tr>
                                    <td> المتبقي</td>
                                    <td colspan="3" style="background-color: red;color:aliceblue"><?= $total_solfa - $total_paid ?></td>
                                    </tr>-->
                </tfoot>
            </table>
        </div>
    <?php } ?>
</div>
<script>
    $('#all_data').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        destroy: true
    });


</script>
<script>
    function quest_paid(id, t_rkm_fk) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/update_quest",
            data: {id: id},
            success: function (d) {
                //  $('#result').html(d);
                swal("تم دفع هذا القسط!", "", "success");
                get_solfa_details(t_rkm_fk);
            }
        });
    }
</script>
