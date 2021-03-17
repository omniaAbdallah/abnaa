<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .top_radio {
        margin-bottom: 15px;
    }
    .top_radio input[type=radio] {
        height: 24px;
        width: 24px;
        line-height: 0px;
        vertical-align: middle;
        margin-right: -33px;
        top: -5px;
    }
    .top_radio .radio, .top_radio .radio {
        vertical-align: middle;
        font-size: 16px;
        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
        text-align: right;
    }
    .radio input[type="radio"] {
        opacity: 1;
    }
</style>
<style type="text/css">
    .btn-group.mega-btn .dropdown-menu {
        left: 50% !important;
        right: auto !important;
        text-align: center !important;
        transform: translate(-50%, 0) !important;
    }
    @media (max-width: 480px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 350px;
        }
    }
    @media (min-width: 480px) and (max-width: 767px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 470px;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 750px;
        }
    }
    @media (min-width: 992px) (max-width:
    1150px
    ) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 900px;
        }
    }
    @media (min-width: 1151px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 544px;
        }
    }
    .mega-col {
        width: 50%;
        float: right;
        list-style: none;
        text-align: right;
        padding-right: 5px;
    }
    .mega-col li {
    }
    li.mega-col-header {
        font-size: 18px;
        border-bottom: 3px double;
        margin-bottom: 8px;
        padding-left: 5px;
        padding-right: 0px;
    }
    .dropdown-menu li .mega-col:first-child {
        border-left: 2px dotted #eee;
        padding-left: 5px;
    }
    
    .progress-bar {
    box-shadow: none;
    font-size: 15px;
    font-weight: 600;
    line-height: 23px;
    }
</style>
<div class="panel ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php //echo $title?>  </h3>
<div class="panel panel-default">

  <div class="panel-body">
  <table class="table table-bordered">
 <tr>
      <th colspan="7" scope="col">

  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
  aria-valuemin="0" aria-valuemax="100" style="width:60%"> 
   تم إكتمال إجراءات التحديث بنسبة 60% (بنجاح)
  </div>
</th>

    </tr>
  <tbody>
<!--  <tr>
  <td colspan="5"></td>
  </tr>-->
    <tr>
    <td style="width: 10%;"> <a  target="_blank" class="btn btn-sm btn-success" style="margin: 2px;"  href="#"> بدء إجراءات التحديث </a></td>
    <td  style="width: 10%;"><a  target="_blank" class="btn btn-sm btn-success" style="margin: 2px;"  href="<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_c/add_crm_osr/<?php echo $mother_num; ?>">
                      التواصل مع الاسرة </a></td>
      <td style="width: 10%;"> <a target="_blank"  style="margin: 2px;" class="btn btn-sm btn-success"  href="#">حضور الأسرة </a>  </td>
      <td style="width: 10%;">     <div class="btn-group" style="    margin-top: 2px;">
                        <button type="button" class="btn btn-success">تسليم المعاملات</button>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                  <ul style="margin: 2px;" class="dropdown-menu" aria-labelledby="dropdownMenu3">
                    <li class="dropdown-header"> الخطابات</li>
                    <li><a target="_blank"
                           href="<?php echo base_url(); ?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                            الاحوال المدنيه </a></li>
                    <li><a target="_blank"
                           href="<?php echo base_url(); ?>family_controllers/Family_letter/Passports/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                            الجوازات </a></li>
                    <li><a target="_blank"
                           href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                            تأمينات ( الأب ) </a></li>
                    <li><a target="_blank"
                           href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                            تأمينات ( الأم ) </a></li>
                    <li><a target="_blank"
                           href="<?php echo base_url(); ?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                            التقاعد </a></li>
                    <li><a target="_blank"
                           href="<?php echo base_url(); ?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                            الضمان</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">المستندات</li>
                    <li><a target="_blank"
                           href="<?= base_url() ?>family_controllers/Family/talb_mostandat/<?= $mother_num ?>"> اضافه
                            المستندات
                        </a></li>
                    <li><a href="" onclick="print_prime_houe(<?= $mother_num ?>);">
                            طباعة كروكي المنزل
                        </a></li>
                        
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">إنهاء إستلام وتسلم المعاملات</li>
                    <li style="background: red;"><a target="_blank"
                           href="#"> إنهاء إستلام وتسلم المعاملات</a></li>     
                        
                </ul>
                    </div></td>
                 
                      <td style="width: 10%;">    
                        <div class="btn-group" style="    margin-top: 2px;">
                        <button type="button" class="btn btn-success">تعديل بيانات الملف</button>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
            
                    </div>
                    
                    </td>
                 
                       <td style="width: 10%;">    
                        <div class="btn-group" style="    margin-top: 2px;">
                        <button type="button" class="btn btn-success">مراجعة البيانات</button>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
            
                    </div>
                    
                    </td>
                 
                 
                    
                    <td style="width: 10%;">   
                      <a style="margin: 2px;" data-toggle="modal" data-target="#modal-process-procedure"  class="btn btn-sm btn-primary" 
                       onclick="GetTransferPage(<?php echo $mother_num; ?>)"> تحويل الي الباحث
                    </a></td>
                    
    </tr>

  </tbody>
</table>
  
  </div>
</div>

                
     <!--            
          
          <div class="btn-group">
            <button type="button" class="btn btn-danger"
                    style="padding: 0 4px;"> إجراءات تحديث الملف 
            </button>
            <button type="button"
                    class="btn btn-danger dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li ><a target="_blank" 
                       href="<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_c/add_crm_osr/<?php echo $mother_num; ?>">
                      التواصل مع الاسرة </a></li>
                       <li ><a target="_blank" 
                       href="#">
                     حضور الأسرة </a></li>
                <li><a target="_blank"
                       href="<?= base_url() ?>family_controllers/Family/talb_mostandat/<?= $mother_num ?>">
                       تسليم المعاملات
                    </a></li>
                <li><a data-toggle="modal" data-target="#modal-process-procedure"
                       onclick="GetTransferPage(<?php echo $mother_num; ?>)"> تحويل الي الباحث
                    </a></li>
                <li><a target="_blank"
                       href="<?= base_url(); ?>family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/<?= $mother_num ?>">
                        إنشاء
                        موعد زيارة
                    </a></li>
            </ul>
        </div>-->
    </div>
</div>

<script>
    function GetTransferPage(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/GetTransferPage_drob_dwon',
                data: {value: value},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#detail_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }
    function get_emp(id_depart) {
        //   alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/GetDepart_emps',
                data: {id_depart: id_depart},
                dataType: 'html',
                cache: false,
                success: function (resp) {
                    var obj = JSON.parse(resp);
                    var options = '<option value="">اختر</option>';
                    if (obj.mowazf == 0) {
                        $("#user_to-7").html(options);
                        // $("#user_to-7").selectpicker("refresh");
                    } else {
                        for (var i = 0; i < obj.mowazf.length; i++) {
                            var option = '<option value="' + obj.mowazf[i].person_id + '"> ' + obj.mowazf[i].person_name + '</option>';
                            options += option;
                        }
                        $("#user_to-7").html(options);
                        // $("#user_to-7").selectpicker("refresh");
                    }
                }
            });
        }
    }
</script>
<script>
    function GetFileConidtion(basic_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileConidtion',
            data: {basic_id: basic_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#FileConidtion").html(html);
            }
        });
    }
</script>
<script>
    function GetFileUpdate(basic_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileUpdate',
            data: {basic_id: basic_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#FileUpdate").html(html);
            }
        });
    }
</script>
<script>
    function GetFileTracking(basic_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileTracking',
            data: {basic_id: basic_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#FileTracking").html(html);
            }
        });
    }
</script>
<script>
    function change_file_status(process_id, title, mom) {
        var reason_ids = [];
        $(".check" + mom + ':radio:checked').each(function () {
            reason_ids.push($(this).val());
        })
        if (reason_ids.length == 0) {
            alert("من فضلك اختر السبب اولا");
            return;
        }
        var reason = $(".check" + mom + ':radio:checked').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/Family/change_file_status",
            data: {process_id: process_id, title: title, mom: mom, reason: reason},
            success: function (d) {
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>
<script>
    function put_researcher_id() {
        var dataString = $(".form_researcher_id").serialize();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() . 'family_controllers/Family/AddRelations_in/' . $basic_data_family['mother_national_num'] ?>',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                alert("تم ربط الاسرة ");
                location.reload();
            }
        });
        return false;
    }
</script>
<script>
    /* function print_prime_houe(mother_num) {
         var request = $.ajax({
      
             url: "<?=base_url() . '/family_controllers/Family/print_prime_houe'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
  
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }*/
</script>
<script>
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
</script>
