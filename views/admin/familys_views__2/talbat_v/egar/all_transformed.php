<style>
    td .fa-trash {
        background: none !important;
        padding: 0px !important;
    }
    td .fa-pencil {
        background: none !important;
        padding: 0px !important;
    }
    td .fa-eye {
        background: none !important;
        padding: 0px !important;
    }
    td .fa-print {
        background: none !important;
        padding: 0px !important;
    }
</style>
<div class="col-md-12 " style="">
    <?php if (!empty($records)) { ?>
        <table id="" class="example table table-bordered table-striped" role="table">
            <thead>
            <tr class="greentd">
                        <th width="2%">م</th>
                        <th class="text-center">رقم الطلب</th>
                        <th class="text-center"> تاريخ الطلب</th>
                        <th class="text-center">وقت الطلب</th>
                        
                        
                        <th class="text-center">رقم الملف</th>
                        <th class="text-center">إسم الأب </th>
                        
                        <th class="text-center">الطلب مقدم بإسم </th>
                        <th class="text-center">مستقبل الطلب  </th>
                <th class="text-center">الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            foreach ($records as $value) {
                ?>
                <tr>
                         <td><?= $x++ ?></td>
                            <td><?= $value->rkm_talab ?></td>
                            <td><?= $value->talab_date_ar ?></td>
                            <td style="background: #e691b8;color: #000000;font-weight: bold;"><?= $value->talab_time ?></td>
                            
                            <td style="background: #74b9b1;"><?= $value->file_num ?></td>
                            <td  style="background: #74b9b1;"><?= $value->osra_name ?></td>
                            
                            <td style="background: #74b9b1;">
             <?php echo $value->mokadem_name; ?>
                            </td>
                            
                            <td style="background: khaki;"><?=$value->emp_add_n?></td>
                    <td>
                        <a type="button"
                           class="btn btn-sm btn-info" data-toggle="modal"
                           data-target="#detailsModal" onclick="GetTransferPage(<?= $value->id ?>)"
                           style="padding: 3px 5px;line-height: 1;">
                            <i class="glyphicon glyphicon-list"></i>
                        </a>
                        
                        <a class="btn btn-warning btn-sm " target="_blank" href="<?php echo base_url() . 'family_controllers/talbat/Talb_egar/print/' . $value->id ?>"
                           title="طباعه"><i class="fa fa-print"></i></a>
                        
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div style="color: red; font-size: large;" class="col-sm-12">لم يتم إضافة أذونات !!</div>
    <?php } ?>
   
</div>
<!-- myModal_attache -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body col-sm-12" id="detail_div">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function GetTransferPage(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_egar/GetTransferPage',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }
</script>