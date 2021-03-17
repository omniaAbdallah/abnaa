<style type="text/css">
    .padd {
        padding: 0 3px !important;
    }

    .no-padding {
        padding: 0;
    }

    .no-margin {
        margin: 0;
    }

    h4 {
        margin-top: 0;
    }

    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }

    .btn-label {
        left: 12px;
    }

    .tree ul {
        margin-right: 10px;
        position: relative;
        margin-left: 0;
    }

    .tree ul li {
        padding-left: 0;
    }

    .tree ul ul {
        margin-left: 0;
    }

    @media (min-width: 992px) {
        .col_md_10 {
            width: 10%;
            float: right;
        }

        .col_md_15 {
            width: 15%;
            float: right;
        }

        .col_md_20 {
            width: 20%;
            float: right;
        }

        .col_md_25 {
            width: 25%;
            float: right;
        }

        .col_md_30 {
            width: 30%;
            float: right;
        }

        .col_md_35 {
            width: 35%;
            float: right;
        }

        .col_md_40 {
            width: 40%;
            float: right;
        }

        .col_md_45 {
            width: 45%;
            float: right;
        }

        .col_md_50 {
            width: 50%;
            float: right;
        }

        .col_md_60 {
            width: 60%;
            float: right;
        }

        .col_md_70 {
            width: 70%;
            float: right;
        }

        .col_md_75 {
            width: 75%;
            float: right;
        }

        .col_md_80 {
            width: 80%;
            float: right;
        }

        .col_md_85 {
            width: 85%;
            float: right;
        }

        .col_md_90 {
            width: 90%;
            float: right;
        }

        .col_md_95 {
            width: 95%;
            float: right;
        }

        .col_md_100 {
            width: 100%;
            float: right;
        }
    }

    .label_title_2 {
        width: 100%;
        color: #000;
        height: auto;
        margin: 0;
        font-family: 'hl';
        padding-right: 0px;
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
        display: inline-block;
    }

    .input_style_2 {
        border-radius: 0px;
        width: 100%;
    }

    ul span {
        display: inline !important;
    }

    span.dalel-num {
        padding: 1px 4px;
        border-radius: 2px;
    }

    .scrol_width ::-webkit-scrollbar {
        width: 15px;
        height: 5px;
    }

    .tree li a {
        font-size: 16px;
    }</style>
<style>    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }

    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title"><h4><?php echo $title; ?></h4></div>
    </div>
    <div class="panel-body">
        <div class="form-group col-sm-12 col-xs-12 no-padding">
            <fieldset>
                <legend> بيانات مركز التكلفة الرئيسي</legend>
                <?php echo form_open(base_url() . 'finance_accounting/markz_tklfa/Markz_tklfaa_order/add_markz_tklfaa', array('id' => 'main_markz_form')) ?>
                <div class="col-md-2 col-sm-6 padding-4">
                    <h6 class="label_title_2 ">اسم مركز التكلفة </h6>
                    <input type="text" id="main_markz" name="main_markz" value=""
                           class="form-control " placeholder="اسم مركز التكلفة" data-validation="required"></div>
                <div class="col-md-2 col-sm-6 padding-4">
                    <h6 class="label_title_2 "></h6>
                    <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                            onclick="save_main_marks()"><span class="btn-label"><i
                                    class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
            </fieldset>
        </div>
        <div id="tree_dive">

        </div>

    </div>
    <div class="modal fade " id="add_editMarkz_tklfaa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog " style="width: 80%" role="document">
            <div class="modal-content"
                 id="load_Markz">

            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

    <script>
        $(document).ready(function () {
            get_tree();
        });
    </script>
    <script>
        function save_main_marks() {
            var main_markz = document.getElementById('main_markz').value;
            console.log("main_markz :: " + main_markz);
            if (main_markz.length >= 1) {
                $('#main_markz').css("border-color", "#5cb85c;");

                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/markz_tklfa/Markz_tklfaa_order/add_main_markz_tklfaa',
                    cache: false,
                    data: {main_markz: main_markz},
                    beforeSend: function (xhr) {
                        swal({
                            title: "جاري الحفظ ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function (resp) {
                        document.getElementById('main_markz').value = '';
                        swal({title: 'تم اضافة مركز التكلفة الرئيسي ', type: 'success', confirmButtonText: 'تم'});
                        get_tree();
                    }
                });
            } else {
                swal({title: 'من فضلك اسم مركز التكلفة الرئيسي ', type: 'error', confirmButtonText: 'تم'});
                $('#main_markz').css("border-color", "red");

            }
        }
    </script>

    <script>
        function get_tree() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/markz_tklfa/Markz_tklfaa_order/get_tree',
                cache: false,
                beforeSend: function () {
                    $("#tree_dive").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#tree_dive").html(html);
                    $('#tree3').treed({openedClass: 'fa-minus', closedClass: 'fa-plus'});
                }
            });
        }
    </script>


    <script>
        function save_markz_tklfaa(type) {
            var all_inputs = $('#MyForm_markz_tklfaa [data-validation="required"]');
            var valid = 1;
            var text_valid = "";
            all_inputs.each(function (index, elem) {
                console.log(elem.id + $(elem).val());
                if ($(elem).val() != '') {
                    // valid = 1;
                    $(elem).css("border-color", "#5cb85c;");
                } else {
                    valid = 0;
                    $(elem).css("border-color", "red");
                }
            });
            var markz_no3 = $("input[class='markz_no3']:checked").val();
            if (!markz_no3) {
                valid = 0;
                text_valid += "-نوع مركز تكلفة ";
            }
            $.ajax({
                type: 'post',
                url: $('#MyForm_markz_tklfaa').attr('action'),
                data: $('#MyForm_markz_tklfaa').serialize(),
                cache: false,
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
                        swal({title: 'جاري اضافة مركز تكلفة ', type: 'success', confirmButtonText: 'تم'});
                    }
                },
                success: function (html) {
                    swal({title: 'تم اضافة مركز تكلفة بنجاح', type: 'success', confirmButtonText: 'تم'});
                    if (type == 1) {
                        $('#add_editMarkz_tklfaa').modal('hide');
                        get_tree();
                    } else if (type == 2) {
                        getCode();
                        $('#name').val('');
                        var level = parseFloat($('#level').val()) - 1;
                        $('#level').val(level);
                    }
                }
            });
        }

        function add_editMarkz_tklfaa(id, method, obj, code) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/markz_tklfa/Markz_tklfaa_order/add_editMarkz_tklfaa/' + id,
                data: {id: id, method: method, code: code},
                cache: false,
                beforeSend: function () {
                    $("#load_Markz").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#load_Markz").html(html);

                    if (method == 1) {
                        // var obj = $(obj);
                        $('#parent').val(obj.dataset.parent);
                        $('#parent_name').val(obj.dataset.parent_name);
                        $('#parent_code').val(obj.dataset.parent_code);
                        $('#ttype').val(obj.dataset.ttype);
                        $('#level').val(obj.dataset.level);
                        getCode();
                    }
                }
            });
        }

        function edit_markz_tklfaa_ajex() {

            $.ajax({
                type: 'post',
                url: $('#MyForm_markz_tklfaa').attr('action'),
                data: $('#MyForm_markz_tklfaa').serialize(),
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري التعديل ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    swal({title: 'تم التعديل بنجاح', type: 'success', confirmButtonText: 'تم'});
                    $('#add_editMarkz_tklfaa').modal('hide');
                    get_tree();
                }
            });
        }
    </script>
    <script>
        function getCode() {
            var from_id = $("#from_id").val();
            var level = parseFloat($('#level').val()) + 1;
            $('#level').val(level);
            if ($('#parent').val()) {
                var dataString = 'id=' + $('#parent').val();
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/markz_tklfa/Markz_tklfaa_order/getLastSubCode',
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        var obj = JSON.parse(result);
                        $('#hesab_tabe3a').val(obj.markz_data['hesab_tabe3a']);
                        $('#hesab_report').val(obj.markz_data['hesab_report']);

                        if (obj.last_sub_code) {
                            code = parseFloat(obj.last_sub_code) + 1;
                        }
                        if (obj.last_sub_code == 0 && (level - 1) > 0) {
                            code = $('#parent_code').val();
                            // code = $('#parent').find('option:selected').attr('code');
                            for (i = 1; i < (level - 1) && i < 3; i++) {
                                code = code + 0;
                            }
                            code = code + 1;
                        }
                        $('#code').val(code);
                    }
                });

            }
        }
    </script>


