<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> </h3>
    </div>
    <div class="panel-body">
    <?php 
    if(isset($result)&&!empty($result))
    {
        $fe2a_fk=$result->fe2a_fk;
        $edara_id=$result->edara_id;     
        $title=$result->title;
        $file=$result->attach_file;
        $nashr_fk=$result->nashr_fk; 
        $halet_3rd=$result->halet_3rd;
        $d_date_ar=$result->d_date_ar;
        $rkm=$result->rkm;
        $ramz=$result->ramz;
        echo form_open_multipart('human_resources/sysat_gam3ia/Sysat_gam3ia_c/update/'.$result->id);
        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
        $folder ='uploads/human_resources/sysat_gam3ia';
    }
    else{ 
        $edara_id='';
        $fe2a_fk='';
        $title='';
        $file='';
        $nashr_fk=''; 
        $halet_3rd='';
        $d_date_ar=date('Y-m-d');
        $rkm='';
        $ramz='';
        echo form_open_multipart('human_resources/sysat_gam3ia/Sysat_gam3ia_c/insert');
    }
    ?>
    <div class="col-xs-12 ">
    <div class="col-md-2 col-sm-4  padding-4">
    <label class="label  "> الفئة </label>
    <select name="fe2a_fk" id="fe2a_fk"  class="form-control"
    onchange="get_f2a();"
    data-validation="required"
    >
                <option value="">إختر</option>
                <?php $arrx = array(
                'sysa' => ' السياسات',
                'laeha' => 'اللوائح',
                'egraa'=>'إجراءت ',
               'namozg'=> 'النماذج'
            );
                foreach ($arrx as $key => $value) {
                    $select = '';
                    if(!empty($fe2a_fk)&& ($fe2a_fk==$key))
                    {
                        $select = 'selected'; 
                    }
?>
                    <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                <?php } ?>
            </select>
    </div>
    <div class="col-md-4 col-sm-4  padding-4">
        <label class="label  "> الإدارة </label>
                <select name="edara_id_fk" id="edara_id_fk" 
                data-validation="required"
                class="form-control  ">
                            <option value="">إختر</option>
                            <?php
                            foreach ($edarat as  $value) {
                                $select = '';
                                if($edara_id==$value->id)
                                {
                                    $select = 'selected'; 
                                }?>
                                <option value="<?=$value->id?>-<?=$value->title?>" <?= $select ?>> <?php echo $value->title; ?></option>
                            <?php } ?>
                        </select>
    </div>
    <div id="result_files">
   <?php if(empty($fe2a_fk) || $fe2a_fk=='laeha' ||$fe2a_fk=='sysa' ){?>
 <div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  ">  الاسم </label>
                    <input type="text"
                  
                    data-validation="required"
                       name="title" id="title" 
                    value="<?=$title?>"
                           class="form-control">
 </div>
 <?php }else if(!empty($fe2a_fk)&& $fe2a_fk=='egraa')
{?>
<div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  ">  اسم الاجراء </label>
                    <input type="text"
                    data-validation="required"
                       name="title" id="title" 
                    value="<?=$title?>"
                           class="form-control ">
 </div>
 <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  ">   رقم الاصدار </label>
                    <input type="text"
                    data-validation="required"
                       name="rkm" id="rkm" 
                    value="<?=$rkm?>"
                           class="form-control ">
 </div>

 <div class="col-md-3 col-sm-4  padding-4">
                    <label class="label  ">  تاريخ الاصدار </label>
                    <input type="date"
                    data-validation="required"
                       name="d_date_ar" id="d_date_ar" 
                    value="<?=$d_date_ar?>"
                           class="form-control ">
 </div>
 <?php }else if(!empty($fe2a_fk)&& $fe2a_fk=='namozg'){?>
    <div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  ">  اسم النموذج </label>
                    <input type="text"
                    data-validation="required"
                       name="title" id="title" 
                    value="<?=$title?>"
                           class="form-control ">
 </div>
 <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  ">   رقم النموذج </label>
                    <input type="text"
                    data-validation="required"
                       name="rkm" id="rkm" 
                    value="<?=$rkm?>"
                           class="form-control ">
 </div>

 <div class="col-md-3 col-sm-4  padding-4">
                    <label class="label  ">  رمز النموذج </label>
                    <input type="text"
                    data-validation="required"
                       name="ramz" id="ramz" 
                    value="<?=$ramz?>"
                           class="form-control ">
 </div>

 <?php }?>

 </div>
    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label"> المرفق</label>
     <input type="file" name="file" id="file"  class="form-control " data-validation="required">
     <?php
     if(isset($result->attach_file)&&!empty($result->attach_file))
     {
        $ext = pathinfo($result->attach_file, PATHINFO_EXTENSION);
                                    if (in_array($ext,$image)){
                                 if (!empty($result->attach_file)) {
                                    $url = base_url() .'uploads/human_resources/sysat_gam3ia' .'/'. $result->attach_file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                                <?php
                            }  elseif (in_array($ext,$file)){
                                 if (!empty($result->attach_file) &&($ext=='pdf'||$ext=='PDF')) {
                                   $url = base_url() .  'human_resources/sysat_gam3ia/Sysat_gam3ia_c/read_file/'. $result->attach_file;
                                   ?>
                                    <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                   <?php
                                }else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <?php
                            }}
                         
                        ?>
    
     </div>

     <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  "> النشر </label>
                           <select name="nashr_fk"
                           data-validation="required"
                            id="nashr_fk"  class="form-control">
                                        <option value="">إختر</option>
                                        <?php $nsher = array('all'=> 'داخلي وخارجي'
                                        , 'in_view' => 
                                        'داخلي فقط'
                                        ,'out_view'=>
                                        ' خارجي فقط');
                                        foreach ($nsher as $key => $value) {
                                            $select = '';
                                            if($nashr_fk==$key)
                                            {
                                                $select = 'selected'; 
                                            }
                                    
 ?>
                                            <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                </div>
                <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  "> حالة العرض </label>
                           <select name="halet_3rd" id="halet_3rd" 
                           data-validation="required"
                           data-validation="required"
                            class="form-control">
                                        <option value="">إختر</option>
                                        <?php $halet = array('active' => 'نشط'
                                        , 'unactive' => 
                                        ' غير نشط');
                                        foreach ($halet as $key => $value) {
                                            $select = '';
                                            if($halet_3rd==$key)
                                            {
                                                $select = 'selected'; 
                                            }
                                    
 ?>
                                            <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                </div>
            
                 <div class="col-xs-12 text-center" style="margin-top: 29px;">
      <button type="submit"
                    class="btn btn-labeled btn-success " 
                    >
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
            </div>
            <?php echo form_close() ?>
            </div>
            </div>
            </div>
            </div>
           


            <?php if (isset($one_data) && !empty($one_data)){
                        $x=1;
                        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                            $folder ='uploads/human_resources/sysat_gam3ia';
                        ?>
                        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> </h3>
    </div>
    <div class="panel-body">
                    <table id="" class="example table  table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                              <th>الفئة</th>
                              <th>الادارة</th>
                              <th> الاسم</th>
                              <th> المرفق</th>
                              <th>القائم بالاضافة</th>
                              <th> حالة العرض</th>
                              <th>النشر</th>
                              <th>الاجراء</th>
                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        foreach ($one_data as $row){
                           
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td> <?php $arrx = array(
                'sysa' => ' السياسات',
                'laeha' => 'اللوائح',
                'egraa'=>'إجراءت ',
               'namozg'=> 'النماذج'
            );
            if(!empty($row->fe2a_fk))
                                          {
                                            echo $arrx[$row->fe2a_fk];
                                          }
            
                                        ?>
                                            </td>
                                <td><?php 
                                      
                                          if(!empty($row->edara_n))
                                          {
                                              echo $row->edara_n;
                                          }
                                        ?></td>
                                <td>
                                    <?php
                                    if (!empty($row->title)){
                                        echo $row->title;
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
                                
                                <td>
                                    <!--  -->
                                    <?php
                                    $ext = pathinfo($row->attach_file, PATHINFO_EXTENSION);
                                    if (in_array($ext,$image)){
                                 if (!empty($row->attach_file)) {
                                    $url = base_url() .'uploads/human_resources/sysat_gam3ia' .'/'. $row->attach_file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                                <?php
                            }  elseif (in_array($ext,$file)){
                                 if (!empty($row->attach_file) &&($ext=='pdf'||$ext=='PDF')) {
                                   $url = base_url() .  'human_resources/sysat_gam3ia/Sysat_gam3ia_c/read_file/'. $row->attach_file;
                                   ?>
                                    <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                   <?php
                                }else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
<?php
 if(!empty($row->attach_file) &&($ext=='doc'||$ext=='docx')){?>
    <a href="<?= base_url().'human_resources/sysat_gam3ia/Sysat_gam3ia_c/download_file'.'/'.$row->id?>" >  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a>
<?php }
?>
                                <?php
                            }
                         else {
                            echo 'لا يوجد';
                        }
                        ?>
                                    <!--  -->
                                </td>
                                <td>
                                <?php
                                    if (!empty($row->publisher_name)){
                                        echo $row->publisher_name;
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                <?php
                                $halet = array('active' => 'نشط'
                                , 'unactive' => 
                                ' غير نشط');

                                    if (!empty($row->halet_3rd)){
                                        echo $halet[$row->halet_3rd];
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                <?php
$nsher = array('all'=> 'داخلي وخارجي'
, 'in_view' => 
'داخلي فقط'
,'out_view'=>
' خارجي فقط');
                                    if (!empty($row->nashr_fk)){
                                        echo $nsher[$row->nashr_fk];
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                <a onclick="get_details(<?= $row->id ?>)"
 aria-hidden="true"
data-toggle="modal"
data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <a onclick='swal({
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
        window.location="<?= base_url() . 'human_resources/sysat_gam3ia/Sysat_gam3ia_c/edite/' .$row->id ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
<a onclick=' swal({
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
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/sysat_gam3ia/Sysat_gam3ia_c/Delete_attach/' .$row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
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
                    <?php
                    }
                    ?>
             
             <div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>
            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/sysat_gam3ia/Sysat_gam3ia_c/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>
<script>
$('#example88').DataTable( {
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
<script>
    function get_f2a() {
        var fe2a=$('#fe2a_fk').val();
       
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/sysat_gam3ia/Sysat_gam3ia_c/get_f2a",
            data:{fe2a:fe2a},
            beforeSend: function () {
                $('#result_files').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                    $("#result_files").html(html);
            }
        });
        
        
    }
</script>
<script>
    function show_img(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>
    function show_bdf(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
