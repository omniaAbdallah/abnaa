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
<div class="col-xs-12 no-padding" >
    <?php
    if (isset($get_taqeem) && !empty($get_taqeem)){
        echo form_open_multipart('human_resources/tataw3/nmazg/taqeem/Taqeem/update_taqeem/'.$get_taqeem->id);
        $motatw3_id_fk = $get_taqeem->motatw3_id_fk;
        $rkm_akd_id = $get_taqeem->rkm_akd_id;
        $forsa_id_fk = $get_taqeem->forsa_id_fk;
        $forsa_name = $get_taqeem->forsa_data->forsa_name;
        $wasf = $get_taqeem->forsa_data->wasf;
        $start_date = $get_taqeem->forsa_data->start_date;
        $makan = $get_taqeem->forsa_data->makan;
//        $total_max_degree=$get_taqeem->total_max_degree;
        $total_had_degree=$get_taqeem->total_had_degree;

        if (isset($get_taqeem->taqeem_bnods) && !empty($get_taqeem->taqeem_bnods)){
            $taqeem_bnods_arr = array();
            foreach ($get_taqeem->taqeem_bnods as $row_bnods) {
                $taqeem_bnods_arr['had_degree'.$row_bnods->band_id_fk]= $row_bnods->had_degree;
                $taqeem_bnods_arr['notes'.$row_bnods->band_id_fk]= $row_bnods->notes;

            }

        }


    } else{
        echo form_open_multipart('human_resources/tataw3/nmazg/taqeem/Taqeem/add_taqeem');
        $motatw3_id_fk = '';
        $forsa_id_fk = '';
        $rkm_akd_id = '';
        $forsa_name = '';
        $wasf = '';
        $start_date = '';
        $makan = '';
//        $total_max_degree=0;
        $total_had_degree=0;

    }
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?=$title?></h4>
            </div>
            <div class="panel-body" >
                <div class="col-md-12 no-padding" style=" margin-top: 10px;">

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
                        <label class="label ">اسم المتطوع</label>
                        <select id="motatw3_id_fk" name="motatw3_id_fk" onchange="$('#rkm_akd_id').val($('option:selected', this).data('rkmakd')); forsa_data();"
                                class="form-control selectpicker" data-validation="required"
                                data-show-subtext="true" data-live-search="true">
                            <option >اختر</option>
                            <?php
                            if (isset($motatw3) && (!empty($motatw3))) {
                                foreach ($motatw3 as $row) {
                                    $select = '';
                                    if (isset($motatw3_id_fk) && (!empty($motatw3_id_fk))) {
                                        if ($row->id== $motatw3_id_fk) {
                                            $select = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $row->id; ?>" data-rkmakd="<?=$row->rkm_akd_id?>" <?= $select ?>> <?php echo $row->name; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <input type="hidden" name="rkm_akd_id" id="rkm_akd_id" value="<?=$rkm_akd_id?>">
                    <input type="hidden" name="forsa_id_fk" id="forsa_id_fk" value="<?=$forsa_id_fk?>">
                    <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                        <label class="label">  عنوان الفرصة التطوعية  </label>
                        <input type="text" name="forsa_name" id="forsa_name"
                               value="<?= $forsa_name?>" class="form-control "  data-validation="required" disabled="disabled">
                    </div>
                    <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                        <label class="label">    وصف الفرصة التطوعية   </label>
                        <input type="text" name="wasf" id="wasf" value="<?=$wasf?>" data-validation="required" class="form-control" disabled="disabled" >
                    </div>
                    <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                        <label class="label">     تاريخ تنفيذ الفرصه    </label>
                        <input type="date" id="start_date" name="start_date" value="<?= $start_date?>" class="form-control " disabled="disabled" >
                    </div>
                    <div class="form-group col-md-3 col-sm-4 col-xs-12 padding-4">
                        <label class="label">    مكان تنفيذ الفرصه   </label>
                        <input type="text" id="makan" name="makan" value="<?= $makan?>" class="form-control  " disabled="disabled" >
                    </div>


                    <div class="col-md-12">
                        <table class=" table table-bordered" style="table-layout: fixed">

                            <thead>

                            <tr class=greentd">
                                <th> اسم البند</th>
                                <th width="15%"> الدرجه العظمي</th>
                                <th width="15%">الدرجه المستحقه</th>
                                <th width="15%">ملاحظات</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php if (isset($bnods) && !empty($bnods)) {
                                $x = 0;
                                $total_max_degree = 0;

                                foreach ($bnods as $row) {
                                    $total_max_degree += $row->max_degree;
                                    ?>
                                    <tr class="open_green  closed_green">
                                        <input type="hidden" id="band_id_fk" name="band_id_fk[]" value="<?php echo $row->id; ?>">
<!--                                        <input type="hidden" name="band_n[]" value="--><?php //echo $row->title; ?><!--">-->
                                        <td><?php echo $x + 1; ?>-<?php echo $row->title; ?></td>
                                        <td>
                                            <input type="text" data-validation="required"
                                                   class="form-control" name="max_degree<?php echo $row->id; ?>"
                                                   id="max_degree<?php echo $row->id; ?>"
                                                   value="<?php echo $row->max_degree; ?>"
                                                   width="45px;" readonly>
                                        </td>
                                        <td>
<!--                                            --><?//=json_encode($arr_bnods_id)?>
                                            <input type="number" data-validation="required"
                                                   oninput="get_total_had_degree();"
                                                   class="form-control" name="had_degree<?php echo $row->id; ?>"
                                                   id="had_degree<?php echo $row->id; ?>"
                                                   value="<?php if(isset($taqeem_bnods_arr) && !empty($taqeem_bnods_arr['had_degree'.$row->id])){
                                                       echo $taqeem_bnods_arr['had_degree'.$row->id];
                                                   }else{
                                                       echo 0;
                                                   } ?>"
                                                   width="45px;" />
<!--                                            value=""-->
                                        </td>
                                        <td>

                                            <input type="text" data-validation="required"
                                                   class="form-control" name="notes<?php echo $row->id; ?>"
                                                   id="notes<?php echo $row->id; ?>"
                                                   value="<?php if(isset($taqeem_bnods_arr) && !empty($taqeem_bnods_arr['notes'.$row->id])){
                                                       echo $taqeem_bnods_arr['notes'.$row->id];
                                                   }else{
                                                       echo '';
                                                   } ?>"
                                                   width="45px;" />
                                        </td>

                                    </tr>


                                    <?php
                                    $x++;
                                }
                            }  ?>
                            <tr>
                                <td></td>
                                <td>
                                <input type="text" data-validation="required"
                                       class="form-control" name="total_max_degree"
                                       id="total_max_degree" value="<?=$total_max_degree?>"
                                       width="45px;"  readonly />
                                </td>
                                <td>
                                    <input type="text" data-validation="required"
                                           class="form-control" name="total_had_degree"
                                           id="total_had_degree" value="<?=$total_had_degree?>"
                                           width="45px;"  readonly />
                                </td>
                                <td></td>
                            </tr>
                            </tbody>


                        </table>

                    </div>




                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12 text-center">
        <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   >
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    <?php
    echo form_close();
    ?>
</div>


<script>
    function forsa_data() {
        var motatw3_id_fk = $('#motatw3_id_fk').val();
        var rkm_akd_id = $('#rkm_akd_id').val();
        if (motatw3_id_fk !='' && rkm_akd_id !='') {

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/tataw3/nmazg/taqeem/Taqeem/forsa_data",
                data: {motatw3_id_fk: motatw3_id_fk, rkm_akd_id: rkm_akd_id},
                success: function (d) {
                    var json = d;
                    obj = JSON.parse(json);
                    // console.log(obj);
                    $('#forsa_id_fk').val(obj[0]['id']);
                    $('#forsa_name').val(obj[0]['forsa_name']);
                    $('#wasf').val(obj[0]['wasf']);
                    $('#start_date').val(obj[0]['start_date']);
                    $('#makan').val(obj[0]['makan']);
                }
            });
        }
    }

    function get_total_had_degree(){
        var total = 0;
        var inps = document.getElementsByName('band_id_fk[]');
        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            var id = inp.value;
            // console.log("band_id_fk["+i+"].value="+inp.value);

            var had_degree = $('#had_degree'+id).val();
            total += parseInt(had_degree);
        }
        // console.log("2????????????????"+total);
        document.getElementById('total_had_degree').value = total;


    }
</script>