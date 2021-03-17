

<div class="col-md-12">

        <div class="col-md-12 load_result">
            <input type="hidden" id="ttype2" name="ttype2" value="2"/>
<!--            <input type="hidden" id="result_id" name="result_id" />-->
            <div class="form-group col-sm-3">
                <label class="label">أسم البطاقة </label>

                <select class="form-control" id="card_id_fk" name="card_id_fk"
                        data-validation="required" aria-control="required">
                    <option value="">إختر</option>
                    <?php
                    if(isset($cards) && $cards != null){
                        foreach ($cards as $value) {
                            ?>
                            <option value="<?=$value->id?>"><?=$value->title?></option>
                            <?php
                        }
                    }
                    ?>
                </select>


            </div>

            <div class="form-group col-sm-2 padding-4">
                <label class="label">البنك </label>
                <select class="form-control " id="bank_id_fk"  onchange="get_accounts(this.value)"   name="bank_id_fk" class="form-control"
                        data-validation="required">

                    <option value=""> إختر </option>
                    <?php
                    if(isset($banks) && !empty($banks)){ ?>
                        <?php  foreach ($banks as $row){
                            ?>
                            <option value="<?php echo $row->bank_id_fk;?>"><?php echo $row->bank_name;?></option>

                        <?php }} else { ?>
                        <option value="">لايوجد بنوك مضافة</option>
                    <?php } ?>
                </select>

            </div>

            <div class="form-group col-sm-2 padding-4">
                <label class="label"> الحساب </label>
                <select class="form-control " id="account_id_fk" name="account_id_fk"  onchange="get_accounts_nums(this.value)"
                        data-validation="required" >
                    <option value="">إختر</option>
                </select>

            </div>

            <div class="form-group col-sm-3 padding-4">
                <label class="label"> رقم الحساب </label>
                <select class="form-control " id="account_num_id_fk" name="account_num_id_fk"  data-validation="required">
                    <option value="">إختر</option>
                </select>

            </div>

            <div class="form-group col-sm-1 padding-4">
                <label class="label"> الحاله </label>
                <select class="form-control " id="card_status" name="card_status" data-validation="required">
                    <option value="">إختر</option>
                    <option value="1">نشط</option>
                    <option value="2">غير نشط</option>
                </select>

            </div>

            <div class="col-md-12 col-xs-12 text-center" style="margin-bottom: 10px;">
                <button type="buttons" name="save" value="save" id="saves" class="btn btn-success btn-labeled" value="حفظ"
                        onclick="add_card('load_result',2);" >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
        </div>
        <div class="col-md-12" id="results_table">

        </div>

</div>

<script>
    function get_accounts(bank_id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/Matgr_card/add_bank_accounts",
            data:{bank_id:bank_id},
            success:function(d){
                $('#account_id_fk').html(d);
            }

        });

    }

</script>

<script>
    function get_accounts_nums(account_id)
    {
        var bank_id = $('#bank_id_fk').val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/Matgr_card/get_accounts_nums",
            data:{bank_id:bank_id,account_id:account_id},
            success:function(d){
                $('#account_num_id_fk').html(d);
            }

        });

    }

</script>
