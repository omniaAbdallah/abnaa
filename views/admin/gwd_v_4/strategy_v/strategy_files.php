<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>


<style type="text/css">
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    . {
        font-size: 13px;
    }
</style>

<?php
    echo form_open_multipart('gwd/strategy/Strategy/strategy_files/' . $this->uri->segment(5),array("class"=>"form_strategy_files"));

?>

<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
            <div class="pull-left">
                <?php
                $data_load["pln_rkm"] = $pln_rkm;
                $data_load["pln_id"] = $this->uri->segment(5);
                $this->load->view('admin/gwd_v/strategy_v/drop_down_menu', $data_load); ?>
            </div>
        </div>
<!-- details -->
<div class="col-xs-12 no-padding">
                   <div class="col-sm-12 col-xs-12">
                        <table class="table  table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <tr>
                                <th style="width: 110px">اسم الخطه </th>
                                <td>
                                  <span class="label" style="background-color: #32e26b"> 
                                  <?= $get_all->pln_name ?>
                             </span>
                               </td>
                               <th>تاريخ البدايه </th>
                                <td><?= $get_all->pln_from_date ?> </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th> الرؤيه </th>
                                <td><?= $get_all->pln_roya ?></td>
                                <th>تاريخ النهايه </th>
                                <td><?= $get_all->pln_to_date ?> </td>
                                 
                            </tr>
                            <tr>
                                <th>الرساله </th>
                                <td><?= $get_all->pln_resala ?></td>
                                <th>  مراجع الخطه</th>
                                <td> <span class="label" style="background-color: #32e26b"><?= $get_all->pln_reviser_name ?></span></td>
                       
                            </tr>
                            <tr>
                                <th> القيم </th>
                                <td><?= $get_all->pln_qiam ?></td>
                                <th>معتمد الخطه</th>
                                <td> <span class="label" style="background-color: #ff8080"><?= $get_all->pln_suspender_name ?></span></td>
                           
                            </tr>
                            </tbody>
                        </table>
                </div>
	</div>
    <!-- details -->
        <div class="panel-body form_strategy_files">
<!-- 
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label "> إسم المرفق</label>
                <input type="text" class="form-control  testButton inputclass"
                       name="title" id="title"
                       data-validation="required"
                       value="">

            </div> -->
            <div class="form-group col-sm-3 col-xs-12">
                        <label class="label  ">اسم المرفق </label>
                        <input type="text"   name="title" id="title"
                               class="form-control testButton inputclass"  data-validation="required"
                               style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                               onclick="$(this).attr('readonly','readonly'); $('#Modal_morfq').modal('show'); get_details_morfq();"
                               onblur="$(this).attr('readonly','readonly')"
                               onkeypress="return isNumberKey(event);"
                               readonly>
                               <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                        <button type="button" data-toggle="modal" data-target="#Modal_morfq"
                        onclick="get_details_morfq()"
                                class="btn btn-success btn-next">
                            <i class="fa fa-plus"></i></button>
               </div>
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label "> إرفاق الملف</label>
                <input type="file" class="form-control bottom-input" name="strategy_file" id="strategy_file"
                       data-validation="required"/>
            </div>


            <div class="col-xs-12 text-center">

                <button type="button" id="add" name="add" value="حفظ"
                        onclick="insert_strategy_file('form_strategy_files');" class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
            </div>
            <div class="clearfix"></div><br>


        </div>



    </div>
</div>


<?php echo form_close(); ?>

<div id="strategy_files_table">
<?php
if (isset($allData) && !empty($allData)){
    $x = 1;

    ?>
    <table class="example table table-bordered responsive nowrap" cellspacing="0" width="100%">
        
        <thead>

                          <tr class="greentd">

                              <th>م</th>

                              <th>نوع الملف</th>

                              <th>اسم الملف</th>

                              <th> الملف</th>

                              <th>الحجم</th>

                              <th>التاريخ</th>

                              <th>بواسطة</th>

                              <th>الاجراء</th>

                          </tr>

                        </thead>
        <tbody>
        <?php
        foreach ($allData as $data){
            
                    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                    $ext = pathinfo($data->file_attached, PATHINFO_EXTENSION);
                    $Destination ='uploads/gwd/strategy_pln_file/'.$data->file_attached;

                    if (file_exists($Destination)){

                        $bytes=  filesize($Destination) ;

                    } else{

                        $bytes ='';

                    }

                     $size = '';

                    if ($bytes >= 1073741824)

                    {

                        $size = number_format($bytes / 1073741824, 2) . ' GB';

                    }

                    elseif ($bytes >= 1048576)

                    {

                        $size = number_format($bytes / 1048576, 2) . ' MB';

                    }

                    elseif ($bytes >= 1024)

                    {

                        $size = number_format($bytes / 1024, 2) . ' KB';

                    }

                    elseif ($bytes > 1)

                    {

                        $size = $bytes . ' bytes';

                    }

                    elseif ($bytes == 1)

                    {

                        $size = $bytes . ' byte';

                    }

                    else

                    {

                        $size = '0 bytes';

                    }
            ?>
            <tr>
                <td><?= $x++?></td>
                <td>

                                    <?php

                                    if (in_array($ext,$image)){?>

                                    <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>

                                   <?php } elseif (in_array($ext,$file)){?>

                                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>

                                  <?php  }

                                    ?>

                                </td>

                <td><?php
                    if (!empty($data->title)){ echo $data->title;}?></td>
                <td>
                    <?php

                    if (in_array($ext,$image)){
                        ?>
                        <a data-toggle="modal" data-target="#myModal-view-<?= $data->id ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <div class="modal fade" id="myModal-view-<?= $data->id ?>" tabindex="-1"
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
                                        <img src="<?= base_url()."uploads/gwd/strategy_pln_file/".$data->file_attached ?>"
                                             width="100%">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }elseif (in_array($ext,$file)){
                        ?>
                        <a data-toggle="modal" data-target="#myModal-pdf-<?= $data->id ?>">

<i class="fa fa-eye" title=" قراءة"></i> </a>

<!-- modal view -->

<div class="modal fade" id="myModal-pdf-<?= $data->id ?>" tabindex="-1"

 role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal"

                    aria-label="Close"><span aria-hidden="true">&times;</span>

            </button>

            <h4 class="modal-title" id="myModalLabel">الملف</h4>

        </div>

        <div class="modal-body">

        <iframe src="<?=base_url()."gwd/strategy/Strategy/read_strategy_file/".$data->file_attached?>" style="width: 100%; height:  640px;" frameborder="0"></iframe>

        </div>

        <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">

                إغلاق

            </button>

        </div>

    </div>

</div>

</div>


                        <?php
                    }
                    ?>

                    

                </td>
                <td>

<?= $size?>

</td>

<td>

<?php

if (!empty($data->date_ar)){

    echo $data->date_ar;

} else{

    echo 'غير محدد  ' ;

}

?>

</td>

<td>

<?php

if (!empty($data->publisher_name)){

    echo $data->publisher_name;

} else{

    echo 'غير محدد  ' ;

}

?>

</td>
                <td>
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
                        delete_strategy_file(<?=$data->id?>);
                        });'
                        >
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



<script type="text/javascript">
    $(document).ready(function() {

        load_strategy_files();
    });
</script>
<script type="text/javascript">

    function load_strategy_files() {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/strategy/Strategy/load_strategy_files/<?=$this->uri->segment(5)?>",

            beforeSend: function () {
                $('#strategy_files_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function(d) {
                $('#strategy_files_table').html(d);
            }
        });
    }
//gwd/strategy/Strategy/strategy_files
    function insert_strategy_file(div) {
        var all_inputs = $('.'+div+' [data-validation="required"]');

        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val() != '') {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");

            }
        });


        var form_data = new FormData();
        var files = $('#strategy_file')[0].files;
        form_data.append("strategy_file", files[0]);
        form_data.append('add', 1);

        var serializedData = $('.'+div).serializeArray();
        $.each(serializedData, function (key, item) {
            //console.log(item.name+': ' + item.value);
            form_data.append(item.name, item.value);
        });

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/strategy/Strategy/strategy_files/<?=$this->uri->segment(5)?>',
            data: form_data,
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم الحفظ ',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                all_inputs.each(function (index, elem) {
                    $(elem).val('');

                });
                load_strategy_files();

                //window.location.reload
            }
        });
    }

    function delete_strategy_file(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/strategy/Strategy/delete_strategy_file',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                load_strategy_files();
                //window.location.reload();

            }
        });

    }

</script>


<!-- yara -->
<!-- yara -->
<div class="modal fade" id="Modal_morfq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title "> اسماء المرفقات </h4>
        </div>
        <div class="modal-body">
            <div id="morfq_show">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <button type="button" class="btn btn-labeled btn-success "
                                    onclick="$('#geha_input11113').show(); show_add()"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span> 
                                اضافه اسم المرفق
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">
                        <div id="geha_input11113" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label   ">اسم المرفق  </label>
                                <input type="text" name="morfq" id="morfq" data-validation="required"
                                       value=""
                                       class="form-control ">
                                <input type="hidden" class="form-control" id="s_id" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4" id="div_add_morfq" style="display: block;">
                                <button type="button" onclick="add_morfq($('#morfq').val())"
                                        style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                            <div class="col-sm-3  col-md-3 padding-4" id="div_update_morfq" style="display: none;">
                                <button type="button"
                                        class="btn btn-labeled btn-success " name="save" value="save" id="update_morfq">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div id="myDiv_morfq"><br><br>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</div>
</div>
<!-- yara -->
<script>
function get_details_morfq() {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_morfq",
        beforeSend: function () {
            $('#myDiv_morfq').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#myDiv_morfq').html(d);
        }
    });
}
</script>
<script>
function getTitle_morfq(value,id) {
    //$('#travel_type_fk').val(id);
    $('#title').val(value);
    $('#Modal_morfq').modal('hide');
}
</script>
<script>
function add_morfq(value) {
  $('#div_update_morfq').hide();
  $('#div_add_morfq').show();
  //  alert(value);
  if (value != 0 && value != '' ) {
      var dataString = 'morfq=' + value ;
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_morfq',
          data: dataString,
          dataType: 'html',
          cache: false,
          success: function (html) {
            //  $('#reason').val(' ');
            $('#morfq').val('');
          //  $('#Modal_esdar').modal('hide');
              swal({
                  title: "تمت الاضافه!",
  }
  );
  get_details_morfq();
          }
      });
  }
}
</script>
<script>
function update_morfq(id) {
    var id = id;
    $('#geha_input11113').show();
    $('#div_add_morfq').hide();
    $('#div_update_morfq').show();
    $.ajax({
        url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_morfq",
        type: "Post",
        dataType: "html",
        data: {id: id},
        success: function (data) {
            var obj = JSON.parse(data);
            //console.log(obj);
           console.log(obj.title);
            $('#morfq').val(obj.title);
        }
    });
    $('#update_morfq').on('click', function () {
        var morfq = $('#morfq').val();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_morfq",
            type: "Post",
            dataType: "html",
            data: {morfq: morfq,id: id},
            success: function (html) {
                //  alert('hh');
                $('#morfq').val('');
                $('#div_update_morfq').hide();
                $('#div_add_morfq').show();
               // $('#Modal_esdar').modal('hide');
                swal({
                    title: "تم التعديل!",
    }
    );
    get_details_morfq();    
            }
        });
    });
}
</script>
<script>
    function delete_morfqqq(id) {
    //  confirm('?? ??? ????? ?? ????? ????? ?');
         var r = confirm('هل انت متاكد من الحذف ?');
    if (r == true) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                //   alert(html);
                $('#morfq').val('');
               // $('#Modal_esdar').modal('hide');
                swal({
                    title: "تم الحذف!",
    }
    );
    get_details_morfq();
            }
        });
    }
}
</script>