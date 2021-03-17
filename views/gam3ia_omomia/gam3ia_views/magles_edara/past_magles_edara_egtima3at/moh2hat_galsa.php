<style>



.box {



    position: relative;



    border-radius: 3px;



    background: #ffffff;



    border-top: 3px solid #d2d6de;



    margin-bottom: 20px;



    width: 100%;



    box-shadow: 0 1px 1px rgba(0,0,0,0.1);



}



.box-header {



    color: #444;



    display: block;



    padding: 10px;



    position: relative;



}



.box-header.with-border {



    border-bottom: 1px solid #f4f4f4;



}



.box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {



    display: inline-block;



    font-size: 18px;



    margin: 0;



    line-height: 1;



}



.box-body {



    border-top-left-radius: 0;



    border-top-right-radius: 0;



    border-bottom-right-radius: 3px;



    border-bottom-left-radius: 3px;



    padding: 10px;



}



.box-footer {



    border-top-left-radius: 0;



    border-top-right-radius: 0;



    border-bottom-right-radius: 3px;



    border-bottom-left-radius: 3px;



    border-top: 1px solid #f4f4f4;



    padding: 10px;



    background-color: #fff;



}



.table-bordered {



    border: 1px solid #f4f4f4;



}



table {



    background-color: transparent;



}



.table {



    width: 100%;



    max-width: 100%;



    margin-bottom: 20px;



}



.table thead th {



    vertical-align: bottom;



    border-bottom: 2px solid #dee2e6;



}



.table-bordered thead td, .table-bordered thead th {



    border-bottom-width: 2px;



}



.table td, .table th {



    padding: .75rem;



    vertical-align: top;



    border-top: 1px solid #dee2e6;



}



.badge {



    display: inline-block;



    min-width: 10px;



    padding: 3px 7px;



    font-size: 12px;



    font-weight: 700;



    line-height: 1;



    color: #fff;



    text-align: center;



    white-space: nowrap;



    vertical-align: middle;



    background-color: #777;



    border-radius: 10px;



}



.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {



    background-color: #dd4b39 !important;



}



.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {



    background-color: #f39c12 !important;



}



.bg-light-blue, .label-primary, .modal-primary .modal-body {



    background-color: #3c8dbc !important;



}



.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {



    background-color: #00a65a !important;



}



  .classnewa{

        font-size: 17px !important;

    }



</style>




<?php if(isset($open_galesa[0])&&!empty($open_galesa[0])){?>
<div class="col-md-12">
<div class="col-md-12">
    <div class="panel panel-default" style="">
    <div class="panel-heading panel-title">الإجتماع الحالي</div>
<div class="panel-body">
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <table class="table">
              <thead style="background: #737373;color: white;">
              <th scope="col">رقم الجلسة</th>
              <th scope="col">تاريخ الجلسة</th>
              <th scope="col">توقيت الجلسة</th>
              <th scope="col">مكان الإنعقاد</th>
              <th scope="col">الأعضاء </th>
                  <?php
if(isset($open_galesa[0]->time_start)&&!empty($open_galesa[0]->time_start))
{?>
<th scope="col" style="">
توقيت بدء الجلسة
  
</th>
<?php }?>

              </thead>
                <tbody>
                 <tr>
<td><span class=" classnewa badge bg-green"> <?php if(isset($open_galesa[0]->glsa_rkm_full)&&!empty($open_galesa[0]->glsa_rkm_full))
{
echo $open_galesa[0]->glsa_rkm_full;
} 
?></span></td>
<td><span class=" classnewa badge bg-red"><?php if(isset($open_galesa[0]->glsa_date)&&!empty($open_galesa[0]->glsa_date))
{
 echo $time = date("Y-m-d ",$open_galesa[0]->glsa_date);
} 
?></span></td>
<td><span class=" classnewa badge bg-light-blue"><?php if(isset($open_galesa[0]->glsa_time)&&!empty($open_galesa[0]->glsa_time))
{
echo $open_galesa[0]->glsa_time;
} 
?></span></td>
<td>
<a  data-toggle="modal" data-target="#myModal_location_"> 
<span class=" badge bg-blue">
<?php
if(isset($open_galesa[0]->glsa_date)&&!empty($open_galesa[0]->glsa_date))
{
 echo $open_galesa[0]->makn_en3qd_name;
} 
 ?>
</span>
</a>
</td>
 <td> 
 <a  data-toggle="modal" class="btn btn-sm btn-primary"
onclick="det_datiles(<?php if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>)"
data-target="#myModal"> 
 <?php if(isset($open_galesa[0]->glsa_members_num)&&!empty($open_galesa[0]->glsa_members_num)){
    echo $open_galesa[0]->glsa_members_num ;
  }else{
   echo '0'; 
  }  ?>
 المدعوين
</a>
<a class="btn btn-sm btn-success"  data-toggle="modal"
onclick="det_datiles_attend(<?php 
   if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>,1)"
data-target="#myModal"> 
  <?php if(isset($open_galesa[0]->glsa_members_hdoor_num)&&!empty($open_galesa[0]->glsa_members_hdoor_num)){
    echo $open_galesa[0]->glsa_members_hdoor_num ;
  }else{
   echo '0'; 
  }  ?> تأكيد حضور  
</a>  
<a class="btn btn-sm btn-danger"  data-toggle="modal"
onclick="det_datiles_attend(<?php if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>,2)"
data-target="#myModal">
<?php if(isset($open_galesa[0]->glsa_members_absent_num)&&!empty($open_galesa[0]->glsa_members_absent_num))
{
echo $open_galesa[0]->glsa_members_absent_num;    
}  else {
   echo '0';  
} ?> 
 معتذر
</a>
<!-- <a class="btn btn-sm btn-warning"  data-toggle="modal"
onclick="det_datiles_attend(<?php if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>,0)"
data-target="#myModal">
<?php if(isset($open_galesa[0]->glsa_members_wait)&&!empty($open_galesa[0]->glsa_members_wait)){
 echo $open_galesa[0]->glsa_members_wait;   
}  else{
echo '0';    
}   ?> 
أجل الرد
</a> -->
<!--
<a class="btn btn-sm btn-primary"  data-toggle="modal"
onclick="det_datiles_attend(<?php if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>,5)"
data-target="#myModal">
<?php if(isset($open_galesa[0]->glsa_members_no_action)&&!empty($open_galesa[0]->glsa_members_no_action)){
 echo $open_galesa[0]->glsa_members_no_action;   
}  else{
echo '0';    
}   ?> 
جاري
</a> -->
 </td>
<!--
                  <td> 
                  <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal"
                                            onclick="get_table_mehwer(<?php if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>,'تفاصيل المحاور')">
                                             يوجد  <?php 
                                            if(isset($open_galesa[0]->mehwr_num)&&!empty($open_galesa[0]->mehwr_num)){echo
$open_galesa[0]->mehwr_num;
        }
                                            ?> محاور  تم مناقشة <?php
    if(isset($open_galesa[0]->qrar_num)&&!empty($open_galesa[0]->qrar_num)){echo
$open_galesa[0]->qrar_num;
}else{
 echo '0';
}                                         
                                             ?> محور 
                  </a>
                </td>
-->
                <?php
if(isset($open_galesa[0]->time_start)&&!empty($open_galesa[0]->time_start))
{?>
<td>
    <span class="classnewa badge bg-red"><?=$open_galesa[0]->time_start?></span>
   </td>
   <?php
}
?>

                    </tr>
              </tbody></table>
              <?php
              /*
              echo '<pre>';
              print_r($open_galesa[0]);*/
               ?>
<div id="loaddd">
             <table class="table table-bordered center" style="   margin: auto;
   width: 80% !important;" >
    <thead>
    <tr>
    <th style="background: #737373;color: white;" colspan="4">محاور الجلسة </th>
    </tr>
      <tr>
        <th style="background: #737373;color: white; width: 5%;">م</th>
        <th style="background: #737373;color: white;">المحور</th>
        <th style="background: #737373;color: white;">القرار</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    if(isset($open_galesa[0]->mehwr_details) and $open_galesa[0]->mehwr_details != ''){
        $x=0;
        foreach($open_galesa[0]->mehwr_details as $row){
$x++;
        ?>
        <tr>
          <!-- <td><?=$x?></td>
        <td><i style="color: #e5343d;" class="fa fa-spinner fa-spin" style="font-size:24px"></i><?=$row->mehwar_title ?></td> -->
        <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><?=$x?></td>
        <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><i style="color: #e5343d;" class="fa fa-spinner fa-spin" style="font-size:24px"></i><?php echo '<b>' .$row->mehwar_title .'</b>' ?></td>
<td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>>

<?php 
if(isset($row->elqrar)&&!empty($row->elqrar))
{
    
echo '<span class="badge bg-green">'.$row->elqrar .'</span>' ;}else{echo 'لم يتم اتخاذ القرار';}  ?></td>
      </tr>
  <?php   } }
    ?>
    </tbody>
  </table> 
  </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
        <?php
}?>
<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل </h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
setInterval(function() {
    check_notification_chat();
}, 5000);
setInterval(function() {
check_notification(<?php if(isset($open_galesa[0]->glsa_rkm)&&!empty($open_galesa[0]->glsa_rkm)) echo $open_galesa[0]->glsa_rkm ?>);
}, 5000);
function check_notification_chat() {
    $.ajax({
        type: 'post',
        url:  "<?=base_url() . 'gam3ia_omomia/Gam3ia_omomia/mon24et_egtma3at_load_magles'?>",
        success: function(data) {
                $("#loaddd").html(data);
        }
    });
}

function check_notification(glsa_rkm) {
    $.ajax({
        type: 'post',
        data:{glsa_rkm:glsa_rkm},
        url:  "<?=base_url() . 'gam3ia_omomia/Gam3ia_omomia/mon24et_egtma3at_load_notifi_magles'?>",
        success: function(data) {
console.log(data);
            if(data!='')
            {
                swal({
  title: "تم الإنتهاء من مناقشة المحور وتم إضافة القرار خاصته ",
  type: "warning",
  confirmButtonClass: "btn-danger",
  confirmButtonText: "تم",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_opened_magles',
                data: {glsa_rkm: glsa_rkm},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                        title: "تمت عملية المتابعة !",
        }
        );
        $('td').removeAttr('style');
                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});
                $("#loaddd").html(data);
            }
        }
    });
}
    function det_datiles(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'gam3ia_omomia/Gam3ia_omomia/det_datiles_magles_edara'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {
                $('#members_data').html(d);
            }
        });
    }
</script>
<script>
    function det_datiles_attend(glsa_rkm,attend) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'gam3ia_omomia/Gam3ia_omomia/det_datiles_magles_edara_attend'?>",
            data: {
                glsa_rkm: glsa_rkm,
                attend:attend
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {
                $('#members_data').html(d);
            }
        });
    }
</script>