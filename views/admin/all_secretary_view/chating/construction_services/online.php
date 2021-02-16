<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">ابحث</span>
        <input type="text" name="search_text" id="search_text" placeholder="ابحث" onkeyup="make_search(this)"
               class="form-control search_text"/>
    </div>
</div>
<ul style="list-style: none;" class="users-list clearfix ul_names" id="ul_names">
    <?php if (isset($vendorslist) && !empty($vendorslist) && $vendorslist != 0) {
        foreach ($vendorslist as $v):
            // print_r($v['chat']);
            if (!empty($v['user_id'])) {
                ?>
                <li style="float: none;" class="selectVendor" id="<?= $v['user_id']; ?>" onclick="selectVendor(this)"
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

                    <p style="width: 215px;margin-right: 90px;text-align: right;color: black;
font-weight: 600;" class="" href="#"><?= $v['user_name']; ?></p>


                    <img src="<?= $v['picture_url']; ?>" alt="<?= $v['user_name']; ?>"
                         style="border-radius: 50%;height: 50px;width: 50px;margin-top: -70px;" title="<?= $v['user_name']; ?>"/>


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

