<style>
    .main_content {
        background-image: url(../img/back2.jpg);
        background-position: center;
        background-size: 100% 100%;
        border-bottom: 1px solid #eee;
    }
    img{
        max-width: 100%;
    }
    .pbottom-30{
        padding-bottom: 30px;
    }
    .ptop-30{
        padding-top: 30px;
    }
    .container-fluid {
        padding-right: 30px;
        padding-left: 30px;
    }
    .background-white{
        background-color: #fff;
    }
    .content_page{
        display: inline-block;
        width: 100%;
        min-height: 445px;
    }
    .no-padding{
        padding: 0;
    }
    .inline-block{
        display: inline-block;
        width: 100%;
    }
    .fade-icon i {
        width: 50px;
        height: 50px;
        background-color: #95c63d;
        color: #fff;
        font-size: 30px;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
    }
    .fade-icon i:after {
        pointer-events: none;
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        content: '';
        box-sizing: content-box;
        box-shadow: 0 0 0 3px #ffb61e;
        top: 0;
        left: 0;
        opacity: 0;
        transition: 300ms;
    }
    .fade-icon i:hover {
        background-color: #fff;
        color: #95c63d;
    }
    .fade-icon i:hover:after {
        opacity: 1;
        transform: scale(1.15);
    }
    .droid{
        font-family: 'Droid Arabic Kufi';
    }
    /* managment_member */
    .managment_member {
        /* display: inline-block;
         width: 100%;*/
        margin-bottom: 10px;
        border-bottom: 3px dotted #999;
        padding-bottom: 5px;
    }
    .managment_member img {
        width: 150px;
        height: 150px;
        margin: auto;
        /*border: 3px solid #999;*/
    }
    .managment_member h4{
        color: #002542;
    }
    .managment_member p i {
        position: relative;
        width: 40px;
        height: 40px;
        line-height: 40px;
        background-color: #95c63d;
        color: #fff;
        font-size: 24px;
        text-align: center;
        border-radius: 50%;
        float:left;
        margin-right: 11px;
        margin-left: 5px;
    }
</style>
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>
        </div>
        <div class="panel-body" style="min-height: 300px;">
            <section class="main_content pbottom-30 ptop-30 " >
                <div class="container-fluid">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12 " id="secondDiv">
                        <?php
                        /*echo '<pre>';
                         print_r($all);
                         */
                        if (isset($all) && !empty($all)){
                            ?>
                            <div class="background-white content_page">
                                <?php
                                /*
                                echo '<pre>';
                                print_r($all);*/
                                if (isset($all) && !empty($all)){
                                    foreach ($all as $member){
                                        ?>
                                        <div class="managment_member col-sm-6 col-xs-12">
                                            <div class="col-sm-4 text-center col-xs-12 no-padding">
                                                <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$member->emp->personal_photo?>"
                                                     onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>"
                                                     class="img-circle">
                                            </div>
                                            <div class="col-sm-8 col-xs-12 padding-4">
                                                <h4 style="font-size: 17px;font-weight: bold;" class="text-center"><?php echo $member->job_title_name; ?> </h4>
                                                <h4 style="font-size: 17px;font-weight: bold;"  class="text-center" style="font-weight: 600; color: #002542;font-size: 16px;">
                                                    <?php if(isset($member->laqab) and $member->laqab !=null){
                                                        echo $member->laqab;
                                                    }else{
                                                        echo 'الأستاذ/ة';
                                                    } ?>
                                                    / <?php echo $member->emp_name; ?></h4>
                                                <p style="font-size: 17px;font-weight: bold;"  class="inline-block" style="text-align: left;">
                                                    <!--<a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 20px;"><i title="جوال رقم " class="fa fa-mobile"></i><?php echo $member->emp->phone; ?> &nbsp</a>
        -->
                                                    <a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 20px;"><i title="تحويلة رقم" class="fa fa-volume-control-phone"></i> <?php echo $member->emp->tahwela_rkm; ?></a>
                                                </p>
                                                <p style="font-size: 17px;font-weight: bold;"   class="inline-block" style="text-align: left;"><a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 18px;"><i title="البريد الإلكتروني" class="fa fa-envelope-o"></i>    <?php echo $member->emp->email; ?></a></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>