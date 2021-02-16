

            
                    <div class="col-sm-12 form-group">
                      
                      <div class="col-sm-2  col-md-2 padding-2 ">
                      <input type="hidden" class="form-control" id="mo3mla_id_fk<?= $mo3mla?>" value="<?= $mo3mla?>">
                      <input type="hidden" class="form-control" id="mo3mla_type<?= $mo3mla?>" value="<?=$type?>">
                      <label class="label "> نوع الظرف</label>
                      <select  type="text" name="type_zarf" id="type_zarf<?= $mo3mla?>"
                              value=""
                              class="form-control  "   >
                          <option value="">اختر</option>
                          <?php
                          $type_zarf = array('1'=>'صغير ','2'=>'كبير');
                          foreach ($type_zarf as $key=>$value){
                              ?>
                              <option value="<?= $key?>"
                              ><?= $value?></option>
                              <?php
                          }
                          ?>
                      </select>
                      </div>
                      <div class="col-sm-2  col-md-2 padding-2 ">
                          <label class="label   ">  بدايه اللقب </label>
                          <!-- <input type="text" name="start_title" id="start_title" 
                                 value=""
                                 class="form-control "> -->
                                 <select name="start_title" id="start_title<?= $mo3mla?>"
                  class="selectpicker no-padding form-control "
                  data-show-subtext="true" data-live-search="true" aria-required="true">
              <option value="">اختر</option>
              <?php if (!empty($startings)) {
                  foreach ($startings as $greeting) { ?>
                      <option value="<?= $greeting->title_setting ?>"> <?= $greeting->title_setting ?> </option>
                  <?php }
              } ?>
          </select>
                         
                      </div>
                      <div class="col-sm-2  col-md-2 padding-2 ">
                          <label class="label   ">   اسم الجهه </label>
                          <input type="text" name="geha_name" id="geha_name<?= $mo3mla?>" 
                                 value=""
                                 class="form-control ">
                         
                      </div>
                      <div class="col-sm-2  col-md-2 padding-2 ">
                          <label class="label   ">  نهايه اللقب </label>
                          <!-- <input type="text" name="end_title" id="end_title" 
                                 value=""
                                 class="form-control "> -->
                               
          <select name="end_title" id="end_title<?= $mo3mla?>"
                  class="selectpicker no-padding form-control "
                  data-show-subtext="true" data-live-search="true" aria-required="true">
              <option value="">اختر</option>
              <?php if (!empty($greetings)) {
                  foreach ($greetings as $greeting) { ?>
                      <option value="<?= $greeting->title_setting ?>"> <?= $greeting->title_setting ?> </option>
                  <?php }
              } ?>
          </select>
                         
                      </div>
                      <div class="col-sm-3  col-md-2 padding-4"  style="display: block;">
                          <button type="button" onclick="add_print_zarf(<?= $mo3mla?>)"
                                  style="margin-top: 27px;"
                                  class="btn btn-labeled btn-warning" name="save" value="save">
                              <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعه
                          </button>
                      </div>
                      
              </div>
          </div>
              <br>
              <br>

    
<?php if(isset($all_print_zarf)&&!empty($all_print_zarf)){
                  $x=1;
                  ?>
              <table id="zarf<?=$mo3mla?>" class="table  table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>   رقم المعامله</th>
                        <th>    بدايه اللقب</th>
                        <th> اسم الجهه</th>
                        <th> نهايه اللقب</th>
                        <th>  القائم بالاضافه</th>
                        <th>   الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_print_zarf as $row){
                        ?>
                        <tr>
                            <td><?= $x; ?></td>
                            <td><?= $row->mo3mla_id_fk;?></td>
                            <td><?=  $row->start_title;?></td>
                            <td><?=  $row->geha_name;?></td>
                            <td><?=  $row->end_title;?></td>
                            <td><?=  $row->publisher_name;?></td>
                            <td>
                            
                            <a href="#" onclick="delete_print_zarf(<?= $row->id ?>,<?= $row->mo3mla_id_fk ?>);"> <i class="fa fa-trash"> </i></a>
                            <a href="#" onclick="print_zarf(<?= $row->id ?>);"> <i class="fa fa-print"> </i></a>
                            </td>
                        </tr>
                        <?php $x++; }?>
                    </tbody>
                    </table>
<?php }?>
<script>
    $('#zarf'+<?=$mo3mla?>).DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },
            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );
</script>