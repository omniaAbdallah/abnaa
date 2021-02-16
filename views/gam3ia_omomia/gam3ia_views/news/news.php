<style>
    #myListnews li{
        display: none;
    }
</style>

<div class="panel panel-success">
    <div class="panel-heading panel-title">      اخبار الجمعية العمومية </div>
    <div class="panel-body">


<section class="main_content pbottom-30 ptop-30">

    <div class="container">

        <div class="all_news">
          <!--  <h4><?php echo $title;?> </h4> -->
          <h4>آخر الأخبار </h4>
            <ul id="myListnews" class="list-unstyled">
            <?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    
                        $news_type = " اخبار الجمعية العمومية";
                    
                    ?>
                <li class="col-md-4 col-sm-6 col-xs-12 padding-7">


                <articel class="news_article">
                    <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->type==1){
                                ?>
                                <img src="<?= base_url()."uploads/md/news/".$image->file ?>">
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
                 
                        <h5><a target="_blank" href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/news_details/".$row->id?>"
                        ><?= $row->news_title?></a></h5>
                        <p class="date"><i class="fa fa-calendar-o"></i> <?= $row->news_date?></p>
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

    </div>
</section>
</div>

    </div>







