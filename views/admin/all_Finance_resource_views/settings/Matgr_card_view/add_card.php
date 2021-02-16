<style type="text/css">
    h4 {
        font-size: 18px;
    }
    h5 {
        font-size: 14px;
    }
    b {
        font-weight: bold;
    }
    .space {
        margin-bottom: 20px;
    }
</style>

<div class="col-sm-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?> </h3>
        </div>
        <div class="panel-body" style="min-height: 485px;">
            <div class="vertical-tabs">
              <ul class="nav nav-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1">
                        إضافة البطاقات الإلكترونية </a>
                    </li>
                    <li class="nav-item">
                        <a id="page2" class="nav-link " data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2">
                           ربط البطاقات الإلكترونية </a>
                    </li>
                </ul>
                <div class="tab-content tab-content-vertical">
                    <div class="tab-pane active" id="pag1" role="tabpanel">
                        <div class="row" style="    height: 5px;">
                            <div class="col-md-12">

                                    <div class="col-md-12 load_addcard">
                                        <div class="form-group col-md-4 col-sm-6">
                                            <label class="label"> أسم البطاقة </label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                   data-validation="required"
                                                   value=""/>
                                            <input type="hidden" id="ttype" name="ttype" value="1"/>
                                        </div>
                                        <div class="col-md-12 col-xs-12 text-center" style="margin-bottom: 10px;">
                                            <button type="buttons" name="save" value="save" id="saves" class="btn btn-success btn-labeled" value="حفظ"
                                                    onclick="add_card('load_addcard');" >
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>

                                    </div>

                                    <div class="col-md-12" id="cards_table"></div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pag2" role="tabpanel">
                        <div id="pageresult" class="row" style="height: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//echo form_close();
?>
<!----------------------rehab --------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">إعدادات البطافات الإلكترونية</h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_code"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------------------------------->

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        load_cards_table();
        //load_table_r();
    });

    $('#page2').click(function(){
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Matgr_card/load_pageresults',
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#pageresult').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $('#pageresult').html(html);
                load_table_r();
            }
        });
    });
    function add_card(div,type=1) {
        //console.log(div);

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
        if (div == 'load_addcard'){
            var title = $('#title').val();
            var ttype = $('#ttype').val();
            form_data.append('title', title);
        }else{
            var ttype = $('#ttype2').val();
            var card_id_fk = $('#card_id_fk').val();
            var bank_id_fk = $('#bank_id_fk').val();
            var account_id_fk = $('#account_id_fk').val();
            var account_num_id_fk = $('#account_num_id_fk').val();
            var card_status = $('#card_status').val();

            form_data.append('card_id_fk', card_id_fk);
            form_data.append('bank_id_fk', bank_id_fk);
            form_data.append('account_id_fk', account_id_fk);
            form_data.append('account_num_id_fk', account_num_id_fk);
            form_data.append('card_status', card_status);
        }

        form_data.append('ttype', ttype);
        form_data.append('save', 1);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Matgr_card/addCard',
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
                        title: 'جاري الحفظ  ',
                        type: 'success',
                        confirmButtonText: 'تم'
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
                var all_inputs = $('.'+div+' [data-validation="required"]');
                all_inputs.each(function (index, elem) {
                        $(elem).val("");
                });
                if(type == 1) {
                    load_cards_table();
                }else if(type == 2){
                    load_table_r();
                }
                //window.location.reload
            }
        });
    }
    function delete_card(elem,id) {
        $(elem).closest("tr").remove();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Matgr_card/delete_card',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                //window.location.reload();
            }
        });
    }

    function load_cards_table() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Matgr_card/load_cards',
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#cards_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $('#cards_table').html(html);
            }
        });
    }
    function load_table_r() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Matgr_card/load_results',
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#results_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $('#results_table').html(html);
            }
        });
    }

    function load_details(row_id){

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Matgr_card/load_details',
            data: {row_id: row_id},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#myDiv_code').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $('#myDiv_code').html(html);
            }
        });
    }


</script>