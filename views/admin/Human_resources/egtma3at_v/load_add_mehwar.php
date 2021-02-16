<div class="col-sm-12">
    <?php
    echo form_open_multipart(base_url() . 'human_resources/egtma3at/Egtma3at_c/insert_mehwor_qrar/' . $galsa_rkm, array('id' => 'myform_mehwr_glsa'));
    ?>

        <input type="hidden" name="galsa_rkm" value="<?=$galsa_rkm?>">


    <div class="form-group col-md-3 col-sm-1  padding-4">
        <label class="label">عبارة عن</label>

        <input type="text" name="mehwar_title" data-validation="required" class="form-control ">
    </div>


    <div class="form-group col-md-2 col-sm-1  padding-4">
        <label class="label"> المرفق</label>

        <input type="file" name="mehwar_morfaq" id="mehwar_morfaq" class="form-control ">
    </div>

    <div class="form-group col-md-2 col-sm-1  padding-4">
        <label class="label"> مدة مناقشة المحور</label>

        <input type="number" data-validation="required" name="mehwar_duration" class="form-control ">
    </div>


    <div class="form-group col-md-2 col-sm-1  padding-4">
        <label class="label"> خاضع للتصويت</label>
        <input type="checkbox" onclick="if (this.checked){ $('#get_option').show();}else { $('#get_option').hide();}"
               value="1" name="mehwar_vote" class="form-control ">
    </div>
    <div id="get_option" style="display: none">
        <div class="form-group col-md-2 col-sm-2  padding-4">
            <label class="label"> نوع التصويت</label>
            <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="vote_type" checked class="f2a_types"
                           value="1">
                    <label for="esnad1" class="radio-label"> سري</label>
                </div>
                <div class="radio-content">
                    <input type="radio" id="esnad2" name="vote_type" class="f2a_types" value="2">
                    <label for="esnad2" class="radio-label"> علني</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12  padding-4">
        <label class="label"> القرار </label>
        <textarea id="elqrar" name="elqrar" class="form-control " rows=""  data-validation="required"></textarea>
    </div>

    <?php echo form_close() ?>
</div>

