

<style>


    .red-color{
        color: #ff0000;
    }
</style>

<script>

    var i_end =<?php echo $_POST['id'] ?>;
    console.log(' i_end : ' + i_end);
    for (var i = 1; i < i_end; i++) {
        var select = $('#sheek_num' + i + ' option:selected').val();
        console.log('select : ' + select);
        if (select != "") {
            $('#sheek_num' + i_end + ' option[value=' + select + ']').remove();
        }
    }

</script>


<?php

if(!empty($_POST['id'])){ ?>
    <div  id="trcheque<?php echo$_POST['id'];?>" >
        <div class="col_md_30 col-sm-6 padding-4">

                <h6 class="red-color">رقم الشيك</h6>

                <!--
             <input type="number" name="sheek_num[]" data-validation="required"
                    id="sheek_num<?=$_POST['id']?>"  class="form-control input_style_2 bank"
                    data-validation="" data-validation-has-keyup-event="true">-->

                <select id="sheek_num<?=$_POST['id']?>"  name="sheek_num[]"  class="form-control input_style_2 bank selectpicker"
                         onchange="GetSheekDetails(<?php echo$_POST['id'];?>)" aria-required="true"

                          data-show-subtext="true" data-live-search="true"
                >
                    <option value="">إختر</option>
                    <?php if(isset($sheeks) && !empty($sheeks)){
                        foreach ($sheeks as $sheek){ ?>
                            <option  data-link="<?php echo $sheek->id.'/'.$sheek->sheek_date_ar.'/'.$sheek->bank_id_fk; ?>" value="<?php echo $sheek->sheek_num;?>"><?php echo$sheek->sheek_num;?></option>
                        <?php } } ?>
                </select>

        </div>

        <div class="col_md_35 col-sm-6 padding-4">

                <h6 class="red-color">تاريخ الشيك  </h6>

                <input type="date"  name="sheek_date[]"  id="sheek_date<?=$_POST['id']?>"   pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))" class="form-control input_style_2 bank" data-validation-has-keyup-event="true">

        </div>

        <div class="col_md_35 col-sm-6 padding-4">

                <h6 class="red-color">البنك </h6>

                <select   name="bank_id_fk[]" id="bank_id_fk<?=$_POST['id']?>" class="form-control input_style_2 bank"
                        aria-required="true">
                    <option value="">إختر</option>
                    <?php if(isset($banks) && !empty($banks)){
                        foreach ($banks as $bank){ ?>
                            <option  value="<?=$bank->id?>"><?=$bank->title?></option>
                        <?php } } ?>
                </select>

        </div>
    </div>


<?php } ?>


<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>

<script>

    function GetSheekDetails(length) {
        var $this = $('#sheek_num' + length);
        var $selectedOption = $this.find('option:selected');
        var link = $selectedOption.data('link');
        var info =link.split("/");
        $('#sheek_date' + length).val(info[1]);
        $('#bank_id_fk' + length).val(info[2]);
        (this).data('link')
    }

</script>

<script>
    $('.selectpicker').selectpicker('refresh');
</script>