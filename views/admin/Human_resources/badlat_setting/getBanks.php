<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
	<h3 class="panel-title">بيانات الحسابات البنكية</h3>
	</div>
	<div class="panel-body">
<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
<div class="form-group col-md-4 col-sm-4 padding-4">
<label class="label">إسم البنك</label>
		<select name="bank_id_fk[]" class="form-control " data-validation="required" onchange="$('#bank_code<?=$number?>').val($(this).find('option:selected').attr('bank_code'))" >
			<option value="">إختر</option>
			<?php 
			if (isset($banks) && $banks != null) {
				foreach ($banks as $value) {
					?>
					<option bank_code='<?=$value->bank_code?>' value="<?=$value->id?>"><?=$value->ar_name?></option>
					<?php
				}
			}
			?>
		</select>
		</div>
	<div class="form-group col-md-2 col-sm-4 padding-4">
	<label class="label"> كود البنك </label>
		<input type="text" class="form-control " name="bank_code[]" data-validation="required" id="bank_code<?=$number?>" readonly/>
		<input type="hidden" name="emp_code" id="emp_code" class="form-control half" data-validation="required"
               value="<?=$emp_code?>" >
               <input type="hidden" name="emp_id" id="emp_code" class="form-control half" data-validation="required"
               value="<?=$emp_id?>" >
		</div>
	<div class="form-group col-md-4 col-sm-4 padding-4">
	<label class="label">  رقم الحساب <span style="color:red;"> (رقم الحساب لابد أن يكون 24  رقم)</span></label>
		<input type="text" maxlength="24" minlength="24" class="form-control " name="bank_account_num[]" id="bank_account_num<?=$number?>" data-validation="required" onfocusout="checkLength($(this).val());" />
		</div>
    <div class="form-group col-md-2 col-sm-4 padding-4">
	<label class="label"> صوره الحساب</label>
		<input type="file" maxlength="24" minlength="24" class="form-control" id="userfile"   name="userfile"  data-validation="required" />
		</div>
		<div class="col-xs-12 text-center">
             <!--   <button onclick="get_bank();" type="button" class=" btn btn-warning btn-labeled"><span
                            class="btn-label"><i class="fa fa-plus"></i></span> اضافه بنك
                </button> -->
<!-- 
                <input type="hidden" name="count"
                       value="<?php if (isset($allData->Banks)) echo count($allData->Banks); else echo 0; ?>"> -->
                <button type="button" onclick="add_banks(<?=$emp_id?>)" id="buttons" name="add" value="add" class=" btn btn-success btn-labeled"><span
                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ حسابات البنك
                </button>
            </div>
	<!-- <td>
		<button class="btn-info"> لم يتم تحديد الحاله</button>
	</td> -->
</div>
</div>
</div>
