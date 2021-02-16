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

            <div class="form-group col-sm-3 col-xs-12">
                <label class="label "> إسم المرفق</label>
                <input type="text" class="form-control  testButton inputclass"
                       name="title" id="title"
                       data-validation="required"
                       value="">

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
        <tr class="info">
            <th class="text-center"> م</th>
            <th class="text-center">إسم المرفق</th>
            <th class="text-center">  المستند</th>
            <th class="text-center">  الاجراء</th>



        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allData as $data){
            ?>
            <tr>
                <td><?= $x++?></td>
                <td><?php
                    if (!empty($data->title)){ echo $data->title;}?></td>
                <td>
                    <?php
                    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                    $ext = pathinfo($data->file_attached, PATHINFO_EXTENSION);
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
                        <a target="_blank" href="<?=base_url()."gwd/strategy/Strategy/read_strategy_file/".$data->file_attached?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                        <?php
                    }
                    ?>

                    <a href="<?=base_url()."gwd/strategy/Strategy/downloads/".$data->file_attached?>" download>
                        <i class="fa fa-download" title="تحميل"></i>
                    </a>

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


