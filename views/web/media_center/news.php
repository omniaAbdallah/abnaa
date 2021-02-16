<style>
    #myListnews li{
        display: none;
    }
</style>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">جميع الأخبار</a></li>
      
        </ol>
    </div>

</section>


<section class="main_content pbottom-30 ptop-30">

    <div class="container-fluid">
<div class="panel panel-default">
  <div class="panel-heading">جميع الأخبار</div>
  <div class="panel-body">

  <div class="col-md-12 col-sm-6 col-x-12">
           
                    <?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    if($row->news_type==1){
                        $news_type = "اخبار الجمعية";
                    } else if($row->news_type==2){
                        if(isset($row->newspaper_name) && $row->newspaper_name != null){
                            $news_type = $row->newspaper_name  ;
                        }
                    }
                    ?>
                    
                    
<div class="col-md-4" style="padding: 3px;">
            <div class="class-item wow fadeInUp animated" data-wow-duration="0.25s" style="visibility: visible; animation-duration: 0.25s;">
                <div class="thumb">
                  
                 <!--   <img src="https://abnaa-sa.org/uploads/images/0815f8a32c82e8f7c7f733395ec2fc83.png" alt=""></a>
               -->
                  <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->img_status==1){
                                ?>
                                <img style="height: 330px !important;    width: 100%;" src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>">
                    <?php

                           }
                        }
                    }else{
                        ?>
                        <img style="height: 330px !important;" src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>">
                        <?php
                    }
                    ?>
               
                </div>
                <div class="class-content">
                     
                    <h2>
              <a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>">
              
              <?= word_limiter($row->title,5)?></a>
        
                    </h2>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->date?> </p>
                    
                    

                      <a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>">
                      <button  style="float: left;padding-bottom: 1px; "type="button" class="btn btn-sm btn-success"> المزيد</button>
                        </a>
                        

                    <div class="progress_bar">
                        <span class="pr_bar" style="width: 100%"></span>
                    </div>
                </div>
            </div>
        </div>               
                    
                    
           
     <?php
            }
        }
        ?>         
                           
                        
                           




                    </div></div></div>
    </div>



    <!--<div class="container">
        <div class="all_news">
           <h4><?php echo $title;?> </h4>
          <h4>آخر الأخبار </h4>
            <ul id="myListnews" class="list-unstyled">
            <?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    if($row->news_type==1){
                        $news_type = "اخبار الجمعية";
                    } else if($row->news_type==2){
                        if(isset($row->newspaper_name) && $row->newspaper_name != null){
                            $news_type = $row->newspaper_name  ;
                        }
                    }
                    ?>
                <li class="col-md-4 col-sm-6 col-xs-12 padding-7">
                <articel class="news_article">
                    <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->img_status==1){
                                ?>
                                <img src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>">
                    <?php
                           }
                        }
                    }else{
                        ?>
                        <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>">
                        <?php
                    }
                    ?>
                    <div class="news_article_title">
                        <h5><a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>"><?= $row->title?></a></h5>
                        <p class="date"><i class="fa fa-calendar-o"></i> <?= $row->date?></p>
                        <p class="date">التصنيف : <?= $news_type?></p>
                    </div>
                </articel>
                </li>
        <?php
            }
        }
        ?>
            </ul>
            <div class="col-xs-12 text-center">
                <button class="btn btn-load read-more" id="loadMorenews">مشاهدة أكثر</button>
            </div>
        </div>
    </div>-->
</section>







