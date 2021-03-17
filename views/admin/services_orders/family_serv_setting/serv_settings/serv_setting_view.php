<style type="text/css">


    .inner-heading-green{
        background-color: #09704e;
        padding: 10px;
        color: #fff;
    }
    label {

        color: #002542 !important;

        font-size: 16px !important;

    }

    .top-label {
        font-size: 13px;
    }


    .i-check {
        margin: 5px 8px;
        width: auto;
    }
    .skin-square {
        text-align: center;
        display: flex;
    }

</style>
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <?php
            if (isset($get_setting) && !empty($get_setting)){
                echo form_open_multipart('services_orders/family_serv_setting/Serv_setting/update_setting/'.$get_setting->id);
                $khdma_name = $get_setting->khdma_name;
                $wasf_khdma = $get_setting->wasf_khdma;

            } else{
                echo form_open_multipart('services_orders/family_serv_setting/Serv_setting/add_setting');
                $khdma_name = '';
                $wasf_khdma = '';

            }
            ?>
            <div class="col-xs-12 no-padding" >
                <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> نوع الخدمة </label>
                    <input type="text" name="khdma_name"
                           value="<?= $khdma_name?>"
                           class="form-control  "  data-validation="required">

                </div>
                <div class="form-group col-md-4 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> وصف الخدمة </label>
                    <input type="text" name="wasf_khdma"
                           value="<?= $wasf_khdma?>"
                           class="form-control  "  data-validation="required">

                </div>
                <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  الفئات المستهدفة </label>
                    <?php
                      $fe2at = array('f_a'=>'أ',
                                     'f_b'=>'ب',
                                     'f_c'=>'ج',
                                     'f_d'=>'د',
                                     'f_e'=>'هـ'
                          );
                    ?>
                    <select name="fe2at[]" id="fe2at" multiple
                            title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                            class=" no-padding form-control  selectpicker  " data-live-search="true"
                            data-actions-box="true">
                        <?php
                            foreach ($fe2at as $key=>$value){
                                if (isset($get_setting) && !empty($get_setting)){
                                    if ($get_setting->$key==1){
                                        $check='selected';
                                    } else{
                                        $check ='';
                                    }
                                } else{
                                    $check ='';
                                }
                                ?>
                                <option value="<?= $key?>" <?= $check?>> <?= $value?></option>
                                <?php

                        }
                        ?>
                    </select>

                </div>

                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label"> المدخلات </label>
                    <div class="skin-square">
                        <?php
                        $relat = array('relat_num'=>'العدد',
                            'relat_mabl3'=>'المبلغ',
                            'relat_rkm_fatora'=>'رقم الفاتورة',
                            'relat_rkm_gehaz'=>'رقم الجهاز',
                            'relat_age'=>'السن'
                        );
                        foreach ($relat as $key=>$value){
                             if (isset($get_setting) && !empty($get_setting)){
                                 if ($get_setting->$key==1){
                                     $check='checked';
                                 } else{
                                     $check ='';
                                 }
                             } else{
                                 $check ='';
                             }
                            ?>

                            <div class="check-style" style=" margin-left: 20px;">
                                <input tabindex="9" type="checkbox" id="<?php echo $key;?>"   name="<?php echo $key;?>" class="day checkbox_esal"  value="1" <?= $check?>>
                                <label class="text-center" for="<?php echo $key;?>"><?php echo $value;?></label>
                            </div>

                        <?php }  ?>
                    </div>
                </div>
                <div class="form-group col-md-2 ">
                    <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   style="margin-top: 30px ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>

                </div>
                <?php
                echo form_close();
                ?>


            </div>

        </div>

    </div>
    </div>
<?php
if (isset($records) && !empty($records)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?=$title?></h4>

            </div>
            <div class="panel-body" style="min-height: 300px;">
                <div class="col-xs-12 no-padding" >
                    <table id="example" class="table  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>نوع الخدمة</th>
                            <th>وصف الخدمة</th>
                            <th>فئة أ</th>
                            <th>فئة ب</th>
                            <th>فئة ج</th>
                            <th>فئة د</th>
                            <th>فئة هـ</th>
                            <th>تفاصيل </th>
                            <th>اجراء </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($records as $row){
                              ?>
                              <tr>
                                  <td><?= $x++?></td>
                                  <td>
                                      <?php
                                       if (!empty($row->khdma_name)){
                                           echo $row->khdma_name;
                                       }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if (!empty($row->wasf_khdma)){
                                          echo $row->wasf_khdma;
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                       if ($row->f_a==1){
                                           ?>
                                           <i class="fa fa-check" style="color: green;"></i>
                                           <?php
                                       } else{
                                           ?>
                                           <i class="fa fa-remove" style="color: red;"></i>
                                           <?php
                                       }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($row->f_b==1){
                                          ?>
                                          <i class="fa fa-check" style="color: green;"></i>
                                          <?php
                                      } else{
                                          ?>
                                          <i class="fa fa-remove" style="color: red;"></i>
                                          <?php
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($row->f_c==1){
                                          ?>
                                          <i class="fa fa-check" style="color: green;"></i>
                                          <?php
                                      } else{
                                          ?>
                                          <i class="fa fa-remove" style="color: red;"></i>
                                          <?php
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($row->f_d==1){
                                          ?>
                                          <i class="fa fa-check" style="color: green;"></i>
                                          <?php
                                      } else{
                                          ?>
                                          <i class="fa fa-remove" style="color: red;"></i>
                                          <?php
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($row->f_e==1){
                                          ?>
                                          <i class="fa fa-check" style="color: green;"></i>
                                          <?php
                                      } else{
                                          ?>
                                          <i class="fa fa-remove" style="color: red;"></i>
                                          <?php
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $row->id?>);">
                                          <i class="fa fa-list "></i></a>

                                  </td>
                                  <td>
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-warning">إجراءات</button>
                                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <span class="caret"></span>
                                              <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li>
                                                  <a href="#" onclick='swal({
                                                      title: "هل انت متأكد من التعديل ؟",
                                                      text: "",
                                                      type: "warning",
                                                      showCancelButton: true,
                                                      confirmButtonClass: "btn-warning",
                                                      confirmButtonText: "تعديل",
                                                      cancelButtonText: "إلغاء",
                                                      closeOnConfirm: false
                                                      },
                                                      function(){

                                                      window.location="<?php echo base_url().'services_orders/family_serv_setting/Serv_setting/update_setting/'.$row->id  ?>";
                                                      });'>
                                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل   </a>

                                              </li>
                                              <li>
                                                  <a href="#" onclick='swal({
                                                      title: "هل انت متأكد من الحذف ؟",
                                                      text: "",
                                                      type: "warning",
                                                      showCancelButton: true,
                                                      confirmButtonClass: "btn-danger",
                                                      confirmButtonText: "حذف",
                                                      cancelButtonText: "إلغاء",
                                                      closeOnConfirm: false
                                                      },
                                                      function(){
                                                      swal("تم الحذف!", "", "success");
                                                      window.location="<?= base_url()."services_orders/family_serv_setting/Serv_setting/delete_setting/" . $row->id?>";
                                                      });'>
                                                      <i class="fa fa-trash"> </i> حذف </a>
                                              </li>
                                              <li>
                                                  <!--data-toggle="modal" data-target="#condModal" class=""
                                                     onclick="load_cond(<?= $row->id?>);"-->

                                                  <a href="<?php echo base_url().'services_orders/family_serv_setting/Serv_setting/load_cond/'.$row->id  ?>">
                                                      <i class="fa fa-list "></i>الضوابط والشروط</a>
                                              </li>

                                          </ul>
                                      </div>

                                  </td>

                              </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>
<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->

<!-- condModal -->


<div class="modal fade" id="condModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">الضوابط والشروط</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" >
                <div class="container-fluid" id="result_cond"></div>

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- condModal -->
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/load_details",
            data: {row_id:row_id},
            beforeSend: function() {
                $('#result').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>
<script>
    function load_cond(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/load_cond",
            data: {row_id:row_id},
            beforeSend: function() {
                $('#result_cond').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (d) {
                $('#result_cond').html(d);

            }
        });

    }
</script>

