<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
         <div class="panel-heading">
            <h3 class="panel-title"> إضافة خبر  </h3>
         </div> 
        <div class="panel-body" >
           <div class="vertical-tabs">
           <div class="col-sm-12 no-padding ">

<?php
if (isset($item) && !empty($item)) {
    $news_date=$item->news_date ;
    $news_title=$item->news_title ;
    $news_status=$item->news_status;
    $news_content=$item->news_content;
    $news_words=$item->news_words;
    $description=$item->description;
    $auther=$item->auther;
    $date=$item->date;
    $date_ar=$item->date_ar;
    $publisher=$item->publisher;
    $publisher_name	=$item->publisher_name	;



} else {

    $news_date=date('Y-m-d\TH:i:s');
 
    $news_title="";
    $news_status="";
    $news_content="";
    $news_words="";
    $description="";
    $auther="";
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
                  
                    <form action="<?php echo base_url() . 'md/new/News/update/' . $item->id; ?>"
                          method="post" id="form1">

                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>md/new/News/add"
                              method="post" id="form1">

                            <?php } ?>



                          
                    
           







                    
            <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                      <label class="label">تاريخ الخبر</label>
                      <input  type="datetime-local" class="form-control" placeholder=""  name="news_date"
                      value="<?=$news_date?>"
                      
                      />
                    </div>

                   

                  
                    <div class="form-group col-md-7 col-sm-6 col-xs-12 padding-4">
                      <label class="label"> عنوان الخبر</label>
                      <input type="text" class="form-control" placeholder="" name="news_title" data-validation="required" 
                      value="<?=$news_title?>"
                      />
                    </div>
                    <div class="form-group padding-2 col-md-2 col-xs-12">
                        <label class="label ">حاله الخبر</label>
                        <select  name="news_status"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'غير نشط',1 => 'نشط');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($news_status != '') {
                                    if ($key == $news_status) {
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

            <div class="col-xs-12 padding-4">
                        <div class="form-group">
                        <label class="label"> تفاصيل الخبر</label>
                         <textarea class="form-control" placeholder="" id="editor" name="news_content"
                         data-validation="required"
                         ><?= $news_content?></textarea>
                         
                       </div>
                    </div>

                    
                   
                     
                      <div class="col-xs-12 padding-4">
                      <div class="form-group  col-md-4 padding-4">
                            <label class="">الكاتب (  Auther)</label>
                            <input class="form-control "  name="auther" id="auther"
                                   value="<?= $auther ?>">

                        </div>
                        <div class="form-group col-md-8 ">
                        <label class="label">الوسوم ( KeyWords)</label>
                         <textarea class="form-control" placeholder="" id="editor" name="news_words"
                         data-validation="required" style="width:634px;"
                         ><?= $news_words ?></textarea>
                         <span  class="label-danger"> برجاء وضع "-" بين الكلمات </span>
                         
                       </div>
                   
                   
                    </div>

                    <div class="col-xs-12 padding-4">
                        <div class="form-group">
                        <label class="label">الوصف</label>
                         <textarea class="form-control" placeholder="" id="editor" name="description"
                         data-validation="required"
                         ><?= $description ?></textarea>
                    
                         
                       </div>
                      
                   
                    </div>
                    
              
              
              
                  </div>
                  <div class="col-md-3">
                        <div class="left-archive-aside">
                            
                            
                            
                         
                    
                    
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
                <h3 class="panel-title">الاخبار </h3>
            </div>
        <div class="panel-body">
           
                <table class="table example table-bordered table-striped table-hover">

                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>   رقم الخبر</th>
              
                    <th> تاريخ الخبر</th>
                    <th> عنوان الخبر</th> 
                     <th> حاله الخبر</th> 
                  
                 
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
                        <td><?php echo $row->news_date;?></td>
                      <td><?php echo $row->news_title;?></td> 
                      <td><span class="label" style="background-color: #32e26b"><?php if( $row->news_status==1){echo 'نشط' ;}elseif($row->news_status==2){echo 'غير نشط';}else{echo 'غير محدد';}?></span></td> 
               
                   
                      
                    
                    
                        <td>
                       



                        <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/md/new/News/compelete_details/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                   
                  </ul>
                </div> 
             
   
     
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
        window.location="<?= base_url() . 'md/new/News/update/' .$row->id  ?>";
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
        setTimeout(function(){window.location="<?= base_url() . 'md/new/News/delete/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
                            
                           
                                            <!-- <a href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/update/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/delete/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                           -->
                                            <i onclick="get_details(<?= $row->id ?>)"
                                               class="fa fa-search-plus" aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"></i>

                                                   
                 
                      
                      
        
                                               
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
            url: "<?php echo base_url();?>md/new/News/load_details",
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
