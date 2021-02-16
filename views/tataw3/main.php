<style>

    .list-group-flush .list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group-flush:last-child .list-group-item:last-child {

        border-bottom-width: 0;

    }

    .list-group-flush .list-group-item {
        border-right-width: 0;
        border-left-width: 0;
        border-radius: 0;
    }
    a {
    font-size: 19px;
    text-decoration: none !important;
    color: #f2f3f3;
}
.radio-content {
    display: block;
    width: auto;
    margin-left: 10px;
}
#pollsButtons {
    text-align: center;
    height: 33px;
    padding-bottom: 30px;
    /* width: 360px; */
}
#voteButton, #resultsButton {
    height: 33px;
    display: inline-block;
}
#voteButton input, #backButton input {
    font-family: "Droid Arabic Kufi";
    display: inline-blocl;
    background: #df2829;
    border: medium none;
    color: transparent;
    cursor: pointer;
    color: #FFF;
    padding: 5px 10px;
}
#resultsButton input, #voteButton input, #backButton input {
    font-family: "Droid Arabic Kufi";
    display: inline-blocl;
    background: #df2829;
    border: medium none;
    color: transparent;
    cursor: pointer;
    color: #FFF;
    padding: 5px 10px;
}
.bar {
    background: rgba(0, 0, 0, 0) url(https://img.youm7.com/images/general/pollMeterBg.gif?1) repeat-x scroll 0 0;
    border: 1px solid #ce2020;
    font-size: 0;
    height: 10px;
    line-height: 0;
    margin: 4px 0 0 70px;
}
.bar-percentage {
    display: inline;
    float: left;
    font-family: "Trebuchet MS";
    font-size: 14px;
    font-weight: 700;
    margin: -4px 5px 0;
    padding: 0;
}
.bar-main-container {
    text-align: right;
}
.bar-main-container {
    padding-right: 14px;
}
.bar-main-container div:first-child {
    width: 50px;
}
.bar-main-container div {
    display: inline-block;
    padding: 0px 5px;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="content" id="Main-content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="main test1">
                        <strong>أهلاً بك </strong> <?php if (isset($person_data->name) && !empty($person_data->name)) {
                echo  $person_data->name;
            } ?>
                    </div>

                    <div class="main1 test2 col-md-12">
                        <div class="  col-md-1" style=" background: #232424;margin-right: -14px;height:

42px;">
                            <h2 style="margin-top: 6px;">عاجل</h2>
                        </div>
                        <div class="col-md-11">
                            <marquee style="margin-top: 9px;font-size: 16px;"> A scrolling text created

                                with HTML Marquee element.
                            </marquee>
                        </div>
                    </div>

                    <div class="container">


                        <div class="col-md-12">
                            <div class="col-md-12">
                            <?php 
  $person_data = $this->Tataw3_model->get_by_member_id($_SESSION['id'], 'id', 'tat_motat3en');
 // $odwia_data = $this->Tataw3_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
                                ?>
                                    <div class="panel panel-default" style="height: 325px">
                                        <div class="panel-heading panel-title">بيانات الأساسية</div>
                                        <div class="panel-body">
                                        </div>

                                        <ul class="list-group list-group-flush" style="
    width: 64%;
">
                                            
                                            
                                            <li class="list-group-item"><strong> الأسم 
                                                    :</strong><?php if (isset($person_data->name) && !empty($person_data->name)) {
                echo $person_data->name;
            } ?></li>
                                            <li class="list-group-item"><strong>رقم الهوية
                                                    :</strong><?php if (isset($person_data->id_card) && !empty($person_data->id_card)) {
                echo $person_data->id_card;
            } ?></li>
            
            <li class="list-group-item"><strong> نوع التطوع
                                                    :</strong><?php if (isset($person_data->tato3_no3) && !empty($person_data->tato3_no3)) {
               
               if($person_data->tato3_no3==1)
               echo 'فرد';
               else  if($person_data->tato3_no3==2)
               echo 'جهه';
            } ?></li>
                                            
             <li class="list-group-item"><strong>رقم الجوال
                                                    :</strong><?php echo $person_data->mobile; ?>  </li>
             <li class="list-group-item"><strong> البريد الالكتروني
                                                    :</strong><?php echo $person_data->email; ?>  </li>
                                                   

                                        </ul>

                                        
                                        <div class="" style="
    float: left;
    margin-top: -214px;
">
    
    <?php if ($person_data->tato3_no3==1&&isset($person_data->tat_image) && !empty($person_data->tat_image)) { ?>
        <img  style="
    width: 250px;
    height: 100%;
"src="<?php echo base_url() ?>uploads/human_resources/tato3/tato3_image/<?php echo $person_data->tat_image; ?> ">

    <?php } elseif($person_data->tato3_no3==2&&isset($person_data->logo_monzma) && !empty($person_data->logo_monzma)) { ?>
        <img  style="
    width: 250px;
    height: 100%;
   
"src="<?php echo base_url() ?>uploads/human_resources/tato3/tato3_logo/<?php echo $person_data->logo_monzma; ?> ">

        <?php }else{
         ?>

        <img style="
   width: 250px;
    height: 100%;
" src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png ">
    <?php } ?>
    </div>


                                    </div>
                               
                            </div>


                                               
                            
</div>
</div>
                               
                            </div>


                                               
                            
</div>
<!-- غشقش -->

                      
<!-- news -->





        <script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
 <script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
 