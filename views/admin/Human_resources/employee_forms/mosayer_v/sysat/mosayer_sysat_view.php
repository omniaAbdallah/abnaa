<div class="col-xs-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"><?php echo $title ?> </h3>

        </div>

        <div class="panel-body">
            <?php  $url=base_url()."human_resources/employee_forms/Employee_salaries/sysat_setting";
            echo form_open_multipart($url,array('id' =>'form1')) ?>
            <table class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th>#</th>
                    <th>راتب أساسي</th>
                    <th>بدل سكن</th>
                    <th>بدل مواصلات</th>
                    <th>بدل اتصال</th>
                    <th>بدل اعاشة</th>
                    <th>بدل طبيعة عمل</th>
                    <th>بدل إضافي</th>
                    <th>بدل تكليف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $titles_arr =array('absent'=>'غياب',
                    'takher'=>'تأخير',
                    'sa3at_edafi'=>'ساعات إضافي');


                $x=1;
                foreach ($titles_arr as  $key=>$row){
                         ?>
                <tr>
                    <td><?=$row?></td>
                    <td><input type="checkbox" onchange="checkStatus($(this))" data-id="<?=$key?>_rateb_asasy" id="<?=$key?>_rateb_asasy"
                               <?php if(!empty($table[$key]['rateb_asasy'])){ if($table[$key]['rateb_asasy'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[rateb_asasy]" value="yes" >
                        <input id='<?=$key?>_rateb_asasyHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['rateb_asasy'])){ if($table[$key]['rateb_asasy'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[rateb_asasy]"></td>
                    <td><input type="checkbox" onchange="checkStatus($(this))" data-id="<?=$key?>_badal_sakn" id="<?=$key?>_badal_sakn"
                            <?php if(!empty($table[$key]['badal_sakn'])){ if($table[$key]['badal_sakn'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_sakn]"  value="yes">
                        <input id='<?=$key?>_badal_saknHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_sakn'])){ if($table[$key]['badal_sakn'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_sakn]"></td>
                    <td><input type="checkbox" onchange="checkStatus($(this))" data-id="<?=$key?>_badal_mowaslat" id="<?=$key?>_badal_mowaslat"
                            <?php if(!empty($table[$key]['badal_mowaslat'])){ if($table[$key]['badal_mowaslat'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_mowaslat]" value="yes" >
                        <input id='<?=$key?>_badal_mowaslatHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_mowaslat'])){ if($table[$key]['badal_mowaslat'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_mowaslat]"></td>
                    <td><input type="checkbox"  onchange="checkStatus($(this))" data-id="<?=$key?>_badal_etsal" id="<?=$key?>_badal_etsal"
                            <?php if(!empty($table[$key]['badal_etsal'])){ if($table[$key]['badal_etsal'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_etsal]"  value="yes">
                        <input id='<?=$key?>_badal_etsalHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_etsal'])){ if($table[$key]['badal_etsal'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_etsal]"></td>
                    <td><input type="checkbox" onchange="checkStatus($(this))"  data-id="<?=$key?>_badal_e3asha" id="<?=$key?>_badal_e3asha"
                            <?php if(!empty($table[$key]['badal_e3asha'])){ if($table[$key]['badal_e3asha'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_e3asha]" value="yes" >
                        <input id='<?=$key?>_badal_e3ashaHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_e3asha'])){ if($table[$key]['badal_e3asha'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_e3asha]"></td>
                    <td><input type="checkbox"  onchange="checkStatus($(this))"data-id="<?=$key?>_badal_tabe3a_amal" id="<?=$key?>_badal_tabe3a_amal"
                            <?php if(!empty($table[$key]['badal_tabe3a_amal'])){ if($table[$key]['badal_tabe3a_amal'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_tabe3a_amal]" value="yes">
                        <input id='<?=$key?>_badal_tabe3a_amalHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_tabe3a_amal'])){ if($table[$key]['badal_tabe3a_amal'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_tabe3a_amal]"></td>
                    <td><input type="checkbox"  onchange="checkStatus($(this))" data-id="<?=$key?>_badal_edafi" id="<?=$key?>_badal_edafi"
                            <?php if(!empty($table[$key]['badal_edafi'])){ if($table[$key]['badal_edafi'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_edafi]" value="yes">
                        <input id='<?=$key?>_badal_edafiHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_edafi'])){ if($table[$key]['badal_edafi'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_edafi]"></td>
                    <td><input type="checkbox"  onchange="checkStatus($(this))" data-id="<?=$key?>_badal_taklef"  id="<?=$key?>_badal_taklef"
                            <?php if(!empty($table[$key]['badal_taklef'])){ if($table[$key]['badal_taklef'] =='yes'){ echo'checked'; }  } ?>
                               name="<?=$key?>[badal_taklef]" value="yes">
                        <input id='<?=$key?>_badal_taklefHidden' type='hidden' value='no'
                            <?php if(!empty($table[$key]['badal_taklef'])){ if($table[$key]['badal_taklef'] =='yes'){ echo'disabled'; }  } ?>
                               name="<?=$key?>[badal_taklef]"></td>
                </tr>

                      <?php

                      $x++;

                  }


                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="8"></td>
                    <td >

                        <button type="submit"   class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"

                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">

                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ

                        </button>

                    </td>
                </tr>
                </tfoot>
            </table>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<script>


    function checkStatus(obj) {

var id =obj.attr('data-id');

        if($('#'+id).prop("checked") == true){
            //alert("Checkbox is checked.");
            $('#'+id+'Hidden').attr('disabled',true);
        }
        else if($('#'+id).prop("checked") == false){
            //alert("Checkbox is unchecked.");
            $('#'+id+'Hidden').attr('disabled',false);
        }


    }
</script>