<aside class="lg-side">
    <div class="inbox-head">
        <h3><?= $title ?></h3>
        <form action="#" class="pull-right position">
            <div class="input-append">
                <input type="text" class="sr-input" id="search_text" placeholder="بحث" oninput="make_search()">
                <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <div class="inbox-body">
        <div class="mail-option">
            <div class="chk-all"><input type="checkbox" class=" mail-group-checkbox" id="main_check_pox">
                <div class="btn-group"><a class="btn mini all" data-toggle="dropdown" data-original-title=""
                                          title="" aria-expanded="false"> <i class="fa fa-angle-down "></i> </a>
                    <ul class="dropdown-menu">
                        <li onclick="make_select('mail-checkbox');  "><a> الكل</a></li>
                        <li onclick="make_select('mail-checkbox');"><a> لاشئ</a></li>
                        <li onclick="make_select('read');"><a> المقروءة</a></li>
                        <li onclick="make_select('unread');"><a> غير القروءة</a></li>
                    </ul>
                </div>
            </div>
            <!--   <div class="btn-group"><a class="btn mini tooltips"  data-toggle="dropdown" data-placement="top"
                                         data-original-title="Refresh" aria-expanded="false"> <i
                               class=" fa fa-refresh"></i> </a></div>-->
            <div class="btn-group hidden-phone"><a class="btn mini blue" data-toggle="dropdown"
                                                   data-original-title="" title="" aria-expanded="false"> الإجراء <i
                        class="fa fa-angle-down "></i> </a>
                <ul class="dropdown-menu">
                    <li onclick="get_select_check_box(1,1)"><a><i class="fa fa-pencil"></i> تحديد كمقروءة</a></li>
                    <li onclick="get_select_check_box(4,1)"><a><i class="fa fa-star"></i> رسائل هامة</a></li>
                    <li onclick="get_select_check_box(2,1)"><a><i class="fa fa-ban"></i> ارشفة</a></li>
                    <li class="divider"></li>
                    <li onclick="get_select_check_box(3,1)"><a><i class="fa fa-trash-o"></i> حذف</a></li>
                </ul>
            </div>
            <!-- <ul class="unstyled inbox-pagination">
                 <li><span>1-50 of 234</span></li>
                 <li><a  class="np-btn"><i class="fa fa-angle-left  pagination-left"></i></a></li>
                 <li><a  class="np-btn"><i class="fa fa-angle-right pagination-right"></i></a></li>
             </ul>-->
        </div>
        <div id="inbox-body" style="height: 600px; overflow-y: scroll">
            <table class="table table-inbox table-hover">
                <tbody id="table_serach">
                <?php $important_degree_color = array('label-danger', 'label-warning', 'label-primary');

                $important_degree_title = array('هام جدا', "هام", "عادي");
                if (isset($message) && !empty($message)) {
                    foreach ($message as $row) {
                        if ($row->readed == 0) {
                            $unread = 'unread';
                        } else {
                            $unread = 'read';
                        }
                        if ($row->stared_to == 0) {
                            $start = 'inbox-unstarted';
                        } else {
                            $start = 'inbox-started';
                        }
                        ?>
                        <input type="hidden" id="page_type" value="1">
                        <tr class="<?= $unread ?>" title="<?= $row->from_name; ?> - <?= $row->title; ?>"
                            data-id="<?= $row->id ?>">
                            <td class="inbox-small-cells"><input type="checkbox" class="mail-checkbox <?= $unread ?> <?= $start ?>" value="<?= $row->id ?>"></td>
                            <td class="inbox-small-cells" onclick="make_star(<?= $row->id ?>,1)"><i
                                    id="satr_<?= $row->id ?>"
                                    class="fa fa-star <?= $start ?>"></i>
                            </td>
                            <td onclick="get_my_messages('page_content','message_details',<?= $row->id ?>,1)"
                                class="view-message  dont-show">
                                <img style=" padding: 2px; border-radius: 100px; border: 2px solid #eee;  height: 35px; width: 36px;" src="<?php echo base_url() .  $row->from_img ?>" class="border-green hidden-xs hidden-sm" alt="">

                                <?= $row->from_name; ?>
                                <span style="width: 60px !important;"  class="label <?= $important_degree_color[$row->important_degree] ?> pull-right"><?= $important_degree_title[$row->important_degree] ?></span>
                            </td>
                            <td onclick="get_my_messages('page_content','message_details',<?= $row->id ?>,1)"
                                class="view-message "><?= $row->title; ?></td>
                            <td class="view-message  text-right">
                                <span class="label label-warning pull-right" style="color: black;"><i
                                        class="fa fa-calendar"
                                        aria-hidden="true"></i><?=  $row->date_ar; ?></span>
                                <span class="label label-warning pull-right" style="color: black;"><i
                                        class="fa fa-clock-o"
                                        aria-hidden="true"></i><?=  $row->time ; ?></span>
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
    </div>
</aside>
<div class="clearfix"></div>