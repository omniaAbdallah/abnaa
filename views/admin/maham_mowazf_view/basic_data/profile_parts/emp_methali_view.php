<!-- Profile Image -->

        <?php if ((isset($emp_methali)) && (!empty($emp_methali))) {
            if ((!empty($emp_methali['emp_img'])) && (file_exists('uploads/human_resources/emp_photo/thumbs/' . $emp_methali['emp_img']))) {
                $img_url = 'uploads/human_resources/emp_photo/thumbs/' . $emp_methali['emp_img'];
            } else {
                $img_url = 'asisst/admin_asset/img/avatar5.png';
            }
            ?>

            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"
                     src="<?= base_url() . $img_url ?>"
                     alt="User profile picture">
                <h6 class="profile-username text-center"><?= $emp_methali['emp_name'] ?></h6>
                <p class="text-muted text-center"><?= $emp_methali['mosma_wazefy_n'] ?></p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>عدد المرات السابقة </b> <a class="pull-right"><span
                                    class="badge bg-teal"><?= $emp_methali['count'] ?></span></a>
                    </li>
                    <li class="list-group-item">
                        <b>اخر تاريخ حصل علي اللقب </b> <a class="pull-right"><span
                                    class="badge bg-purple"><?= $emp_methali['date_ar'] ?></span></a>
                    </li>
                </ul>
                <a href="#" class="btn btn-success btn-block"><b>إرسال تهنئة</b></a>
            </div>
        <?php } else { ?>
            <?php
        } ?>
