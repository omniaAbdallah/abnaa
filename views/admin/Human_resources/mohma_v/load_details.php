
<div class="col-xs-12 no-padding">
        <?php   echo form_open_multipart('human_resources/mohma/Mohma_c/update_comment/'.$get_mohma->id."/".$get_mohma->mohma_id_fk );?> 
			<div class="col-xs-12 form-group">
				<label class="label ">تعديل</label>
				<textarea class="form-control" rows="3" name="comment" id="comment_update"  data-validation="required" ><?=$get_mohma->comment;?></textarea>
			</div>
			
			<div class="col-md-6 form-group">

			</div>
			<div class="col-md-3 form-group">
                <button class="btn btn-success btn-labeled" type="button" name="add" value="add"
				onclick="update_comment(<?= $get_mohma->id?>,<?= $get_mohma->mohma_id_fk ?>)"
                ><span class="btn-label"><i class="fa fa-reply"></i></span>تعديل</button>
			
                
            
            </div>
		</div>
        <?php
            echo form_close();
            ?>
			<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
  
<?php }?>