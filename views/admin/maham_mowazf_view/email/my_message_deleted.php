<style>
    /*********** upload malti img ****/
    .block {
        background-color: rgba(255, 255, 255, 0.5);
        margin: 0 auto;
        margin-bottom: 30px;
        text-align: center;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    label.button {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background-color: #c72530;
        border: 1px solid #eee;
        color: #fff;
        padding: 7px 15px;
        margin: 5px 0;
        display: inline-block;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    label.button:hover {
        color: #c72530;
        background-color: #fff;
        border: 1px solid #ccc;
        cursor: pointer;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    input#images {
        display: none;
    }

    #multiple-file-preview {
        border: 1px solid #eee;
        margin-top: 10px;
        padding: 10px;
    }

    #files1 {
        border: 1px solid #eee;
        margin-top: 10px;
        padding: 10px;
    }

    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        min-height: 110px;
    }

    #sortable li {
        margin: 3px 3px 3px 0;
        float: left;
        width: 100px;
        height: 104px;
        text-align: center;
        position: relative;
        background-color: #FFFFFF;
    }

    #sortable li,
    #sortable li img {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    #sortable img {
        height: 104px;
    }

    .closebtn {
        color: #c72530;
        font-weight: bold;
        position: absolute;
        right: -1px;
        border-radius: 4px;
        padding: 0px 5px 0px 5px;
        background-color: #fff;
    }

    .closebtn h6 {
        font-size: 20px;
        margin: 0;
    }

    .r-img-message h2 {
        padding-top: 4px;
    }

    .r-img-message img {
        width: 100%;
        height: 75px;
        border-radius: 5px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .unread {
        background: #c7c7c7;
    }
</style>
<aside class="lg-side">
    <div class="inbox-head">
        <h3><?=$title?></h3>
        <form action="#" class="pull-right position">
            <div class="input-append">
                <input type="text" class="sr-input" id="search_text" placeholder="بحث" oninput="make_search()">
                <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <div class="inbox-body">
        <div id="inbox-body" style="height: 600px; overflow-y: scroll">

            <table class="table table-inbox table-hover">
                <tbody id="table_serach">
                <?php $important_degree_color = array('label-danger', 'label-warning', 'label-primary');
                $important_degree_title = array('هام جدا', "هام", "عادي");
                if (isset($my_email) && !empty($my_email)) {
                    foreach ($my_email as $row) {
                        if ($row->readed == 0) {
                            $unread = 'unread';
                        } else {
                            $unread = '';
                        }
                        if ($row->starred == 1 || $row->star_from == 1 ) {
                            $start = 'inbox-started';
                        } else {
                            $start = 'inbox-unstarted';
                        }
                        ?>
                        <tr class="<?= $unread ?>" title="<?= $row->email_from_n; ?> - <?= $row->title; ?>"
                            data-id="<?= $row->id ?>">
<!--                            <td class="inbox-small-cells"><input type="checkbox" class="mail-checkbox"></td>-->
                            <td class="inbox-small-cells" onclick="make_star(<?= $row->id ?>)"><i
                                    id="satr_<?= $row->id ?>"
                                    class="fa fa-star <?= $start ?>"></i>
                            </td>
                            <td onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"
                                class="view-message  dont-show">
                                <?php if (isset($row->employee_photo_from) && !empty($row->employee_photo_from)) { ?>
                                    <img style=" padding: 2px; border-radius: 100px; border: 2px solid #eee;  height: 35px; width: 36px;"
                                         src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo_from ?>"
                                         class="border-green hidden-xs hidden-sm" alt="">
                                <?php } else { ?>
                                    <img style=" padding: 2px;  border-radius: 100px; border: 2px solid #eee;height: 35px; width: 36px;"
                                         src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"
                                         class="border-green hidden-xs hidden-sm" alt="">
                                <?php } ?>
                                <?= $row->email_from_n; ?>
                                <span style="width: 60px !important;"  class="label <?= $important_degree_color[$row->important_degree] ?> pull-right"><?= $important_degree_title[$row->important_degree] ?></span>
                            </td>
                            <td onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"
                                class="view-message "><?= $row->title; ?></td>
                            <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                            <td class="view-message  text-right">
                                <span class="label label-warning pull-right" style="color: black;"><i
                                        class="fa fa-calendar"
                                        aria-hidden="true"></i><?= date('d-m-Y', $row->ttime); ?></span>
                                <span class="label label-warning pull-right" style="color: black;"><i
                                        class="fa fa-clock-o"
                                        aria-hidden="true"></i><?= date('g:i a', $row->ttime); ?></span>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                <?php } else { ?>
                    <div class="alert alert-danger" id="text111" style="display:none; color: #BD000A; display:block;">
                        لا يوجد رسائل واردة
                    </div>
                <?php } ?>

                </tbody>
            </table>
            <div class="text-center" id="load_spainer" style="display: none">
                <div class='loader-img'>
                    <div class='bar1'></div>
                    <div class='bar2'></div>
                    <div class='bar3'></div>
                    <div class='bar4'></div>
                    <div class='bar5'></div>
                    <div class='bar6'></div>
                </div>
            </div>
        </div>
        <!--    <div class="col-md-12 text-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">

                    <?php /*for ($i = 1; $i <= round($pages); $i++) { */ ?>
                        <li class="<?php /*if ($i==1) echo 'active'*/ ?>" onclick="get_data_pagination(this,<? /*= $i */ ?>)"><a href="#"><? /*= $i */ ?></a></li>
                    <?php /*}  */ ?>
                    <li onclick="get_data_pagination(this)">
                        <a aria-label="Next">
                            <span aria-hidden="true"> التالي &raquo;  </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>-->
    </div>

</aside>
<div class="clearfix"></div>

<script>
    function make_search() {
        var search = $('#search_text').val();
        var trs = $('#table_serach  tr');
        for (var i = 0; i < trs.length; i++) {
            var text = trs[i].title;
            console.warn("title ::" + text);
            if (trs[i].title.toUpperCase().indexOf(search) > -1) {
                trs[i].style.display = '';
            } else {
                trs[i].style.display = 'none';
            }
        }
    }

    var lastScrollTop = 0, delta = 1;
    $('#inbox-body').scroll(function () {
        var nowScrollTop = $(this).scrollTop();
        var heightScroll = $(this).height();
        var heighttable = $('#table_serach').height();
        if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
            if (nowScrollTop > lastScrollTop) {
                /*ACTION ON SCROLLING DOWN*/
                if ((heightScroll + nowScrollTop) == (heighttable + 1)) {
                    console.log('Reached the bottom!');
                    get_data_pagination();

                }
            } else {
                /* ACTION ON  SCROLLING UP*/
            }

            lastScrollTop = nowScrollTop;
        }
    });

    function get_data_pagination() {
        var last_id = $("#table_serach  tr:last").data("id");
        var page =<?=$page?>;
        $('#load_spainer').show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>maham_mowazf/email/Requestes/get_data_pagination',
            data: {last_id: last_id, page: page},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('#table_serach').append(html);
                $('#load_spainer').hide();

            }
        });

    }
</script>
<script>
    function get_details(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>maham_mowazf/email/Emails/get_details',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('#details').html(html);
            }
        });
    }
</script>
<script>
    function delete_message(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>maham_mowazf/email/Emails/delete_message',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                get_details(id);
                swal({
                    title: " تمت الحذف بنجاح ",
                    type: "success",
                    confirmButtonClass: "btn-warning",
                    closeOnConfirm: false
                });
            }
        });
    }
</script>

