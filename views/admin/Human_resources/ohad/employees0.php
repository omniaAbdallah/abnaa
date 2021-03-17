<!------ table -------->

<?php

if(isset($customer_js)&&!empty($customer_js))

{ ?> 

    

    <div class="col-xs-12 no-padding">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

            <div class="panel-heading">

                <h3 class="panel-title">بيانات الموظفين</h3>

            </div>

            <div class="panel-body">

                <div class="col-md-12 no-padding">



                <table id="js_table_customer" 

   

   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                        <thead>

                        <tr class="info">

                            <th class="text-center">م</th>

                            <th>كود الموظف</th>

                            <th class="text-center">إسم الموظف</th>

                            <th>رقم الجول</th>

                            <th>رقم الهوية</th>

                            <th>الجنسية</th>
                            <th>المسمي الوظيفي</th>
                            <th>الاداره</th>
                            <th>القسم</th>
                            <th>نوع العقد</th>
                            <th>تاريخ أنتهاء العقد</th>
                            <th>الحالة</th>

                            <th class="text-center">المده المتبقيه</th>

                        </tr>

                        </thead>

                            

                    </table>



                </div>

            </div>

        </div>

    </div>

<?php } ?>

<!----- end table ------>
<!--Nagwa 25-3 -->
<!-- empModal -->


<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">بيانات الموظف</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- empModal -->
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <img id="img_pop_view" src=""
                     onerror="this.src='<?php echo base_url('asisst/fav/apple-icon-120x120.png') ?>'"
                     width="100%">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function load_emp_data(emp_code) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/ohad/Ohad_work/load_emp_data",
            data: {emp_code:emp_code},
            beforeSend: function() {
                $('#result').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>
<!--Nagwa 25-3 -->
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php



   

echo $customer_js;

 

    

?>   
<script>

function print_employee_details(row_id) {

    var request = $.ajax({

        // print_resrv -- print_contract

        url: "<?=base_url() . 'human_resources/Human_resources/print_employee_details'?>",

        type: "POST",

        data: {row_id: row_id},

    });

    request.done(function (msg) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');

        WinPrint.document.write(msg);

        WinPrint.document.close();

        WinPrint.focus();

        /*  WinPrint.print();

        WinPrint.close();*/

    });

    request.fail(function (jqXHR, textStatus) {

        console.log("Request failed: " + textStatus);

    });

}





</script> 



<script>

function print_card(row_id) {

    var request = $.ajax({

        // print_resrv -- print_contract

        url: "<?=base_url() . 'human_resources/Human_resources/print_card'?>",

        type: "POST",

        data: {row_id: row_id},

    });

    request.done(function (msg) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');

        WinPrint.document.write(msg);

        WinPrint.document.close();

        WinPrint.focus();

        /*  WinPrint.print();

        WinPrint.close();*/

    });

    request.fail(function (jqXHR, textStatus) {

        console.log("Request failed: " + textStatus);

    });

}





</script> 