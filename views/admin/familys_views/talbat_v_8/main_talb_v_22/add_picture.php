<style type="text/css">
    .reply-comment{
        display: inline-block;
        width: 100%;
        margin-bottom: 20px
    }
    .reply-img{
        width: 15%;	
        float: right;
    }
    .reply-img img{
        width: 100%;
        max-width: 70px;
        height: 70px;
        border:1px solid #eee;
    }
    .reply-comment{
        float: right;
        width: 85%;
    }
    .label-inverse{
        background-color: #888;
        color: #fff;
    }
    .reply-comment  span.label{
        text-align: center;
        padding-right: 10px;
        display: inline-block;
        width: auto;
        font-size:14px;
    }
    .reply-comment .name{
        color: #888;
        font-size:15px;
    }
    .comments-sec .well{
        height: 100%;
    }
    .bubble-div img{
        width: 150px;
        max-width: 100%;
    }
    .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
        margin: 0 0 0 0;
    }
</style>
<div class="col-md-12 no-padding">

    <div class="col-md-12 col-sm-11 no-padding">
    <div class="col-xs-12 padding-4">
    

           <div class="vertical-tabs">
			
				<p>
</p>
<div class="row" style="    height: 40px;">
    <div class="col-xs-12 ">
    <div class="row" style="    height: 120px;">
 <input type="hidden" id="row" name="row" value="<?= $talab_rkm_fk; ?>">
 <div class="col-md-6 col-sm-4  ">
                    <label class="label  ">   اسم المرفق </label>
                    <input type="text"   name="title[]" id="title" 
                           class="form-control ">
                </div>
    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label"> المرفق</label>
     <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
     </div>
     
                 <div class="col-xs-2 text-center" style="margin-top: 29px;">
      <button type="button"
                    class="btn btn-labeled btn-success "  onclick="upload_img(<?= $talab_rkm_fk; ?>)"
                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
            </div>
    </div>
    </div>
</div>
<!-- yara -->
<div class="clearfix"></div><br>
<div class="col-xs-12" id="morfaq_result">
<div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                    <?php
                    if (isset($morfqat) && !empty($morfqat)) {
                    $z = 1;
                    foreach ($morfqat as $row) { ?>
                        <li id="row_<?= $z ?>" >
                            <?php
                            $ext = pathinfo($row->file, PATHINFO_EXTENSION);
                            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                            if (in_array($ext, $img)) {
                                ?>
                                <span class="mailbox-attachment-icon has-img" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                    <img
                                            src="<?php if (file_exists('uploads/family_attached/osr_talbat_files/'.$row->file)) {
                                                echo base_url() .'uploads/family_attached/osr_talbat_files/'.$row->file;
                                            } ?> " alt="Attachment">
                                </span>
                                <div class="mailbox-attachment-info">
                                   
                                    <span class="mailbox-attachment-size">
                                       
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                        <i class=" fa fa-eye"></i></a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url().'uploads/family_attached/osr_talbat_files/'.$row->file?>"
                                                             width="100%" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal view -->
                                        <a href="<?php echo base_url() . 'family_controllers/talbat/Talb_main_request/download_file/' . $row->file.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                            <a href="#" onclick='
                                                    delete_morfq(<?= $row->id ?>,<?= $row->talab_rkm_fk ?>);' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                            <?php } elseif (in_array($ext, $file_exe)) {
                                $viewpdf = 0;
                                switch ($ext) {
                                    case 'doc':
                                    case 'docx':
                                        $extin = 'word';
                                        break;
                                    case 'xls':
                                    case 'xlsx':
                                        $extin = 'excel';
                                        break;
                                    case 'PDF':
                                    case 'pdf':
                                        $extin = 'pdf';
                                        $viewpdf = 1;
                                        break;
                                    case 'txt':
                                        $extin = 'text';
                                        break;
                                    case 'rar':
                                    case 'zip':
                                    case 'tar.gz':
                                    case 'gz':
                                        $extin = 'archive';
                                        break;
                                    default:
                                        $extin = '';
                                        break;
                                } ?>
                                <span class="mailbox-attachment-icon">
                                    <i class="fa fa-file-<?= $extin ?>-o"></i>
                                </span>
                                <div class="mailbox-attachment-info">
                                   
                                    <span class="mailbox-attachment-size">
                                       
                                        <?php if($viewpdf == 1){ ?>
                                            <a data-toggle="modal" data-target="#myModal-pdf-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                            <i class=" fa fa-eye"></i></a>
                                            <!-- start modal view pdf -->
                                            <div class="modal fade" id="myModal-pdf-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="<?php echo base_url() . 'family_controllers/talbat/Talb_main_request/read_file/' . $row->file ?>" style="width: 100%; height:  640px;" frameborder="0"> </iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal view pdf -->
                                        <?php } ?>
                                        <a href="<?php echo base_url() . 'family_controllers/talbat/Talb_main_request/download_file/' . $row->file.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                        <a href="#" onclick='
                                                    delete_morfq(<?= $row->id ?>,<?= $row->talab_rkm_fk ?>);' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                                <?php
                            } ?>
                        </li>
                    <?php $z++; } } ?>
                </ul>
            </div>
<!-- yara -->
				</div>
                   </div>
				</div>
			
    </div>
</div>
<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">عرض الملف </h4>
            </div>
            <div class="modal-body" > 
            <div class="attachimage">
                   </div>
            </div>
        </div>
    </div>
</div>
<!-- myModal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  </h4>
            </div>
            <div class="modal-body">
                <div id="output">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- myModal Modal -->
<!--  -->

<script>
    function  upload_img(row)
    {
        var files = $('#file')[0].files;
        var title = $('#title').val();
        //var row = $('#row').val();
        console.log(title);
        if(files.length==0)
        {
            swal({
    title: " برجاء ادخال  المرفق ! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
        }
        else if(title==''){
            swal({
    title: " برجاء ادخال   اسم المرفق ! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
        }
        else{
        var error = '';
        var form_data = new FormData();
        for(var count = 0; count<files.length; count++)
        {
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','png','pdf','PNG','PDF','xls','doc','docx','txt','rar']) == -1)
            {
                error += "Invalid " + count + " Image File"
            }
            else
            {
                form_data.append("files[]", files[count]);
                form_data.append("title",title );
                form_data.append("row",row );
            }
        }
        if(error == '') {
            $.ajax({
                url:"<?php echo base_url(); ?>family_controllers/talbat/Talb_main_request/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend: function (data) {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
            },
                success:function(data)
                {
                   // alert(data);
                     //$('#images').show();
                     swal("تم الحفظ بنجاح !");
                     $('#title').val('');
                     $('#file').val('');
                        get_details(row);
                 }
             });
        }
    }
    }
</script>
<script>
  function delete_morfq(id,row) {
    swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم!",
  cancelButtonText: "لا!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>family_controllers/talbat/Talb_main_request/delete_morfq',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
             // $('#Modal_esdar').modal('hide');
              swal({
                  title: "تم الحذف بنجاح!",
  }
  );
  console.log(row);
  get_details(row);
          }
      });
    } else {
    swal("تم الالغاء","", "error");
  }
});
  }
</script>
<script>
    function get_details(id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>family_controllers/talbat/Talb_main_request/load",
            beforeSend: function () {
                $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#morfaq_result').html(d);
            }
        });
    }
</script>
<script>
    function val_id(val_id)
    {
        $('#row_id').val(val_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/talbat/Talb_main_request/get_fatora_attach",
            data: {
                val_id: val_id,
            },
            success: function (d) {
                $(".attachimage").html(d);
            }
        });
    }
</script>
<!-- links -->
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
    function get_details_title(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/talbat/Talb_main_request/load_details",
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
<!-- example12 -->

<script>



$('#example12').DataTable( {



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
