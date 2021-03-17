

<?php if (empty($update)) {?>
<tr id="<?=$value->id?>" data-from_code="<?=$value->from_code?>">
<?php } ?>
    <td><?=($num_row)?></td>
    <td style="background-color:<?=$value->color?>" ><?=$value->title?></td>

    <td>
        <a href="#" onclick='swal({
            title: "هل انت متأكد من التعديل ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "تعديل",
            cancelButtonText: "إلغاء",
            closeOnConfirm: true
            },
            function(){
            load_edit(<?=$value->id?>,"<?=$value->title?>","<?=$value->color?>",<?=$value->from_code?>,<?=$num_row?>);

            });'>
            <i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#" onclick='swal({
            title: "هل انت متأكد من الحذف ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "حذف",
            cancelButtonText: "إلغاء",
            closeOnConfirm: true
            },
            function(){
            delete_setting(<?=$value->id?>,<?= $value->from_code ?>);
            });'>
            <i class="fa fa-trash"> </i></a>


        <!--<a href="<?php echo base_url().'services_orders/setting/Main_setting/UpdateSetting/'.$value->id."/".$value->from_code  ?>" title="تعديل">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <span> </span>
                        <a href="<?=base_url()."services_orders/setting/Main_setting/DeleteSetting/".$value->id."/".$value->from_code?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>-->
    </td>

<?php if (empty($update)) {?>
</tr>
<?php } ?>

            