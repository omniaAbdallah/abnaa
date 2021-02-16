<?php $arr_select_lable = array(0 => 'مقدم الطلب ',    1 => 'الموظف ',    2 => ' مدير الشؤون المالية والادارية '); ?><?phpif (isset($records) && !empty($records)) {    /*echo '<pre>';    print_r($records);    echo "</pre>";*/    ?>    <table id="hr_entdab_table" class="table table-bordered table-striped table-hover">        <thead>        <tr class="info">            <th>م</th>            <th> رقم الطلب</th>            <th> الموظف</th>            <th>جهه الانتداب</th>            <th> عدد ايام الانتداب</th>            <?php if ($valu != 3) { ?>                <th>الطلب الان عند</th>            <?php } ?>            <th>الاجراء</th>        </tr>        </thead>        <tbody>        <?php if (isset($records) && !empty($records)) {            $y = 0;            foreach ($records as $row) {                $y++;                ?>                <tr id="row<?php echo $row->id; ?>" class="granteed">                    <td><?php echo $y; ?></td>                    <td><?php echo $row->rkm_talab; ?></td>                    <td><?php echo $row->name; ?></td>                    <td><?php echo $row->geha_mandate_name; ?></td>                    <td><?php echo $row->num_days; ?></td>                    <?php if ($valu != 3) { ?>                        <td>                            <?php                            if ($row->level == 1) {                                echo 'الموظف';                            } elseif ($row->level == 2) {                                echo 'مدير الشؤون المالية والادارية ';                            } elseif ($row->level == 0) {                                echo 'مقدم الطلب';                            }                            ?>                        </td>                    <?php } ?>                    <td>                        <a class="btn btn-primary btn-xs" onclick="load_mandate_details(<?php echo $row->id; ?>);"                           data-target="#detailsmandate" data-toggle="modal">                            <i class="fa fa-list"></i></a>                        <?php if ($valu == 3 && $row->level == 0 && $row->suspend != 4) { ?>                            <!--<button class="btn btn-primary btn-xs" data-target="" data-toggle="modal"                                    onclick="send_order_to_moder_final(<?php echo $row->id; ?>);"> تحويل مدير الشؤون المالية والادارية                             </button>-->                            <?php                        }                        if ($row->level != 0) { ?>                            <a class="btn btn-primary btn-xs"                               onclick="load_mandate_details_steps(<?php echo $row->id; ?>);"                               data-target="#detailsmandate_steps" data-toggle="modal">                                <i class="fa fa-list"></i> التحويلات السابقة </a>                        <?php } ?>                        <?php if ($row->suspend == 2) { ?>                            <button type="button" class="btn  btn-xs btn-danger ">                                تم رفض الطلب                            </button>                        <?php } ?>                        <?php                        if ($row->suspend == 4) {                            ?>                            <button type="button" class="btn btn-xs btn-success ">                                تم قبول الطلب                            </button>                        <?php } ?>                        <?php                        if ($row->suspend == 5) {                            ?>                            <button type="button" class="btn btn-xs btn-danger ">                                تم رفض الطلب                            </button>                        <?php } ?>                        <?php                        if ($valu == 2) {                            ?>                            <button type="button" class="btn btn-xs  btn-success"                                    onclick="mandate_follow(<?php echo $row->rkm_talab; ?>,<?php echo $row->id; ?>);"                                    data-target="#mandate_follow" data-toggle="modal">                                <span class="btn-label"></span>متابعه الطلب                            </button>                        <?php } ?>   <?php                        if ($valu == 3 && (in_array($row->suspend, array(1, 2)))) {                            ?>                            <button class="btn btn-success btn-xs" data-target="#detailsModal2" data-toggle="modal"                                    onclick="show_modal(<?php echo $row->level; ?>,<?php echo $row->id; ?>);"> الاجراء                            </button>                        <?php } ?>                    </td>                </tr>            <?php }        } ?>        </tbody>    </table><?php } else { ?>    <div class="alert alert-danger">عفوا !... لايوجد نتائج</div><?php } ?><!-- detailsModal --><div class="modal fade" id="detailsModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    <div class="modal-dialog" role="document" style="width: 80%;">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" onclick="$('#detailsModal2').modal('hide')" aria-label="Close">                    <span aria-hidden="true">&times;</span></button>                <h4 class="modal-title" id="detailsModal2_header" style="text-align: center;">                    <?php if (key_exists($row->level + 1, $arr_select_lable)) {                        echo $arr_select_lable[$row->level + 1];                    } else {                        echo "تحويل الطلب";                    } ?></h4>            </div>            <div class="modal-body" style="padding: 10px 0" id="result2">            </div>            <div class="modal-footer" style="display: inline-block;width: 100%;">                <button type="button" onclick="make_suspend();" class="btn btn-labeled btn-success " name="" value=""                        id=""                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ                </button>                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsModal2').modal('hide')">                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق                </button>            </div>        </div>    </div></div><!-- detailsModal    detailsmandate --><div class="modal fade" id="detailsmandate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    <div class="modal-dialog" role="document" style="width: 95%;">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" onclick="$('#detailsmandate').modal('hide')" aria-label="Close">                    <span aria-hidden="true">&times;</span></button>                <h4 class="modal-title" style="text-align: center;"></h4>            </div>            <div class="modal-body" style="padding: 10px 0" id="details">            </div>            <div class="modal-footer" style="display: inline-block;width: 100%;">                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsmandate').modal('hide')">                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق                </button>            </div>        </div>    </div></div><div class="modal fade" id="detailsmandate_steps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    <div class="modal-dialog" role="document" style="width: 95%;">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" onclick="$('#detailsmandate_steps').modal('hide')"                        aria-label="Close">                    <span aria-hidden="true">&times;</span></button>                <h4 class="modal-title" style="text-align: center;"></h4>            </div>            <div class="modal-body" style="padding: 10px 0" id="details_steps">            </div>            <div class="modal-footer" style="display: inline-block;width: 100%;">                <button type="button" class="btn btn-labeled btn-danger "                        onclick="$('#detailsmandate_steps').modal('hide')">                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق                </button>            </div>        </div>    </div></div><!-------------------------------------------end----------------><!----------------------------------------start mandate_follow--------------------------------------><div class="modal fade" id="mandate_follow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    <div class="modal-dialog" role="document" style="width: 95%;">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" onclick="$('#mandate_follow').modal('hide')" aria-label="Close">                    <span aria-hidden="true">&times;</span></button>                <h4 class="modal-title" style="text-align: center;"> متابعه الاذن</h4>            </div>            <div class="modal-body" style="padding: 10px 0" id="follow">            </div>            <div class="modal-footer" style="display: inline-block;width: 100%;">                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#mandate_follow').modal('hide')">                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق                </button>            </div>        </div>    </div></div><!----------------------------------------end_mandate_follow--------------------------------------><!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>--><script>    function send_order_to_moder_final(valu) {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_order/Mandate_transformation/changer_level",            data: {valu: valu},            success: function (d) {                //$('#load_form').html(d);                swal('بنجاح!', 'تم تحويل الطلب الي مدير الشؤون المالية والادارية ');                $('#row' + valu).remove();            }        });    }</script><script>    function show_modal(valu, val_id) {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_order/Mandate_transformation/get_modal",            data: {level: valu, val_id: val_id},            beforeSend: function () {                $('#result2').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#result2').html(d);            }        });    }</script><script>    function load_mandate_details(valu) {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_order/Mandate_transformation/get_modal_details",            data: {valu: valu},            beforeSend: function () {                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#details').html(d);            }        });    }</script><script>    function load_mandate_details_steps(valu) {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_order/Mandate_transformation/get_modal_details_steps",            data: {valu: valu},            beforeSend: function () {                $('#details_steps').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#details_steps').html(d);            }        });    }</script><script>    function mandate_follow(valu, id) {        // alert(valu);  get_mandate_follow        $.ajax({            type: 'post',            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_order/Mandate_transformation/get_mandate_follow",            data: {valu: valu, id: id},            beforeSend: function () {                $('#follow').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#follow').html(d);            }        });    }</script><script>    $('#hr_entdab_table').DataTable({        dom: 'Bfrtip',        buttons: [            'pageLength',            'copy',            'csv',            'excelHtml5',            {                extend: "pdfHtml5",                orientation: 'landscape'            },            {                extend: 'print',                exportOptions: {columns: ':visible'},                orientation: 'landscape'            },            'colvis'        ],        colReorder: true,        destroy: true    });</script>