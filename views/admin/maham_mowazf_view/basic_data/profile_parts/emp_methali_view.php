<!-- Profile Image --><?php if ((isset($emp_methali)) && (!empty($emp_methali))) {    if ((!empty($emp_methali['emp_img'])) && (file_exists('uploads/human_resources/emp_photo/thumbs/' . $emp_methali['emp_img']))) {        $img_url = 'uploads/human_resources/emp_photo/thumbs/' . $emp_methali['emp_img'];    } else {        $img_url = 'asisst/admin_asset/img/avatar5.png';    }    ?>    <div class="timeline timeline-inverse">        <div><img class="img-size-50 img-circle employee"                  src="<?= base_url() . $img_url ?>"                  alt="User profile picture">            <div class="timeline-item">                <h3 class="timeline-header"><a href="#"><?= $emp_methali['emp_name'] ?></a></h3>                <h3 class="timeline-position"><?= $emp_methali['mosma_wazefy_n'] ?></h3>                <div class="timeline-body">                    <ul class="products-list product-list-in-card pl-2 pr-2">                        <li>                            <div>                                <a href="#" class="product-title">عدد المرات السابقة <?= $emp_methali['count'] ?>                                    <span class="badge badge-success float-right">1 </span></a>                            </div>                            <div>                                <a href="#" class="product-title">                                    اخر تاريخ حصل علي اللقب <span                                            class="badge2 badge-success float-right"><?= $emp_methali['date_ar'] ?>                                   </span></a>                            </div>                        </li>                    </ul>                </div>                <div class="timeline-footer">                    <a href="#" class="btnn" style="padding: .175rem .5rem;font-size: 13px;">                        إرسال تهنئة</a>                </div>            </div>        </div>    </div><?php } else { ?>    <?php} ?>