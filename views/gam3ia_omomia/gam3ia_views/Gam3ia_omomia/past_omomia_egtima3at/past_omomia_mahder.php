<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
<style>

.omomia-table.table>thead>tr>th, .omomia-table.table>thead>tr>td {
    border-bottom-width: 2px;
    background-color: #ffb61e;
    color: #000;
    text-align: center;
    border-radius: 13px;
}
.omomia-table.table{
border-collapse:separate; 
border-spacing:0.8em;
 }
.omomia-table.table>tbody>tr{
    margin-bottom: 10px;
}
.omomia-table.table>tbody>tr>th, .omomia-table.table>tbody>tr>td {
    border-bottom-width: 2px;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
}
.inner-omomia {
    position: relative;
    z-index: 1;
    height: 1045px;
}
.box-title {
    position: relative;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
    padding: 10px 7px;
    font-size: 18px;
    display: inline-block;
    min-width: 300px;
    z-index: 1;
}
.content_page{
    position: relative;
}
.content_page:after {
    position: absolute;
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    border: 3px dotted #999;
    position: absolute;
    top: 40px;
    z-index: 0;
}
 .dawra-nums{
    display: inline-block;
    width:100%;
    padding-bottom: 20px;
    border-bottom: 3px dotted #999;
}
.dawra-style {
    position: relative;
       display: inline-block;
    width: 100%;
}
.dawra-style h5 {
    /* margin: 0px 0 0; */
    margin-right: 40px;
    padding: 10px 17px 10px 0;
    background-color: #ffb61e;
    border-bottom-left-radius: 18px;
}
.dawra-style i {
position: absolute;
    top: 5px;
    /* padding: 10px; */
    width: 50px;
    height: 50px;
    background-color: #95c63d;
    color: #fff;
    font-size: 30px;
    text-align: center;
    line-height: 50px;
    border-radius: 50%;
}

.dawra-style i:after {
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

.dawra-style i:hover {
  background-color: #fff;
  color: #95c63d;
}

.dawra-style i:hover:after {
  opacity: 1;
  transform: scale(1.15);
}
.dawra-style .badge {
    background-color: #fff;
    color: #000;
    font-size: 16px;
    font-weight: 500;
    float: left;
    margin-left: 5px;
    margin-top: -2px;
}

.iconat-item i{
    font-size: 100px;
    color: #95c63d;
}
.iconat-item{
    margin: 20px 0;
}
.table-sec{
    padding: 0 10px;
}
.mhader-imgs{
   max-width: 100%;
    width: 700px;
    margin: auto; 
    box-shadow: -2px 2px 8px #999;
}
#mhader-banner .carousel-inner {
    max-width: 100%;
    width: 100%;

}
#mhader-banner .carousel-inner img{
    width: 100%;
    height: 500px;
}
.modal-backdrop {
    /* position: fixed; */
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
}
</style>



<section class="main_content pbottom-50 ptop-30">
    <div class="container-fluid">
        

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="inner-omomia">
                   <div class="text-center">
                    <h2 class="box-title"> محاضر إجتماعات   الجمعيه العمومية</h2>
                  </div>
                  
                  <div class="dawra-nums">
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="dawra-style">
                          <a class="hover-fx"><i class="fa fa-sort-numeric-asc"></i></a>
                            <h5> رقم الجلسة <span class="badge droid">   <?php  if(isset($mymeeting->glsa_rkm)&&!empty($mymeeting->glsa_rkm))
                         { echo $mymeeting->glsa_rkm;   }?>     </span></h5>
                               
                             
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                          <div class="dawra-style">
                          <a class="hover-fx"><i class="fa fa-calendar-o"></i></a>
                            <h5> تاريخ الجلسة <span class="badge droid"><?php  if(isset($mymeeting->glsa_date_m)&&!empty($mymeeting->glsa_date_m))
                         { echo $mymeeting->glsa_date_m;   }?></span></h5>
                             
                             
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="dawra-style">
                              <a class="hover-fx"><i class="fa fa-calendar-o"></i></a>
                                <h5> التوقيت <span class="badge droid"><?php  if(isset($mymeeting->time_start)&&!empty($mymeeting->time_start))
                         { echo $mymeeting->time_start;   }?> </span></h5>
                                 
                                 
                              </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="dawra-style">
                              <a class="hover-fx"><i class="fa fa-calendar-o"></i></a>
                                <h5> مكان الانعقاد <span class="badge droid"> الجمعية </span></h5>
                                 
                                 
                              </div>
                        </div>
                        
                        
                       
                    </div>
                    
                    <div class="iconat-algalsa">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                           <div class="iconat-item text-center">
                              <a href="#" data-toggle="modal" onclick="get_table_mehwer(<?= $mymeeting->glsa_rkm ?>,'تفاصيل المحاور')" data-target="#myModal"> <i class="fa fa-server" aria-hidden="true"></i> </a>
                              <!-- <a href="#" data-toggle="modal" data-target="#myModal"> <h5> المحاور </h5></a> -->

                              <a data-toggle="modal" data-target="#myModal"
                                            onclick="get_table_mehwer(<?= $mymeeting->glsa_rkm ?>,'تفاصيل المحاور')">
                                            <h5> المحاور </h5>
                  </a>
                           </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                           <div class="iconat-item text-center">
                           
                           <a href="#" data-toggle="modal" onclick="det_datiles(<?= $mymeeting->glsa_rkm ?>)"
                                            data-target="#myModal"  > <i class="fa fa-users" aria-hidden="true"></i> </a>
                              <!-- <a href="#" data-toggle="modal" data-target="#myModal_member"> <h5>  الأعضاء الحاضرين  </h5></a> -->
                              <a  data-toggle="modal"
                                            onclick="det_datiles(<?= $mymeeting->glsa_rkm ?>)"
                                            data-target="#myModal"><h5>  الأعضاء الحاضرين  </h5>
                                        
                  </a>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                            <div class="iconat-item text-center">
                            
                            <a href="#" data-toggle="modal"  '
                            
                            onclick="get_table_qrar(<?= $mymeeting->glsa_rkm ?>)"
                                            data-target="#myModal" 
                          > <i class="fa fa-hand-peace-o" aria-hidden="true"></i> </a>
                              <a href="#" data-toggle="modal" onclick="get_table_qrar(<?= $mymeeting->glsa_rkm ?>)"
                                            data-target="#myModal" > <h5> القرارات </h5></a>
                             
                           </div>
                        </div>
                        <!-- 2-12-om  -->
                        
                    </div>
                    
                    
                    
                     <div class="text-center">
                        <h2 class="box-title">  مكتبه الصور </h2>
                      </div>
                    
                     
                      <div class="col-xs-12 ">
    <div class="  ">
  
    <div class="panel-body">
    

            <div class="col-md-12">
            <!------panel images -------------------------------------------------------------------------------->
            <?php
            if (isset($my_images) && !empty($my_images)) {
                $z = 1;
                foreach ($my_images as $row) {
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 padding-10" id="row_<?= $z ?>">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h5 class="panel-title"><?= $row->title ?></h5>
                            </div> -->
                            <div class="panel-body" style=" height: 200px;overflow: hidden;">
                                <img data-toggle="modal" data-target="#myModal-view_photo-<?= $row->id ?>" 
                                src="<?= base_url().'uploads/md/all_glasat_gam3ia_omomia_morfaq/'. $row->file?>"
                                     width="100%" alt="" style="max-height: -webkit-fill-available;">
                                        <!-- modal view -->
                                <div class="modal fade" id="myModal-view_photo-<?= $row->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= base_url().'uploads/md/all_glasat_gam3ia_omomia_morfaq/'. $row->file?>"
                                                     width="100%" alt="">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal view -->
                            </div>
                            
                        </div>
                    </div>
                    <?php
                    $z++;

                }
            }
            ?>
            <!--------------------------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</div>
<div class="text-center">
                        <h2 class="box-title">  مكتبه الفيديوهات </h2>
                      </div>
                               <!--  -->
                               <div class="col-xs-12">
                               <div class=" ">

    <div class="panel-body">
    
            <div class="col-md-12">
                <!------panel videos -------------------------------------------------------------------------------->
                <?php
                if (isset($vedios) && !empty($vedios)) {
                    $z = 1;
                    foreach ($vedios as $row_video) {
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-12 padding-10" id="row_<?= $z ?>">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    <h5 class="panel-title"><?= $row_video->title ?></h5>
                                </div> -->
                                <div class="panel-body" style=" height: 200px;overflow: hidden;">
                                    <iframe   src="https://www.youtube.com/embed/<?= $row_video->file?>"
                                        data-toggle="modal" data-target="#myModal-view_video-<?= $row_video->id ?>"
                                              frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
                                              style="height: -webkit-fill-available; width: -webkit-fill-available;"></iframe>
                                               <!-- modal view -->
                                    <div class="modal fade" id="myModal-view_video-<?= $row_video->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">الفديو</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe width="70%" height="70%" src="https://www.youtube.com/embed/<?= $row_video->file?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal view -->
                                </div>
                              
                            </div>
                        </div>
                        <?php
                        $z++;
                    }
                }
                ?>
                <!--------------------------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</div>
                               <!--  -->
                                
                </div>
            </div>
        </div>
    </div>
</section>








<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل </h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>

    function det_datiles(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'gam3ia_omomia/Gam3ia_omomia/det_datiles'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#members_data').html(d);


            }
        });
    }
</script>
<script>

    function get_table_mehwer(glsa_rkm,text) {
        // $("#table_mehwer").show();
        $('#pop_h').text(text);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/get_table_mehwer',
            data: {glsa_rkm: glsa_rkm},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (html) {
                $("#members_data").html(html);
            }
        });

    }
</script>

<script>

    function get_table_qrar(glsa_rkm,text) {
        // $("#table_mehwer").show();
        $('#pop_h').text(text);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/get_table_qrar',
            data: {glsa_rkm: glsa_rkm},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (html) {
                $("#members_data").html(html);
            }
        });

    }
</script>
<script type="text/javascript" src="<?= base_url() . 'asisst/web_asset/' ?>js/jquery-1.10.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script> 