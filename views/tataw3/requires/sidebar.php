<style>

    @media (min-width: 768px) {
        .sidebar-mini.sidebar-collapse .ace-responsive-menu > li:first-child:hover > a > span:not(.pull-right),
        .sidebar-mini.sidebar-collapse .ace-responsive-menu > li:first-child:hover > ul {
            /*   display:none !important;*/
        }
    }
</style>
<?php

//var_dump($this->my_side_bar[9]);die;
function createTreeView($array)
{

    echo '<ul id="respMenu" class="ace-responsive-menu flexcroll" data-menu-style="vertical">';

    foreach ($array as $row) {
        if (sizeof($row->sub) > 0) {
            subLevels($row->sub, $row->page_title, $row->page_icon_code, $row->page_id, $row->bg_color);
        } else {
            echo '<li><a class="main-hd" href="' . base_url() . $row->page_link . '">
            
            <i class="' . $row->page_icon_code . '" style="background-color:' . $row->bg_color . '" ></i>

            <span class="title">' . $row->page_title . '   </span>
            </a></li>';
        }
    }
    echo '</ul>';
}


function subLevels($array, $page_title, $page_icon_code, $id, $bg_color, $level = false)
{
    /*$link_to = base_url() . "osr/Dash/mian_group/" . $id;*/
    $link_to = '#';
    if (!empty($array)) {
        if ($level > 0 && $array[0]->page_link == 2) {
            /*$link_to = base_url() . "osr/Dash/sub_sub_main/" . $id . '/' . $id;*/
            $link_to = '#';
        }
    }
    else{
        
    }


    echo '<li class="parent" >
          <a href="' . $link_to . '"  onclick="//get_sub_pages(' . $id . ')" class="main-hd">
            <i class="' . $page_icon_code . '" style="background-color:' . $bg_color . '" ></i>

            <span class="title"  onclick="//(' . $id . ')">' . $page_title . ' </span>

          </a>';
    if (sizeof($array) > 0 && !empty($array)) {
        echo ' <ul class="">';
        foreach ($array as $row) {
            if (isset($row->sub) && sizeof($row->sub) > 0) {
                $level = 1;
                if (isset($row->sub[0]->sub) && sizeof($row->sub[0]->sub) > 0) {
                    $level = false;
                }
                subLevels($row->sub, $row->page_title, $row->page_icon_code, $row->page_id, $level);

            }
            else if (isset($row->sub) && sizeof($row->sub) > 0) {
                $level = 0;
                if (isset($row->sub[0]->sub) && sizeof($row->sub[0]->sub) > 0) {
                    $level = false;
                }
                subLevels($row->sub, $row->page_title, $row->page_icon_code, $row->page_id, $level);

            }
            
            
            
            else {
                echo '<li><a href="' . base_url() . $row->page_link . '">' . $row->page_title . ' </a></li>';
            }
        }
        echo '</ul>   ';
    }
    echo ' </li>';


}

?>


<aside class="main-sidebar">
    <div class="side-pad" id="firstDiv">
        <nav class="sidebar sidebar-index" id="">
            <div class="inner-sidebar">
                <!-- Menu Toggle btn-->
                <div class="menu-toggle">
                    <h3>قائمة </h3>
                    <button type="button" id="menu-btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
 <!---------------------------------------------Moaz---------------------------------->            
 <ul   class="ace-responsive-menu flexcroll dropdown"   style=" margin-top: 10px;">
     <li class="parent" >
          <a href="#"  class="main-hd">
             <!-- <img src="http://localhost:82/Final_Gym_old/asisst/admin_asset/img/avatar5.png" class="img-circle"  alt="user" style="height: 36px;width: 36px;"> -->
            

                                 <img src="<?php if($_SESSION['tato3_no3']==1&&isset($_SESSION['tat_image'])&&!empty($_SESSION['tat_image']))
                                    {
                                        echo base_url().'uploads/human_resources/tato3/tato3_image/'.$_SESSION['tat_image']; 
                                    
                                    }else   if($_SESSION['tato3_no3']==2&&isset($_SESSION['logo_monzma'])&&!empty($_SESSION['logo_monzma']))  
                                    {
                                        echo base_url().'uploads/human_resources/tato3/tato3_logo/'.$_SESSION['logo_monzma'];

                                    }else{
                                        echo base_url() . 'asisst/gam3ia_omomia_asset/img/avatar5.png';
                                    }?>"
                                 class="img-circle"  alt="user" style="height: 36px;width: 36px;">
            <span class="title"><?php if(isset($_SESSION['name'])&&!empty($_SESSION['name']))
                                    {
                                        echo $_SESSION['name']; 
                                       
                                    }?></span>
 
         </a>
         
         <ul class="dropdown-content" >
         <li>
                   
                     
                                    

                                    <img src="<?php if($_SESSION['tato3_no3']==1&&isset($_SESSION['tat_image'])&&!empty($_SESSION['tat_image']))
                                    {
                                        echo base_url().'uploads/human_resources/tato3/tato3_image/'.$_SESSION['tat_image']; 
                                    
                                    }else   if($_SESSION['tato3_no3']==2&&isset($_SESSION['logo_monzma'])&&!empty($_SESSION['logo_monzma']))  
                                    {
                                        echo base_url().'uploads/human_resources/tato3/tato3_logo/'.$_SESSION['logo_monzma'];

                                    }else{
                                        echo base_url() . 'asisst/gam3ia_omomia_asset/img/avatar5.png';
                                    }?>"
                                 class="img-circle"  alt="user">
                   
              </li>
              <li class="text-center" style="color: beige;font-size: 17px;"><span><?php if(isset($_SESSION['name'])&&!empty($_SESSION['name']))
                                    {
                                        echo $_SESSION['name']; 
                                       
                                    }?> </span></li>
                 
              <li class="btnlog"><a href="<?php echo base_url() ?>tataw3/Login_tataw3/logout" style="color: #fff;text-align: center;">
                  <span style="font-size: 17px;"><i class="fa fa-sign-out"></i> الخروج</span> </a>
              </li>
         </ul>    </li>
     
     </ul>
     
        <style>
       
        .ace-responsive-menu li.menu-active > a {
    /* background: rgba(0,0,0,0.5) !important; */
    color: #fff;
}
           
            .ace-responsive-menu li ul.dropdown-content li a {
    display: block;
    margin: 0px 0px;
    padding: 8px 8px 8px 8px;
    text-decoration: none;
    /* font-size: 13px; */
    font-weight: 500;
    background: none;
    text-align: right;
    position: relative;
}
           
            .dropdown-content img  {
    display: block;
    margin: 0px 0px;
    padding: 8px 8px 8px 8px;
    text-decoration: none;
    /* font-size: 13px; */
    font-weight: 500;
    background: none;
    text-align: right;
    position: relative;
                margin-top: -8px;
    height: 100px;
    width: 100px;
    margin-right: 60px;
}
 
.ace-responsive-menu > li > ul.dropdown-content {
    position: absolute;
    top: 0px;
    width: 242px;
    z-index: 12;
    padding: 15px 0;
    position: relative;
    background: #646486;border-radius: 10px;
}
 
.dropdown-content {
   
    z-index: 12;
   
    width: 100%;
    padding: 15px 0;
    position: relative;
    background: #131c50;
}
 ul[data-menu-style="vertical"] li ul.dropdown-content > li {
    width: 100%;
    border-bottom: 1px solid #ccc2c2;
}

.dropdown:hover .dropdown-content
            {
    display: block;
            }
     
    .btnlog{background: #e00d0d;
    color: #fbfbfb !important;
    border: 0;
    border-radius: 34px;
    width: 52%;
    height: 42px;
    font-size: 21px;
    margin-top: 14px;
    outline: none;
    box-shadow: 2px 2px 1px;
    margin-right: 50px;}
 </style>
         
       <!-----------------------------------------------------Moaz--------------------------------------------->  
                <?php if (isset($this->my_side_bar) && !empty($this->my_side_bar)) {

                    ?>
                    <?php createTreeView($this->my_side_bar); ?>


                <?php } else { ?>

                    <ul id="respMenu" class="ace-responsive-menu flexcroll" data-menu-style="vertical">
                        <li class="active">
                            <a href="<?php echo base_url() . "gam3ia_omomia/Dash" ?>" class="main-hd">
                                <i class="fa fa-tachometer"></i>
                                <span>home</span>
                            </a>
                        </li>
                        <?php if (isset($this->main_groups) && $this->main_groups != null && !empty($this->main_groups)) {
                            foreach ($this->main_groups as $row) {
                                ?>

                                <?php if ($row->count_level > 0) {
                                    /*$link_to = "osr/Dash/mian_group/" . $row->sub[0]->page_id;*/
                                    $link_to = '#';
                                } else {
                                    /*$link_to = "osr/Dash/sub_sub_main/" . $row->sub[0]->page_id . '/' . $row->sub[0]->page_id;*/
                                    $link_to = $row->sub[0]->page_link;

                                } ?>


                                <li class="parent">
                                    <a href="<?php echo base_url() . $link_to ?>" class="main-hd">
                                        <i class="<?php echo $row->sub[0]->page_icon_code ?>"></i>
                                        <span><?php echo $row->sub[0]->page_title ?></span>
                                    </a>
                                    <?php if (!empty($row->sub_pages)) { ?>
                                        <ul>
                                            <?php
                                            foreach ($row->sub_pages as $one_page) { ?>
                                                <li>
                                                    <a href="<?php echo base_url() . $link_to ?>"><?php echo $one_page->page_title ?></a>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    <?php } ?>
                                </li>

                            <?php }
                        } ?>
                    </ul>
                <?php } ?>


            </div>
        </nav>
    </div>
</aside>


<script>
    function get_sub_pages(valu) {
      
        window.location.href = "<?php echo base_url();?>gam3ia_omomia/Dash/mian_group/" + valu;
    }


</script>