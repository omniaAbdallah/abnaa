<?php  $this->load->view('admin/requires/header');
    $this->load->view('admin/requires/sidebar'); ?>


<style>
    ul {
        list-style: none;
        padding-right: 20px;
    }

    .treeview li>input {
        height: 16px;
        width: 16px;
    }

</style>

<?php if(isset($user_data)):
    $out['form']='Dash/UpdateCreateRole/'.$user_data['user_id'];
    $out['user_id']=$user_data["user_id"];
    $out['DES']='disabled="disabled"';//user_permations
    $user_per=$user_permations;
    $out['hidden']=' <input type="hidden" name="user_id" value="'.$user_data['user_id'].'">';
    $out['input']='<input type="submit" name="edit_role" value="تعديل" class="btn center-block" />';
else:
    $out['form']='Dash/CreateRole';
    $out['user_id']="";
    $out['DES']='';
    $out['hidden']='';
    $user_per=array(0);
    $out['input']='<input type="submit" name="add_role" value="حفظ" class="btn center-block" />';
endif;?>
 <?php   $this->load->view('admin/requires/tob_menu');?>
<div class="col-sm-11 col-xs-12">
 
   
    

    <?php echo form_open_multipart($out['form'])?>
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <!-------------------------------------------------------------------------------------------------------------------------->
            <div class="col-md-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">إسم المستخدم </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="user_id" class="form-control"  <?php echo $out['DES'];?> required="required" >
                              <option> اختر المستخدم </option>
                                <?php foreach ($users as $user) {
                                    $select="";   if(isset($user_data)){
                                        if($user->user_id ==  $out['user_id'] ){$select='selected="selected"';}
                                    }
                                    if(isset($user_in)){
                                        if(in_array( $user->user_id,$user_in )) {continue;}
                                    }
                                    ?>
                                    <option value="<?php echo $user->user_id?>"  <?php echo $select?>  > <?php echo $user->user_username?></option>
                                <?php }?>
                                <?php  echo $out['hidden'];?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php    foreach ($results_main as $main_row):
                    $main_checked="";  if(in_array($main_row->page_id ,$user_per)){ $main_checked='checked="checked"';}
                    ?>
                    <div class=" col-md-4">
                        <div class="panel panel-success ">
                            <div class="panel-heading" style="margin-top:-1px">
                                <h3 class="panel-title">		<?php  echo  $main_row->page_title?> </h3>
                            </div>
                            <div class="panel-body">
                                <div id="page-wrap">
                                    <ul class="treeview">
                                        <li>
                                            <input type="checkbox" name="select-all[]" value="<?php  echo  $main_row->page_id."-".$main_row->level?>" <?php  echo  $main_checked?> >
                                            <label for="tall" class="custom-unchecked"><?php echo  $main_row->page_title?> </label>
                                            <?php if(sizeof($main_row->sub) >0){?>
                                                <ul>
                                                    <?php foreach ($main_row->sub as $sub_row ){
                                                        $sub_checked="";  if(in_array($sub_row->page_id ,$user_per)){ $sub_checked='checked="checked"';}    ?>
                                                        <li>
                                                            <input type="checkbox" name="select-all[]" value="<?php echo $sub_row->page_id."-".$sub_row->level?>" <?php  echo  $sub_checked?> >
                                                            <label for="tall-2" class="custom-unchecked"><?php echo  $sub_row->page_title?></label>
                                                            <?php if(sizeof($sub_row->sub) >0){ ?>
                                                                <ul>
                                                                    <?php foreach ($sub_row->sub as $sub_sub_row ){
                                                                        $sub_sub_checked="";  if(in_array($sub_sub_row->page_id ,$user_per)){ $sub_sub_checked='checked="checked"';}         ?>
                                                                        <li>
                                                                            <input type="checkbox"name="select-all[]" value="<?php echo $sub_sub_row->page_id."-".$sub_sub_row->level?>" <?php  echo  $sub_sub_checked?> >
                                                                            <label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_sub_row->page_title?></label>
                                                                            <?php if(sizeof($sub_sub_row->sub) >0){ ?>
                                                                <ul>
                                                                    <?php foreach ($sub_sub_row->sub as $sub_row_4 ){
                                                                        $sub_sub_checked_4="";  if(in_array($sub_row_4->page_id ,$user_per)){ $sub_sub_checked_4='checked="checked"';}         ?>
                                                                        <li>
                                                                            <input type="checkbox"name="select-all[]" value="<?php echo $sub_row_4->page_id."-".$sub_row_4->level?>" <?php  echo  $sub_sub_checked_4?> >
                                                                            <label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_row_4->page_title?></label>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?> 
                                                                     
                                                                            
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <!-------------------------------------------------------------------------------------------------------------->
            <div class="col-md-12">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <?php echo $out['input']?>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>

            <?php echo form_close()?>


            <?php if(isset($per_table) && !empty($per_table)):?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th width="2%">#</th>
                        <th width="50%" class="text-right">المستخدم</th>
                        <th width="20%" class="text-right">التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; foreach($per_table as $role):?>
                        <tr>
                            <td data-title="#"><span class="badge"><?php echo $count++?></span></td>
                            <td data-title="العنوان"> <?php if(isset($user_name[$role->user_id])){echo $user_name[$role->user_id];}else{'غير معرف';} ?> </td>
                            <td data-title="التحكم" class="text-center">
                                <a href="<?php echo base_url().'Dash/UpdateCreateRole/'.$role->user_id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                                <a  href="<?php echo base_url().'Dash/DeleteCreateRole/'.$role->user_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                            </td>
                        </tr>
                    <?php endforeach ;?>
                    </tbody>
                </table>
            <?php endif;?>


        </div>
    </div>
</div>




<?php $this->load->view('admin/users/roles_footer'); ?>