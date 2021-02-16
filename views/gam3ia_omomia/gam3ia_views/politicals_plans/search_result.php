<link rel="stylesheet" href="<?php echo base_url()?>asisst/gam3ia_omomia_asset/css/style111.css">




<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            if (isset($reports) && !empty($reports)){
                $x=1;
                $i= 0;
                foreach ($reports as $row){
                    $in='';
                    if($i==0){
                        $in='in';
                    }
                    $i++;
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?=$row->id?>">
                            <div class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    تقارير عام  <?php echo $row->year;?> م
                                </a>
                            </div>
                        </div>
                        <div id="collapse<?php echo $x;?>" class="panel-collapse collapse <?php  echo $in; ?>" role="tabpanel" aria-labelledby="heading<?=$row->id?>">
                            <div class="panel-body">
                                <?php
                                if (isset($row->details) && !empty($row->details)){
                                    foreach ($row->details as $record){ ?>
                                        <div class="list-item col-md-4 col-sm-6 col-xs-12">
                                            <div class="rules-reg-card regulations">
                                                <a class="rule-clickable-part" >
                                                    <p><span class="icon">
                                                            <img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                                                </span>
                                                        <i class="<?= $record->icon?> "></i>
                                                        <?=$record->title?>
                                                    </p>
                                                </a>
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                    </div>
                                                    <div class="col-sm-5 card-actions">
                                                        <a   href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/download_report/".$record->file.'/'.$record->id.'/2'?>"
                                                             class="fa fa-download" title="تحميل المرفق" download></a>

                                                        <?php
                                                        $mehwar_morfaq = $record->file;
                                                        if (!empty($mehwar_morfaq)) {
                                                            ?>
                                                            <?php
                                                            $type = pathinfo($mehwar_morfaq)['extension'];
                                                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                            if (in_array($type, $arry_images)) {
                                                                ?>
                                                                <?php if (!empty($mehwar_morfaq)) {
                                                                    $url = base_url() . 'gam3ia_omomia/Gam3ia_omomia/read_file_report/' . $mehwar_morfaq;
                                                                } else {
                                                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                } ?>
                                                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                    <i class=" fa fa-eye"></i>
                                                                </a>
                                                                <?php
                                                            } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                ?>
                                                                <?php if (!empty($mehwar_morfaq)) {
                                                                    $url =base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report/'.$mehwar_morfaq;
                                                                } else {
                                                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                } ?>
                                                                <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                    <i class=" fa fa-eye"></i>
                                                                </a>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo 'لا يوجد';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $x++;
                }
            }else{ echo '<div class="alert alert-danger">لا توجد بيانات</div>';}
            ?>
        </div>
    </div>
</section>



<script>
    function show_img(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>
    function show_bdf(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>