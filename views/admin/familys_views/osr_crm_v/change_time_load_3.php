    <div class="col-sm-9 no-padding">
        <?php if (isset($load_details) && (!empty($load_details))) {
//                    $data['file_num_data']=$file_num_data;
            $this->load->view($load_details);
        }
        ?>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-3 no-padding" id="Details">
        <?php echo form_open(base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/do_change_time_zyraa', array('id' => 'change_time_form')) ?>
        <input type="hidden" name="id" value="<?=$id?>">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col"> ???? ???? ???????</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="form-group">
                        <label class="label " style=""> ????? ???????</label>
                        <input type="date"
                               data-validation="required "
                               value="<?php if (isset($crm_data["visit_date"])) {
                                   if (!empty($crm_data["visit_date"])) {
                                       echo $crm_data["visit_date"];
                                   }
                               } ?>"
                               id="visit_date_new" name="visit_date" class=" form-control "
                               onchange="check_new_date();"
                        />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label class="label  " style=""> (??)???? ???????</label>
                        <input type="time"
                               data-validation="required "
                               value="<?php if (isset($crm_data["visit_time_from"])) {
                                   if (!empty($crm_data["visit_time_from"])) {
                                       echo $crm_data["visit_time_from"];
                                   }
                               } ?>"
                               onchange="check_new_date();" id="visit_time_from_new" name="visit_time_from"
                               class="  form-control "/>


                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label class="label  " style=""> (???)???? ???????</label>
                        <input type="time"
                               data-validation="required "
                               value="<?php if (isset($crm_data["visit_time_to"])) {
                                   if (!empty($crm_data["visit_time_to"])) {
                                       echo $crm_data["visit_time_to"];
                                   }
                               } ?>"
                               onchange="check_new_date();" id="visit_time_to_new" name="visit_time_to"
                               class="  form-control "/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">?????</label>
                        <textarea class="form-control " id="exampleFormControlTextarea1" name="reason" rows="3"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" onclick="//check_befor_submit()" id="transform_btn"
                            class="btn btn-labeled btn-success " name="save" value="save">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>???? ?????? 
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<script type="text/javascript">
    $.validate({
        modules: 'logic',
        /*// for live search required*/
        validateHiddenInputs: true
        , lang: 'ar'
    });
    $('#transform_btn').on('click', function (e) {
        var isValid = $(e.target).parents('form').isValid();
        if (!isValid) {
            console.error('not valid');
            e.preventDefault(); //prevent the default action
            // return false;
        }
        if (isValid) {
            console.log('valid')
            check_befor_submit();
            return false;
        }
        // return false;
    });
</script>
<script>
    function check_befor_submit() {
        $.ajax({
            type: 'post',
            url: $('#change_time_form').attr('action'),
            data: $('#change_time_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
              
                swal({
                    title: "???? ?????? ?????? ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (html) {
                swal({
                    title: '?? ???? ?????? ?????',
                    type: 'success',
                    confirmButtonText: '??'
                });
                location.reload();
            }
        });
    }
</script>