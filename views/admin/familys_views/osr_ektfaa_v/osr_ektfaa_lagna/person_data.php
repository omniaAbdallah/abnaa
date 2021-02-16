<style>
    .lobipanel-noaction {
        margin-bottom: 25px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }
    .list-group-item {
        padding: 10px 8px;
    }
    .table-pro th {
        width: 117px;
    }
    .table-bordered.table-details td {
        padding: 2px;
        font-size: 13px !important;
    }
</style>
<div class="col-md-12 no-padding">
    <div class="user-widget list-group">
        <div class="user-profile" style="padding-bottom: 0px;">
            <?php
            $user_img = "";
            if (isset($result)) {
                $user_img = base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $result->personal_photo;
            } ?>
            <span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" style="width: 100%;height: 140px" alt="<?php if (isset($result)) {
                    echo $result->employee;
                } ?>" src="<?php echo $user_img ?>"
                     onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'"/>
			</span>
            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        &nbsp;
                        <span class="white"><?php if (isset($result)) {
                                echo $result->employee;
                            } else {
                                echo 'اسم الموظف :';
                            } ?></span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
