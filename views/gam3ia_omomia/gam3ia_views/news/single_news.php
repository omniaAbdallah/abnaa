
<style type="text/css">
    .single_project .box-item {
        padding: 20px;
        background-color: #eee;
        box-shadow: 2px 2px 8px;
    }
    .single_project .box-item .onsr{
        color: #002542;
    }
    .single_project .box-item .rqm {
        color: #fff;
        background: #96c73e;
        padding: 10px;
    }
    .single_project  .circle-box {
        border-radius: 50%;
        background-color: #fff;
        border: 4px solid #96c73e;
        text-align: center;
        max-width: 100%;
        width: 150px;
        height: 150px;
    }
    .single_project  .circle-box i{
        font-size: 50px;
        color: #96c73e;
        margin-top: 12px;
    }
    .single_project  .circle-box h5{
        color:#002542;
    }
    .single_project  .circle-box:hover {
        border: 4px dotted #96c73e;
    }
    .single_project  .circle-box:hover i {
        -webkit-animation: toBottomFromTop 0.3s forwards;
        -moz-animation: toBottomFromTop 0.3s forwards;
        animation: toBottomFromTop 0.3s forwards;
    }
    img{
        max-width: 100%;
    }

    @-webkit-keyframes toBottomFromTop {
        49% {
            -webkit-transform: translateY(100%);
        }
        50% {
            opacity: 0;
            -webkit-transform: translateY(-100%);
        }
        51% {
            opacity: 1;
        }
    }
    @-moz-keyframes toBottomFromTop {
        49% {
            -moz-transform: translateY(100%);
        }
        50% {
            opacity: 0;
            -moz-transform: translateY(-100%);
        }
        51% {
            opacity: 1;
        }
    }
    @keyframes toBottomFromTop {
        49% {
            transform: translateY(100%);
        }
        50% {
            opacity: 0;
            transform: translateY(-100%);
        }
        51% {
            opacity: 1;
        }
    }
    .forms_head {
    background-image: url(asisst/web_asset/img/bullet2.png);
    background-position: right 5px center;
    background-repeat: no-repeat;
    /* border-bottom: 1px solid #008ED5; */
    color: #008ED5;
    font-size: 18px;
    padding: 10px 30px 10px 10px;
    text-align: right;
}
.mbottom-10 {
    /* margin-bottom: 10px; */
}
.mtop-40 {
    /* margin-top: 40px; */
}
.tbra_for_project {
    display: inline-block;
    width: 100%;
}
.project_details {
    background-color: #fff;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.075);
    box-shadow: 0 1px 2px rgba(0,0,0,.075);
}
.single_project, .project_details, .tbra_for_project {
    display: inline-block;
    width: 100%;
}
.pbottom-30 {
    /* padding-bottom: 30px; */
}
.ptop-30 {
    /* padding-top: 30px; */
}

</style>



<div class="panel panel-success">
    <div class="panel-heading panel-title">     تفاصيل الخبر </div>
    <div class="panel-body">
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="single_project">
            <div class="">
                <div class="col-sm-4 col-xs-12">

                        <img src="<?php echo base_url().'uploads/md/news/'.$main_img?>"

                             onerror="this.src='<?php echo base_url().'asisst/web_asset/img/projects/project-1.jpg'?>">



                </div>
                <div class="col-sm-6 col-xs-12">
                    <h3><?php if(!empty($records[0]->news_title)){  echo $records[0]->news_title; }else{  echo'غير محدد'; } ?> </h3>
                    <p class="paragraph">
                        <?php if(!empty($records[0]->news_content)){  echo $records[0]->news_content; }else{  echo'غير محدد'; } ?>
                        </p>

                    <br>
                    <span>
                        <?php if(!empty($records[0]->date_ar)){  echo $records[0]->date_ar; }else{  echo'غير محدد'; } ?>
                        </span>
                 


                </div>
               




            </div>
            


            <?php if(!empty($records[0]->photos)){ ?>
            <div class="tbra_for_project background-white mtop-40 pbottom-30">
                <div class="forms_head mbottom-10">
                <i class="fa fa-1x fa-paperclip"></i>
                صور الخبر </div>
                <div class="gallery">
                    <ul class="clearfix list-unstyled gallery_imgs " id="thumbnails">
                        <?php
                        foreach ($records[0]->photos as $row){
                        ?>

                        <li class="col-md-4 col-sm-6 padding-4">


                            <div class="box-img">
                                <a target="_blank" href="<?php echo base_url().'uploads/md/news/'.$row->file?>" title=" <?= $row->title?>">
                                    <img src="<?php echo base_url().'uploads/md/news/'.$row->file?>"
                                         onerror="this.src='<?php echo base_url().'uploads/md/news/'.$row->file?>"
                                         alt="turntable" width="100%" height="250">
                                </a>
                                <p class="text-center"> <?= $row->title?></p>
                            </div>
                            </br>
                        </li>

                        <?php }  ?>
                    



                    </ul>
                </div>

            </div>
            <?php  } ?>



            <?php if(!empty($records[0]->videos)){ ?>
                <div class="tbra_for_project background-white mtop-40 pbottom-30">
                    <div class="forms_head mbottom-10">
                    <i class="fa fa-1x fa-folder-open-o"></i>
                    فيديوهات الخبر </div>
                    <div class="gallery">
                        <ul class="clearfix list-unstyled gallery_imgs " id="thumbnails">
                            <?php
                            foreach ($records[0]->videos as $video){
                                ?>


                                <li class="col-md-4 col-sm-6 padding-4">
                                    <div class="box-video">
                                        <iframe width="100%" height="315" src="<?= $video->file?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </li>



                            <?php }  ?>

                        </ul>
                    </div>

                </div>
            <?php  } ?>


        </div>
    </div>
</section>

</div>
</div>
</div>