<?php 
/*
echo '<pre>';
print_r($all_emps);*/
/*
echo 'personal='.$total_nums_personal_ezn;
echo'<br/>';
echo '3mal='.$total_nums_3mal_ezn;
echo'<br/>';
echo 'sum_personal='.$total_sum_personal_ezn;
echo'<br/>';
echo 'sum_3mal='.$total_sum_3mal_ezn;*/

$ezn_amal_color = '#ffa268';
$ezn_personal_color = '#15c0ad';
?>
<style>
.center {
  margin-left: auto;
  margin-right: auto;
}
.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
    text-align: center;
}
.table > thead > tr > th, .table > tfoot > tr > th{
     text-align: center;
}
</style>
 <table class="table table-bordered center" style="
    width: 61%;
    align-items: center;
 
    border-radius: 61px;
">
    <thead>
    <tr>
     <th colspan="4" style="background: #b5b5b5;color: black;">إحصائية الأذونات خلال شهر <?=$current_month_name?> لعام <?=$current_year?></th>
    </tr>
      <tr>
     
        <th style="background: #2d2b2b;color: white;">إجمالي عدد الأذونات الشخصية</th>
        <th style="background: #2d2b2b;color: white;">بإجمالي عدد دقائق</th>
        <th style="background: #2d2b2b;color: white;">إجمالي عدد أذونات العمل</th>
        <th style="background: #2d2b2b;color: white;">بإجمالي عدد دقائق</th>
      </tr>
    </thead>
    <tbody>
      <tr>
     
        <td style="background:<?=$ezn_personal_color?>; font-size: 18px!important;"><?=$total_nums_personal_ezn?></td>
        <td style="background:<?=$ezn_personal_color?>;font-size: 18px!important;"><?=$total_sum_personal_ezn?></td>
        <td style="background:<?=$ezn_amal_color?>;font-size: 18px!important;"><?=$total_nums_3mal_ezn?></td>
        <td style="background:<?=$ezn_amal_color?>;font-size: 18px!important;"><?=$total_sum_3mal_ezn?></td>
      </tr>
  
    </tbody>
  </table>

<?php if (isset($all_emps) && !empty($all_emps)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>كود الموظف</th>
                    <th>إسم الموظف</th>
                     <th>المسمى الوظيفي</th>
                     <th>الإدارة</th>
                    <th>طبيعة العمل</th>
                    <th>عدد الأذونات الشخصية</th>
                    <th>إجمالي عدد الدقائق</th>
                    <th>عدد أذونات العمل</th>
                    <th>إجمالي عدد الدقائق</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($all_emps) && !empty($all_emps)) {
                    $x = 1;
                    foreach ($all_emps as $row) {
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                             <td><?php echo $row->emp_code; ?></td>
                            <td><?php echo $row->emp_name; ?></td>
                            
                             <td><?php echo $row->new_mosma_wazefy; ?></td>
                              <td><?php echo $row->edara_n; ?></td>
                            
                            <td><?php echo $row->job_type_name; ?></td>
                            
                            <td style="background:<?=$ezn_personal_color?>;"><?=$row->num_personal_ezn?></td>
                            <td style="background:<?=$ezn_personal_color?>"><?=$row->sum_personal_ezn?></td>
                            
                            <td style="background:<?=$ezn_amal_color?>;"><?=$row->num_3mal_ezn?></td>
                            <td style="background:<?=$ezn_amal_color?>;"><?=$row->sum_3mal_ezn?></td>
                            
                            
                             
                            
                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>


<!-- detailsModal -->
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_details",
            data: {row_id:row_id},
            beforeSend: function () {
                $('#details_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>


<script>
    function load_profile_data(emp_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_profile_details",
            data: {emp_id:emp_id},
            beforeSend: function () {
                $('#profile_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#profile_result').html(d);

            }

        });

    }
</script>
<script>
function print_new_ezn(value) {
    var ezn_id = value;
    var request = $.ajax({
        // print_resrv -- print_contract
        url: "<?=base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/print_new_ezn'?>",
        type: "POST",
        data: {
            ezn_id: ezn_id
        },
    });
    request.done(function(msg) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(msg);
        WinPrint.document.close();
        WinPrint.focus();
        /*  WinPrint.print();
          WinPrint.close();*/
    });
    request.fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    });
}

</script>
