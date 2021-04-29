<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> <?=$title?></h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center">أسم  المهمة</th>
                        <th class="text-center">تاريخ الانشاء</th>
                        <th class="text-center"> تفاصيل المهمه</th>
                        <th class="text-center">  اسناد من</th> 
                       <th class="text-center">  اسناد الي</th> 
                       <th class="text-center">  الوقت المقدر</th> 
                       <th class="text-center"> حالة المهمة </th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                       
                            $link_update = 'window.location="' . base_url() . 'human_resources/mohma/Mohma_c/update/' . $value->id. '";';
                            $add_attaches = 'window.location="' . base_url() . 'human_resources/mohma/Mohma_c/add_attaches/' . $value->id. '";';
                            $add_comment = 'window.location="' . base_url() . 'human_resources/mohma/Mohma_c/add_comment/' . $value->id. '";';
                            $link_delete ='window.location="' . base_url() . 'human_resources/mohma/Mohma_c/Delete_namozeg/' . $value->id. '";';
                            if($value->suspend ==4){
                                $visit_ended = 'المهمة إنتهت';
                                $visit_ended_color = '#ff8f8f'; 
                             }elseif($value->suspend!=4){
                                  $visit_ended = 'المهمة جارية'; 
                                  $visit_ended_color = '#ffc049'; 
                             }
                        ?>
                        <tr>
                        <td><?= $x++ ?></td>
                            <td>
                            <?php
         echo   $value->mohma_name;
                    ?>
                            </td>
                            <td style="color: #c30000;font-weight: bold;"><?= $value->mohma_date ?></td>
                            <td style="background: #dcaff9;"><?= $value->mohma_details ?></td>
                            <td style="color: green;"><?= $value->publisher_name ?></td> 
                         <td style="color: blue;"><?= $value->emp_n ?></td> 
                         <td style="color: green;font-weight: bold;"><?= $value->num_days ?> يوم</td> 
                          
                            <td
                         style="background:<?=$visit_ended_color?>;">
                         <?=$visit_ended?>
                         </td>
                         <td> 
 

                            <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
<li> <a data-toggle="modal" data-target="#myModal_details"
                                   onclick="get_all_data( <?= $value->id; ?>)">
                                    <i class="fa fa-search"> </i>تفاصيل </a>
                               </li>
                    <li><a  onclick='<?php echo $add_attaches?>'><i class="fa fa-commenting-o" aria-hidden="true"></i>إضافة  مرفقات</a></li>
                    <li><a onclick='<?= $add_comment?>'><i class="fa fa-comments-o" aria-hidden="true"></i> اضافة رد  </a></li>            
                    <li>  <a onclick='<?=$link_update?>'>
<i class="fa fa-pencil"></i>تعديل</a>
</li>
<li>
<a onclick='<?=$link_delete?>'>
                                    <i class="fa fa-trash"> </i> حذف </a></li>
     

                                    </td>
                                
                  </ul>
                </div>   
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="myModal_details" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل</h4>
            </div>
            <div class="modal-body">
                <div id="result"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function get_all_data(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/get_all_data",
            data: {id: id},
            beforeSend: function () {
                $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (msg) {
                $('#result').html(msg);
            }
        });
    }
</script>