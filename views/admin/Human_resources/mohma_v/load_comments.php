

<div class="comments-sec">
		<div class="col-xs-12 no-padding">
			<h5>الردود</h5>
			<div class="well col-xs-12 no-padding">
				<div class="col-md-12 padding-4">
                <?php
      //  echo '<pre>'; print_r($result);
        if(isset($result)&&!empty($result)){
            foreach ($result as $row){
                ?>
					<article class="reply-comment">
                        <div class="reply-img">
                                                            <img src="<?php if (isset($row->personal_photo) && $row->personal_photo != null) {
                                                                if ($_SESSION['role_id_fk'] == 3) {
                                                                    echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->personal_photo;
                                                                } else {
                                                                    echo base_url() . 'uploads/images/' . $row->personal_photo;
                                                                }
                                                            } else {
                                                                echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                                                            }
                                                            ?>"
                                                                 class="img-circle" width="45" height="45" alt="user">
                                                        </div>
						<div class="reply-comment ">
							<h5 class="name"><span class="label label-inverse"><?= $row->publisher_name;?> </span> <?= $row->date_ar;?> 
                            <!-- <a type="button" class="btn btn-danger btn-xs"  href="<?= base_url() . "human_resources/mohma/Mohma_c/delete_comment/" . $row->id ."/".$row->mohma_id_fk  ?>" style="float:left;"><i class="fa fa-trash"> </i></a>  -->
                            <?php if ($row->publisher == $_SESSION['user_id']) { ?>
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    onclick='delete_comment(<?php echo $row->id ?>,<?= $row->mohma_id_fk ?>)'>
                                                                                <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                </div>
                        <?php }?>
                        <?php if ($row->publisher == $_SESSION['emp_code']) { ?>
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    onclick='delete_comment(<?php echo $row->id ?>,<?= $row->mohma_id_fk ?>)'>
                                                                                <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                </div>
                        <?php }?>
                             </h5>
							<p><?= $row->comment;?></p>
						</div>
					</article>
                    <?php } } ?>
				</div>
				
			</div>
		</div>
        <?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<?php }?>