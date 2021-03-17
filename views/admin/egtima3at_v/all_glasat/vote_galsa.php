<style>
 .sweet-alert {
    background-color: #ffffff;
    width: 594px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 2000;
    }
</style>

<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
        </div>

        <div class="panel-body">
    
    
    
   
        <?php if(isset($records)&&!empty($records)){?>
        <table id="" class="example display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>مسلسل</th>
                <th>رقم الجلسة</th>
                <th>تاريخ  الجلسة</th>
                <th>عنوان  الجلسة</th>
                <th>معتمد  الجلسة</th>
                <th>حالة الجلسة</th>
                <th>تصويت الأعضاء </th>
                
               
            </tr>
            </thead>
            <tbody>
<?php
$x=0;
foreach ($records as $row){
    $x++;
    
    if($row->finshed == 0){
      $Halet_galsa = 'جلسة نشطة'; 
      $Halet_galsa_color = '#98c73e'; 
    }elseif($row->finshed == 1){
        $Halet_galsa = 'جلسة إنتهت '; 
         $Halet_galsa_color = '#e65656';   
    }
    ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$row->galsa_rkm?></td>
                    
                            <td><?= $row->galsa_date ?></td>
                            <td><?= $row->enwan_galsa ?></td>
                            <td><?= $row->suspender_emp_n ?></td>
                            
                    <td style="background-color:<?php echo $Halet_galsa_color;  ?>;">
                    <?php echo $Halet_galsa; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-add" onclick="get_memebers(<?=$row->galsa_rkm?>)" ><span class="fa fa-list"></span>تصويت الاعضاء</button>
                    </td>
                    
                   




                </tr>
    <!----------------------------------------------------------------->
 
<!----------------------------------------------------->
<?php } ?>


            </tbody>
        </table>
                <?php } else {
                        echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                    }  ?>


    </div>
        </div>
    </div>
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
<div class="modal-dialog" role="document" style="width: 80%">
    
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تفاصيل الأعضاء</h4>
                </div>
                <br>
                <div class="modal-body form-group col-sm-12 col-xs-12" id="show">
                    
                </div>
                <div class="modal-footer" style="border-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
$(document).ready(function () {
            console.warn("check gg :: ready");
            
          get_vote_galsa(<?= $notify_galsa->galsa_rkm ?>);
            setInterval(get_da3wa_galsa, (1000 * 60 * min));
          

        });
</script>
<script>
 function get_memebers(id){
    $('#myModal').modal('show');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/load_mem_vote",
            data:{id:id},
            beforeSend: function () {
                $('#show').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show').html(d);

            }

        });
 }
 

</script>
<!-- <script>

    function get_vote_galsa(galsa_rkm) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/check_data",
            data:{galsa_rkm:galsa_rkm},
             success: function (d) {
//console.log(d);
if(d !=0 )
{
    var obj = JSON.parse(d);
    console.log(obj.galsa_rkm_fk);
      //   var title2='انت مدعو لحضور جلسه رقم '.obj.galsa_rkm_fk.'بتاريخ '.obj.galsa_date.'';
         swal({
  title: '   تم الا نتهاء من محضر الجلسة رقم  ' +obj.galsa_rkm_fk+ ' بتاريخ '+obj.galsa_date+' ',
   text: "عند الضغط علي نعم سيتم  تصويتك بنعم,عند الضغط علي لا سيتم  تصويتك لا ",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم",
  cancelButtonText: " لا",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
      var vote=1;
   $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/update_member_vote",
                            data: {galsa_rkm: galsa_rkm,vote:vote},
                            success: function (d) {
                                
                                
                            swal({
                                    title: "تم   التصويت  !",


                                }
                            );
                            }
                        });
  } else {
    var vote=2;
   $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/update_member_vote",
                            data: {galsa_rkm: galsa_rkm,vote:vote},
                            success: function (d) {
                                
                                
                            swal({
                                    title: "تم   التصويت   !",


                                }
                            );
                            }
                        });
  }
});    
        ///


            }
             }
        });
        
    
    }
</script> -->
<script>

    function get_vote_galsa(galsa_rkm) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/check_data",
            data:{galsa_rkm:galsa_rkm},
             success: function (d) {
//console.log(d);
if(d !=0 )
{
    var obj = JSON.parse(d);
    console.log(obj.galsa_rkm_fk);
      //   var title2='انت مدعو لحضور جلسه رقم '.obj.galsa_rkm_fk.'بتاريخ '.obj.galsa_date.'';
         swal({
  title: '   تم الا نتهاء من محضر الجلسة رقم  ' +obj.galsa_rkm_fk+ ' بتاريخ '+obj.galsa_date+' ',
   text: "برجاء التصويت",
  type: "warning",
  confirmButtonText: 'تم'
});
   
        ///


            }
             }
        });
        
    
    }
</script>
<script>

    function add_galsa(key,galsa_rkm) {

        
      var vote=key;
   $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/update_member_vote",
                            data: {galsa_rkm: galsa_rkm,vote:vote},
                            success: function (d) {
                                
                                
                            swal({
                                    title: "تم   التصويت  !",


                                }
                            );
                            }
                        });
 
}
</script>