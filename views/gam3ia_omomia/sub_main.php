<style>
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
        height: 100px;
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
<?php
$image_name = 'asisst/gam3ia_omomia_asset/img/logo-atheer.png';

    $image_name = 'uploads/images/' . $_SESSION['main_data_info']->logo;
    if (file_exists($image_name) == 1) {
        $image_name = "uploads/images/" . $_SESSION['main_data_info']->logo;
    } else {
        $image_name = 'asisst/gam3ia_omomia_asset/img/logo-atheer.png';
    }

?>
<div class="col-xs-12  index-icons no-padding">
    <?php if (isset($groups) && $groups != null && !empty($groups)) { ?>
        <?php foreach ($groups as $row): ?>
            <?php

            if ($row->count_level > 0 && $row->page_link == '#') {
                $link_to = "Dash/mian_group/" . $row->sub[0]->page_id;
            } elseif ($row->page_link == '#') {
                $link_to = "Dash/sub_sub_main/" . $row->sub[0]->page_id . '/' . $row->sub[0]->page_id;
            } elseif ($row->page_link != '#') {
                $link_to = $row->page_link;
            }
            ?>
            <div class="col-md20 col-md-3 col-sm-4 padding-4  ">
                <div class="box">
                    <a href="<?php echo base_url() . $link_to ?>">
                        <img src="<?php echo base_url() . 'uploads/pages_images/thumbs/' . $row->page_image ?>"
                             onerror="this.src='<?php echo base_url() . "$image_name" ?>'"
                             alt="" class="center-block"/>
                        <h5 class="text-center"> <?php echo $row->page_title ?> </h5>
                    </a>
                </div>
            </div>
        <?php endforeach;
    } ?>
</div>
