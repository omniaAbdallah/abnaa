<style>
    * {
        box-sizing: border-box
    }

    .paddingg {
        padding-left: 0px;
        padding-right: 0px;
    }

    /* Style the tab */
    .tab {
        float: right;
        border-left: 1px solid #585757;
        background-color: #252525;
        width: 18%;
        height: 100%;
        position: fixed;
    }

    /* Style the buttons inside the tab */
    .tab button {
        display: block;
        background-color: inherit;
        color: #afafaf;
        padding: 14px 8px;
        width: 100%;
        border: none;
        outline: none;
        text-align: right;
        cursor: pointer;
        transition: 0.3s;
        font-size: 14px;
        border-bottom: 1px solid #333;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        /* background-color: #ddd; */
        color: #fff;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
        background: #333;
        color: #3697ff;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 0px 12px;
        /* border: 1px solid #ccc;*/
        width: 83%;
        background: #333333;
    }
</style>


<style>
    .icon_name {
        display: inline-block;
        margin: 0;
    }

    .icoon {
        margin-left: .2rem;
        text-align: center;
        width: 1.6rem;
    }

    .cntr {
        /* overflow: scroll;*/
        padding: 30px 15px 50px 40px;
        width: calc(100% + 15px);
        height: calc(100% + 20px);
    }

    .itemm .title {
        display: inline-block;
        width: 100%;
        float: right;
        direction: rtl;
        text-align: right;

        font-size: 16px;
        color: #fff;
        border-bottom: 1px solid #888787;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }

    .itemm ul {
        display: inherit;
        float: right;
        width: 100%;
    }

    .itemm ul li {
        padding: 10px 0;
        width: 100%;
    }

    .itemm ul li a {
        width: 100%;

        font-size: 14px;
        color: #ccc;
    }

    li, ul {
        list-style: none outside none;
        text-decoration: none;
    }

    .itemm ul li a:hover {
        color: #fff;
    }

    .side-pad {
        padding-right: 0;
        padding-left: 0;
        height: 100%;
    }

    .itemm {


        float: right;
        display: inline-block;
        margin-left: 40px;
        width: calc((103% - 3.1px) / 5);

    }

    .sidebar {
        padding-bottom: 0;
        /* border: 1px solid #ccc; */
        box-shadow: 0px 0px 0px;
        /* overflow-y: scroll; */
        background-color: #333333;
    }

    .main-sidebar {
        position: absolute;
        top: 0px;
        right: 0;
        padding-top: 0px;
        min-height: 100%;
        width: 100%;
        z-index: 810;
        /* font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; */
        -webkit-transition: -webkit-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        -webkit-transition: width 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
        transition: width 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, width 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
        /* background-color: #0b4332; */
        /* background-color: rgba(255,255,255,0.9); */
        background: #333333;
    }

    .sidebar-index {
        position: relative;
        /* height: 465px; */
        /*margin-top: 47px;*/
    }

    @media (min-width: 768px) {
        .sidebar-mini.sidebar-collapse .main-sidebar {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
            /* width: 50px; */
            /* width: 70px; */
            width: 40px;
            z-index: 850;
            background-color: white;
            display: none;
        }
    }
</style>


<aside class="main-sidebar">
    <div class="side-pad" id="firstDiv">
        <nav class="sidebar sidebar-index" id="">
            <div class="inner-sidebar">
                <!-- Menu Toggle btn-->
                <div class="menu-toggle" style="display: none;">
                    <h3>قائمة </h3>
                    <button type="button" id="menu-btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <div class="col-md-12 paddingg">


                    <div class="tab">
                        <?php if (isset($main_groups) && $main_groups != null && !empty($main_groups)) {
                            foreach ($main_groups as $row) {
                                ?>
                                <?php
                                if (!empty($row->sub)) {
                                    foreach ($row->sub as $leval) {
                                        ?>
                                        <button class="tablinks"
                                                onclick="openmenu(event, 'mainmenu<?= $leval->page_id ?>')"
                                            <?php if ($row->sub[0]) {
                                                echo 'id="defaultOpen"';

                                            } ?>
                                        > <?php echo $leval->page_title ?></button>

                                    <?php }
                                } ?>
                            <?php }
                        } ?>
                    </div>


                    <?php if (isset($main_groups) && $main_groups != null && !empty($main_groups)) {
                        foreach ($main_groups as $row) {
                            ?>
                            <?php
                            if (!empty($row->sub)) {
                                foreach ($row->sub as $leval) {
                                    ?>

                                    <div id="mainmenu<?= $leval->page_id ?>" class="tabcontent">
                                        <div class="cntr">


                                            <?php if (isset($row->sub_one_pages) && !empty($row->sub_one_pages)) {
                                                foreach ($row->sub_one_pages as $one) {
                                                    ?>
                                                    <div class="itemm">
                                                        <div class="title">
                                                            <span><?= $one->page_title ?></span>
                                                        </div>


                                                        <ul>
                                                            <?php if (isset($one->sub_tow_pages) && !empty($one->sub_tow_pages)) {
                                                                foreach ($one->sub_tow_pages as $tow) {
                                                                    ?>
                                                                    <li>

                                                                        <a href="<?= $tow->page_link ?>"><i
                                                                                    class="icoon far fa-circle text-danger"></i>
                                                                            <p class="icon_name">  <?= $tow->page_title ?> </p>
                                                                        </a>
                                                                    </li>
                                                                <?php }
                                                            } ?>

                                                        </ul>
                                                    </div>
                                                <?php }
                                            } ?>


                                        </div>

                                    </div>
                                <?php }
                            } ?>
                        <?php }
                    } ?>
                    <!-- stop -->


                </div>
        </nav>
    </div>
</aside>


<script>
    function openmenu(evt, menuName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(menuName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
