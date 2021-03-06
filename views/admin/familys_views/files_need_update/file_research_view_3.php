
<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');


?>
<style>
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .tab-content {
        margin-top: 15px;
    }


</style>
<style>
    @media (min-width: 992px) {
        .col-md-10 {
            float: right;
            width: 10%;
        }

        .col-md-15 {
            float: right;
            width: 15%;
        }

        .col-md-20 {
            float: right;
            width: 20%;
        }

        .col-md-25 {
            float: right;
            width: 25%;
        }

        .col-md-30 {
            float: right;
            width: 30%;
        }

        .col-md-35 {
            float: right;
            width: 35%;
        }

        .col-md-40 {
            float: right;
            width: 40%;
        }

        .col-md-45 {
            float: right;
            width: 45%;
        }

        .col-md-50 {
            float: right;
            width: 50%;
        }

        .col-md-55 {
            float: right;
            width: 55%;
        }
    }

    .label-green-h {
        font-weight: 600;
        color: #000;
        /* background-color: #428bca; */
        /* border: 2px solid #428bca; */
        margin: 0;
        padding: 8px 4px;
        font-size: 16px;
        height: 34px;

    }

    input[type=radio].pay_method {
        width: 20px;
        height: 20px;
    }

    .radio-inline span {
        position: relative;
        top: 4px;
        margin-right: 3px;
    }

    .bs-actionsbox .btn-group button {
        width: 50% !important;
        float: right !important;
        margin: 0 !important;
    }


    #circle_counter {
        float: right;
        width: 200px;
        /*  height: 50px;*/
        border: 2px solid;
        line-height: 24px;
        padding: 4px 8px;
        border-radius: 5px;
        background-color: #5b69bc;
        margin-right: 20px;
        color: white;
    }

    #circle_counter .counter {
        font-size: 20px;
        color: #f8ffbf;
        font-weight: bold;
        float: left;
    }

    td input[type=checkbox], td input[type=radio],
    th input[type=checkbox], th input[type=radio] {
        width: 18px;
        height: 18px;
    }

    .form-group {
        font-family: 'hl';
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #ccc;
    }

</style>


<div class="form-group  col-sm-2 col-xs-12 padding-4 ">

    <h5 class="label-green-h ">  من تاريخ</h5>

    <input type="date" id="date_from" class="form-control" value="<?= date('Y-m-d');?>">

</div>

<div class="form-group col-sm-2 col-xs-12 padding-4 ">

    <h5 class="label-green-h "> الي تاريخ</h5>

    <input type="date" id="date_to" class="form-control" value="<?= date('Y-m-d');?>" >

</div>

<div class="form-group col-sm-2 col-xs-12 padding-4 ">

    <h5 class="label-green-h ">  الفئة</h5>
    <select name="category" id="category" class="form-control "  >
        <option value="">اختر</option>
        <option value="0">الكل</option>
        <?php
        if (isset($category) && !empty($category)){
            foreach ($category as $cat){
            ?>
                <option value="<?= $cat->id?>"> <?= $cat->title?></option>
        <?php
        }}
        ?>

    </select>


</div>

<div class="form-group col-sm-2 col-xs-12 padding-4 " style="margin-top: 33px;">
    <button type="button" class="btn btn-success" onclick="filter_table()">فلترة</button>

</div>
<div class="clearfix"></div> <br>

<div id="body_table_filter">
    <table id="js_table_customer"

           class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
        <tr class="greentd">
            <th>م </th>
            <th >رقم الملف </th>
            <th >إسم رب الأسرة</th>
            <th>رقم الهوية</th>
            <th>إسم الام</th>
            <th >رقم الهوية</th>
             <th >رقم التواصل</th>
            <th >إجراءات</th>
            <th >حالة الملف</th>
            <th>الفئة</th>
            <th >تحديث الملف</th>
            <th > فتح الملف</th>


        </tr>
        </thead>
    </table>
</div>
<div class="modal fade" id="modal-files"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="load_div" class="modal-dialog modal-success" role="document" style="width: 80%">

    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    function filter_table() {
        var date_to = $('#date_to').val();
        var date_from = $('#date_from').val();
        var category =$('#category').val();
      //  alert(category);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/files_need_update/File_research/filter_table",
            data: {date_to: date_to, date_from: date_from,category:category},
            success: function (d) {
                console.log(d);

                $('#body_table_filter').html(d);

            }

        });
    }
</script>



<?php


echo $customer_js;
?>





<script>
    function get_load_page(mother_num) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/files_need_update/File_research/get_load_page",
            data: {mother_num: mother_num},
            beforeSend: function () {
                $('#load_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_div').html(d);

            }

        });


    }

    function check_all(id) {
        var inputs = document.querySelectorAll('.check_large' + id);
        var input = document.getElementById('check_all_not' + id).checked;
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;
        }
    }

    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            // $('button[type="submit"]').attr("disabled","disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            //$('button[type="submit"]').removeAttr("disabled");
        }
    }

    function print_prime_houe(mother_num) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . '/family_controllers/Family/print_prime_houe'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /* WinPrint.print();
        WinPrint.close();*/
            //    end code
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }




    function printRequiredFiles_new(mother_num) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . '/family_controllers/Family/printRequiredFiles_new'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /* WinPrint.print();
        WinPrint.close();*/
            //    end code
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>



<?php      $this->load->view('admin/requires/footer'); ?>









