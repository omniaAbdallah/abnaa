<style>
    .radio label::before {
        content: none;
        display: inline-block;
        position: absolute;
        width: 20px;
        height: 20px;
        right: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 50%;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out;
        transition: border 0.15s ease-in-out;
    }

    .radio input[type="radio"] {
        opacity: 1;
    }

</style>


<style type="text/css">
    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }

    .piece-box {
        /*margin-bottom: 12px;*/
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {

        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0;
        font-size: 17px;
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @media print {
        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000 !important;
        }

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered.bor {
        border: 5px double #000;
    }

    .table-bordered.bor > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered.bor > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered.bor > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 2px solid #000;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }

    .bond-header {
        height: 100px;
        margin-bottom: 30px;
    }

    .bond-header .right-img img,
    .bond-header .left-img img {
        width: 100%;
        height: 100px;
    }

    .main-bond-title {
        display: table;
        height: 100px;
        text-align: center;
        width: 100%;
    }

    .main-bond-title h3 {
        display: table-cell;
        vertical-align: bottom;
        color: #d89529;
    }

    .main-bond-title h3 span {
        border-bottom: 2px solid #006a3a;
    }

    .green-border span {
        border: 3px solid #6abb46;
        padding: 10px;
        border-radius: 10px;
    }

    .btn-success {
        background-color: #3c990b !important;
        border-color: #12891b !important;
    }

    .btn-purple {
        background-color: #5b69bc !important;
        border-color: #4c59a7 !important;
    }
</style>

<?php
/*
echo'<pre>';
print_r($eznInfo);*/
?>

<div class="col-md-12 no-padding">


<div class="col-md-8 no-padding">
 <div class="panel panel-default">
    <div class="panel-heading">تفاصيل إذن الصرف</div>
    <div class="panel-body">
    
    <table class="table table-bordered">

  <tbody> 
    <tr>
      <td class="back">رقم الإذن</td>
      <td><?=$eznInfo['ezn_rkm']?></td>
      <td class="back">تاريخ الإذن</td>
      <td><?=$eznInfo['ezn_date_ar']?></td>
    </tr>
    
        <tr>
      <td class="back">مقدم الإذن</td>
      <td><?=$eznInfo['emp_name']?></td>
      <td class="back">الإدارة- القسم</td>
      <td><?=$eznInfo['edara_n']?></td>
    </tr>
    
    <tr>
   
      <td class="back">المبلغ</td>
      <td><?=$eznInfo['value']?></td>
      <td class="back">الجوال</td>
      <td><?=$eznInfo['geha_mob']?></td>
    </tr>

<tr>
<td class="back"> الجهة/المستفيد</td>
<td colspan="3"><?=$eznInfo['geha_name']?></td>
</tr>

<tr>
<td class="back">عبارة عن</td>
<td colspan="3"><?=$eznInfo['about']?></td>
</tr>

  </tbody>
</table>
    </div>
  </div>  




<?php
/*
echo'<pre>';
print_r($one_data);*/
if (isset($one_data) && !empty($one_data)) {
    $x = 1;
    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
    $folder = 'uploads/files/sarf_attaches';
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
      <th colspan="5" style="background: #2ba7b3; color: white;" colspan="4">المرفقات</th>
    </tr>
        <tr class="">
            <th>م</th>
            <th>نوع الملف</th>
            <th>اسم الملف</th>
            <th> الملف</th>
            <th>الحجم</th>
          
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($one_data as $morfaq) {
            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
            $Destination = $folder . '/' . $morfaq->file;
            if (file_exists($Destination)) {
                $bytes = filesize($Destination);
            } else {
                $bytes = '';
            }
            $size = '';
            if ($bytes >= 1073741824) {
                $size = number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                $size = number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                $size = number_format($bytes / 1024, 2) . ' KB';
            } elseif ($bytes > 1) {
                $size = $bytes . ' bytes';
            } elseif ($bytes == 1) {
                $size = $bytes . ' byte';
            } else {
                $size = '0 bytes';
            }
            ?>
            <tr>
                <td><?= $x++ ?></td>
                <td>
                    <?php
                    if (in_array($ext, $image)) {
                        ?>
                        <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                    <?php } elseif (in_array($ext, $file)) { ?>
                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                    <?php }
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($morfaq->title)) {
                        echo $morfaq->title;
                    } else {
                        echo 'لا يوجد ';
                    }
                    ?>
                </td>
                <td>
                    <!--  -->
                    <?php
                    if (in_array($ext, $image)) {
                        ?>
                        <?php if (!empty($morfaq->file)) {
                            $url = base_url() . $folder . '/' . $morfaq->file;
                        } else {
                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                        } ?>
                        <a target="_blank"  class="btn btn-sm btn-success" onclick="show_img('<?= $url ?>')">
                            <i class=" fa fa-eye"></i>
                        </a>
          <!-- <button class="btn btn-sm btn-success"  onclick="show_img('<?= $url ?>')" type="button">
        الاطلاع</button>-->
                        <?php
                    } elseif (in_array($ext, $file)) {
                        ?>

                        <?php if (!empty($morfaq->file)) {
                            $url = base_url() . 'finance_accounting/box/ezn_sarf/Ezn_sarf/read_file/' . $morfaq->file;
                        } else {
                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                        } ?>
                        <a target="_blank"  class="btn btn-sm btn-success" onclick="show_bdf('<?= $url ?>')">
                            <i class=" fa fa-eye"></i>
                        </a>
                        <!--<button class="btn btn-sm btn-success"  onclick="show_bdf('<?= $url ?>')" type="button">
        الاطلاع</button>-->
                        <?php
                    } else {
                        echo 'لا يوجد';
                    }
                    ?>
                    <!--  -->
                </td>
                <td>
                    <?= $size ?>
                </td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}
?>



    <table class="table table-bordered">
  <thead>
     <tr>
      <th colspan="7" style="background: #ffa6aa;" colspan="5">العمليات التي  تمت علي الإذن</th>
    </tr>
    <tr>
       <th scope="col">م</th>
      <th scope="col">من  </th>
        <th scope="col">التوجيه</th>
         <th scope="col">الي  </th>
      <th scope="col">بتاريخ</th>
      <th scope="col">التوقيت</th>
       <th scope="col">العملية</th>
     
     
      
    </tr>
  </thead>

  <tbody> 
      

    
  <?php 
  if(isset($ezn_history) and $ezn_history!=null){
    $count = 1;
    ?>
    <?php if($eznInfo['current_to_id'] != null) { ?>
     <tr>
        <td style="background: khaki;">1</td>
        <td style="background: khaki;"><?=$eznInfo['emp_name']?></td>
         <td style="background: khaki;">تم رفع المستندات</td>
        <td style="background: khaki;">-----</td>
        <td style="background: khaki;"><?=$eznInfo['ezn_date_ar']?></td>
        <td style="background: khaki;"><?=$eznInfo['ttime']?></td>
        <td style="background: khaki;">إعداد وتجهيز</td>

       
        </tr>
        <?php }?>
    <?php foreach($ezn_history as $hist){ 
        $count++;
        if($hist->option_choosed == 'accept'){
         $option_choosed = 'تم القبول';   
        }elseif($hist->option_choosed == 'refuse'){
          $option_choosed = 'تم الرفض';
        }else{
             $option_choosed = '';  
        }
        ?>
       
      <tr>  
      <td><?=$count?></td>
      
       <td><?=$hist->from_user_n?></td> 
       <td><?=$hist->reason_action?></td> 
     <td><?=$hist->to_user_n?></td>   
     <td><?=$hist->date_ar?></td>
     <td><?=$hist->ttime?></td>
        <td><?=$hist->process_title?></td>
        
  
     </tr>
    <?php  }
    
  }

  ?>

  



  </tbody>
</table>






<?php
/*echo'<pre>';
print_r($ezn_history);
*/
 ?>



</div>

<?php

if($eznInfo['suspend'] != 2 ){
 ?>



    <div class="col-md-4 no-padding">
        <div class="panel panel-default">
            <div class="panel-heading">إجراءات علي إذن الصرف</div>


            <div class="panel-body">
                <?php
                
               // echo'<pre>';
               // print_r($eznInfo);
                if($eznInfo['level'] == 0 and $eznInfo['current_to_id'] == null ){ ?>
                    
                           <form action="<?= site_url('finance_accounting/box/ezn_sarf/Ezn_sarf_request/process_transform_to_mder_mobasher') ?>"
                          method="post" id="transform_form">
                        <input type="hidden" name="save" value="save">

                        <input type="hidden" name="ezn_id" value="<?= $eznInfo['id'] ?>"/>
                        <input type="hidden" name="ezn_rkm" value="<?= $eznInfo['ezn_rkm'] ?>"/>
                        <input type="hidden" name="current_from_id" value="<?= $eznInfo['current_from_id'] ?>"/>
                        <input type="hidden" name="current_from_name" value="<?= $eznInfo['current_from_name'] ?>"/>
                        <input type="hidden" name="level" id="level" value="<?= $eznInfo['level'] ?>"/>
                      
                        

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">الموظف </th>
                            </tr>
                            </thead>
                            <tbody>
                          <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                                        <div class="radio">
                                            <label style="color: green;"><input type="radio" value="accept" checked="checked"
                                                                                name="option_choosed">تم تجهيز المستندات  </label>
                                        </div>
                                      
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">المبررات</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                                  rows="3"></textarea>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">تحويل إلي  المدير المباشر</label>
                                        <select class="form-control form-control-sm" name="to_person_id"
                                                id="to_person_id">
                                            <option value="<?= $eznInfo['direct_manager_id'] ?>"><?= $eznInfo['direct_manager_name'] ?> </option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" onclick="check_befor_submit()"
                                            class="btn btn-labeled btn-success " name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                    
               <?php  }elseif ($eznInfo['level'] == 0 and $eznInfo['current_to_id'] == $_SESSION['user_id'] ) { ?>

                    <form action="<?= site_url('finance_accounting/box/ezn_sarf/Ezn_sarf_request/process_transform') ?>"
                          method="post" id="transform_form">
                        <input type="hidden" name="save" value="save">

                        <input type="hidden" name="ezn_id" value="<?= $eznInfo['id'] ?>"/>
                        <input type="hidden" name="ezn_rkm" value="<?= $eznInfo['ezn_rkm'] ?>"/>
                        <input type="hidden" name="current_from_id" value="<?= $eznInfo['current_to_id'] ?>"/>
                        <input type="hidden" name="current_from_name" value="<?= $eznInfo['current_to_name'] ?>"/>
                        <input type="hidden" name="level" id="level" value="<?= $eznInfo['level'] ?>"/>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">المدير المباشر</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                                        <div class="radio">
                                            <label style="color: green;"><input type="radio" value="accept"
                                                                                name="option_choosed">موافق</label>
                                        </div>
                                        <div class="radio">
                                            <label style="color: red;"><input type="radio" value="refuse"
                                                                              name="option_choosed">غير موافق</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">المرئيات وإبداء الرأي</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                                  rows="3"></textarea>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">تحويل إلي </label>
                                       <!-- <select class="form-control form-control-sm" name="to_person_id"
                                                id="to_person_id">
                                            <option value="<?= $eznInfo['direct_manager_id'] ?>"><?= $eznInfo['direct_manager_name'] ?> </option>
                                        </select>-->
                                        
                                           <select class="form-control form-control-sm" name="to_person_id"
                                                id="to_person_id">
                                            <?php foreach ($mohasebs as $mohaseb) { ?>

                                                <option value="<?= $mohaseb->person_id ?>"><?= $mohaseb->person_name ?> </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" onclick="check_befor_submit()"
                                            class="btn btn-labeled btn-success " name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                <?php } elseif ($eznInfo['level'] == 1 and $eznInfo['current_to_id'] == $_SESSION['user_id']) { ?>

                    <form action="<?= site_url('finance_accounting/box/ezn_sarf/Ezn_sarf_request/process_transform_mohaseb') ?>"
                          method="post" id="transform_form">
                        <input type="hidden" name="save" value="save">

                        <input type="hidden" name="ezn_id" value="<?= $eznInfo['id'] ?>"/>
                        <input type="hidden" name="ezn_rkm" value="<?= $eznInfo['ezn_rkm'] ?>"/>
                        <input type="hidden" name="current_from_id" value="<?= $eznInfo['current_to_id'] ?>"/>
                        <input type="hidden" name="current_from_name" value="<?= $eznInfo['current_to_name'] ?>"/>
                        <input type="hidden" name="level" id="level" value="<?= $eznInfo['level'] ?>"/>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">المحاسب</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                                        <div class="radio">
                                            <label style="color: green;"><input type="radio" value="accept"
                                                                                name="option_choosed">الرصيد
                                                يسمح</label>
                                        </div>
                                        <div class="radio">
                                            <label style="color: red;"><input type="radio" value="refuse"
                                                                              name="option_choosed">الرصيد لا
                                                يسمح</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الإفادة</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                                  rows="3"></textarea>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">تحويل إلي </label>

                                        <select class="form-control form-control-sm" name="to_person_id"
                                                id="to_person_id">
                                            <?php foreach ($moder_malis as $mali) { ?>

                                                <option value="<?= $mali->person_id ?>"><?= $mali->person_name ?> </option>
                                            <?php } ?>

                                        </select>




                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" onclick="check_befor_submit()"
                                            class="btn btn-labeled btn-success " name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>


                <?php } elseif ($eznInfo['level'] == 2 and $eznInfo['current_to_id'] == $_SESSION['user_id']) { ?>

                    <form action="<?= site_url('finance_accounting/box/ezn_sarf/Ezn_sarf_request/process_transform_modermali') ?>"
                          method="post" id="transform_form">
                        <input type="hidden" name="save" value="save">

                        <input type="hidden" name="ezn_id" value="<?= $eznInfo['id'] ?>"/>
                        <input type="hidden" name="ezn_rkm" value="<?= $eznInfo['ezn_rkm'] ?>"/>
                        <input type="hidden" name="current_from_id" value="<?= $eznInfo['current_to_id'] ?>"/>
                        <input type="hidden" name="current_from_name" value="<?= $eznInfo['current_to_name'] ?>"/>
                        <input type="hidden" name="level" id="level" value="<?= $eznInfo['level'] ?>"/>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">المدير المالي والإداري</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                                        <div class="radio">
                                            <label style="color: green;"><input type="radio" value="accept"
                                                                                name="option_choosed">موافق</label>
                                        </div>
                                        <div class="radio">
                                            <label style="color: red;"><input type="radio" value="refuse"
                                                                              name="option_choosed">غير موافق </label>
                                        </div>
                                    </div>
                                </td>


                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">تحديد طريقة الصرف</label>

                                        <select name="sarf_method" id="sarf_method" class="form-control">
                                            <option value=" ">إختر طريقة الصرف</option>
                                            <option value="naqdi_ohda">نقدا من العهدة</option>
                                            <option value="from_bank">إصدار شيك من البنك</option>
                                            <option value="tahwel_banki">تحويل بنكي</option>
                                            <option value="sadad_hkomi">سداد مدفوعات حكومية</option>
                                            <option value="sadad_fwater">سداد فواتير</option>


                                        </select>

                                    </div>
                                </td>


                            </tr>


                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">التوصية - الإقتراح</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                                  rows="3"></textarea>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">تحويل إلي </label>

                                        <select class="form-control form-control-sm" name="to_person_id"
                                                id="to_person_id">
                                            <?php foreach ($moder_3ams as $moder_3am) { ?>

                                                <option value="<?= $moder_3am->person_id ?>"><?= $moder_3am->person_name ?> </option>
                                            <?php } ?>

                                        </select>


                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" onclick="check_befor_submit()"
                                            class="btn btn-labeled btn-success " name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                <?php } elseif ($eznInfo['level'] == 3 and $eznInfo['current_to_id'] == $_SESSION['user_id']) { ?>

                    <form action="<?= site_url('finance_accounting/box/ezn_sarf/Ezn_sarf_request/process_transform_moderaam') ?>"
                          method="post" id="transform_form">
                        <input type="hidden" name="save" value="save">

                        <input type="hidden" name="ezn_id" value="<?= $eznInfo['id'] ?>"/>
                        <input type="hidden" name="ezn_rkm" value="<?= $eznInfo['ezn_rkm'] ?>"/>
                        <input type="hidden" name="current_from_id" value="<?= $eznInfo['current_to_id'] ?>"/>
                        <input type="hidden" name="current_from_name" value="<?= $eznInfo['current_to_name'] ?>"/>
                        <input type="hidden" name="level" id="level" value="<?= $eznInfo['level'] ?>"/>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">المدير العام</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                                        <div class="radio">
                                            <label style="color: green;">
                                                <input type="radio" value="accept"
                                                       name="option_choosed">يعتمد</label>
                                        </div>
                                        <div class="radio">
                                            <label style="color: red;"><input type="radio" value="refuse"
                                                                              name="option_choosed">لا يعتمد </label>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">التوجيه</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                                  rows="3"></textarea>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">تحويل إلي </label>

                                        <select class="form-control form-control-sm" name="to_person_id"
                                                id="to_person_id">
                                            <?php foreach ($amin_sandoks as $amin_sandok) { ?>

                                                <option value="<?= $amin_sandok->person_id ?>"><?= $amin_sandok->person_name ?> </option>
                                            <?php } ?>

                                        </select>


                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" onclick="check_befor_submit()"
                                            class="btn btn-labeled btn-success " name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>


                <?php } ?>
            </div>


        </div>
    </div>
<?php } ?>
</div>

    <div id="result_files">
    </div>
<script>
    function check_befor_submit() {

        var valid = 1;
        var text_valid = '';
        var radioValue = $("input[name='option_choosed']:checked").val();
        if (radioValue != 'accept' && radioValue != 'refuse') {
            text_valid += 'من فضلك حدد قراراك سواء القبول او الرفض';
            valid = 0;
        }

        if (radioValue === 'accept') {
            var level_check = parseInt($('#level').val());
            if (level_check == 1 || level_check == 2 || level_check == 3) {
                if ($('#to_person_id').val() == '') {
                    text_valid += 'من فضلك قم باختيار الموظف ';
                    valid = 0;
                    $('#to_person_id').css("border", "2px solid #ff0000");

                }else {
                    $('#to_person_id').css("border", "2px solid #5cb85c");

                }
            }
            if ( level_check == 2 ) {
                if ($('#sarf_method').val()!= ' ') {
                    $('#sarf_method').css("border", "2px solid #5cb85c");
                }else {
                    text_valid += 'من فضلك قم باختيار طريقة الصرف ';
                    valid = 0;
                    $('#sarf_method').css("border", "2px solid #ff0000");

                }
            }
        }
        /*   if (valid == 0) {
               swal({
                   title: 'من فضلك ادخل كل الحقول ',
                   text: text_valid,
                   type: 'error',
                   confirmButtonText: 'تم'
               });
               xhr.abort();
           } else if (valid == 1) {
               $('#transform_form').submit();
           }*/

        $.ajax({
            type: 'post',
            url: $('#transform_form').attr('action'),
            data: $('#transform_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري التحويل ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم التحويل   بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                location.reload();

            }
        });

    }
</script>
<?php $ezn_sarf_id_fk = 3; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            put_value(<?= $eznInfo['id']; ?>)
        });
    </script>
    <script>
        function show_img(src) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
            WinPrint.document.close();
            WinPrint.focus();
        }
    </script>
    <script>
        function show_bdf(src) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
            WinPrint.document.close();
            WinPrint.focus();
        }
    </script>
