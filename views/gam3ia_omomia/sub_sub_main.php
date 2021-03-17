<style>
    @media (min-width: 992px) {
        .col-md-20 {
            width: 20%;
        }
    }
    .index-icons .box {
        height: 180px;
    }
    #circle_counter {
        /* float: right; */
        width: 200px;
        /* height: 50px; */
        border: 2px solid;
        line-height: 24px;
        padding: 4px 8px;
        border-radius: 5px;
        background-color: #5b69bc;
        margin-right: 20px;
        color: white;
        display: inline-block;
        width: 200px;
        height: 150px;
    }
    #circle_counter .counter {
        margin-top: 18px;
        display: block;
        font-size: 20px;
        color: #f8ffbf;
        font-weight: bold;
    }
    #circle_counter span {
        font-size: 20px;
    }
</style>
<section class="sub_sub_icons col-xs-12" style="padding-top: 0;">
    <?php
    $image_name = 'asisst/admin_asset/img/logo-atheer.png';
    if (isset($_SESSION['main_data_info'])) {
        $image_name = 'uploads/images/' . $_SESSION['main_data_info']->logo;
        if (file_exists($image_name) == 1) {
            $image_name = "uploads/images/" . $_SESSION['main_data_info']->logo;
        } else {
            $image_name = 'asisst/admin_asset/img/logo-atheer.png';
        }
    }
    ?>
    <?php if (isset($sub_groups) && $sub_groups != null && !empty($sub_groups)) { ?>
        <ul class="list-unstyled">
            <?php $x = 0;
            foreach ($sub_groups as $row):
                ?>
                <li <?php if ($x == 0) {
                    echo 'class="active"';
                } ?> >
                    <a href="<?php echo base_url() . $row->page_link ?>">
                        <div class="box_icon">
                            <img src="<?php echo base_url() . 'uploads/pages_images/thumbs/' . $row->page_image ?>"
                                 onerror="this.src='<?php echo base_url() . "$image_name" ?>'"
                                 alt="" class="center-block " width="100px" height="100px"/>
                            <div class="text-center box_bottom">
                                <a href="<?php echo base_url() . $row->page_link ?>"><?php echo $row->page_title ?>
                                </a>
                            </div>
                        </div>
                    </a>
                </li>
                <?php $x++; endforeach; ?>
        </ul>
    <?php } ?>
