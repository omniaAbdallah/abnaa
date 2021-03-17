<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-3 padding-4">
                    <label class="label"> الشهر </label>
                    <?php if (isset($current_month) && (!empty($current_month))) {
                    } else {
                        $current_month = date('m');
                    }
                    if (isset($current_year) && (!empty($current_year))) {
                    } else {
                        $current_year = date('Y');
                    } ?>
                    <select class="form-control" name="month" id="month"
                            onchange="($('#month_n').val($('option:selected',this).text()))" ;>
                        <?php $month_array = array('1' => "يناير", "2" => "فبراير", 3 => "مارس", 4 => "إبريل", 5 => "مايو", 6 => "يونيو ", 7 => "يوليو ", 8 => "أغسطس", 9 => "سبتمبر", 10 => "أكتوبر", 11 => "نوفمبر", 12 => "ديسمبر");
                        foreach ($month_array as $value => $item) {
                            ?>
                            <option value="<?= $value ?>" <?php if ($current_month == $value) {
                                echo "selected";
                            } ?>><?= $item ?></option>
                            <?
                        }
                        ?>
                    </select>
                    <input type="hidden" name="month_n" id="month_n" value="<?= $month_array[$current_month] ?>">
                </div>
                <div class="col-md-2 padding-4">
                    <label class="label">من </label>
                    <input type="number" class="form-control " name="year" id="year" maxlength="4" minlength="4"
                           min="2000" max="2050" value="<?php echo $current_year; ?>">
                </div>

                <div class="col-md-2 padding-4">
                    <button type="button" onclick=" make_search();" style="    margin-top: 26px;"
                            class="btn btn-labeled btn-success  " id="reg" name="add" value="بحث">
                        <span class="btn-label"><i class="fa fa-search"></i></span>بحث
                    </button>


                </div>
            </div>


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
<script>

    /*equal $(document).ready(function () {

            });*/
    document.addEventListener('DOMContentLoaded', function () {
        make_search();
    });
</script>
<script type="text/javascript">
    function make_search() {
        var month_n = $('#month_n').val();
        var month = $('#month').val();
        var year = $('#year').val();


        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_ozonat/Ezn_order/all_statics_report_result',
            data: {month: month, month_n: month_n, year: year},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#main_panal').show();
                $('#my_search').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },

            success: function (html) {
                $('#main_panal').show();
                $("#my_search").html(html);
                $('#example').DataTable({
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
                            exportOptions: {
                                columns: ':visible'
                            },
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true
                });
            }
        });


    }
</script>
