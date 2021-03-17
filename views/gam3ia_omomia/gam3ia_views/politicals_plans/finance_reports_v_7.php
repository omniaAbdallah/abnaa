

<style>
.download-btn-text a {
    color: #fff;
    text-decoration: none;
}
.mbottom-20 {
    margin-bottom: 20px;
}
.top_icon_name {
    height: 80px;
    overflow: hidden;
    /* display: inline-block; */
    width: 100%;
    padding: 10px;
    background-color: #f5f5f5;
    border: 1px solid #eee;
}
.reports .report_item .top_icon_name i {
    color: #ff0000;
    font-size: 35px;
    float: right;
    margin-left: 10px;
}
.download-btn-text {
    background-color: #95c11f;
    -webkit-border-radius: 0 0 4px 4px;
    -moz-border-radius: 0 0 4px 4px;
    border-radius: 0 0 4px 4px;
    color: #fff;
    display: inline-block;
    float: left;
    padding: 10px;
    width: 100%;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}
.panel-heading a:hover {
    color: #fff;
    /* background-color: #0c1e56; */
}
</style>

<div class="col-md-12">



<div class="panel panel-default" style="height: 650px">

<div class="panel-heading panel-title"> التقارير المالية </div>

<div class="panel-body">
<!--  -->
<!-- 
<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">

   
   
                
                
        
        
        
         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                     <?php
                        if (isset($reports) && !empty($reports)){
                            $x=1;
                              $i= 0;
                        foreach ($reports as $row){
                             $in='';
                            if($i==0){
                                $in='in';
                            }
                            $i++;
                
                        ?>

                         <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=$row->id?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                 <i class="more-less glyphicon glyphicon-plus"></i>
                  تقارير عام  <?php echo $row->year;?> م
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $x;?>" class="panel-collapse collapse <?php // echo $in; ?>" role="tabpanel" aria-labelledby="heading<?=$row->id?>">
              <div class="panel-body">
               <?php
                    if (isset($row->details) && !empty($row->details)){
                        foreach ($row->details as $record){ ?>

                            <div class="col-md-4 mbottom-20">
                                <div class="report_item">
                                    <div class="top_icon_name">
                                        <i class="<?= $record->icon?> "></i>
                                        <p><?= $record->title?></p>
                                    </div>
                                
<div class="download-btn-text">
<a   href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/download_report/".$record->file.'/'.$record->id.'/2'?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>


<a  target="_blank" href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/read_file_report/".$record->file.'/'.$record->id.'/2'?>"  class="pull-right"><i class="fa fa-eye"></i> معاينة</a>


</div>
  
                                    
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
               </div>
            </div>
          </div>
                        
                        <?php
                        $x++;
                            }
                            }
                            ?>
                             </div>



               

        



    </div>
</section> -->
<?php 
 $years = array_combine(range(date("Y"), 1990), range(date("Y"), 1990));
 //print_r ($years);
?>
<div class="form-group col-sm-3 col-xs-12 padding-4" style="">
                    <label class="label ">  العام </label>
                    <select name="year" class="form-control  " id="year"
                            onchange="search()"
                            data-validation="required" aria-required="true">
                        <option value="0">-اختر-</option>
                        <?php
                     
                        if (isset($years) && !empty($years)) {
                            foreach ($years as $mag) {
                                ?>
                                <option 
                                        value="<?php echo $mag ?>"  ><?php echo $mag ?> </option>
                            <?php }
                        } ?>
                    </select>
                  
                   
 </div>
        

<!--  -->


<div class="form-group col-sm-12 col-xs-12 padding-4" id="details">
<?php
                         echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                            ?>
        </div>
</div>

</div>

</div>







<script>
    function search() {
        // $('#pop_rkm').text(rkm);
    var  row_id= $('#year').val();
    if(row_id !=0){
        $.ajax({
            
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_reports",
            type: 'post',
            data: {row_id: row_id},
            beforeSend: function () {
              //  $('#past').show();
            
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {

                $('#details').html(d);

            }

        });
    }else{
     //   $('#past').hide();
        swal({
                                    title: " برجاء ادخال البيانات!",


                                }
                            );

    }
    }
</script>