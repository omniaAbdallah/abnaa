


<?php if (isset($all) && !empty($all) && $all !=null){ ?>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th>م</th>
            <th>العنوان</th>
            <th>الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        if (isset($all[$key]) && !empty($all[$key]) && $all[$key] !=null){
            foreach ($all[$key] as $value) {
                ?>
                <tr>
                    <td><?=($x++)?></td>
                    <td style="background-color:<?=$value->color?>" ><?=$value->title?></td>

                    <td>
                        <a href="<?php echo base_url().'services_orders/setting/Main_setting/UpdateSetting/'.$value->id."/".$key  ?>" title="تعديل">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <span> </span>
                        <a href="<?=base_url()."services_orders/setting/Main_setting/DeleteSetting/".$value->id."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php }
        }else{
            echo '<tr>
                                                    <td colspan="5"> لايوجد بيانات </td>
                                                    </tr>';
        } ?>
        </tbody>
    </table>
<?php } ?>