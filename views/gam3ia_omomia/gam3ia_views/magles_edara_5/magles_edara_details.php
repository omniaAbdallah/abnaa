


<div class="col-md-12 padding-4">
                                <div class="panel panel-default" style="height: 150px">
                                    <div class="panel-heading panel-title"> مجلس الإدارة</div>
                                    <div class="panel-body">

                                    <div class="form-group col-sm-3 col-xs-12 padding-4" style="">
                    <label class="label "> كود المجلس </label>
                    <select name="mgls_code" class="form-control  " id="mgls_code"
                            onchange=" get_data(this); "
                            data-validation="required" aria-required="true">
                        <option value="0">-اختر-</option>
                        <?php
                        if (isset($active_magles) && !empty($active_magles)) {
                            foreach ($active_magles as $mag) {
                                ?>
                                <option 
                                        value="<?php echo $mag->mg_code ?>"  ><?php echo $mag->mg_code ?> </option>
                            <?php }
                        } ?>
                    </select>
                  
                   
                </div>

                <div class="col-xs-2 " style="margin-top: 24px;">
         
         <button type="button"
                       class="btn btn-labeled btn-yellow "  onclick="search()"
                       style="padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                   <span class="btn-label"><i class="fa fa-search-plus"></i></span> بحث
               </button>


        </div>
    </div>
</div>



<div class="col-md-12">
                                <div class="panel panel-default" style="height: 900px">
                                    <div class="panel-heading panel-title">أعضاء مجلس الإدارة</div>
                                    <div class="panel-body">
                                    <div id="details">
                                    
                <?php
           
if (isset($all_members) && !empty($all_members)){ 
               foreach ($all_members as $record){
    ?>
    
      <div class="managment_member col-sm-6 col-xs-12 padding-4">
            <div class="col-sm-4 text-center col-xs-12 no-padding">

                <img  style="
    width: 162px;
" src="<?=base_url()."uploads/md/gam3ia_omomia_members/".$record->details_edow->mem_img?>" onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'"  class="img-circle">
            </div>
            <div class="col-sm-8 col-xs-12 padding-4">
            
            
                <h4 style="color: #053498 !important;" class="text-center">
                
                 <?php
                    echo $record->mansp_title;
                 
                    ?>
               
                   
                </h4>
                <h4 style="font-weight: 600; color: #002542;font-size: 15px;"> <?= $record->details_edow->laqb_title?>  /  <?= $record->details_edow->name?> </h4>
<!--
                <p class="droid"> <i style="font-size: 38px !important;" class="fa fa-mobile"></i> <?= $record->details_edow->jwal?></p>
                -->
                <p  style="font-weight:bold;float: left !important;line-height: 39px !important; ">
                <a class="fade-icon droid" style="font-size: 18px;"> <i class="fa fa-envelope-o"></i> <?= $record->details_edow->email?></a>
                </p>
                
            </div>
        </div> 
    
<?php 
}
} ?>

                                    </div>
                                </div>
                            </div>
                            </div>

                            <script>
    function search() {
        // $('#pop_rkm').text(rkm);
    var  row_id= $('#mgls_code').val();
    if(row_id !=0){
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_magles",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }else{
        swal({
                                    title: " برجاء ادخال البيانات!",


                                }
                            );

    }
    }
</script>