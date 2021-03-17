<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">ابحث</span>
        <input type="text" name="search_text" id="search_text" placeholder="ابحث"
               class="form-control"/>
    </div>
</div>
<ul style="list-style: none;" class="users-list clearfix" id="ul_names">
    <?php if (isset($vendorslist_notifi) && !empty($vendorslist_notifi) && $vendorslist_notifi != 0) {
        foreach ($vendorslist_notifi as $v):
            // print_r($v['chat']);
            if (!empty($v['chat'])) {
                ?>
                <li style="float: none;" class="selectVendor" id="<?= $v['user_id']; ?>"
                    value="<?= $v['picture_url']; ?>" name="<?= $v['user_id_notifiy']; ?>"
                    title="<?= $v['user_name']; ?>">

                    <!--users-list-name-->

                    <?php if ($v['online'] == 1) { ?>
                        <span class="indicator online"></span>
                    <?php } else if ($v['online'] == 0) { ?>
                        <span class="indicator offline"></span>
                    <?php } ?>
                    <span id="tot-prod_chat<?= $v['user_id_notifiy']; ?>" class="badge ui-li" style="color: white;
background-color: #e60f45;
font-size: 10px;
border-radius: 5px;
padding: 6px 7px;
position: absolute;
"></span>

                    <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
font-weight: 600;" class="" href="#"><?= $v['user_name']; ?></p>


                    <img src="<?= $v['picture_url']; ?>" alt="<?= $v['user_name']; ?>"
                         style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                         title="<?= $v['user_name']; ?>"/>


                    <!--<span class="users-list-date">Yesterday</span>-->
                </li>
            <?php } ?>
        <?php endforeach; ?>
    <?php } ?>
    <?php if (isset($vendorslist) && !empty($vendorslist) && $vendorslist != 0) {
        foreach ($vendorslist as $v):
            // print_r($v['chat']);
            if (!empty($v['chat'])) {
                ?>
                <li style="float: none;" class="selectVendor" id="<?= $v['user_id']; ?>"
                    value="<?= $v['picture_url']; ?>" name="<?= $v['user_id_notifiy']; ?>"
                    title="<?= $v['user_name']; ?>">

                    <!--users-list-name-->

                    <?php if ($v['online'] == 1) { ?>
                        <span class="indicator online"></span>
                    <?php } else if ($v['online'] == 0) { ?>
                        <span class="indicator offline"></span>
                    <?php } ?>
                    <span id="tot-prod_chat<?= $v['user_id_notifiy']; ?>" class="badge ui-li" style="color: white;
background-color: #e60f45;
font-size: 10px;
border-radius: 5px;
padding: 6px 7px;
position: absolute;
"></span>

                    <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
font-weight: 600;" class="" href="#"><?= $v['user_name']; ?></p>


                    <img src="<?= $v['picture_url']; ?>" alt="<?= $v['user_name']; ?>"
                         style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                         title="<?= $v['user_name']; ?>"/>


                    <!--<span class="users-list-date">Yesterday</span>-->
                </li>
            <?php } ?>
        <?php endforeach; ?>

    <?php } else { ?>
        <li>
            <a class="users-list-name" href="#">لايوجد مستخدميت...</a>
        </li>
    <?php } ?>


</ul>

<!--26-3-om start-->
<script src="<?= base_url('public') ?>/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('public') ?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
<?php if ($this->uri->segment(1) != 'chat') { ?>
    <script src="<?= base_url('public') ?>/components/PACE/pace.min.js"></script>
<?php } ?>
<!-- SlimScroll -->
<script src="<?= base_url('public') ?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('public') ?>/components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('public') ?>/dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
    <?php if($this->uri->segment(1) != 'chat'){?>
    $(document).ajaxStart(function () {
        Pace.restart();
    });
    <?php }?>
</script>
<script>
    $(document).ready(function () {
        $('#search_text').keyup(function () {
            var search = $(this).val();
            var lis = $('#ul_names  li.selectVendor');
            for (var i = 0; i < lis.length; i++) {
                var text = lis[i].title;
                console.warn("title ::" + text);
                if (lis[i].title.toUpperCase().indexOf(search) > -1) {
                    lis[i].style.display = '';
                } else {
                    lis[i].style.display = 'none';
                }
            }
        });
    });
</script>
<!--26-3-om end-->
<!-- yara26-3-2020 -->
<script>
    var base_url = '<?=base_url()?>';
</script>
<script src="<?= base_url('public/chat/chat.js'); ?>"></script>