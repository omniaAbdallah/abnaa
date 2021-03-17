<?php if(isset($page_data) && !empty($page_data) && $page_data!=null ):
    $out['form']='Dash/UpdatePages/'.$page_data['page_id'];
    $out['page_id']=$page_data["page_id"];
    $out['page_title']=$page_data["page_title"];
    $out['page_link']=$page_data["page_link"];
    $out['page_order']=$page_data["page_order"];
    $out['page_icon_code']=$page_data["page_icon_code"];
    $out['group_id_fk']=$page_data["group_id_fk"];
    $out['level']=$page_data["level"];
    $out['page_image']=$page_data['page_image'];
    
    $disabled = 'readonly';
    $out['input']=' <input type="submit" name="edit_page" value="تعديل" class="btn center-block" />';
else:
    $out['form']='Dash/AddPages';
    $out['page_id']="";
    $out['page_title']="";
    $out['page_link']="";
    $out['page_order']="";
    $out['group_id_fk']="";
    $out['page_icon_code']="";
    $out['level']="";
    $disabled = '';
    $out['input']=' <input type="submit" name="add_page" value="حفظ" class="btn center-block" />';
endif?>




      <div class="col-xs-12" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php //echo $title?> </h3>
            </div>
            <div class="panel-body">
<!-- open panel-body-->


    <?php echo form_open_multipart($out['form'])?>
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="row">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">إسم المجموعة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="page_title" value="<?php echo $out['page_title']; ?>" class="form-control col-xs-6"   data-validation="required"/>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">إختر مجموعة التحكم</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="group_id_fk"  class="selectpicker form-control "  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                             
                                <option value=""> إختر المجموعة </option>
                                 <?php if(!empty($groups)){ ?>
                                <?php foreach ($groups as $row):
                                    $select=""; if(isset($page_data) ){
                                    if($row->page_id ==  $out['group_id_fk'] ){$select='selected="selected"';}
                                } ?>
                                    <option value="<?php echo $row->page_id?>" <?php echo $select?> > <?php echo $row->page_title ?> </option>
                                <?php endforeach;
                              }else{
                                  echo ' <option value=""> إضف مجموعات التحكم أولا</option>';
                              }
                              ?>
                            </select>
                        </div>
                    </div>



                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">ترتيب المجموعة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" name="page_order" value="<?php echo $out['page_order']; ?>" class="form-control col-xs-6"  data-validation="required"/>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">لوجو المجموعة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="file" name="page_image" value="" class="form-control col-xs-6"  />
                        </div>
                    </div>




                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">رابط المجموعة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="page_link" <?php echo $disabled ?> value="<?php echo $out['page_link']; ?>" class="form-control col-xs-6"  data-validation="required"/>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">صفحات فرعية</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="level" class="form-control" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" >
                                <option value="">إختر </option>
                                <?php $arr_type=array("لا"=>3,"نعم"=>2);
                                foreach ($arr_type as $key=>$value){
                                    $select="";   if($out['level'] == $value){  $select='selected="selected"';}  ?>
                                    <option value="<?php echo $value?>" <?php echo $select?> >  <?php echo $key?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">إختر أيقونة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select  name="page_icon_code" class="selectpicker form-control"   data-show-subtext="true" data-live-search="true">
                                <option value=""> إختر الأيقونة  </option>
                                <option value=""><?=$out['page_icon_code']?></option>
                                <?php foreach ($font_icon as $icone):
                                    $select=""; if(isset($result_id) ){
                                    $ceck=explode("fa ",$out['page_icon_code']);
                                    if($icone->name ==$ceck[1]  ){$select='selected="selected"';}
                                } ?>
                                    <option  value="fa <?php echo $icone->name?>" <?php echo  $select?>   data-content="<i class='fa <?php echo $icone->name?>' aria-hidden='true'></i><?php echo $icone->name?>"></option>
                                <?php endforeach;?>
                            </select>


                        </div>
                    </div>

                    <?php if(isset($out['page_image']) && !empty($out['page_image']) && $out['page_image']!=null ): ?>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <img src="<?php echo base_url()."uploads/pages_images/images/".$out['page_image']?>"  style="width: 300px;height: 300px"/>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <?php echo $out['input']?>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
            <?php echo form_close()?>

            <!-------------------------------------------------------------------------------------------------------------------------->




            <?php if($pages):?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>الرابط</th>
                        <th>الترتيب</th>
                        <th>المجموعة</th>
                        <th>الايكونة</th>
                        <th> لوجو المجموعة</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 0;
                    foreach($pages as $page):
                        $x++;
                        ?>
                        <tr>
                            <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                            <td data-title="العنوان"> <?php echo $page->page_title?> </td>
                            <td data-title="الرابط"><?php echo $page->page_link?></td>
                            <td data-title="الترتيب"><?php echo $page->page_order?></td>
                            <td data-title="اسم المجموعة"><?php if(isset($pages_name[$page->group_id_fk])){echo $pages_name[$page->group_id_fk];}else{echo "غير معرف ";}?></td>
                            <td data-title="الايقونة"><i class="<?php echo $page->page_icon_code.' fa-2x'?>"></i></td>

                            <?php if(!empty($page->page_image)  && $page->page_image !="0"){
                                $image= '<img src="'.base_url().'uploads/pages_images/thumbs/'.$page->page_image.'" style="width: 100px;height: 70px">';
                            }else{ $image="لم يتم الاضافة "; }
                            ?>
                            <td><?php echo $image ?> </td>                            <td data-title="التحكم" >
                                <a href="<?php echo base_url().'Dash/UpdatePages/'.$page->page_id?>" class=" "><i class="fa fa-pencil-square-o "></i> </a>
                            <!--    <a  href="<?php echo base_url().'Dash/DeletePages/'.$page->page_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                           --> </td>
                        </tr>
                    <?php endforeach ;?>
                    </tbody>
                </table>

            <?php endif;?>
        </div>
    </div>
</div>


 </div>
</div>

