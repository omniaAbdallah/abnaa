<?php if (!empty($eslat_estlam)) { ?>

<?php if($eslat_estlam->brnamg_tabe3==1){?>

<button type="button" class="btn btn-warning btn-labeled" onclick="get_esalt()"
    style="float: left;    font-family: 'hl';">
<span class="btn-label"><i class="fa fa-share"></i></span> تحويل الإيصالات
إلى المستودع
</button>

<?php }else if($eslat_estlam->brnamg_tabe3!=1){?>
    <button type="button" class="btn btn-warning btn-labeled" onclick="sendajax_finance()"
    style="float: left;    font-family: 'hl';">
<span class="btn-label"><i class="fa fa-share"></i></span> تحويل الإيصالات
إلى المالية
</button>
<?php }?>

<?php } ?>

