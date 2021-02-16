<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>
        <div class="panel-body">
            <form type="post" action="" id="search_form">
                <div class="col-md-12">
                    <div class="form-group col-md-2 padding-4 col-sm-4" style="width: 13%;">
                        <label class="label "> رقم الملف </label>
                        <input type="number" name="file_num" id="file_num" readonly style="width:60%; float: right;"
                               data-validation="required" class=" no-padding form-control  form-control "
                               aria-required="true"/>
                        <div style="display: flex;">
                            <button type="button" data-toggle="modal" data-target="#exampleModal" style="width: 50%;"
                                    onclick="GetDiv_emps('myDiv_emp')" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-warning btn-sm " style="width: 50%;"
                                    onclick="$('#file_num').val(' ')">
                                <i class="fa  fa-minus"></i></button>
                        </div>
                    </div>
                    <?php $file_stause = $persons_status = array(1 => 'نشط كليا', 2 => 'نشط جزئيا', 3 => 'موقوف مؤقتا', 4 => 'موقوف نهائيا	'); ?>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label"> حالة الملف</label>
                        <select name="file_stause[]" id="file_stause" multiple title="يمكنك إختيار أكثر من طريقه"
                                data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true">
                            <option value="all"> إختر</option>
                            <!--<option value="all"> الكل</option>-->
                            <?php foreach ($file_stause as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label"> حالة المستفيد</label>
                        <select name="persons_status[]" id="persons_status" multiple title="يمكنك إختيار أكثر من طريقه"
                                data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true">
                            <option value="all"> إختر</option>
                            <!--<option value="all"> الكل</option>-->
                            <?php foreach ($persons_status as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-1 col-xs-12 padding-4 ">
                        <label class="label">فئة الأسرة </label>
                        <select name="family_cat[]" id="family_cat" multiple title="يمكنك إختيار أكثر من طريقه"
                                data-show-subtext="true"
                                class=" no-padding form-control   selectpicker " data-live-search="true"
                                data-actions-box="true">
                            <option value="all"> إختر</option>
                            <!-- <option value="all"> الكل</option>-->
                            <?php foreach ($category as $value) { ?>
                                <option value="<?= $value->id ?>"><?= $value->title ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-1 col-xs-12 padding-4 ">
                        <label class="label"> الجنس</label>
                        <select name="gender" id="gender" class="no-padding form-control ">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <option value="1"> ذكر</option>
                            <option value="2"> انثى</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 padding-4 col-sm-4" style="width: 12%;">
                        <label class="label "> العمر </label>
                        <input type="number" onchange="check_age()" name="age_from" id="age_from"
                               data-validation="required" placeholder="من"
                               class="form-control  form-control " style="width: 50%;float: right;"
                               aria-required="true"/>
                        <input type="number" onchange="check_age()" name="age_to" id="age_to"
                               data-validation="required"
                               placeholder="الى"
                               class="form-control  form-control " style="width: 50%;" aria-required="true"/>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label">الحالة الدراسية </label>
                        <select name="education_status[]" id="education_status" onchange="get_out_age(this)" multiple
                                title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true">
                            <option value="all"> إختر</option>
                            <!--                            <option value="all"> الكل</option>-->
                            <option value="0">( دون سن الدراسة )</option>
                            <option value="unlettered">( امى )</option>
                            <option value="graduate">( متخرج )</option>
                            <option value="read_write"> ( يقرأو يكتب )</option>
                            <?php foreach ($education_status as $value) { ?>
                                <option value="<?= $value->id_setting ?>"><?= $value->title_setting ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 padding-4  col-sm-4">
                        <label class="label   ">المرحلة </label>
                        <select name="stage_id_fk[]" id="stage_id_fk" onchange="get_stage_class(this);"
                                multiple title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true">
                            <option value="">إختر المرحلة</option>
                            <?php foreach ($all_stages as $stage) { ?>
                                <option value="<?php echo $stage->id ?>"><?php echo $stage->name ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 padding-4  col-sm-4">
                        <label class="label   ">الصف</label>
                        <select name="class_id_fk[]" id="class_id_fk"  multiple title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true" >
                            <?php if (isset($all_classroom) && !empty($all_classroom) && $all_classroom != null) { ?>
                                <option value="">إختر الصف</option>
                                <?php foreach ($all_classroom as $one_class) {
                                    ?>
                                    <option value="<?php echo $one_class->id ?>"><?php echo $one_class->name ?> </option>
                                <?php }
                            } else { ?>
                                <option>لا يوجد صفوف للمرحلة</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 text-center">
                        <label class="label"> </label>
                        <button type="button" class="btn btn-labeled btn-warning" id="save"
                                name="note_save" value="save" onclick="make_search()">
                            <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-12 no-padding " id="main_panal" style="display:none">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتائج البحث</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12" id="my_search">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="myDiv_emp"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function make_search() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/reports/Family_reports_drasa/report_mostafed_education_search',
            data: $('#search_form').serialize()
            ,
            dataType:
                'html',
            cache:
                false,
            beforeSend:
                function () {
                    $('#main_panal').show();
                    $('#my_search').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }
            ,
            success: function (html) {
                $('#main_panal').show();
                $("#my_search").html(html);
            }
        })
        ;
    }
</script>
<script>
    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الملف  </th>' +
            '<th style="width: 170px;" >اسم رب الاسرة    </th>' +
            '<th style="width: 170px;" >اسم الام </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/reports/Family_reports_drasa/getConnection_file_num/',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],
            buttons: [
                'pageLength',
                'copy',
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
            destroy: true,
            "order": [[1, 'asc']]
        });
    }

    function Get_file_num(obj) {
        var file_num = obj.dataset.file_num;
        document.getElementById('file_num').value = file_num;
        $("#exampleModal .close").click();
    }
</script>
<script>
    function check_age() {
        //  var age_from = $('#age_from').val();
        //   var age_to = $('#age_to').val();
        var age_from = parseInt($('#age_from').val());
        var age_to = parseInt($('#age_to').val());
        if ((age_to != "") && (age_from != '')) {
            if (age_from > age_to) {
                swal({
                    title: "التأكد من ادخال فترة العمر صحيح ",
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: "تم",
                }, function () {
                    $('#age_from').val(' ');
                    $('#age_to').val(' ');
                });
            }
        }
    }
</script>
<script>
    function get_out_age(elem) {
  /*      var value_id = [];
        $(elem).children(':selected').each(function (idx, opt) {
            value_id.push($(opt).val());
        });
        console.log('selected ::' + value_id);
        if ((value_id.includes(0)) || (value_id.includes("unlettered")) || (value_id.includes("read_write"))||(value_id.includes("graduate"))) {
            document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
            $('#stage_id_fk').selectpicker('refresh');
            $('#class_id_fk').selectpicker('refresh');
        } else {
            document.getElementById("stage_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").removeAttribute("disabled", "disabled");
            $('#stage_id_fk').selectpicker('refresh');
            $('#class_id_fk').selectpicker('refresh');
        }*/
    }
</script>
<script>
    function get_stage_class(elem) {
        var num = [];
        $(elem).children(':selected').each(function (idx, opt) {
            num.push($(opt).val());
        });
        if (num.length > 0) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/reports/Family_reports_drasa/get_stage_class',
                data: {main_stage:num},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#class_id_fk").html(html);
                    $('#class_id_fk').selectpicker('refresh');

                }
            });
        }
    }
</script>