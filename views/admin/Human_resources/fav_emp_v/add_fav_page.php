
<?php    function AllRolse($results_main_in ,$user_per_in){

foreach ($results_main_in as $main_row):
    $main_checked="";  if(!empty($user_per_in)&& in_array($main_row->page_id ,$user_per_in)){ $main_checked='checked="checked"';} ?>
    <div class=" col-md-12 col-xs-12 no-padding">
        <div class="panel panel-success ">
            <div class="panel-heading" style="margin-top:-1px">
                <h3 class="panel-title">		<?php  echo  $main_row->page_title?> </h3>
            </div>
            <div class="panel-body">
                <div id="page-wrap">
                    <ul class="treeview">
                        <li>
                        <?php if($main_row->page_link!="#"){?>
                            <input type="checkbox" name="select-all[]" onchange="check_length()" value="<?php  echo  $main_row->page_id."-".$main_row->level?>" <?php  echo  $main_checked?> >
                            <?php }?>
                            <label for="tall" class="custom-unchecked"><?php echo  $main_row->page_title?> </label>
                            <?php if(!empty($main_row->sub)){?>
                                <ul>
<?php foreach ($main_row->sub as $sub_row ){
$sub_checked="";  if(!empty($user_per_in)&& in_array($sub_row->page_id ,$user_per_in)){ $sub_checked='checked="checked"';}    ?>
<li>
<?php if($sub_row->page_link!="#"){?>
<input type="checkbox" name="select-all[]" onchange="check_length()" value="<?php echo $sub_row->page_id."-".$sub_row->level?>" <?php  echo  $sub_checked?> >
<?php }?>
<label for="tall-2" class="custom-unchecked"><?php echo  $sub_row->page_title?></label>
<?php if(!empty($sub_row->sub)){ ?>
<ul>
<?php foreach ($sub_row->sub as $sub_sub_row ){
$sub_sub_checked="";  if(!empty($user_per_in)&& in_array($sub_sub_row->page_id ,$user_per_in)){ $sub_sub_checked='checked="checked"';}         ?>
<li>
<?php if($sub_sub_row->page_link!="#"){?>
<input type="checkbox"name="select-all[]" onchange="check_length()" value="<?php echo $sub_sub_row->page_id."-".$sub_sub_row->level?>" <?php  echo  $sub_sub_checked?> >
<?php }?>
<label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_sub_row->page_title?></label>
<?php if(!empty($sub_sub_row->sub)){ ?>
<ul>
<?php foreach ($sub_sub_row->sub as $sub_row_4 ){
$sub_sub_checked_4="";  if(!empty($user_per_in)&& in_array($sub_row_4->page_id ,$user_per_in)){ $sub_sub_checked_4='checked="checked"';}         ?>
<li>
<?php if($sub_row_4->page_link!="#"){?>
<input type="checkbox"name="select-all[]" onchange="check_length()" value="<?php echo $sub_row_4->page_id."-".$sub_row_4->level?>" <?php  echo  $sub_sub_checked_4?> >
<?php }?>
<label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_row_4->page_title?></label>
<?php if(isset($sub_row_4->sub)&& !empty($sub_row_4->sub)){
                                                                                           foreach($sub_row_4->sub as $sub_row_5){
                                                                                               $sub_sub_checked_5="";  if(!empty($user_per_in)&& in_array( $sub_row_5->page_id ,$user_per_in)) {
                                                                                                   $sub_sub_checked_5 = 'checked="checked"';
                                                                                               }
                                                                                               ?>
                                                                                               <ul>
                                                                                               <?php if($sub_row_5->page_link!="#"){?>                                                                                        <input type="checkbox"name="select-all[]" onchange="check_length()" value="<?php echo $sub_row_5->page_id."-".$sub_row_5->level?>" <?php  echo  $sub_sub_checked_5?> >
                                                                                                <?php }?>                                                                                   <label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_row_5->page_title?></label>



                                                                                               </ul>
                                                                                           <?php } } ?>






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
<?php endforeach;}   ?>

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
    $out['form']='human_resources/fav_emp/Fav_emp_c/add_fav_page';
    $out['user_id']=$user_data["user_id"];
    $out['DES']='disabled="disabled"';//user_permations
    $user_per=$user_permations;
    $out['hidden']=' <input type="hidden" name="user_id" value="'.$user_data['user_id'].'">';
    $out['input']='<button type="submit" id="save"  name="edit_role" value="تعديل" class="btn btn-labeled btn-success "/><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>';
else:
    $out['form']='human_resources/fav_emp/Fav_emp_c/add_fav_page';
    $out['user_id']="";
    $out['DES']='';
    $out['hidden']='';
    $user_per=array(0);
    $out['input']='<button type="submit" name="add_role" value="حفظ" id="save" class="btn class="btn btn-labeled btn-success " ><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>';
endif;?>

    <div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">إضافة الصفحات المفضلة</h3>
    </div>
    <div class="panel-body">
        <!-- open panel-body-->

        <?php echo form_open_multipart($out['form'])?>

        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
  
                        

                        <!-------------------------------------------------------------------------------------------------------------------------->
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">

                                <div class="col-xs-12">
                               
                                        <label class="label">إسم المستخدم </label>
                                 
                                    <div class="col-xs-6 ">
                                        <select name="user_id" class="form-control" <?php echo $out['DES']; ?>
                                                data-validation="required">
                                            <option value="">إختر المستخدم</option>
                                            <?php foreach ($users as $user) {

                                                if ($user->role_id_fk == 3) {
                                                    $name = $user->emp_name;
                                                } elseif ($user->role_id_fk == 2) {
                                                    $name = $user->member_name;
                                                } elseif ($user->role_id_fk == 1) {
                                                    $name = $user->user_name;
                                                } elseif ($user->role_id_fk == 4 || $user->role_id_fk == 4) {
                                                    $name = $user->member_public_name;
                                                } elseif ($user->role_id_fk == 5) {
                                                    $name = $user->user_name;
                                                }


                                                $select = "";
                                                if (isset($user_data)) {
                                                    if ($user->user_id == $out['user_id']) {
                                                        $select = 'selected="selected"';
                                                    }
                                                }
                                                if (isset($user_in)) {
                                                    if (in_array($user->user_id, $user_in)) {
                                                        continue;
                                                    }
                                                }
                                                ?>
                                                <option
                                                    value="<?php echo $user->user_id ?>" <?php echo $select ?> > <?php echo $user->user_name . '-' . $name; ?></option>
                                            <?php } ?>
                                            <?php echo $out['hidden']; ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div> 
   
                
                <br /> <br />
          
            <?php   $total =sizeof($results_main);
                      if($total % 3 == 0){
                          $count =$total /3 ;
                      }else{
                          $count=  $total /3 ;
                          $count = (int) $count;
                          $count =  $count + 1;
                      }
                     $x=1;
                    foreach ($results_main as $main_row){
                          if( $x <=  $count ){
                              $frist_array []= $main_row;
                          }elseif( $x <=  (2*$count ) ){
                              $secound_array []= $main_row;
                          }elseif( $x <=  (3*$count ) ){
                              $thred_array []= $main_row;
                          }
                        $x++;
                    } ?>
                
                <div class="col-md-12">
                    <div class="col-md-4"><?php AllRolse($frist_array,$user_per)?></div>
                    <div class="col-md-4"><?php AllRolse($secound_array,$user_per)?></div>
                    <div class="col-md-4"><?php AllRolse($thred_array,$user_per)?></div>
                </div>

                <!-------------------------------------------------------------------------------------------------------------->
                <div class="col-md-12">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <button type="submit" id="save"  name="edit_role" value="تعديل" class="btn btn-labeled btn-success "><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
                    </div>
                    <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>

                <?php echo form_close()?>




            </div>
        </div>
        <!-- close panel-body-->
    </div>
    </div>
    </div>
  
    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script>
function check_length(){
  var len=$('[name="select-all[]"]:checked').length;
  console.log(len);
  if(len >10)
  {
    swal("  برجاء اختيار 10 مفضلات فقط","", "error");
    document.getElementById("save").setAttribute("disabled", "disabled");
  }
  else{
    document.getElementById("save").removeAttribute("disabled", "disabled");
  }
}


</script>




