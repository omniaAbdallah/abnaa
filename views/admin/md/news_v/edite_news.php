<div class="col-sm-12 no-padding " >


<?php
if (isset($item) && !empty($item)) {
    $id=$item->id;
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
    $id="";
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
                        echo form_open_multipart('md/new/News/update_complete/' .$item->id, array('class' => 'family_Marriage_orders'));
                
                  
                 

                     } else{ ?>
                        <form action="<?php echo base_url(); ?>md/new/News/add"
                              method="post" id="form1">

                            <?php } ?>



                          
                    
           







                    
            <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                      <label class="label">تاريخ الخبر</label>
                      <input  type="hidden"   name="id" id="id"
                      value="<?=$id?>"
                      
                      />
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
      
                  <button type="button" onclick="update_family_zwag(<?=$id?>);"
                                class="btn btn-labeled btn-warning "  name="add" value="اضافه"
                                style="padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                        </button>
    
                   
                  
    
                </div>

				</div>
				


             

                <script>

function update_family_zwag(id) {

    var all_inputs = $(' [data-validation="required"]');
    var valid = 1;
    var text_valid = "";
    all_inputs.each(function (index, elem) {
        console.log(elem.id + $(elem).val());
        if ($(elem).val().length >= 1) {
            $(elem).css("border-color", "");
        } else {
            valid = 0;
            $(elem).css("border-color", "red");
        }
    });
    var form_data = new FormData();

    //
    var serializedData = $('.family_Marriage_orders').serializeArray();
    $.each(serializedData, function (key, item) {
        form_data.append(item.name, item.value);
    });
    $.ajax({
        type: 'post',
        url: '<?php echo base_url() ?>md/new/News/update_complete',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
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
                    title: "جاري الإرسال ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            }
        },
        success: function (html) {
            swal({
                title: 'تم تعديل  ',
                type: 'success',
                confirmButtonText: 'تم'
            });
            var all_inputs_set = $('.family_Marriage_orders');
            all_inputs_set.each(function (index, elem) {
                console.log(elem.id + $(elem).val());
                $(elem).val('');
               
            });
            if (html == 1) {

                //get_data('family_members');
                // show_tab('family_members');
            }
        }
    });
}
</script>