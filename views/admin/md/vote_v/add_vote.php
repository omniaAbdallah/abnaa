<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
         <div class="panel-heading">
            <h3 class="panel-title"> إضافة استطلاع رأى لإعضاء الجمعية العمومية  </h3>
         </div> 
        <div class="panel-body" >
           <div class="vertical-tabs">
           <div class="col-sm-12 no-padding ">

<?php
if (isset($item) && !empty($item)) {
    $vote_date=$item->vote_date ;
    $vote_title=$item->vote_title ;
    $vote_status=$item->vote_status;
    $vote_option1=$item->vote_option1;
    $vote_option2=$item->vote_option2;

    $date=$item->date;
    $date_ar=$item->date_ar;
    $publisher=$item->publisher;
    $publisher_name	=$item->publisher_name	;



} else {

    $vote_date=date('Y-m-d');
 
    $vote_title="";
    $vote_status="";
  $vote_option1="";
   $vote_option2="";
    $date="";
    $date_ar="";
    $publisher="";
    $publisher_name	=$_SESSION['user_name'];


}
?>



			
				  <div class="col-xs-9 no-padding">
          <?php
                    if (isset($item) && !empty($item)){
                    ?>
                  
                    <form action="<?php echo base_url() . 'md/votes/Vote/update/' . $item->id; ?>"
                          method="post" id="form1">

                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>md/votes/Vote/add"
                              method="post" id="form1">

                            <?php } ?>



                          
                    
           







                    
            <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                      <label class="label">تاريخ الإضافة</label>
                      <input  type="date" class="form-control" placeholder=""  name="vote_date"
                      value="<?=$vote_date?>"
                      
                      />
                    </div>

                   

                  
                    <div class="form-group col-md-7 col-sm-6 col-xs-12 padding-4">
                      <label class="label"> سؤال استطلاع رأى</label>
                      <input type="text" class="form-control" placeholder="" name="vote_title" data-validation="required" 
                      value="<?=$vote_title?>"
                      />
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                      <label class="label"> الاختيار الاول</label>
                      <input type="text" class="form-control" placeholder="" name="vote_option1" data-validation="required" 
                      value="<?=$vote_option1?>"
                      />
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                      <label class="label">الاختيار الثاني</label>
                      <input type="text" class="form-control" placeholder="" name="vote_option2" data-validation="required" 
                      value="<?=$vote_option2?>"
                      />
                    </div>
                    <div class="form-group padding-2 col-md-2 col-xs-12">
                        <label class="label ">حاله استطلاع رأى</label>
                        <select  name="vote_status"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'غير نشط',1 => 'نشط');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($vote_status != '') {
                                    if ($key == $vote_status) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
            </div>

          

                    
                   
                     
                     

                   
                    
              
              
              
                  </div>
                  <div class="col-md-3">
                        <div class="left-archive-aside">
                            
                            
                            
                         
                    
                    <!--
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">تمت الإضافة بواسطة</h5>
                                </div>
                                <div class="panel-body">
                                    <h5>  <?= $publisher_name;?></h5>
                    
                                    <p><?= $date_ar;?>
                                    </p>
                                    
                                </div>
                            </div>
                            -->
                            
                           
                    
                        </div>
                    
                    
                    </div>
                  <div class="col-xs-12 text-center" style="margin-top: 15px;">
      
                  <button type="submit"
                                class="btn btn-labeled btn-success "  name="add" value="اضافه"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
    
                   
                  
    
                </div>

				</div>
				


                </div>
        
        
        </div>
    </div>
</div>
<?php 
            
            if(isset($result)&&!empty($result)){?>
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">قائمة الإستطلاعات </h3>
            </div>
        <div class="panel-body">
           
                <table class="table example table-bordered table-striped table-hover">

                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>   رقم استطلاع رأى</th>
              
                    <th> التاريخ  </th>
                    <th> السؤال  </th> 
                     <th> الحالة  </th> 
                  
                     <th> نتائج استطلاع رأى</th> 
                    <th >الاجراء</th>
                   
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->vote_date;?></td>
                      <td><?php echo $row->vote_title;?></td> 
                      <td><span class="label" style="background-color: #32e26b"><?php if( $row->vote_status==1){echo 'نشط' ;}elseif($row->vote_status==2){echo 'غير نشط';}else{echo 'غير محدد';}?></span></td> 
                      <td>
                      <i onclick="get_details(<?= $row->id ?>)"
                                               class="fa fa-search-plus" aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"></i>
                                               </td>
                      
                    
                    
                        <td>
                       



                     
             
   
     
        <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'md/votes/Vote/update/' .$row->id  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
    <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'md/votes/Vote/delete/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
                            
                           
                                            <!-- <a href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/update/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/delete/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                           -->
                                          

                                                   
                 
                      
                      
        
                                               
                        </td>
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            </div>
        
        </div>
    </div>
            <?php
            }
            ?>
    

<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- new -->

<!-- new -->





<script src="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.js"></script>
<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.css">


<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/votes/Vote/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }
</script>
