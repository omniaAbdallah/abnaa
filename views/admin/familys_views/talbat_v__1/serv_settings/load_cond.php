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
    input[type="checkbox"][readonly] {
        pointer-events: none;
    }
</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> </h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 no-padding"  id="result">
            
        </div>
        <div class="clearfix"></div><br>
        <div class="col-xs-12 no-padding" >
            <!-- Nav tabs -->
            
            <ul class="nav nav-tabs">
                <li class="active"><a href="#cond"  data-toggle="tab"><i class="fa fa-list  fa-2x" style="display: block;text-align: center"></i>وصف الخدمة</a></li>
                <li><a  onclick="load_data(<?= $result->id?>,2,'files_result')" href="#files" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> المستندات المطلوبة </a></li>
                <li><a  onclick="load_data(<?= $result->id?>,1,'steps_result')" href="#steps" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> خطوات تنفيذ الخدمة </a></li>
                

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade  in active" id="cond">
                <?php
               if(isset($result)&&!empty($result))
               {
$wasf_khdma=$result->wasf_khdma;
$dawabet_shroot=$result->dawabet_shroot;
$knawat_khdma=$result->knawat_khdma;
$mostwa_khdma=$result->mostwa_khdma;

               }else
               {
                $wasf_khdma='';
                $dawabet_shroot='';
                $knawat_khdma='';
                $mostwa_khdma='';
             
               }

               ?>
                  <?php  echo form_open_multipart(base_url().'family_controllers/talbat/Serv_setting/update_cond/'.$result->id);?>
               <!-- start_form -->

               <div class="custom-tabs" >
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" id="nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#main-detailsa" aria-controls="main-detailsa" role="tab" data-toggle="tab">الوصف</a></li>
					<li role="presentation"><a href="#contact-details" aria-controls="contact-details" role="tab" data-toggle="tab">الضوابط والشروط</a></li>
					<li role="presentation"><a href="#health-details" aria-controls="health-details" role="tab" data-toggle="tab"> قنوات الخدمة</a></li>
					<li role="presentation"><a href="#education-details" aria-controls="education-details" role="tab" data-toggle="tab">اتفاقية مستوى الخدمة  </a></li>


				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="main-detailsa">
<div class="col-xs-12 padding-4">



 <div class="form-group col-md-12  ">
                                <label class="label">الوصف</label>
                                <textarea class="form-control editor_1" name="wasf_khdma"
                                data-validation="required"
                                    id="wasf_khdma"><?= $wasf_khdma ?></textarea>
</div>

 </div>
 
</div>
<!--  -->
<div role="tabpanel" class="tab-pane fade  " id="contact-details">

<div class="form-group col-md-12 col-sm-6 ">
                                <label class="label"> الضوابط والشروط</label>
                                <textarea class="form-control editor_2" name="dawabet_shroot"
                                data-validation="required"
                                    id="dawabet_shroot"><?= $dawabet_shroot ?></textarea>
</div>

</div>
<!--  -->
<div role="tabpanel" class="tab-pane fade  " id="health-details">
<div class="form-group col-md-12 col-sm-6 ">
                                <label class="label">  قنوات الخدمة</label>
                                <textarea class="form-control editor_3" name="knawat_khdma"
                                data-validation="required"
                                    id="knawat_khdma"><?= $knawat_khdma ?></textarea>
</div>
</div>
<!--  -->
<div role="tabpanel" class="tab-pane fade  " id="education-details">
<div class="form-group col-md-12 col-sm-6 ">
                                <label class="label">   اتفاقية مستوى الخدمة</label>
                                <textarea class="form-control editor_4" name="mostwa_khdma"
                                data-validation="required"
                                    id="mostwa_khdma"><?= $mostwa_khdma ?></textarea>
</div>
</div>
<!--  -->


<div class="col-xs-12 text-center" style="margin-top: 29px;">
<div class="panel-footer">
    <div class="text-center">
    	<a class="btnPrevious btn btn-labeled btn-warning" style="font-size: 16px;"><span class="btn-label"><i class="fa fa-chevron-right"></i></span>السابق  </a>
	<a class="btnNext  btn btn-labeled btn-warning" style="font-size: 16px;">التالى <span class="btn-label" style="right: auto;left: -14px;"><i class="fa fa-chevron-left"></i></span> </a>
   
    <button type="submit"
                class="btn btn-labeled btn-success "  
                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    </div>
</div>
</form>
</div>

                 
 

 </div>
 <!--  -->
                </div>
                <div role="tabpanel" class="tab-pane fade  " id="files">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                        <label class="label label_title" >  المستندات المطلوبة </label>
                        <input type="text" name="title" id="title_files"
                               value=""
                               class="form-control "  >
                               <input type="hidden" name="khdma_id_fk" id="khdma_id_fk"
                               value="<?=$result->id?>"
                                 >
                                 <input type="hidden" name="type" id="type" value="1">
                               
                    </div>
                    <div class="form-group col-md-2 ">
                        <button type="button"  id="button_file" onclick="add_cond('files_result')" class="btn btn-labeled btn-success "   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اضافة
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12" id="files_result">
                        <?php
                        if (isset($result->files) && !empty($result->files)){
                            $x=1;
                            ?>
                            <table id="" class="table exampleee  table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th class="">المستندات المطلوبة </th>
                                    <th >  الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($result->files  as $row){
                                    ?>
                                    <tr>
                                        <td><?= $x++?></td>
                                        <td><?= $row->title?></td>
                                        <td>
                                            <a href="#" onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                load_edit(<?= $row->id ?>,"<?= $row->title?>",<?= $row->khdma_id_fk ?>,<?= $row->type ?>);
                                                });'>
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="#" onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)
                                                });'>
                                                <i class="fa fa-trash"> </i></a>
                                            <!--<a href="#" data-toggle="modal" data-target="#editModal" onclick="load_edit(<?= $row->id ?>,'<?= $row->title?>',<?= $row->khdma_id_fk ?>,<?= $row->type ?>)" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="#" onclick="delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)"> <i class="fa fa-trash"> </i></a>
                                            -->
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
                <!--  -->
                <div role="tabpanel" class="tab-pane fade  " id="steps">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                        <label class="label label_title" >  خطوات تنفيذ الخدمة </label>
                        <input type="text" name="title" id="title_con"
                               value=""
                               class="form-control "  >
                              
                             
                               
                    </div>
                    <div class="form-group col-md-2 ">
                        <button type="button"  id="button_cond" onclick="add_cond('steps_result')" class="btn btn-labeled btn-success "   style="margin-top: 27px ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اضافة
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12" id="steps_result">
                        <?php
                        if (isset($result->conds) && !empty($result->conds)){
                            $x=1;
                            ?>
                            <table id="" class="table exampleee  table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th class="">  خطوات تنفيذ الخدمة </th>
                                    <th >  الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($result->files  as $row){
                                    ?>
                                    <tr>
                                        <td><?= $x++?></td>
                                        <td><?= $row->title?></td>
                                        <td>
                                            <a href="#" onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                load_edit(<?= $row->id ?>,"<?= $row->title?>",<?= $row->khdma_id_fk ?>,<?= $row->type ?>);
                                                });'>
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="#" onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)
                                                });'>
                                                <i class="fa fa-trash"> </i></a>
                                            
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
                <!--  -->
            </div>
        </div>
    </div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('.editor_1'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_2'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_3'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_4'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    
</script>
<script>
    $(document).ready(function () {
        console.log("ready!  load condition");
        load_page(<?= $this->uri->segment(5)?>);
    });
</script>
    <script>
        function load_page(row_id) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/talbat/Serv_setting/load_details",
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
    function add_cond(div_id) {
        var type = $('#type').val();
        var title ;
        var khdma_id_fk = $('#khdma_id_fk').val();
          if (type==1){
              title = $('#title_con').val();
          }  else if (type==2){
              title = $('#title_files').val();
          }
        if (title !='' ) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/talbat/Serv_setting/add_serv_details",
                data: {type:type,title:title,khdma_id_fk:khdma_id_fk},
                beforeSend: function() {
                    $('#'+div_id).html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (d) {
                    $('#'+div_id).html(d);
                    $('#title_files').val('');
                    $('#title_con').val('');
                    swal({
                        title:" تم الاضافة بنجاح",
                        confirmButtonText:'تم',
                    });
                }
            });
        } else {
            swal({
                title:"برجاء ادخال البيانات !",
                type:'warning',
                confirmButtonText:'تم',
            });
        }
    }
</script>
<script>
    function load_data(row_id,type,div_id) {
        $('#type').val(type);
        $('#title_files').val('');
        $('#title_con').val('');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/talbat/Serv_setting/load_data",
            data: {row_id:row_id,type:type},
            beforeSend: function() {
                $('#'+div_id).html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (d) {
                $('#'+div_id).html(d);
            }
        });
    }
</script>
<script>
    function load_edit(row_id,title,khdma_id_fk,type) {
        
        $('#edit_id').val(row_id);
        $('#khdma_id_fk').val(khdma_id_fk);
        $('#type').val(type);

        if (type==1){
            $('#edit_div_id').val('steps_result');
            $('#title_con').val(title);
            $('#button_cond').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");
            $("#button_cond").attr("onclick","update_cond();");
        }  else if (type==2) {
            $('#edit_div_id').val('files_result');
            $('#title_files').val(title);
            $('#button_file').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");
            $("#button_file").attr("onclick","update_cond();");
        }
    }
</script>
<script>
    function update_cond() {
    
        var row_id = $('#edit_id').val();
        var khdma_id_fk = $('#khdma_id_fk').val();
        var div_id = $('#edit_div_id').val();
        var type = $('#type').val();
        var title;
        if (type==1){
            title =$('#title_con').val();
        }  else if (type==2) {
            title = $('#title_files').val();
        }
        if (title !='' ) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/talbat/Serv_setting/update_serv_details",
                data: {row_id:row_id,title:title,khdma_id_fk:khdma_id_fk,type:type},
                beforeSend: function() {
                    $('#'+div_id).html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (d) {
                  
                    swal({
                        title:" تم التعديل بنجاح",
                        confirmButtonText:'تم',
                    });
                    $('#'+div_id).html(d);
                    $('#title_files').val('');
                    $('#title_con').val('');
                    if (type==1){
                        $('#button_cond').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> اضافة ");
                        $("#button_cond").attr("onclick","add_cond('steps_result');");
                    }  else if (type==2) {
                        $('#button_file').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> اضافة ");
                        $("#button_file").attr("onclick","add_cond('files_result');");
                    }
                }
            });
        } else {
            swal({
                title:"برجاء ادخال البيانات !",
                type:'warning',
                confirmButtonText:'تم',
            });
        }
    }
</script>
<script>
    $('.exampleee').DataTable( {
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
        colReorder: true,
        "bDestroy": true
    } );
</script>
<script>
    function delete_setting(row_id,khdma_id_fk,type) {
        console.log("delete_setting");
        console.log("row_id: "+row_id);
        console.log("khdma_id_fk: "+khdma_id_fk);
        console.log("type: "+type);
        var div_id;
        if (type==1){
            div_id= 'steps_result';
        }  else if (type==2) {
            div_id= 'files_result';
        }
        console.log("div_id: "+div_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>family_controllers/talbat/Serv_setting/delete_serv_details',
            data: {row_id:row_id,khdma_id_fk:khdma_id_fk,type:type},
            dataType: 'html',
            cache: false,
            beforeSend: function() {
                $('#'+div_id).html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {
                swal({
                    title: 'تم الحذف بنجاح !',
                    type: 'warning',
                    confirmButtonText: 'تم'
                });
                $('#'+div_id).html(html);
            }
        });
    }
</script>
<script type="text/javascript">
	$('.btnNext').click(function(){
		$('#nav-tabs  > .active').next('li').find('a').trigger('click');
	});
	$('.btnPrevious').click(function(){
		$('#nav-tabs > .active').prev('li').find('a').trigger('click');
	});
</script>