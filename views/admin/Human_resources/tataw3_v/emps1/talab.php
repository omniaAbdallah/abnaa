<style>
    .half_d {
        width: 30% !important;
        float: right !important;
    }

    .half_dd {
        width: 70% !important;
        float: right !important;
    }
</style>
<?php if($_SESSION['role_id_fk']==3)
{
    ?>

<?php
if (isset($result) && !empty($result)) {
    $rkm_talb=$result->rkm_talb;
    $date_talab=$result->date_talab;
    $edara_id=$result->edara_id;
    $mokdm_talab=$result->mokdm_talab;
    $moshrf_name=$result->moshrf_name;
    $moshrf_jwal=$result->moshrf_jwal;
    $volunteer_description=$result->volunteer_description;
    $volunteer_description_id_fk=$result->volunteer_description_id_fk;
    $magal_tatw3=$result->magal_tatw3;
    $forsa_name = $result->forsa_name; 
    $wasf = $result->wasf;
    $makan = $result->makan;
    $from_date=$result->from_date;
    $to_date= $result->to_date;
    $moda=$result->moda;
    $from_time=$result->from_time;
    $to_time=$result->to_time;
  //  $num_hours=$result->num_hours;
    $tataw3_hours =$result->tataw3_hours;
    $gender =$result->gender;
    $num_motakdm=$result->num_motakdm;
    $activities=$result->activities;
    $shroot = $result->shroot;
    $outcome=$result->outcome;
    



}else{


    $rkm_talb=$last_rkm;
    $date_talab=date('Y-m-d');
    $edara_id=$emp_data->administration;
$mokdm_talab=$emp_data->employee;
$moshrf_name='';
$moshrf_jwal='';
$volunteer_description='';
$volunteer_description_id_fk='';
$magal_tatw3='';

        $forsa_name = ''; 
        $wasf = '';
        $makan = '';
        $from_date=date("Y-m-d");
        $to_date= date("Y-m-d");
        $moda=1;
        $from_time=date('H:i:s a');
        $to_time=date('H:i:s a');
    //    $num_hours=0;

        $tataw3_hours =0;
        $gender = '';
        $num_motakdm='';
        $activities='';
        $shroot = '';
        $outcome='';
     
      
} ?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"><?php echo $title; ?></h3>

 <div class="panel-body">
 <?php
            if (isset($result) && !empty($result)){ ?>
            <form action="<?php echo base_url(); ?>human_resources/tataw3/Emptatw3/edit_talab/<?php echo $this->uri->segment(5); ?>"
                  method="post">
                <?php } else{ ?>
                <form action="<?php echo base_url(); ?>human_resources/tataw3/Emptatw3/add_talab"
                      method="post">
                    <?php } ?>
     <div class="col-sm-12 no-padding ">
     

    <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
        <label class="label">—ﬁ„ «·ÿ·» </label>
        <input type="number"  class="form-control" readonly="readonly" value="<?=$rkm_talb?>" />
        <input type="hidden" name="rkm_talab" value="<?=$rkm_talb?>" />
    </div>     
 
  <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label"> «—ÌŒ «·ÿ·» </label>
    <input type="date" name="date_talab"value="<?=$date_talab?>"class="form-control"   />
  </div>     
 
 


    <div class="col-md-3  managment-div-select form-group padding-4">
                            <label class="label ">«·≈œ«—…</label>
    <select name="edara_id" id="edara_id" data-validation="required"
            class="form-control "
            onchange="get_responsible();get_mgalat();" readonly
            data-show-subtext="true" data-live-search="true"
            data-validation="required" aria-required="true">
        <option value="">≈Œ —</option>
        <?php
        if (!empty($admin)):
            foreach ($admin as $record):
                $select = '';
        if ($edara_id == $record->id) {
            $select = 'selected';
        }
                ?>
                <option
                <?= $select ?>
                    value="<? echo $record->id; ?>" ><? echo $record->title; ?></option>
                <?php
            endforeach;
        endif;
        ?>
    </select>

    </div>
 
 
 
  <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
    <label class="label">„ﬁœ„ «·ÿ·» </label>
    <input type="text" name="mokdm_talab" value="<?=$mokdm_talab?>"class="form-control"  data-validation="required" readonly />
 </div>     
     
     
  <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                    <label class="label">«”„ «·„‘—› </label>
                    <!-- <input type="text" name="moshrf_name"
                           value="<?= $moshrf_name?>"
                           class="form-control  "  data-validation="required"> -->
                           <select name="moshrf_name" id="responsible_load"
                                            class="form-control  "
                                        onchange="get_ms2ol_data()"
                                            data-validation="required" aria-required="true">
                                        <option value="">≈Œ —</option>
                                        <?php
                                        if (!empty($responsibles)):
                                            foreach ($responsibles as $record):
                                                $select = '';
                                                if ($moshrf_name == $record->employee) {
                                                    $select = 'selected';
                                                } ?>
                                                <option
                                                        value="<?php echo $record->employee; ?>" <?= $select ?>>
                                                    <?php echo $record->employee; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>

  </div>

 </div>
<div class="col-sm-12 no-padding ">

      
        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label class="label"> —ﬁ„ ÃÊ«· «·„‘—› </label>
                    <input type="text" name="moshrf_jwal" id="moshrf_jwal" onkeypress="validate_number(event)"
                    readonly data-validation="required"
                           value="<?= $moshrf_jwal?>"
                           onkeyup="check_length_num(this,'10','jwal_span');"
                           maxlength="10"
                           class="form-control "  data-validation="required">
                    <span id="jwal_span" style="bottom: -20px;font-size: 14px;" class="span-validation"> </span>

        </div>

  
<div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
<label class=" label kafel"> ÿ»Ì⁄… «·⁄„· «· ÿÊ⁄Ì </label>
<input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk="" data-title_n="" data-fe2a_type="">
<input type="text" class="form-control  "
           name="volunteer_description" id="volunteer_description"
           readonly="readonly"
           onclick="change_type_setting(1102,'ÿ»Ì⁄… «·⁄„· «· ÿÊ⁄Ì ','volunteer_description_id_fk','volunteer_description');load_settigs();"
           style="cursor:pointer;border: white;color: black;width:88%;float: right;"
           data-validation="required"
           value="<?=$volunteer_description?>">

	<input type="hidden" name="volunteer_description_id_fk" id="volunteer_description_id_fk" value="<?=$volunteer_description_id_fk?>">
		<button type="button"
            onclick="change_type_setting(1102,'ÿ»Ì⁄… «·⁄„· «· ÿÊ⁄Ì ','volunteer_description_id_fk','volunteer_description');load_settigs();"
            class="btn btn-success btn-next">
			<i class="fa fa-plus"></i>
		</button>
	</div>
  
<div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
    <label class="label ">„Ã«· «·⁄„· «· ÿÊ⁄Ì 
    </label>                       
        <select name="magal_tatw3"   data-validation="required"
        class="form-control  " id="magal_tatw3"
        data-show-subtext="false" data-live-search="false"
        aria-required="true">
            <option value="">≈Œ —</option>
            <?php
                                        if (!empty($magalat)):
                                            foreach ($magalat as $record):
                                                $select = '';
                                                if ($magal_tatw3 == $record->id) {
                                                    $select = 'selected';
                                                } ?>
                                                <option
                                                        value="<?php echo $record->id; ?>" <?= $select ?>>
                                                    <?php echo $record->emp_magal_name; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
        </select>
</div>
  
  
   <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                    <label class="label">  «”„ «·›—’… «· ÿÊ⁄Ì…  </label>
                    <input type="text" name="forsa_name" id="forsa_name"
                           value="<?= $forsa_name?>"
                           oninput="set_abbr(this.value)"
                           class="form-control  "  data-validation="required">

                </div>

   
</div>

<div class="col-sm-12 no-padding ">
<div class="form-group col-md-9 col-sm-6 col-xs-6 padding-4">
                    <label class="label">    Ê’› «·›—’… «· ÿÊ⁄Ì…   </label>
                    <input type="text" name="wasf"
                           value="<?= $wasf?>"
                           data-validation="required"
                           class="form-control  " >

                </div>

<div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                    <label class="label">     «·„ﬂ«‰    </label>
                    <input type="text" name="makan"
                           value="<?= $makan?>"
                           class="form-control  " >

                </div>


             




</div>

<div class="col-sm-12 no-padding ">

  <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label">»œ«Ì… «·›—’… </label>
    <input type="date" name="from_date" id="from_date" value="<?=$from_date?>"class="form-control" onchange=' get_date();'  />
  </div>     
 
 
   <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label">‰Â«Ì… «·›—’…  </label>
    <input type="date" name="to_date"  id="to_date" value="<?=$to_date?>"class="form-control" onchange=' get_date();'  />
  </div>     
 

   <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
    <label class="label">«·„œ… </label>
    <input type="number" name="moda" id="num_days" value="<?=$moda?>" class="form-control" readonly="readonly"  />
  </div>  
<div class="col-md-1 form-group padding-4">
            <label class="label ">„‰ «·”«⁄… </label>
            <input type="time" class="form-control" data-validation="required"
                               name="from_time" id="from_time"
                               onchange="get_time();"
                               value="<?=$from_time?>" >
        </div>

        <div class="col-md-1 form-group padding-4">
            <label class="label ">≈·Ï «·”«⁄… </label>
            <input type="time" data-validation="required" name="to_time" id="to_time"
                               class="form-control"
                               onchange="get_time();"
                               value="<?=$to_time?>" >
        </div>
 <div class="col-md-1 form-group padding-4">
                            <label class="label ">⁄œœ ”«⁄«  «· ÿÊ⁄ </label>
                            <input type="number" class="form-control" value="<?=$tataw3_hours?>"
                                               name="tataw3_hours" id="num_hours" readonly="readonly" >
   </div>

 <div class="col-md-2 form-group padding-4">
                            <label class="label ">«·Ã‰” </label>

         <select class="form-control" name="gender"   style="" >
                        <option value="">«Œ —</option>
                        
                        <?php
                          $genders = array('1'=>'‰”«¡ ›ﬁÿ','2'=>'—Ã«· ›ﬁÿ','3'=>'‰”«¡ Ê—Ã«·');
                            foreach ($genders as $key=>$value){
                                ?>
                                <option value="<?= $key?>"
                                    <?php
                                    if ($gender==$key){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $value?></option>
                                <?php
                            }
                        ?>
                    </select>
       </div>

 <div class="col-md-1 form-group padding-4">
                            <label class="label ">«·⁄œœ «·„” Âœ› </label>
                            <input type="text" class="form-control" value="<?=$num_motakdm?>"
                                               name="num_motakdm" id="num_motakdm" >
   </div>


        </div>
        
<div class="col-sm-12 no-padding ">



 <div class="col-md-4 form-group padding-4">
            <label class="label ">«·√‰‘ÿ… - «·„Â«„ </label>
            <textarea data-validation="required" name="activities"
            class="editor2" id="editor2"><?=$activities?></textarea>
</div>

 <div class="col-md-4 form-group padding-4">
            <label class="label ">‘—Êÿ «·›—’…  </label>
            <textarea data-validation="required" name="shroot"
            class="editor3" id="editor3"><?=$shroot?></textarea>
</div>

 <div class="col-md-4 form-group padding-4">
            <label class="label ">«·⁄«∆œ </label>
            <textarea data-validation="required" name="outcome"
            class="editor4" id="editor4"><?=$outcome?></textarea>
</div>


</div>        
        
        
        
        </div>

        <div class="col-xs-12 text-center" style="margin-top: 0px">
                        <input type="hidden" name="add" value="add">
                        <button type="submit"
                                class="btn btn-labeled btn-success " id="save" name="add" value="Õ›Ÿ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>Õ›Ÿ
                        </button>
                       
                        <span style="color: red" id="span_id"></span><br>

                    </div>
                </form>
        </div>
    </div>


</div>
<?php
if (isset($records) && !empty($records)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">   ÿ·»«  «Õ Ì«Ã ›—’…  ÿÊ⁄Ì…</h3>
            </div>
            <div class="panel-body">

                <!-----------------------------------------table------------------------------------->

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                        <th>„</th>
                        <th>—ﬁ„ «·ÿ·»</th>
                        <th> «—ÌŒ «·ÿ·»</th>
                        <th>«·≈œ«—…</th>
                        <th>„ﬁœ„ «·ÿ·»</th>
                        <th> «”„ «·›—’… «· ÿÊ⁄Ì…</th>
                        <th>«·⁄œœ «·„” Âœ›</th>
                        <th> «·«Ã—«¡</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    <?php $mostafed_type_arr = array(0 => 'œ«Œ·Ï', 1 => 'Œ«—ÃÏ'); ?>

                    <?php
                    $x = 1;
                    foreach ($records as $row) {

                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edit_talab(' . $row->id . ')';
                            $link_delete = 1;
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/tataw3/Emptatw3/edit_talab/' . $row->id . '";';
                            $link_delete = 0;
                        }

                        
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->rkm_talb; ?></td>
                            <td><?php echo $row->date_talab; ?></td>
                            <td>
                             <?php
                             if (!empty($admin)):
                                 foreach ($admin as $record):
                                 
                             if ($row->edara_id == $record->id) {
                               echo $record->title;
                             }
                            endforeach;
                        endif;
                                     ?>
                                    
                                     
                            
                            
                            </td>
                            <td><?php echo $row->mokdm_talab; ?></td>
                            <td><?php echo $row->forsa_name; ?></td>
                            <td><?php echo $row->num_motakdm; ?></td>
                            <td>
                            <div id="publish_res<?= $row->id ?>">
                            </div>
                            <?php if($row->publish_tataw3!=1 && $_SESSION['emp_code']==$moder_tatow->emp_id_fk && $row->close_publish_tataw3==0)
                                    {?>   <a  
                                    class="btn btn-labeled btn-warning "
                                    id="publish<?= $row->id ?>"
                                   style="padding:1px 5px;" onclick="publish(<?= $row->id ?>);">
                                    <i class=" "  aria-hidden="true"></i>‰‘— «· ÿÊ⁄ </a>
                                    <?php }?>
                            <div class="btn-group">
<button type="button" class="btn btn-primary">≈Ã—«¡« </button>
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <span class="caret"></span>
 <span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li>   <a data-toggle="modal" data-target="#details_Modal" 
                                   style="padding:1px 5px;" onclick="load_page(<?= $row->id ?>);">
                                    <i class="fa fa-list "  aria-hidden="true"></i> ›«’Ì· </a></li>

                               
<li>  <a onclick='swal({
                                        title: "Â· «‰  „ √ﬂœ „‰ «· ⁄œÌ· ø",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-warning",
                                        confirmButtonText: " ⁄œÌ·",
                                        cancelButtonText: "≈·€«¡",
                                        closeOnConfirm: true
                                        },
                                        function(){
                                <?= $link_update ?>
                                        });'><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>  ⁄œÌ·</a></li>
     
                                        <li>  <a onclick='swal({
                                        title: "Â· «‰  „ √ﬂœ „‰ «·Õ–› ø",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Õ–›",
                                        cancelButtonText: "≈·€«¡",
                                        closeOnConfirm: true
                                        },
                                        function(){
                                        swal(" „ «·Õ–›!", "", "success");
                                        window.location="<?php echo base_url(); ?>human_resources/tataw3/Emptatw3/delete_talab/<?php echo $row->id . '/' . $link_delete; ?>";
                                        });'><i class="fa fa-trash"
                                                aria-hidden="true"></i>Õ–› </a></li>
                                           
                                                        </ul>
                         </div> 


                             


                               

                               
                            </td>
                         
                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>
                </table>


                <!--------------------------------------------table---------------------------------->


            </div>
        </div>

    </div>


<?php } ?>

<!-- details_Modal -->

<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">«· ›«’Ì· </h4>
            </div>
            <div class="modal-body" id="result_page">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

               

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>≈€·«ﬁ
                </button>

            </div>

        </div>
    </div>
</div>


<!-- yara -->
<!-- settingModal  -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title_setting ">  </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid"  id="">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success " onclick="$('#add_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>≈÷«›…
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="add_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label title_setting  "> </label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">
                                    <input type="hidden" name="row_setting_id" id="row_setting_id" value="">
                                    <span class="add_title" style="color: red; display: none;">Â–« «·Õﬁ· „ÿ·Ê»</span>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" >
                                    <button type="button" onclick="add_setting($('#add_title').val(),'add_title','output'); " style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>Õ›Ÿ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="setting_output">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">≈€·«ﬁ</button>
            </div>
        </div>
    </div>
</div>
<?php }else{
    ?>
<div class="alert alert-danger">    ‰Ÿ—« ·«‰ﬂ ·Ì” „ÊŸ›.. ·« Ì„ﬂ‰ﬂ ≈ﬁ«„…  ÿ·» «Õ Ì«Ã ›—’…  ÿÊ⁄Ì… </div>
<?php
}?>
<!-- settingModal  -->
<script>
    function change_type_setting(id, title, title_fk, title_n) {
    
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
      
    }
</script>
<script>
    function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
      
        if (value != 0 && value != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/employee_forms/Volunteer_hours/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                    load_settigs();
                }
            });
        }
        
        else {
            swal({
                title: '„‰ ›÷·ﬂ  √ﬂœ „‰ «·ÕﬁÊ· «·‰«ﬁ’Â !',
                type: 'warning',
                confirmButtonText: ' „'
            });
        }
    }
</script>
<script>
    function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
  

      
        
        
             $('#settingModal').modal('show');
             $.ajax({
                 type: 'post',
                 url: '<?php echo base_url()?>human_resources/employee_forms/Volunteer_hours/load_settigs',
                 data: {type: type, type_name: type_name},
                 dataType: 'html',
                 cache: false,
                 beforeSend: function () {
                     $('#setting_output').html(
                         '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                     );
                 },
                 success: function (html) {
                     $('#setting_output').html(html);
                 }
             });
         
       
        
     
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').modal('hide');
    }
</script>

<!-- yara25-10-2020 -->
<script>
        function get_time() {
            var start = $('#from_time').val();
            var end = $('#to_time').val();
            //  alert(start);
            //  return;
            if (start != '' && end != '') {
                s = start.split(':');
                e = end.split(':');
                var ss = s[s.length - 1].split(' ');
                var ee = e[e.length - 1].split(' ');
                if (ss[ss.length - 1] === 'PM') {
                    if (parseInt(s[0]) === 12) {
                    } else {
                        s[0] = parseInt(s[0]) + 12;
                    }
                }
                if (ee[ee.length - 1] === 'PM') {
                    if (parseInt(e[0]) === 12) {
                    } else {
                        e[0] = parseInt(e[0]) + 12;
                    }
                }
                min = parseInt(e[1]) - parseInt(s[1]);
                console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
                hour_carry = 0;
                if (min < 0) {
                    min += 60;
                    hour_carry += 1;
                }
                console.log('min :' + min);
                hour = e[0] - s[0] - hour_carry;
                diff = hour + "." + min;
                console.log('min :' + min + " hours :" + hour + " diff :" + diff);
                diff_munites = (diff* 60);
                $('#num_hours').val(diff_munites);
                if (diff_munites <= 0) {
                    $('#num_hours').val(0);
                    document.getElementById("save").disabled = true;
                    document.getElementById("span_id").style.display = 'block';
                    document.getElementById("span_id").innerText = '„‰ ›÷·ﬂ «œŒ· › —… “„‰Ì… ’ÕÌÕ…';
                } else {
                    document.getElementById("save").disabled = false;
                    document.getElementById("span_id").style.display = 'none';
                  
                }
            }
        }
    </script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>

<script type="text/javascript">
    CKEDITOR.replace('editor2');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>


<script type="text/javascript">
    CKEDITOR.replace('editor3');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>

<script type="text/javascript">
    CKEDITOR.replace('editor4');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>

<script>
    function get_ms2ol_data() {
        var id=$('#responsible_load').val();
      

        $.ajax({
            url: "<?php echo base_url() ?>human_resources/tataw3/Emptatw3/get_ms2ol_data",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.mosma_wazefy_n);
               console.log(obj.phone);
               console.log(obj.another_phone);
               console.log(obj.email);
               

               // $('#job').val(obj.mosma_wazefy_n);
               // $('#tele').val(obj.moshrf_jwal);
                $('#moshrf_jwal').val(obj.phone);
              //  $('#email').val(obj.email);


            }

        });
    }
    </script>
    <!-- get_responsible -->
    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <?php
if (empty($result)) {
    ?>
<script>
 $(document).ready(function () {
    get_responsible();
    get_mgalat();
});
</script>
<?php }?>
<script>
    function get_responsible() {
        
       var row_id=$('#edara_id').val();
       console.log(row_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_responsible",
            data: {row_id: row_id},
            success: function (d) {
                $('#responsible_load').html(d);

            }

        });

    }
</script>
<!-- get_mgalat -->
<script>
    function get_mgalat() {
        
       var row_id=$('#edara_id').val();
       console.log(row_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_mgalat",
            data: {row_id: row_id},
            success: function (d) {
                $('#magal_tatw3').html(d);

            }

        });

    }
</script>
<script type="text/javascript">
            Date.prototype.addDays = function (days) {
                var date = new Date(this.valueOf());
                time1 = Math.abs(date.getTime());
                time2 = 1000 * 3600 * 24 * days;
                total = time1 + time2;
                date = new Date(total);
                return date;
            }
        </script>
<script>
            function get_date() {
                if ($('#to_date').val() == '' || $('#from_date').val() == '') {
                    return 1;
                }
                var a = new Date($('#to_date').val());
                var x = new Date($('#from_date').val());
                diffDays = '';
                if (a >= x) {
                    var timeDiff = Math.abs(a.getTime() - x.getTime());
                    diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                    var date = new Date(document.getElementById("to_date").value);
                    day = date.addDays(1).getDate();
                    month = date.addDays(1).getMonth() + 1;
                    year = date.addDays(1).getFullYear();
               
                    console.log("date :: " + ("0" + day).slice(-2) + '-' + ("0" + month).slice(-2) + '-' + year);
           
                    document.getElementById("num_days").value = diffDays + 1;
                    return diffDays + 1;
                } else {
                    swal({
                        title: '·« ÌÃ» √‰ Ì”»ﬁ  «—ÌŒ ‰Â«Ì…   «—ÌŒ »œ«Ì Â!',
                        type: 'warning',
                        confirmButtonText: ' „'
                    });
                    document.getElementById("to_date").value = '';
                
                    document.getElementById("num_days").value = '';
              
                    document.getElementById("num_days").value = diffDays;
                 
                    return diffDays;
                }
            }
        </script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#result_page').html(d);

            }

        });

    }
</script>

<script>
    function publish(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/publish",
            data: {id: row_id},
            success: function (d) {
                swal({
                        title: ' „!',
                        type: 'success',
                        confirmButtonText: ' „'
                    });
                    $('#publish'+row_id).hide();
                $('#publish_res'+row_id).html('<span style="color:green;"> „ «·‰‘— ··„ÊŸ›Ì‰ »‰Ã«Õ</span>');
               
            }

        });

    }
</script>

