<button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
    <span class="">  رقم الجلسه</span>
</button>
<button class="btn btn-success  btn-sm progress-button ">
    <span class=""><?= $last_galsa ?> </span>
</button>
<div class="btn-group">
    <button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال</button>
    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <!--  -->
    <ul class="dropdown-menu">
     <!-- <?php if ($row->glsa_finshed == 0) { ?>
                                                    <li><a target="_blank"
                                                           href="<?= base_url() . 'md/all_glasat/all_glasat/update_galsa' . '/' . $row->glsa_rkm . '/' . $row->mgls_code ?>">
                                                            تعديل بيانات الجلسة </a></li>
                                                <?php } ?> -->
        <li><a target="_blank"
               href="<?= base_url() ?>md/all_glasat/all_glasat/a3da_glsa/<?= $last_galsa ?>">
                أعضاء الجلسه </a></li>
        <li><a target="_blank"
               href="<?= base_url() ?>md/all_glasat/all_glasat/mehwr_glsa/<?= $last_galsa ?>">
                محاور الجلسه </a></li>
        <li><a target="_blank"
               href="<?= base_url() ?>md/all_glasat/Start_galsa/add_galsat_mon24a/<?= $last_galsa ?>">
                مناقشة الجلسة </a></li>
        <li><a target="_blank"
               href="<?= base_url() ?>md/all_glasat/all_glasat/add_attach/<?= $last_galsa ?>">
                إضافة مرفقات </a></li>
        <li><a target="_blank"
               href="<?= base_url() ?>md/all_glasat/all_glasat/add_video/<?= $last_galsa ?>">
                مكتبة الفيديوهات </a></li>
        <li><a target="_blank"
               href="<?= base_url() ?>md/all_glasat/all_glasat/add_image/<?= $last_galsa ?>">
                مكتبة الصور </a></li>
    </ul>
    <!--  -->
</div>