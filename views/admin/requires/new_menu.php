<style>
    * {
        box-sizing: border-box
    }

    .paddingg {
        padding-left: 0px;
        padding-right: 0px;
    }

    /* Style the tab */
     

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
        /*padding: 30px 15px 50px 40px;*/
        width: calc(100% + 15px);
        height: calc(100% + 20px);
    }
.panel-body {
    padding: 1px 3px;
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
        margin-top: 47px;
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
<style>
    .collapsible {
        background-color: rgb(237 237 237 / 28%);
        color: white;
        cursor: pointer;
        padding: 12px 14px;
        width: 100%;
        border: none;
        text-align: right;
        outline: none;
        font-size: 15px;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
    }

    .active, .collapsible:hover {
        background-color: #555;
    }

    .collapsible:after {
        content: '\002B';
        color: #ffc107;
        font-weight: bold;
        float: left;
        margin-left: 5px;
    }

    .active1:after {
        content: "\2212";
    }

    .content1 {
        padding: 0 18px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        padding-top: 10px;

    }


    .itemm {
        float: right;
        display: inline-block;
        margin-left: 40px;
        width: calc((100% - -15.9px) / 5);
        margin-bottom: 20px;
    }


    .tab {
        float: right;
        border-left: 1px solid #585757;
        background-color: #252525;
        width: 20%;
        /*height: 100%;*/
        height: 565px;
        position: fixed;
        overflow-y: scroll;
    }

    .tabcontent {
        float: left;
        padding: 0px 4px 0 0px;
        /* border: 1px solid #ccc; */
        width: 80%;
        background: #333333;
        overflow-y: scroll;
        height: 630px;
    }

    .cntr {
        /* overflow: scroll;*/
        /*padding: 30px 0px 50px 7px;*/
        width: calc(100% + 20px);
        height: calc(100% + 20px);
    }

    .panel-heading a:hover {
        /* color: #fff; */
        color: #007bff;
    }

    .panel {
        margin-bottom: 20px;
        background-color: #ffffff1a;
    }

    .panel-headingg {
        padding: 11px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        -webkit-border-top-right-radius: 0px;
        -webkit-border-top-left-radius: 0px;
        background: rgb(165 160 160 / 46%);
        color: #fff;
    }

    .panel-headingg:hover {
        background: #424242;
        color: #f7f5f5;
    }

    a:hover, a:active, a:focus {
        outline: none;
        text-decoration: none;
        color: #fff;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    .headingtab {
        display: block;
        width: 100%
    }
</style>
<style>
    .icon_side {
        background-color: #007bff;
        font-size: 20px;
        text-shadow: none;
        color: #fff;
        width: 35px;
        height: 35px;
        vertical-align: middle;
        line-height: 35px;
        text-align: center;
        border-radius: 50%;
        margin-left: 5px;
    }

    /* Style the tab */


    /* Style the buttons inside the tab */
    .tab button {
        display: block;
        background-color: inherit;
        color: #afafaf;
        padding: 5px 8px;
        width: 100%;
        border: none;
        outline: none;
        text-align: right;
        cursor: pointer;
        transition: 0.3s;
        font-size: 14px;
        border-bottom: 1px solid #333;
    }

    ::-webkit-scrollbar {
        width: 1px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #333333 !important;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #333333 !important;
    }


    .scroll_main {
        overflow-y: scroll;
        height: 260px;
    }

    .itemm {
        float: right;
        display: inline-block;
        margin-left: 40px;
        /*width: calc((100% - 160.1px) / 5);*/
        margin-bottom: 20px;
    }
</style>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        /*background-color: #2196F3;*/
        /*padding: 10px;*/
    }
    .grid-item {
        /*background-color: rgba(255, 255, 255, 0.8);*/
        /*border: 1px solid rgba(0, 0, 0, 0.8);*/
        /*padding: 20px;*/
        /*font-size: 30px;*/
        text-align: right;
        padding: 10px 0;
    }
    *[class*="grid-width"]:after, .grid-container:after, *[class*="grid-width"]:before, .grid-container:before{
        display: none;
    }
    .grid-item  a {
        width: 100%;

        font-size: 14px;
        color: #ccc;
    }
    .grid-item a:hover {
        color: #fff;
    }
</style>
<aside class="main-sidebar">
   <!-- <pre>
        <?php /*print_r($main_groups);
        die;*/?>
    </pre>-->
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
                                        ><i class="<?= $leval->page_icon_code ?> icon_side"></i> <?php echo $leval->page_title ?>
                                        </button>

                                    <?php }
                                } ?>
                            <?php }
                        } ?>
                    </div>


                    <?php $x=0; if (isset($main_groups) && $main_groups != null && !empty($main_groups)) {
                        foreach ($main_groups as $row) {
                            ?>
                            <?php
                            if (!empty($row->sub)) {
                                foreach ($row->sub as $leval) {
                                    ?>

                                    <div id="mainmenu<?= $leval->page_id ?>" class="tabcontent">
                                        <div class="panel-group" id="accordion<?= $leval->page_id ?>" role="tablist" aria-multiselectable="true">
                                            <?php if (isset($row->sub_one_pages) && !empty($row->sub_one_pages)) {
                                                foreach ($row->sub_one_pages as $key=>$one) {
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <a class="panel-title panel-headingg headingtab" role="button"
                                                           data-toggle="collapse"
                                                           data-parent="#accordion<?= $leval->page_id ?>"
                                                           href="#collapse<?= $x ?>" aria-expanded="true"
                                                           aria-controls="collapse<?=$x ?>">
                                                            <?= $one->page_title ?>
                                                        </a>

                                                        <div id="collapse<?= $x ?>"
                                                             class="panel-collapse collapse <?php if ($key == 0) echo 'in'; else echo ' '; ?>" role="tabpanel">
                                                            <div class="panel-body cntr">

                                                                <div class=" grid-container">

<!--                                                                    <ul>-->
                                                                        <?php if (isset($one->sub_tow_pages) && !empty($one->sub_tow_pages)) {
                                                                            foreach ($one->sub_tow_pages as $tow) {
                                                                                ?>
                                                                                <div class="grid-item" >
                                                                                    <a href="<?=base_url(). $tow->page_link ?>"><i class="icoon far fa-circle text-danger"></i>
                                                                                        <p class="icon_name"><?= $tow->page_title ?> </p></a>
                                                                                </div>
                                                                            <?php }
                                                                        } ?>

<!--                                                                    </ul>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php $x++; }
                                            } ?>


                                        </div>

                                    </div>
                                <?php $x++; }
                            } ?>
                        <?php $x++; }
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
