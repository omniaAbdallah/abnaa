<div class="col-xs-12">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> إدارة السياسات واللوائح</h3>
        </div>
        <div class="panel-body">
            <?php
            if(isset($get_report) && $get_report!=null){
                $form = form_open_multipart("public_relations/website/pr/Systems/Update/".$get_report->id);
            } else{
                $form =form_open_multipart("public_relations/website/pr/Systems/add_reports");
            }
            ?>
            <?php echo  $form;
            ?>
             <div class="form-group col-md-2">
                <label class=""> الفئة</label>
                <select  name="type"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arrx = array(1 => 'السياسات', 2 => 'اللوائح');
                            foreach ($arrx as $key => $value) {
                                $select = '';
                                if ($get_report->type != '') {
                                    if ($key == $get_report->type) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>


            </div>
            <div class="form-group col-md-6">
                <label class="">  العنوان</label>
                <input type="text" name="title" class="form-control" value="<?php if (isset($get_report)){ echo $get_report->title ;}?>">


            </div>
            <div class="form-group col-md-4">
                <label class=""> إختر أيقونة</label>
                <select name="icon" class="choose-date selectpicker form-control"   data-live-search="true">
                    <option value=""> إختر الأيقونة  </option>
                    <?php
                    if (isset($icons) && !empty($icons)){
                        foreach ($icons as $icone){


                            $select="";
                            if (isset($get_report)){
                                $ceck=explode("fa ",$get_report->icon);
                                if($icone->name ==$ceck[1]  ){$select='selected="selected"';}
                            }
                            ?>
                            <option  value="fa <?php echo $icone->name?>" <?php
                            echo $select;

                            ?>
                                     data-content="<i class='fa <?php echo $icone->name?>' aria-hidden='true'></i><?php echo $icone->name?>">

                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>


            </div>

            <div class="form-group col-md-4">
                <label class="">ارفع الملف</label>
                <input class="form-control" name="file" type="file" accept="application/pdf">
                <small class="" style="bottom:-13px;"  >
                    برجاء إرفاق ملف pdf
                </small>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <input type="submit" name="ADD" class="btn btn-purple w-md m-b-5" value="حفظ">



            </div>
            <?php
            echo form_close();
            ?>

        </div>
    </div>
</div>


<div class="col-xs-12">
    <?php
    if (isset($system) && !empty($system)){
    $x =1;
    ?>
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">
            <h3 class="panel-title"> إدارة السياسات واللوائح</h3>
        </div>
        <div class="panel-body">

            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th> العنوان</th>
                      <th> الفئة</th>
                    <th>الأيقونة</th>

                    <th>الملف</th>
                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x = 0;
                foreach ($system as $item){
                    $x++;
                    if($item->type == 1){
                     $type = 'السياسات';   
                    }elseif($item->type == 2){
                      $type = 'اللوائح';      
                    }else{
                      $type = 'غير محدد';      
                    }
                    ?>
                    <tr>
                        <td><?=$x?></td>
                        <td><?= $item->title?></td>
                          <td><?= $type?></td>
                        
                        <td><i class="<?= $item->icon?>"></i></td>

                        <td>
                            <a target="_blank"  href="<?=base_url()."public_relations/website/pr/Systems/read_file/".$item->file?>">
                                <i class="fa fa-eye" title=" قراءة"></i> </a>
                        </td>
                        <td>
                            <a href="<?=base_url()."public_relations/website/pr/Systems/Delete/".$item->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                            <a href="<?=base_url()."public_relations/website/pr/Systems/Update/".$item->id?>" title="تعديل" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        </td>

                    </tr>

                    <?php
                }
                ?>



                </tbody>

            </table>
            <?php
            }
            ?>
        </div>


    </div>



</div>