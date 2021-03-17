<style>
    .form-group .help-block.form-error {
        display: block !important;
        color: #a94442 !important;
        font-size: unset !important;
        position: unset !important;
    }
</style>
<?php if(isset($crm_data['visit_ended'])&&$crm_data['visit_ended']=='yes'){
?>
<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">
            <?=$title?> 
            </h3>
        </div>
        <div class="panel-body">
            <?php $arr_yes_no=array("",'نعم','لا','الى حد ما');?>
         <!-------------------------------------------------------------------------->
           
            <?php 
              $mother_num =$this->uri->segment(6);
              if($mother_num=='')
              {
                echo form_open_multipart('family_controllers/osr_crm/Osr_crm_zyraat_c/complete_zyraa_data/'.$id);
              }else{
            echo form_open_multipart('family_controllers/osr_crm/Osr_crm_zyraat_c/complete_zyraa_data/'.$id.'/'.$mother_num);
            }?>
                   <div class="col-md-12">
                   <table id="" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                   <tbody>
                <tr>
                    <th>إسم الاب</th>
                    <td style="
    width: 37%;
"> <input type="text"  value="<?php echo $basic_data_family['father_name']?>"  readonly="" class="form-control "   ></td>
                    <th>رقم السجل المدنى للأب</th>
                    <td > <input  type="text" value="<?php echo $basic_data_family['father_national_num'] ?>"  readonly="" class="form-control "  data-validation="required" ></td>
                </tr>
                <tr>
                <th>هل الام متواجدة</th>
                <td>  <select  name="is_mother_present" class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                    <option value="">إختر </option>
                    <?php  if(isset($arr_in) && !empty($arr_in) && $arr_in!= null) {
                        foreach ($arr_in as $x):
                            $selected = '';
                            if(!empty($zyraa_data['is_mother_present'])&&$zyraa_data['is_mother_present']==$x->id_setting)
                            {
                                $selected='selected';
                            }
                            ?>
                            <option value="<?php echo $x->id_setting ?>" <?php echo $selected; ?> >
                                <?php echo $x->title_setting; ?> </option>
                        <?php endforeach;
                    }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}
                    ?>
                </select></td>
                <th>إنطباع الام عن الزيارة</th>
                <td><select name="mother_impression_visit" class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                      <option value="">إختر </option>
                      <?php  if(isset($arr_op) && !empty($arr_op) && $arr_op!= null) {
                          foreach ($arr_op as $y):
                            $selected = '';
                            if(!empty($zyraa_data['mother_impression_visit'])&&$zyraa_data['mother_impression_visit']==$y->id_setting)
                            {
                                $selected='selected';
                            }
                              ?>
                              <option value="<?php echo $y->id_setting ?>" <?php echo $selected; ?> >
                                  <?php echo $y->title_setting; ?> </option>
                          <?php endforeach;
                      }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}
                      ?>
                  </select></td>
                </tr>
                <tr>
                <th> الاهتمام بنظافة المنزل</th>
                <td>  <select name="home_cleaning" class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر </option>
                        <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                        $selected='';
                          if(!empty($zyraa_data['home_cleaning'])&&$zyraa_data['home_cleaning']==$x)
                          {
                              $selected='selected';
                          }
                            ?>
                            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_yes_no[$x];?> </option>
                        <?php endfor; ?>
                    </select></td>
  <th> الاهتمام بنظافة الابناء</th>
                <td><select name="child_cleanliness" class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر </option>
                        <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                           $selected='';
                         if(!empty($zyraa_data['child_cleanliness'])&&$zyraa_data['child_cleanliness']==$x)
                         {
                             $selected='selected';
                         }
                            ?>
                            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_yes_no[$x];?> </option>
                        <?php endfor; ?>
                    </select></td>
                </tr>
                <tr>
<th> فئة الاسرة</th>
<td> <select name="family_type" class="form-control "   data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true"
      >
           <option value="">إختر </option>
          <?php  if(isset($all_cat) && !empty($all_cat) && $all_cat!= null) {
              foreach ($all_cat as $z):
                  $selected = '';
                  $disabled = 'disabled';
                  if (isset($all_cat)) {
                      if ($z->id ==   $family_new_cat[0]->category->id) {
                          $selected = 'selected';
                          $disabled ="";
                      }
                  } ?>
                  <option   value="<?php echo $z->id ?>" <?php echo $selected; ?><?php echo $disabled; ?> >
                      <?php echo $z->title; ?> </option>
              <?php endforeach;
          }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}  ?>
      </select> </td>
<th>نصيب الفرد  </th>
<?php
                if(!empty($family_new_cat[0]->all_mother_income )&&!empty($family_new_cat[0]->all_mother_masrof))
                {
           $one_have =  (($family_new_cat[0]->all_mother_income -  $family_new_cat[0]->all_mother_masrof ) / ($family_new_cat[0]->member_num + 1) );
                }else{
                   $one_have=0; 
                }
                ?>
<td> <input type="text"  value="<?php echo $one_have?>"  
                    readonly="" class="form-control "   ></td>
</tr>
<tr>
<th> مستجدات داخل الاسرة </th>
<td > <textarea class="editor2"
                              data-validation="required"
                              id="editor2" name="family_news" rows="1" style="">
                              <?php  if(!empty($zyraa_data['family_news']))
                         {
                            echo $zyraa_data['family_news'];
                         }?></textarea>
                               </td>
<th>مرئيات الباحث </th>
<td > <textarea class="editor1"
                              data-validation="required"
                              id="editor1" name="rai_baheth" rows="1" style=""> <?php  if(!empty($zyraa_data['rai_baheth']))
                         {
                            echo $zyraa_data['rai_baheth'];
                         }?></textarea> </td>
</tr>
  <tr>
  <th>توصيات الباحث</th>
  <td>    
    <select name="tawsyat_bahth" id="tawsyat_bahth" 
            class="form-control "    data-validation="required"  
           onchange="get_select()"
             >
        <option value="">إختر</option>
        <?php 
        $tawsyat_bahth_arr	=array('continue_service'=>'إستمرار تقديم المساعدة',
        'chnage_to_f2a'=>' تحويل الاسرة الي فئة',
    'fired_osra'=>' استثناء الاسرة من خدمات الجمعية',
    'fired_afrard'=>'استثناء عدد من أفراد الاسرة',
);
        foreach ($tawsyat_bahth_arr	 as $key=>$value){
            $selected="";
            if(!empty($zyraa_data['tawsyat_bahth'])&&$zyraa_data['tawsyat_bahth']==$key)
                         {
                             $selected='selected';
                         }
           ?>
            <option value="<?=$key?>" <?=$selected?>><?=$value?></option>
            <?php } ?>
    </select>
  </td>
<?php
 if(!empty($zyraa_data['tawsyat_bahth'])&&($zyraa_data['tawsyat_bahth']=='chnage_to_f2a'))
 {
?>
  <th ><span id="label_name">الفئة</span></th>
  <td>
  <select name="new_f2a" id="new_f2a"  class="form-control "   
  data-validation="required" 
           data-validation-depends-on="tawsyat_bahth"
           data-validation-depends-on-value="chnage_to_f2a"
  aria-required="true" tabindex="-1" aria-hidden="true"
      >
           <option value=" ">إختر </option>
          <?php  if(isset($all_cat) && !empty($all_cat) && $all_cat!= null) {
              foreach ($all_cat as $z):
                  $selected = '';
                  if(!empty($zyraa_data['new_f2a'])&&$zyraa_data['new_f2a']==$z->id )
                  {
                      $selected='selected';
                  }
                  ?>
                  <option <?=$selected?>  value="<?php echo $z->id ?>" >
                      <?php echo $z->title; ?> </option>
              <?php endforeach;
          }?>
      </select>
      <div id="fired_afrard_jq">
      <select id="fired_afrard"  name="fired_afrard[]" 
      multiple title="يمكنك إختيار أكثر من فرد"
        class="form-control "  data-show-subtext="true" data-live-search="true"
      data-validation="required"
           data-validation-depends-on="tawsyat_bahth"
           style="display:none;"
           data-validation-depends-on-value="fired_afrard"
  aria-required="true" tabindex="-1" aria-hidden="true"
      >
 <?php
      if(isset($mother )  && !empty($mother) &&  $mother !=null){
        foreach ($mother as $mother_row){
            ?>
        <option value="<?=$mother_row->full_name?>">
        <?=$mother_row->full_name?>
        </option>
        <?php }?>
 <?php }?>
 <?php
 if(isset($member )  && !empty($member) &&  $member !=null){
     foreach ($member as $member_row){
 ?>
     <option value="<?=$member_row->member_full_name?>">
     <?=$member_row->member_full_name?>
     </option>
     <?php }?>
 <?php }?>
 </select>
 </div>
      </td>
      <?php }else if(!empty($zyraa_data['tawsyat_bahth'])&&($zyraa_data['tawsyat_bahth']=='fired_afrard'))
      {?>
        <th ><span id="label_name">افراد الاسرة
        </span></th>
        <td>
<div id="fired_afrard_jq">
      <select id="fired_afrard"  name="fired_afrard[]" 
      multiple title="يمكنك إختيار أكثر من فرد"
        class="form-control selectpicker"  data-show-subtext="true" data-live-search="true"
      data-validation="required"
           data-validation-depends-on="tawsyat_bahth"
           data-validation-depends-on-value="fired_afrard"
  aria-required="true" tabindex="-1" aria-hidden="true"
      >
 <?php
      if(isset($mother )  && !empty($mother) &&  $mother !=null){
        foreach ($mother as $mother_row){
            $selected = '';
            if(!empty($zyraa_data['fired_afrard']))
    {
         $fired_afrard = unserialize($zyraa_data['fired_afrard']);
         if (in_array($mother_row->full_name, $fired_afrard)) {
            $selected='selected';
        }    }
            ?>
        <option value="<?=$mother_row->full_name?>" <?=$selected?>>
        <?=$mother_row->full_name?>
        </option>
        <?php }?>
 <?php }?>
 <?php
 if(isset($member )  && !empty($member) &&  $member !=null){
     foreach ($member as $member_row){
        $selected = '';
    if(!empty($zyraa_data['fired_afrard']))
    {
        $fired_afrard = unserialize($zyraa_data['fired_afrard']);
        if (in_array($member_row->member_full_name, $fired_afrard)) {
           $selected='selected';
   }
    }
 ?>
     <option <?=$selected?> value="<?=$member_row->member_full_name?>">
     <?=$member_row->member_full_name?>
     </option>
     <?php }?>
 <?php }?>
 </select>
 </div>
 <select name="new_f2a" id="new_f2a"  class="form-control "   
  data-validation="required" 
           data-validation-depends-on="tawsyat_bahth"
           data-validation-depends-on-value="chnage_to_f2a"
  aria-required="true" tabindex="-1" aria-hidden="true"
  style="display:none;"
      >
           <option value=" ">إختر </option>
          <?php  if(isset($all_cat) && !empty($all_cat) && $all_cat!= null) {
              foreach ($all_cat as $z):
                  $selected = '';
                  ?>
                  <option   value="<?php echo $z->id ?>" >
                      <?php echo $z->title; ?> </option>
              <?php endforeach;
          }?>
      </select>
 </td>
 <?php }else{?>
    <th ><span id="label_name"></span></th>
  <td>
  <select name="new_f2a" id="new_f2a"  class="form-control "   
  data-validation="required" 
           data-validation-depends-on="tawsyat_bahth"
           data-validation-depends-on-value="chnage_to_f2a"
  aria-required="true" tabindex="-1" aria-hidden="true"
  style="display:none;"
      >
           <option value=" ">إختر </option>
          <?php  if(isset($all_cat) && !empty($all_cat) && $all_cat!= null) {
              foreach ($all_cat as $z):
                  $selected = '';
                  ?>
                  <option   value="<?php echo $z->id ?>" >
                      <?php echo $z->title; ?> </option>
              <?php endforeach;
          }?>
      </select>
<div id="fired_afrard_jq">
      <select id="fired_afrard"  name="fired_afrard[]" 
      multiple title="يمكنك إختيار أكثر من فرد"
        class="form-control "  data-show-subtext="true" data-live-search="true"
      data-validation="required"
           data-validation-depends-on="tawsyat_bahth"
           style="display:none;"
           data-validation-depends-on-value="fired_afrard"
  aria-required="true" tabindex="-1" aria-hidden="true"
      >
 <?php
      if(isset($mother )  && !empty($mother) &&  $mother !=null){
        foreach ($mother as $mother_row){
            ?>
        <option value="<?=$mother_row->full_name?>">
        <?=$mother_row->full_name?>
        </option>
        <?php }?>
 <?php }?>
 <?php
 if(isset($member )  && !empty($member) &&  $member !=null){
     foreach ($member as $member_row){
 ?>
     <option value="<?=$member_row->member_full_name?>">
     <?=$member_row->member_full_name?>
     </option>
     <?php }?>
 <?php }?>
 </select>
 </div>
   </td>
 <?php }?>
  </tr>        
</tbody>
<tfoot>
                    <tr >
                        <th class="text-center">
                        </th>
                        <td colspan="3">   <button type="submit" class="btn btn-danger" name="add" value="add"
                id="save"
                style="
    float: left;
"
<?php if($crm_data['visit_start']=='no'){?>
                disabled="disabled"
                <?php }?>
                >
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>  إستكمال بيانات الزيارة  </button></td>
                    </tr>
                    </tfoot>
                </table>
                </div>
            <div class="form-group col-sm-12" >
            </div>
            <?php echo form_close()?>
         <!-------------------------------------------------------------------------->
        </div>
    </div>
</div>
<?php
}else{
?>
  <div class="alert alert-danger"> <strong> لا  يمكنك استكمال  بيانات إلا بعد انتهاء  الزيارة !</strong> .
<?php }?>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor1');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
       // ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor2');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        [ 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        // ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>
<!-- start_time_zyraa -->
<script>
    function get_select() {
        var tawsyat_bahth=$('#tawsyat_bahth').val();
        console.log(tawsyat_bahth);
        if(tawsyat_bahth=='chnage_to_f2a')
        {
            $('#label_name').html('الفئة');
            $("#new_f2a").show();
            $('#fired_afrard').removeClass("selectpicker");
            $("#fired_afrard_jq").hide();
        }
        else if(tawsyat_bahth=='fired_afrard'){
            $('#label_name').html('افراد الاسرة');
            $("#fired_afrard_jq").show();
            $('#fired_afrard').addClass("selectpicker");
            $('#fired_afrard').selectpicker("refresh");
            $("#new_f2a").hide();
        }
        else{
            $('#label_name').html('');
            $('#fired_afrard').removeClass("selectpicker");
            $("#fired_afrard_jq").hide();
            $("#new_f2a").hide();
        }
    }
</script>
<!-- get_select -->