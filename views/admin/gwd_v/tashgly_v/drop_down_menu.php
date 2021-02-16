
&nbsp;&nbsp;
<button style="margin-right: 3px;" id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
    <span class=""> رقم الخطه الاستراتيجيه </span></button>
<button class="btn btn-success  btn-sm progress-button ">
    <span class=""><?php  echo  $pln_rkm ?></span></button>

<div class="btn-group">
    <button type="button" class="btn btn-danger">إستكمال البيانات </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="<?php echo base_url(); ?>gwd/strategy/Strategy/strategy_files/<?php echo $pln_id; ?>">
                يااااااارا
            </a></li>
        <li><a href="<?php echo base_url(); ?>gwd/strategy/Strategy/strategy_files/<?php echo $pln_id; ?>">
                اضافه مرفقات
            </a></li>
    </ul>
</div>