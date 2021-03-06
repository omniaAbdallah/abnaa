<style type="text/css">
    .exchanges {

    }

    .panel-card {
        float: right;
        position: relative;
        width: 300px;
        background-color: transparent;
        margin-left: 90px;
        height: 170px;
    }

    .card-image {
        width: 30%;
        float: left;
        padding: 5px;
    }

    .card-image img {
        width: 100%;
        border: 2px solid #fcb632;
        border-radius: 8px;
    }

    .panel-card .panel-header {
        background-color: #09704E;
        color: #fff;
        padding: 5px;
        text-align: center;
        border-top-left-radius: 9px;
        border-top-right-radius: 9px;
    }

    .panel-card .panel-header h5 {
        margin: 0;
        font-size: 17px;
    }

    .panel-card .panel-body {
        background-color: #fff;
    }

    .panel-card:after {
        content: url(<?php echo base_url()?>asisst/admin_asset/img/arrow-design.png);
        position: absolute;
        right: 102%;
        top: 35%;
    }

    .gray-color {
        color: #555;
    }

    .label-egra {
        width: auto;
        font-size: 16px;
        color: #fff;

    }


</style>


<div class="exchanges">
    <?php if (!empty($allhistory)) { ?>


        <?php if (!empty($personal_data)) { ?>

            <div class="panel panel-card">
                <div class="panel-header">
                    <h5> مقدم الطلب</h5>
                </div>
                <div class="panel-body">
                    <div class="card-image">
                        <img src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $personal_data->personal_photo ?>">
                    </div>
                    <div class="card-details">
                        <p><span class="gray-color"></span><?php echo $personal_data->employee; ?></p>
                        <p><span class="gray-color"></span><?php echo $personal_data->job_title; ?></p>
                        <p><span class="gray-color"></span> <label class="label label-success label-egra text-center">تم
                                إرسال الطلب</label></label> </p>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php /*if(!empty($level_2data)){ ?>

				<div class="panel panel-card">
					<div class="panel-header">
						<h5>  الموظف البديل</h5>
					</div>
					<div class="panel-body">
						<div class="card-image">
							<img src="<?php echo base_url();?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_2data->from_user_photo?>">
						</div>
						<div class="card-details">
							<p><span class="gray-color"></span><?php echo $level_2data->from_user_n?></p>
							<p><span class="gray-color"></span> <?php echo $level_2data->from_user_job?></p>
							<p><span class="gray-color"></span> <label class="label label-success label-egra text-center"><?php echo $level_2data->talab_msg;?></label></label> </p>
						</div>
					</div>
				</div>

			<?php } */ ?>


        <?php
        // echo "<pre>";
        // print_r($agaza_data);
        $x = 1;
        foreach ($allhistory as $key => $row) {
            if ($agaza_data->level == $row->level && ($row->level != 6)) {
                continue;
            }

            $class = 'success';
            if (!empty($row->reason_action)) {
                $class = 'danger';
            }
            ?>
            <div class="panel panel-card">
                <div class="panel-header">
                    <h5>  <?php
                        if (!empty($levels_data)) {
                            echo $levels_data[($row->level - 1)]->title;
                        } ?></h5>
                </div>
                <div class="panel-body">
                    <div class="card-image">
                        <img src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $row->from_user_photo ?>">
                    </div>
                    <div class="card-details">
                        <p><span class="gray-color"></span><?php echo $row->from_user_n; ?></p>
                        <p><span class="gray-color"></span> <?php echo $row->from_user_job ?></p>
                        <p><span class="gray-color"></span><label class="label label-<?= $class ?> label-egra text-center"><?php echo $row->talab_msg; ?></label></p>
                    </div>
                </div>
            </div>
            <?php $x++;
        } ?>

        <?php

    } else {
        echo '<div class="alert alert-danger">لا توجد متابعات !!</div>';
    } ?>


</div>
