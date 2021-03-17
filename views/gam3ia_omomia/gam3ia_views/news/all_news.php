<style>
  
    .news_article {
        height:400px; 
    display: inline-block;
    width: 100%;
    box-shadow: 1px 2px 0px 2px #999;
    border: 1px solid #c7c7c7;
}
.news_article_title {
    background-color: #fff;
    padding: 10px 5px;
    height: 100px;
    overflow: hidden;
    transition: all 0.5s ease;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
}
.news_article_title p.date {
    color: #96c73e;
    font-size: 14px;
    margin-bottom: 0;
}
.news_article_title a {
    color: #002542;
    font-size: 18px;
}
.list-unstyled {
    padding-right: 0;
    list-style: none;
}
element {
    display: list-item;
}
</style>

<div class="panel panel-success">
    <div class="panel-heading panel-title">      اخبار الجمعية العمومية </div>
    <div class="panel-body">


<!--  -->
<?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    
                        $news_type = " اخبار الجمعية العمومية";
                    
                    ?>
                    <div class="col-sm-4">
            <div class="panel panel-default">
    <div class="panel-heading"><h5><a target="_blank" href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/news_details/".$row->id?>"
                        ><?= $row->news_title?></a></h5></div>
    <div class="panel-body"> <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->type==1){
                                ?>
                                <img style="
     height: 300px; 
    width: 361px;
" src="<?= base_url()."uploads/md/news/".$image->file ?>">
                    <?php

                           }
                        }
                    }else{
                        ?>
                        <img style="
    /* height: 600px; */
    width: 361px;
" src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>">
                        <?php
                    }
                    ?> </div>
    <div class="panel-footer"><button type="button" onclick="get_details(<?= $row->id ?>)"
    class="btn btn-warning"
                                               data-toggle="modal"
                                               data-target="#myModal_det" 
                        >عرض الخبر</button> </div>
  </div>
  </div>
  <?php
            }
        }
        ?>

        </div>
<!--  -->
</div>

    </div>
   








    <div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document" style="width: 90%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close"
                    data-dismiss="modal">&times;
            </button>
            <h4 class="modal-title"> التفاصيل :
                <span id="pop_rkm"></span>
            </h4>
        </div>

        <div class="modal-body">
            <div id="details"></div>
        </div>
        <div class="modal-footer" style=" display: inline-block;width: 100%;">
            <button type="button" class="btn btn-danger"
                    data-dismiss="modal">إغلاق
            </button>
        </div>
    </div>
</div>
</div>

<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/news_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }
</script>