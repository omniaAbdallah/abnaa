<style type="text/css">
    .bs-callout {
        display: inline-block;
        width: 100%;
        padding: 0 5px 5px 0;
    }

    .bs-callout label {
        font-size: 16px;
        margin-bottom: 0px;
        color: #002542;
        display: block;
        text-align: right;
    }

    .bs-callout .title {
        margin: 23px 0 0 0;
        padding: 8px 5px 8px 0;
        background-color: #95c11f;
        font-size: 18px;
        color: #002542;
        border-radius: 4px;
    }

    .bs-callout .sidebar .panel-success > .panel-heading {
        background-color: #95c11f;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
        margin: 0;
    }

    .bs-callout .sidebar .panel-success > .panel-heading h5 {
        margin: 0
    }

    .bs-callout .sidebar ul li {
        padding: 7px 5px;
    }

    .bs-callout .sidebar ul li a {
        color: #002542;
        font-size: 16px;

    }

    hr {
        margin-top: 5px;
        margin-bottom: 7px;
        border: 0;
        border-top: 1px solid #eee;
    }

    .panel-success > .panel-heading {
        color: #3c763d;
        background-color: #96c73e;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
    }

    .panel-success > .panel-heading h5 {
        margin: 0
    }

    .panel-group .panel-heading .panel-title a {
        font-size: 18px;
        color: #002542;
    }

    .md-content h3 {
        background: #96c73e;
    }

    .btn-rounded {
        border-radius: 2em;
    }

    .btn-warning:after {
        content: "";
        position: absolute;
        left: 0;
        width: 0;
        transition: 0.3s all ease-in;

    }

    .btn-warning:hover:after {
        width: 100%;
        background-color: #96c73e;

    }


    .button8 {
        color: rgba(255, 255, 255, 1);
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        border: 1px solid rgba(255, 255, 255, 0.5);
        position: relative;
        border-radius: 2em:
    }

    .button8 a {
        color: rgba(51, 51, 51, 1);
        text-decoration: none;
        display: block;
    }

    .button8 span {
        z-index: 2;
        /* display: block; */
        /* position: absolute; */
        width: 100%;
        height: 100%;
        color: #fff;
        position: relative;
    }

    .button8::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0%;
        height: 100%;
        z-index: 1;
        opacity: 0;
        background-color: rgba(150, 199, 62, 0.9);
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        border-radius: 30px;


    }

    .button8:hover::before {
        opacity: 1;
        width: 100%;

    }

    .profile-sidebar {
        background-color: #fff;
        border: 1px solid #eee;
        padding: 5px;
        border-radius: 6px;
        box-shadow: -2px 2px 8px #999;
    }

    .profile-sidebar .nav > li > a {

        padding: 10px 4px;
    }

    .profile-sidebar .panel-body {
        padding: 5px;
    }

    .profile-sidebar .btn-compose-email {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .profile-sidebar .nav-pills > li.active > a,
    .profile-sidebar .nav-pills > li.active > a:hover,
    .profile-sidebar .nav-pills > li.active > a:focus {
        color: #fff;
        background-color: #96c73e;
    }

    .panel-default .panel-heading {
        background: rgba(226, 226, 226, 1);
        background: -moz-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226, 226, 226, 1)), color-stop(35%, rgba(219, 219, 219, 1)), color-stop(60%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(254, 254, 254, 1)));
        background: -webkit-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -o-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -ms-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: linear-gradient(to bottom, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0);

    }

</style>

                <?php if ((isset($data)) && (!empty($data))) { ?>

                    <!-- resumt -->
                    <div class="panel panel-success ">

                        <div class="panel-heading resume-heading">
                            <h5>طلب خدمة</h5>
                        </div>
                        <?php echo form_open_multipart(base_url() . 'Web/add_family_order_web') ?>
                        <input type="hidden" name="mother_national_num_fk"
                               value="<?= $data[0]->mother_national_num_fk ?>">
                        <div class="bs-callout bs-callout-danger">
                            <div class="col-lg-12 col-xs-12 no-padding">
                                <div class="col-sm-6 col-md-2 padding-4">
                                    <h5 class="title">بيانات الطلب :</h5>
                                </div>
                                <div class="col-sm-6 col-md-3 padding-4">
                                    <label class="label label-green  ">رقم الطلب </label>
                                    <input type="text" value="<?= $data[0]->order_num ?>" name=""
                                           class="form-control input-style" placeholder="" data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-3 padding-4">
                                    <label class="label label-green  ">رقم ملف الأسرة </label>
                                    <input type="text" value="<?= $data[0]->file_num ?>" name="family_num"
                                           class="form-control input-style" placeholder="" data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-3 padding-4">
                                    <label class="label label-green  ">تاريخ الطلب </label>
                                    <input type="text" value="<?php echo date("Y/m/d") ?>" name="family_order_date"
                                           class="form-control input-style"
                                           placeholder=" " readonly data-validation="required">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="bs-callout bs-callout-danger">
                            <div class="col-lg-12 col-xs-12 no-padding">
                                <div class="col-sm-6 col-md-2 padding-4">
                                    <h5 class="title">بيانات الأسرة :</h5>
                                </div>
                                <div class="col-sm-6 col-md-5 padding-4">
                                    <label class="label label-green  ">إسم رب الأسرة </label>
                                    <input type="text" value="<?= $data[0]->father_name ?>" name=""
                                           class="form-control input-style" placeholder="" data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-5 padding-4">
                                    <label class="label label-green  ">إسم الأم أو الوكيل </label>
                                    <input type="text" value="<?= $data[0]->mother_name ?>" name=""
                                           class="form-control input-style" placeholder="" data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-3 padding-4">
                                    <label class="label label-green  ">عدد أفراد المستفيدين </label>
                                    <input type="text" value="<?= count($data) - 1 ?>" name=""
                                           class="form-control input-style" placeholder=" " data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-2 padding-4">
                                    <label class="label label-green ">نصيب الفرد </label>
                                    <input type="text" value="<?= $data['nasebElfard']['naseb'] ?>" name=""
                                           class="form-control input-style" placeholder=" " data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-2 padding-4">
                                    <label class="label label-green  ">الفئة</label>
                                    <input type="text" value="<?= $data['nasebElfard']['f2a']->title ?>" name=""
                                           class="form-control input-style" placeholder=" " data-validation="required"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-md-3 padding-4">
                                    <label class="label label-green  ">جوال التواصل</label>
                                    <input type="text" value="<?= $data[0]->m_mob ?>" name="m_mob"
                                           class="form-control input-style" placeholder=" " data-validation="required">
                                </div>
                            </div>

                        </div>
                        <hr>

                        <div class="bs-callout bs-callout-danger">
                            <div class="col-md-12 col-xs-12 no-padding">
                                <div class="col-sm-6 col-md-3 padding-4">
                                    <h5 class="title">بيانات الخدمة :</h5>
                                </div>
                                <!--                                details_service_by(this);-->
                                <div class="col-sm-6 col-md-5 padding-4">
                                    <label class="label label-green  ">نوع الخدمة </label>
                                    <select class="form-control" name="ser_order"
                                            onchange=" /*delete_rows('order_table_body');*/ details_service_by(this);getf2at(this,'cat_ser','getf2at_service','cat_name');append_taple(this);">
                                        <option value="">اختر</option>
                                        <?php foreach ($service as $cat) { ?>
                                            <option value="<?= $cat->id ?>"><?= $cat->name_ser ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-4 padding-4 text-center">
                                    <a class="btn btn-warning md-trigger" style=" margin-top: 22px;"
                                       data-modal="modal-1">إستعلامات الخدمة
                                    </a>
<!--                                    <a class="btn btn-warning md-trigger" style=" margin-top: 22px;"-->
<!--                                       onclick="add_ser_order('order_table_body','row_ser')">-->
<!--                                        <i class="fa fa-plus-circle"> اضافة طلب </i>-->
<!--                                    </a>-->
                                </div>

                                <div class="clearfix"></div>
                                <hr>
                                <div class="col-xs-12 no-padding">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr id="th_ser">
                                            <th>م</th>
                                            <th>فئة الخدمة</th>
                                            <th>الوصف</th>
                                            <th>البيان</th>
                                            <th>الإجراء</th>
                                            <!--                                            <th></th>-->
                                        </tr>
                                        </thead>
                                        <tbody id="order_table_body">
                                        <tr id="row_ser">
                                            <td>1</td>

                                            <td>
                                                <select class="form-control" name="cat_ser_order[]" id="cat_ser"
                                                        onchange=" getf2at(this,'desc_cat_ser','get_desc_f2at_service','description');">
                                                    <option value="">اختر</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="desc_cat_ser_order[]"
                                                        id="desc_cat_ser">
                                                    <option value="">اختر</option>
                                                </select>

                                            </td>
                                            <td><input type="text" name="note" class="form-control"></td>
                                            <td><i class="fa fa-trash"></i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-xs-12 text-center no-padding">
                                    <button type="submit" id="" name="save" value="add"
                                            class="btn btn-warning btn-rounded button8"
                                            style="font-size: 16px;width: 150px;">
                                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i> حفظ </span></button>

                                </div>
                                <?php echo form_close() ?>

                            </div>

                            <!-- Modal newspaper effects -->
                            <div class="md-modal md-effect-4" id="modal-1" data-modal="modal-1">
                                <div class="md-content">
                                    <h3>إستعلامات الخدمات</h3>
                                    <div class="" id="pop_body_details_web">
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-add btn-success ">طباعة</a>

                                        <a class="btn btn-add btn-danger md-close">أغلق!</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>

<script>

    function details_service_by(obj) {
        // console.log('value id :' + obj.value);
        var request = $.ajax({
            url: "<?php echo base_url() . 'Web/details_service_by'?>",
            type: "POST",
            data: {service_id_web: obj.value},
        });
        request.done(function (msg) {
            document.getElementById('pop_body_details_web').innerHTML = msg;
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function getf2at(obj, id, method, attr) {
        // console.log('value select ' + obj.value);
        // details_service_by(obj.value);
        var select_to_append = document.getElementById(id);
        var request = $.ajax({
            url: "<?php echo base_url() . 'web/'?>" + method,
            type: "POST",
            data: {id: obj.value},
        });
        request.done(function (msg) {
            remove_options(select_to_append);
            if (msg === 'false') {
                // console.log(" if json " + msg);
                select_to_append.options[select_to_append.options.length] = new Option('لا يوجد فئات لهذه الخدمة', '');
            } else {
                select_to_append.options[select_to_append.options.length] = new Option('-اختر-');
                // console.log(" else json " + msg);
                var obj = JSON.parse(msg);
                for (var i = 0; i < obj.length; i++) {
                    var row = obj[i];
                    select_to_append.options[select_to_append.options.length] = new Option(row[attr], row.id);
                }
            }
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


    function append_taple(obj) {
        // var input_show_name = ['', 'العدد', 'المبلغ', 'رقم الفاتورة'];
        var input_show_name = ['', 'العدد', 'المبلغ', 'رقم الفاتورة', 'رقم جهاز', 'السن', ''];
        // console.log('value select ' + obj.value);
        var select_to_append = document.getElementById(obj.value);
        remove_t_table();
        var request = $.ajax({
            url: "<?php echo base_url() . 'web/get_services'?>",
            type: "POST",
            data: {id: obj.value},
        });
        request.done(function (msg) {
            if (msg === 'false') {
                // console.log(" if json " + msg);
            } else {
                // console.log(" else json " + msg);
                var obj = JSON.parse(msg);
                var input_show = obj.input_show;
                console.log("  json " + input_show);
                var th_ser = document.getElementById('th_ser');
                var tr_ser = document.getElementById('row_ser');
                for (var i = 0; i < input_show.length; i++) {
                    let newCell = th_ser.insertCell(4);
                    // Append a text node to the cell
                    let newText = document.createTextNode(input_show_name[input_show[i]]);
                    newCell.appendChild(newText);

                    let newCell1 = tr_ser.insertCell(4);
                    // Append a text node to the cell
                    let newText1 = document.createElement('input');
                    newText1.className = 'form-control';
                    newText1.name = '' + input_show[i];
                    newCell1.appendChild(newText1);
                }
                // console.log('len ' + th_ser.cells.length);

            }
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }

    function remove_options(select_obj) {
        select_obj.options.length = 0;

    }

    function remove_t_table() {
        var th_ser = document.getElementById('th_ser');
        var tr_ser = document.getElementById('row_ser');
        // console.log('len ' + th_ser.cells.length);
        for (var i = 4; i < (th_ser.cells.length - 1);) {
            th_ser.deleteCell(i);
            tr_ser.deleteCell(i);
            // console.log('delete ' + i);
            delete_td(th_ser, tr_ser, i);
            i++;
        }
    }

    function delete_td(obj, obj2, i) {
        // $('#th_ser').children('td').eq(i).remove();
        // $('#row_ser').children('td').eq(i).remove();
        if (i < (obj.cells.length - 1)) {
            obj.deleteCell(i);
            obj2.deleteCell(i);
            // console.log('delete ' + i);
            for (var l = i; l < (obj.cells.length - 1);) {
                obj.deleteCell(i);
                obj2.deleteCell(i);
                // console.log('delete ' + i);
                delete_td(obj, obj2, i);
                l++;
            }

        }
    }

    function add_ser_order(id_body, id_row) {
        var body_table = document.getElementById(id_body);
        var row_table = document.getElementById(id_row).innerHTML;
        // console.log(' row_table :' + '<tr>' + row_table + '</tr>');
        var new_row = body_table.insertRow();
        new_row.innerHTML = '<tr>' + row_table + '</tr>';
        console.log(' lenth :' + body_table.rows.length);

    }
    function delete_rows(id_body) {
        var body_table = document.getElementById(id_body);
        console.log(' lenth delete :' + body_table.rows.length);
        for (let i = 1; i < body_table.rows.length ; i++) {
            body_table.deleteRow(i);

        }
    }
</script>

