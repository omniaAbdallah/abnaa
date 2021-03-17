<?php 
// $dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
// $period = array('الصباح','المساء');
// $answer = array(1=>'نعم',2=>'لا');
$required1 = '';
$readonly1 = 'readonly';
$required2 = '';
$readonly2 = 'readonly';
$disabled = 'disabled';
if($this->uri->segment(5) == ""){
	//echo form_open_multipart('Volunteers/Volunteers/new_volunteer'); 
}
else{
//	echo form_open_multipart('Volunteers/Volunteers/edit_volunteer/'.$this->uri->segment(5)); 
	$disabled = '';
	if($volunteer['another_charity'] == 1) {
		$required1 = 'required';
		$readonly1 = '';
	}
	if($volunteer['having_disability'] == 1) {
		$required2 = 'required';
		$readonly2 = '';
	}
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
	<br>
   
	    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
		    
		    
			<div class="panel-body">
				<div class="form-group col-sm-12 col-xs-12">
				 
                   

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">تاريخ الطلب</label>
                    <input type="date" name="talb_date" value="<?=date('Y-m-d');?>" class="form-control " data-validation="required" >
                    </div> 
                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> نوع التطوع</label>
                          <select name="tato3_no3" class="form-control " id="tato3_no3" data-validation="required"
                         >
                        <option value="">اختر</option>
                        <?php
                                  $tato3_no3 = array(1=>'بدون أجر',2=>'بأجر');
                                foreach($tato3_no3 as $key=>$value){
                                    ?>
                        <option value="<?php echo $key;?>" <?php if( isset($volunteer) && !empty($volunteer['tato3_no3'])){
                                            if($key==$volunteer['tato3_no3']){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option>
                        <?php
                                }
                                ?>
                    </select>
				      
				    </div>
				    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label "> الإسم</label>
				      	<input type="text" name="name" value="<?php if(isset($volunteer)) echo $volunteer['name'] ?>" placeholder="الإسم" class="form-control " data-validation="required">
				    </div>

				    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label ">  السجل المدني</label>
				      	<input type="text" maxlength="10" name="id_card" value="<?php if(isset($volunteer)) echo $volunteer['id_card'] ?>" placeholder=" السجل المدني" class="form-control " data-validation="required"  onkeypress="validate(event);" onkeyup=" return checkUnique($(this).val())">
				      	<span id="checkUnique" style="color: #a94442"></span>
				    </div>

				   
				</div>

				<div class="form-group col-sm-12 col-xs-12">
				    <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> المدينه</label>
				      	<input type="text" name="center_id_fk" value="<?php if(isset($volunteer)) echo $volunteer['center_id_fk'] ?>" placeholder="العنوان" class="form-control " data-validation="required">
				    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> الحي</label>
				      	<input type="text" name="district_id_fk" value="<?php if(isset($volunteer)) echo $volunteer['district_id_fk'] ?>" placeholder="العنوان" class="form-control " data-validation="required">
				    </div> -->
                    <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> المدينة  </label>
                    <select class="form-control  selectpicker"  name="center_id_fk" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" onchange="get_sub_select(this.value,'center_option');">
                        <option value="">اختر</option>
                        <?php    if(isset($all_city) && !empty($all_city)){
                            foreach ($all_city as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['center_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach ;}?>
                    </select>
                </div>
               
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> الحي  </label>

                    <select name="district_id_fk" class="form-control  "  id="center_option" name="" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                    </select>
                </div>
				    <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> الهاتف أو الجوال</label>
				      
                          <input type="text" maxlength="10"
                        
                      
                        onkeyup="check_length_num(this,10,'span_phone');"
                        name="mobile" id="mob" onkeypress="validate(event);"  value="<?php if(isset($volunteer)) echo $volunteer['mobile'] ?>" class="form-control " data-validation="required">

                        <span id="span_phone" style="color: red;"></span>
                    
                    
                    </div>
                    <div class="form-group col-sm-4 col-xs-12 padding-4">
				      	<label class="label "> البريد الإلكتروني</label>
				      
                      
                      
                      	<input type="email" name="email" value="<?php if(isset($volunteer)) echo $volunteer['email'] ?>" placeholder="البريد الإلكتروني" class="form-control " data-validation="required">
				    </div>
                    <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
				      	<label class="label "> الخبرات والمهارات</label>
				      	<input type="text" name="skills" value="<?php if(isset($volunteer)) echo $volunteer['skills'] ?>" placeholder="الخبرات والمهارات" class="form-control " data-validation="required">
				    </div> -->
                    </div>
			    <div class="form-group col-sm-12 col-xs-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label ">   الخبرات والمهارات</label>
                            <select id="skills" name="skills[]" multiple
                                    title="يمكنك إختيار أكثر من الخبرات "
                                    class="form-control selectpicker" 
                                    data-show-subtext="true"
                                    data-live-search="true">
                                
                                <?php
                                foreach ($skills as $key) {
                                    $select = '';
                                    
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                <?php } ?>
                            </select>
</div> 
               
				
                <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label ">    الاهتمامات</label>
                            <select id="interest" name="interest[]" multiple
                                    title="يمكنك إختيار أكثر من الاهتمامات "
                                    class="form-control selectpicker" 
                                    data-show-subtext="true"
                                    data-live-search="true">
                                
                                <?php
                                foreach ($interest as $key) {
                                    $select = '';
                                    
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                <?php } ?>
                            </select>
</div> 
               
				</div>



			    <div class="form-group col-sm-12 col-xs-12">
			    	
			    	<div class="form-group col-sm-6 col-xs-12 padding-4">
				      	<label class="label "> هل سبق لك التطوع لدى جهة خيرية ؟</label>
                          <?php 
                          $answer = array(1=>'نعم',2=>'لا');
				      	foreach ($answer as $key => $value) { 
				      		$checked = '';
                            if(isset($volunteer) && $volunteer['another_charity'] == $key) {
                                $checked = 'checked';
                            }
				      	?>
				      	
				      		<input type="radio" name="another_charity" value="<?=$key?>" data-validation="required" onclick="changeReadonly($(this).val(),'charity')" style="margin-top: 10px" <?=$checked?>> <label><h6><?=$value?></h6></label>
				      		
				      	<? } ?>
				    </div>

				    <div class="form-group col-sm-6 col-xs-12 padding-4">
				      	<label class="label "> إذا كانت الإجابة <strong>بنعم </strong>الرجاء تحديد الانشطه التطوعيه التي مارستها</label>
				      	<input type="text" name="charity" id="charity" value="<?php if(isset($volunteer)) echo $volunteer['charity'] ?>" class="form-control " data-validation="<?=$required1?>" <?=$readonly1?>>
				    </div>
				</div>

				

			    <!-- <div class="form-group col-sm-12 col-xs-12">
		            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" <?=$disabled?>><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div> -->
			</div>
		</div>

</div> 

<!------------------------------------------------------------->


<!-- yara -->
<script>
    function set_data(id, title) {

        var text_id = $('#title_text').val();
        var id_id = $('#title_id').val();

        $('#' + text_id).val(title);
        $('#' + id_id).val(id);
        $('#my_load_pop').modal('hide');
    }
</script>

    <script>
    function show_pop(input_num, type, on_chang, text) {
        $('#my_load_popLabel').text(text);
        $('#input_label').text(text);
        $('#span_id').text(' اضافة ' + text);
        $('#input_num').val(input_num);
        $('#type').val(type);
        console.log('text :' + text + 'type:' + type, 'input_num:' + input_num);
        var f2a = $('option:selected', $('#fe2a_type')).attr("data-specialize");
        console.log('f2a : ' + f2a);
        console.log('on_chang : ' + on_chang);


        switch (on_chang) {
            case 1:
                console.log('on_chang : ' + on_chang);

                if (f2a == 2) {
                    type = 15;
                    input_num = 2;
                    $('#input_num').val(input_num);
                    $('#type').val(type);
                } else if (f2a == 1) {
                    type = 34;
                    input_num = 3;
                    $('#input_num').val(input_num);
                    $('#type').val(type);
                }

                break;

            default:
                break;
        }



        console.log('f2a : ' + f2a);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
            data: {
                input_num: input_num,
                type: type
            },
            beforeSend: function() {
                $('#my_load_table').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function(html) {
                $('#my_load_table').html(html);
            }
        });

    }
    </script>

    <script>
    function sumit_pop() {
        var btun_val = $("#btn_pop").val();
        console.log('btn_pop :' + btun_val);
        var input_num = $('#input_num').val();
        var input_name = $('#input_name').val();
        var input_id = $('#input_id').val();
        var type = $('#type').val();
        if (btun_val == '1') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
                data: {
                    input_num: input_num,
                    input_name: input_name,
                    type: type,
                    add: 'add'
                },
                beforeSend: function() {
                    swal({
                        title: "جاري الحفظ ",
                        text: "",
                        imageUrl: "<?php echo base_url().'asisst/admin_asset/img/loader.gif' ?>",
                        confirmButtonText: "تم"

                    });
                    $('#my_load_table').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function(html) {
                    swal({
                        title: "تم الحفظ ",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم",

                    });
                    $('#input_name').val();
                    $('#input_id').val();
                    $("#btn_pop").val(1);
                    $("#btn_pop_span").text("حفظ");
                    $('#my_load_table').html(html);

                    // show_pop(input_num,type,$('#my_load_popLabel').text(text));
                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
                data: {
                    input_num: input_num,
                    type: type,
                    input_name: input_name,
                    input_id: input_id,
                    update: 'update'
                },
                beforeSend: function() {
                    swal({
                        title: "جاري الحفظ ",
                        text: "",
                        imageUrl: "<?php echo base_url().'asisst/admin_asset/img/loader.gif' ?>",
                        confirmButtonText: "تم"

                    });
                    $('#my_load_table').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function(html) {
                    swal({
                        title: "تم الحفظ ",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم",

                    });
                    $('#input_name').val();
                    $('#input_id').val();
                    $("#btn_pop").val(1);
                    $("#btn_pop_span").text("حفظ");
                    $('#my_load_table').html(html);

                    // show_pop(input_num,type,$('#my_load_popLabel').text(text));
                }
            });
        }

    }


    function delete_pop(id) {
        var input_num = $('#input_num').val();
        var type = $('#type').val();

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
            data: {
                input_num: input_num,
                input_id: id,
                type: type,
                delete: 'delete'
            },
            beforeSend: function() {
                swal({
                    title: "جاري الحذف ",
                    text: "",
                    imageUrl: "<?php echo base_url().'asisst/admin_asset/img/loader.gif' ?>",
                    confirmButtonText: "تم"

                });
                $('#my_load_table').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function(html) {
                swal({
                    title: "تم الحذف ",
                    text: "",
                    type: "success",
                    confirmButtonText: "تم",

                });
                $('#input_name').val();
                $('#input_id').val();
                $("#btn_pop").val(1);
                $("#btn_pop_span").text("حفظ");
                $('#my_load_table').html(html);

                // show_pop(input_num,type,$('#my_load_popLabel').text(text));
            }
        });
    }
    </script>
    <script>
function change_work_status(value) {
        if (value == 2) {
            document.getElementById("job_fk").setAttribute("disabled", "disabled");
            document.getElementById("job_fk_input").value = '';
            document.getElementById("job_name").value = '';

            document.getElementById("job_place").setAttribute("disabled", "disabled");
            document.getElementById("job_place").value = '';
        } else {
            document.getElementById("job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("job_place").removeAttribute("disabled", "disabled");
        }

    }
    </script>
   <script>

function GetMemberName(obj) {

    console.log(' obj :' + obj.dataset.name);

    var hai_name = obj.dataset.hai_name;

    var hai_id = obj.dataset.hai_id;

    var city_name = obj.dataset.city_name;

    var city_id = obj.dataset.city_id;

    document.getElementById('city_id_fk').value = city_id;

    document.getElementById('city_name').value = city_name;

    document.getElementById('hai_id_fk').value = hai_id;

    document.getElementById('hai_name').value = hai_name;

    $("#myModalInfo .close").click();

}

function GetDiv(div) {

    html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +

        '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> المدينه </th><th style="width: 170px;" >الحي </th>' +

        '</tr></thead><table><div id="dataMember"></div></div>';

    $("#" + div).html(html);

    $('#js_table_members').show();

    var oTable_usergroup = $('#js_table_members').DataTable({

        dom: 'Bfrtip',

        "ajax": '<?php echo base_url(); ?>human_resources/Human_resources/getConnection',

        aoColumns: [

            {"bSortable": true},

            {"bSortable": true},

            {"bSortable": true}

        ],

        buttons: [

            'pageLength',

            'copy',

            'excelHtml5',

            {

                extend: "pdfHtml5",

                orientation: 'landscape'

            },

            {

                extend: 'print',

                exportOptions: {columns: ':visible'},

                orientation: 'landscape'

            },

            'colvis'

        ],

        colReorder: true,

        destroy: true

    });

}

</script>
<script>
  $('.selectpicker').selectpicker("refresh");
</script>