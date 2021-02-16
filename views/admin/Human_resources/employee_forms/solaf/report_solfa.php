<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $title ?></h4>
        </div>
    </div>
    <div class="panel-body">
        <?php
        if(isset($solfs) && !empty($solfs)){?>
        <table class="table example table-bordered table-striped table-hover">
            <thead>
            <tr class="info">
                <th>م</th>
                <th> أسم الموظف</th>
                <th>الاجمالي </th>
                <?php
$monthbynumber = array(
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "11",
    "12",
);
            $months = array(
                    "1(يناير)",
                    "2(فبراير)",
                    "3(مارس)",
                    "4(ابريل)",
                    "5(مايو)",
                    "6(يونيو)",
                    "7(يوليو)",
                    "8(أغسطس)",
                    "9(سبتمبر)",
                    "10(أكتوبر)",
                    "11(نوفمبر)",
                    "12(ديسمبر)",
            );
                foreach ($months as $month) {
                 echo "<th>" . $month . "</th>"
                 ;
                    }
                ?>
            </tr>
            </thead>
            <?php
            if(isset($solfs) && !empty($solfs)){
                $x=1;
                foreach($solfs as $row){
                    ?>
                    <tr>
                        <td ><?php echo $x;?></td>
                        <td ><?php echo $row->emp_name;?></td>
                        <td ><?php echo $row->qemt_solaf;?></td>
                      <?php
                     foreach ($row->quest_month as $monthsss) {?>
                          <td>
<?php
if(!empty($monthsss)){
    if($monthsss['paid']=="yes"){?>
    <div style='background-color:green; color:green;'>
<?php echo '
<a data-toggle="modal" class="btn btn-xs"  data-target="#detailsModal"  onclick="load_page('.$monthsss['value_of_qst'].')">
                                                <i class="fa fa-plus "></i>
                                                </a>
';
?>
</div>
<?php
    }else{?>
<div style='background-color:red; color:red;'>
    <?php    echo  '
    <a data-toggle="modal" class="btn btn-xs"  data-target="#detailsModal"  onclick="load_page('.$monthsss['value_of_qst'].')">
    <i class="fa fa-plus "></i>
    </a>
    ';
    }?>
    </div>
<?php }else{
    echo "";
}
 ?>
                            </td>
                         <?php } ?>
                    </tr>
                    <?php
                    $x++;
                } } ?>
        </table>
            <?php }?>
    </div>
      </div>
        </div>
        <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 20%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;"> تفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_solfa_value",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>