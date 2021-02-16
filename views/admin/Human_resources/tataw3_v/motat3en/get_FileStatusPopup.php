

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" ><?php echo $tat_data['halt_motatw3_n']?$tat_data['halt_motatw3_n']:"طلب جاري";?> </div></h5>
    <button type="button" style="position: relative;
    top: -22px;" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body row">

    <div class="col-md-12" style="padding-top: 20px !important;">
        <?php if(isset($file_status)&&!empty($file_status)) {
            foreach ($file_status as $row) {
                ?>
                <div class="col-md-3">
                    <button value="<?php echo $row->id;?>"
                            onclick="change_file_status($(this).val(),$(this).attr('title'),$(this).attr('tat_id'));"
                            style="background-color:<?php echo $row->color;?>; color: black;"
                            title="<?php echo $row->title;?>"
                            tat_id="<?php echo $tat_data['id'];?>"
                            class="btn btn-sm btn-info status">
                        </i> <?php echo $row->title;?>
                    </button>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
