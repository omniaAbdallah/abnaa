<style>    .list_link {        color: black !important;    }    .mail-box {        border-collapse: collapse;        border-spacing: 0;        display: table;        table-layout: fixed;        width: 100%;    }    .mail-box aside {        display: table-cell;        float: none;        height: 100%;        padding: 0;        vertical-align: top;    }    .mail-box .sm-side {        background: none repeat scroll 0 0 #e5e8ef;        border-radius: 4px 0 0 4px;        width: 25%;    }    .mail-box .lg-side {        background: none repeat scroll 0 0 #fff;        border-radius: 0 4px 4px 0;        width: 75%;    }    .mail-box .sm-side .user-head {        background: none repeat scroll 0 0 #00a8b3;        border-radius: 4px 0 0;        color: #fff;        min-height: 60px;        padding: 10px;    }    .user-head .inbox-avatar {        float: right;        width: 39px;    }    .user-head .inbox-avatar img {        border-radius: 4px;    }    .user-head .user-name {        /*display: inline-block;*/        margin: 0 0 0 10px;    }    .user-head .user-name h5 {        font-size: 14px;        font-weight: 300;        margin-bottom: 0;        margin-top: 15px;    }    .user-head .user-name h5 a {        color: #fff;    }    .user-head .user-name span a {        color: #87e2e7;        font-size: 12px;    }    a.mail-dropdown {        background: none repeat scroll 0 0 #80d3d9;        border-radius: 2px;        color: #01a7b3;        font-size: 10px;        margin-top: 20px;        padding: 3px 5px;    }    .inbox-body {        padding: 20px;    }    .btn-compose {        background: none repeat scroll 0 0 #ff6c60;        color: #fff;        padding: 12px 0;        text-align: center;        width: 100%;    }    .btn-compose:hover {        background: none repeat scroll 0 0 #f5675c;        color: #fff;    }    ul.inbox-nav {        display: inline-block;        margin: 0;        padding: 0;        width: 100%;    }    .inbox-divider {        border-bottom: 1px solid #d5d8df;    }    ul.inbox-nav li {        display: inline-block;        line-height: 45px;        width: 100%;    }    ul.inbox-nav li a {        color: #6a6a6a;        display: inline-block;        line-height: 45px;        padding: 0 20px;        width: 100%;    }    ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {        background: none repeat scroll 0 0 #d5d7de;        color: #6a6a6a;    }    ul.inbox-nav li a i {        color: #6a6a6a;        font-size: 16px;        padding-right: 10px;    }    ul.inbox-nav li a span.label {        margin-top: 13px;    }    ul.labels-info li h4 {        color: #5c5c5e;        font-size: 13px;        padding-left: 15px;        padding-right: 15px;        padding-top: 5px;        text-transform: uppercase;    }    ul.labels-info li {        margin: 0;    }    ul.labels-info li a {        border-radius: 0;        color: #6a6a6a;    }    ul.labels-info li a:hover, ul.labels-info li a:focus {        background: none repeat scroll 0 0 #d5d7de;        color: #6a6a6a;    }    ul.labels-info li a i {        padding-right: 10px;    }    .nav.nav-pills.nav-stacked.labels-info p {        color: #9d9f9e;        font-size: 11px;        margin-bottom: 0;        padding: 0 22px;    }    .inbox-head {        background: none repeat scroll 0 0 #41cac0;        border-radius: 0 4px 0 0;        color: #fff;        min-height: 60px;        padding: 12px;    }    .inbox-head h3 {        display: inline-block;        font-weight: 300;        margin: 0;        padding-top: 6px;    }    .inbox-head .sr-input {        border: medium none;        border-radius: 4px 0 0 4px;        box-shadow: none;        color: #8a8a8a;        float: left;        height: 40px;        padding: 0 10px;    }    .inbox-head .sr-btn {        background: none repeat scroll 0 0 #00a6b2;        border: medium none;        border-radius: 0 4px 4px 0;        color: #fff;        height: 40px;        padding: 0 20px;    }    .table-inbox {        border: 1px solid #d3d3d3;        margin-bottom: 0;    }    .table-inbox tr td {        padding: 12px !important;    }    .table-inbox tr td:hover {        cursor: pointer;    }    .table-inbox tr td .fa-star.inbox-started, .table-inbox tr td .fa-star:hover {        color: #f78a09;    }    .table-inbox tr td .fa-star {        color: #d5d5d5;    }    .table-inbox tr.unread td {        background: none repeat scroll 0 0 #f7f7f7;        font-weight: 600;    }    ul.inbox-pagination {        float: right;    }    ul.inbox-pagination li {        float: left;    }    .mail-option {        display: inline-block;        margin-bottom: 10px;        width: 100%;    }    .mail-option .chk-all, .mail-option .btn-group {        margin-right: 5px;    }    .mail-option .chk-all, .mail-option .btn-group a.btn {        background: none repeat scroll 0 0 #fcfcfc;        border: 1px solid #e7e7e7;        border-radius: 3px !important;        color: #afafaf;        display: inline-block;        padding: 5px 10px;    }    .inbox-pagination a.np-btn {        background: none repeat scroll 0 0 #fcfcfc;        border: 1px solid #e7e7e7;        border-radius: 3px !important;        color: #afafaf;        display: inline-block;        padding: 5px 15px;    }    .mail-option .chk-all input[type="checkbox"] {        margin-top: 0;    }    .mail-option .btn-group a.all {        border: medium none;        padding: 0;    }    .inbox-pagination a.np-btn {        margin-left: 5px;    }    .inbox-pagination li span {        display: inline-block;        margin-right: 5px;        margin-top: 7px;    }    .fileinput-button {        background: none repeat scroll 0 0 #eeeeee;        border: 1px solid #e6e6e6;    }    .inbox-body .modal .modal-body input, .inbox-body .modal .modal-body textarea {        border: 1px solid #e6e6e6;        box-shadow: none;    }    .btn-send, .btn-send:hover {        background: none repeat scroll 0 0 #00a8b3;        color: #fff;    }    .btn-send:hover {        background: none repeat scroll 0 0 #009da7;    }    .modal-header h4.modal-title {        font-family: "Open Sans", sans-serif;        font-weight: 300;    }    .modal-body label {        font-family: "Open Sans", sans-serif;        font-weight: 400;    }    .heading-inbox h4 {        border-bottom: 1px solid #ddd;        color: #444;        font-size: 18px;        margin-top: 20px;        padding-bottom: 10px;    }    .sender-info {        margin-bottom: 20px;    }    .sender-info img {        height: 30px;        width: 30px;    }    .sender-dropdown {        background: none repeat scroll 0 0 #eaeaea;        color: #777;        font-size: 10px;        padding: 0 3px;    }    .view-mail a {        color: #ff6c60;    }    .attachment-mail {        margin-top: 30px;    }    .attachment-mail ul {        display: inline-block;        margin-bottom: 30px;        width: 100%;    }    .attachment-mail ul li {        float: left;        margin-bottom: 10px;        margin-right: 10px;        width: 150px;    }    .attachment-mail ul li img {        width: 100%;    }    .attachment-mail ul li span {        float: right;    }    .attachment-mail .file-name {        float: left;    }    .attachment-mail .links {        display: inline-block;        width: 100%;    }    .fileinput-button {        float: left;        margin-right: 4px;        overflow: hidden;        position: relative;    }    .fileinput-button input {        cursor: pointer;        direction: ltr;        font-size: 23px;        margin: 0;        opacity: 0;        position: absolute;        right: 0;        top: 0;        transform: translate(-300px, 0px) scale(4);    }    .fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {        margin-bottom: 5px;    }    .files .progress {        width: 200px;    }    .fileupload-processing .fileupload-loading {        display: block;    }    * html .fileinput-button {        line-height: 24px;        margin: 1px -3px 0 0;    }    * + html .fileinput-button {        margin: 1px 0 0;        padding: 2px 15px;    }    @media (max-width: 767px) {        .files .btn span {            display: none;        }        .files .preview * {            width: 40px;        }        .files .name * {            display: inline-block;            width: 80px;            word-wrap: break-word;        }        .files .progress {            width: 20px;        }        .files .delete {            width: 60px;        }    }    ul {        list-style-type: none;        padding: 0px;        margin: 0px;    }    .inbox-avatar {        padding-top: 4.5px !important;        padding-bottom: 12.5px;    }    .inbox-avatar img {        padding: 2px;        border-radius: 100px;        border: 2px solid #eee;        height: 35px;        width: 36px;    }    .label {        margin: 1px;    }    .label-warning {        color: #040404 !important;    }    .bg-warning {        background-color: #ffc107 !important;    }    .badge {        display: inline-block;        /*padding: .25em .4em;*/        font-size: 75%;        font-weight: 700;        line-height: 1;        text-align: center;        white-space: nowrap;        vertical-align: baseline;        border-radius: .25rem;        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;    }    .nav-link {        display: block;        padding: .5rem 1rem;    }</style><div class="col-xs-12 no-padding">    <div class="col-md-2 padding-4">        <div class="mail-box">            <aside class="sm-side">                <div class="user-head">                    <a class="inbox-avatar" href="javascript:;">                        <img width="64" hieght="60"                             src="<?php if (isset($_SESSION['mem_img']) && $_SESSION['mem_img'] != null) {                                 echo base_url() . 'uploads/md/gam3ia_omomia_members/' . $_SESSION['mem_img'];                             } else {                                 echo base_url() . 'asisst/admin_asset/img/avatar5.png';                             }                             ?>"/>                    </a>                    <div class="user-name">                        <h5><a href="#"><?php if (isset($_SESSION['name']) && $_SESSION['name'] != null) {                                    echo($_SESSION['name']);                                } else {                                    echo($_SESSION['user_name']);                                } ?> </a></h5>                    </div>                </div>                <div class="inbox-body">                    <a href="#" onclick="get_messages('page_content',0)" class="btn btn-compose ">                        إنشاء رسالة جديدة</a>                </div>                <ul class="inbox-nav inbox-divider">                    <li>                        <a onclick="get_my_messages('page_content','ward_messages')" class="nav-link">                            <i class="fa fa-inbox"></i> البريد الوارد                            <span style="float: left;margin-top: 10px"                                  class="badge bg-warning"  id="ward_count"><?= $ward_count ?></span></a>                    </li>                    <li>                        <a onclick="get_my_messages('page_content','sent_messages')">                            <i class="fa fa-envelope-o"></i> البريد المرسل <span style="float: left;margin-top: 10px"                                                                                 class="badge bg-warning" id="send_count"><?= $send_count ?></span></a>                    </li>                    <li>                        <a onclick="get_my_messages('page_content','my_messages_start')">                            <i class="fa fa-star-o"></i> الرسائل الهامة <span style="float: left;margin-top: 10px"                                                                              class="badge bg-warning" id="started_count"><?= $started_count ?></span></a>                    </li>                    <li>                        <a onclick="get_my_messages('page_content','my_deleted_messages')">                            <i class=" fa fa-trash-o"></i> سلة المهملات <span style="float: left;margin-top: 10px"                                                                              class="badge bg-danger" id="deleted_count"><?= $deleted_count ?></span></a>                    </li>                </ul>            </aside>        </div>    </div>    <div class="col-md-10 padding-4" id="page_content">    </div></div><!--<pre>    <?php /*print_r($_SESSION) */ ?></pre>--><script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script><script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script><script>    $(document).ready(function () {        <?php if(isset($notifi) && !empty($notifi)){        if (($notifi == 1)){        ?>        get_my_messages('page_content', 'ward_messages');        <?php }elseif (($notifi == 2)) { ?>        get_my_messages('page_content', 'sent_messages');        <?php }else{?>        get_messages('page_content');        <?php  }}else{ ?>        get_messages('page_content');        <?php }?>    });</script><script>    function get_my_messages(div_id, method, id, type) {        console.log("id :: " + id);        if (id) {            if (!type) {                type = 2;            }            var url_ajex = "<?php echo base_url();?>gam3ia_omomia/Messages_gam3ia/" + method + '/' + id + '/' + type        } else {            var url_ajex = "<?php echo base_url();?>gam3ia_omomia/Messages_gam3ia/" + method        }        $.ajax({            type: 'get',            url: url_ajex,            beforeSend: function () {                $('#' + div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#' + div_id).html(d);            }        });    }    function get_messages(div_id) {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>gam3ia_omomia/Messages_gam3ia/load_message",            beforeSend: function () {                $('#' + div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#' + div_id).html(d);                $('#type_member1').attr('checked', true);                get_members();                $.validate({                    validateHiddenInputs: true                });            }        });    }</script><script>    function make_star(email_id, type) {        $.ajax({            type: 'post',            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/make_star',            data: {id: email_id, type: type},            dataType: 'html',            cache: false,            success: function (html) {                $('#satr_' + email_id).toggleClass('inbox-started');                get_all_count();            }        });    }    function update_seen() {        $.ajax({            type: 'get',            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/update_seen',            dataType: 'html',            cache: false,            success: function (html) {                $('.unseen').hide('slow');            }        });    }</script><script>    function get_members() {        var type_member = $("input[name='data[member_type_to]']:checked").val();        $.ajax({            type: 'get',            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/get_members',            data: {type_member: type_member},            dataType: 'html',            cache: false,            success: function (d) {                var obj = JSON.parse(d);                var members = (obj.members);                var options = value = name = '';                for (var i = 0; i < members.length; i++) {                    if (type_member == 1) {                        name = members[i].laqb_title + '/ ' + members[i].name;                        value = members[i].id;                    } else {                        name = members[i].laqab + '/ ' + members[i].emp_name + ' " ' + members[i].job_title_name + ' " ';                        value = members[i].emp_id_fk;                    }                    options += '<option value="' + value + '">' + name + '</option>'                }                console.log('select_member ');                if ($('#select_members')) {                    $('#select_members').html(options);                }                if ($('#replay_select_members')) {                    $('#replay_select_members').html(options);                    select_member();                }                $('.selectpicker').selectpicker("refresh");            }        });    }    function select_member() {        var from_id = $('#from_id').val();        var to_id = $('#to_id').val();        var current_id = $('#current_id').val();        var slected_replay_select_members = 0;        if (from_id == current_id) {            slected_replay_select_members = to_id;        } else if (to_id == current_id) {            slected_replay_select_members = from_id;        }        $('#replay_select_members').val(slected_replay_select_members);        /*$('.selectpicker').selectpicker("refresh");*/        console.log('select_member :: ' + slected_replay_select_members);        $('#replay_select_members option[value!="' + slected_replay_select_members + '"]').remove();    }</script><script>    function send_message(id) {        if (id) {            var url_ajex = $('#replay_message_form').attr('action');            var all_inputs = $(' #replay_message_form [data-validation="required"]');            var my_form = $('#replay_message_form');        } else {            var url_ajex = $('#send_message_form').attr('action');            var all_inputs = $(' #send_message_form [data-validation="required"]');            var my_form = $('#send_message_form');        }        var valid = 1;        var text_valid = "";        all_inputs.each(function (index, elem) {            console.log(elem.id + $(elem).val());            if ($(elem).val().length >= 1) {                $(elem).css("border-color", "#5cb85c");            } else {                valid = 0;                $(elem).css("border-color", "red");            }        });        var form_data = new FormData();        var file_attach_name = $('#file_attach_name')[0].files;        if (file_attach_name[0]) {            form_data.append("file_attach_name", file_attach_name[0]);        }        var serializedData = my_form.serializeArray();        $.each(serializedData, function (key, item) {            form_data.append(item.name, item.value);        });        console.log("url_ajex ::: " + url_ajex);        $.ajax({            type: 'post',            url: url_ajex,            data: form_data,            cache: false,            contentType: false,            processData: false,            beforeSend: function (xhr) {                if (valid == 0) {                    swal({                        title: 'من فضلك ادخل كل الحقول ',                        type: 'error',                        confirmButtonText: 'تم'                    });                    xhr.abort();                } else if (valid == 1) {                    swal({                        title: "جاري الإرسال ... ",                        text: "",                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',                        showConfirmButton: false,                        allowOutsideClick: false                    });                }            },            success: function (html) {                swal({                    title: 'تم إرسال بنجاح ',                    type: 'success',                    confirmButtonText: 'تم'                });                if (id) {                    $("#replay_Modal .close").click();                } else {                    get_messages('page_content');                }                get_all_count();            }        });    }</script><script>    function make_select(class_name) {        var main_select = document.getElementById('main_check_pox');        var rowcollection = $("td ." + class_name);        rowcollection.each(function (index, obj) {            obj.checked = main_select.checked;        });    }    function get_select_check_box(action, type) {        var emailes_ids = [];        var rowcollection = $(".mail-checkbox:checked");        rowcollection.each(function (index, elem) {            emailes_ids.push($(elem).val());        });        if (emailes_ids.length >= 1) {            $.ajax({                type: 'post',                url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/make_action',                data: {emailes_ids: emailes_ids, action: action, type: type},                dataType: 'html',                cache: false,                success: function (html) {                    if (type == 1) {                        get_my_messages('page_content', 'ward_messages');                    } else {                        get_my_messages('page_content', 'sent_messages');                    }                }            });        }    }    function make_search() {        var search = $('#search_text').val();        var trs = $('#table_serach  tr');        for (var i = 0; i < trs.length; i++) {            var text = trs[i].title;            console.warn("title ::" + text);            if (trs[i].title.toUpperCase().indexOf(search) > -1) {                trs[i].style.display = '';            } else {                trs[i].style.display = 'none';            }        }    }    var lastScrollTop = 0, delta = 1;    $('#inbox-body').scroll(function () {        var nowScrollTop = $(this).scrollTop();        var heightScroll = $(this).height();        var heighttable = $('#table_serach').height();        if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {            if (nowScrollTop > lastScrollTop) {                /*ACTION ON SCROLLING DOWN*/                if ((heightScroll + nowScrollTop) == (heighttable + 1)) {                    console.log('Reached the bottom!');                    get_data_pagination();                }            } else {            }            lastScrollTop = nowScrollTop;        }    });    function get_data_pagination() {        var last_id = $("#table_serach  tr:last").data("id");        var page = $('#page_type').val();        $('#load_spainer').show();        $.ajax({            type: 'post',            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/get_data_pagination',            data: {last_id: last_id, page: page},            dataType: 'html',            cache: false,            success: function (html) {                $('#table_serach').append(html);                $('#load_spainer').hide();            }        });    }    function add_emps_message(message_id) {        var type_member = $("input[name='data[member_type_to]']:checked").val();        var member_id = $('#select_members').val();        $.ajax({            type: 'post',            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/add_emps_message',            data: {message_id: message_id, type_member: type_member, member_id: member_id},            dataType: 'html',            cache: false,            beforeSend: function () {                swal({                    title: "جاري الإرسال ... ",                    text: "",                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',                    showConfirmButton: false,                    allowOutsideClick: false                });            },            success: function (html) {                swal({                    title: 'تم اضافة  بنجاح',                    type: 'success',                    confirmButtonText: 'تم'                });                $("#add_emp_Modal .close").click();                get_all_count();            }        });    }</script><script>    function print_email(row_id) {        var request = $.ajax({            url: "<?=base_url() . 'gam3ia_omomia/Messages_gam3ia/print_email'?>",            type: "POST",            data: {row_id: row_id},        });        request.done(function (msg) {            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');            WinPrint.document.write(msg);            WinPrint.document.close();            WinPrint.focus();        });        request.fail(function (jqXHR, textStatus) {            console.log("Request failed: " + textStatus);        });    }</script><script>    function get_all_count() {        $.ajax({            type: 'get',            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/get_all_count',            dataType: 'html',            cache: false,            success: function (response) {                var all_count=JSON.parse(response);                $('#ward_count').html(all_count.ward_count);                $('#deleted_count').html(all_count.deleted_count);                $('#started_count').html(all_count.started_count);                $('#send_count').html(all_count.send_count);            }        });    }</script>