<?php if (isset($records) && $records != null && !empty($records)) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> إدارة الاعلان</h3>
            </div>
            <div class="panel-body">
            <table id="example" class=" table table-bordered table-striped" role="table">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th class="text-center">تاريخ الاعلان</th>
                    <th class="text-center">عنوان الاعلان</th>
                 
                    <!-- <th class="text-center">  ارسال الي</th> -->
                    <th class="text-center"> صوره الاعلان</th>
                    <!-- <th class="text-center"> مرفق التعميم</th> -->
        
                    <th class="text-center">الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x = 1;
                foreach ($records as $value) {
                    ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $value->ta3mem_date ?></td>
                        <td><?= $value->ta3mem_title ?></td>
                      
                    
                        <td>
                            <?php
                            $file = $value->img;
                            if (!empty($file)) {
                                ?>
                                <?php
                                $type = pathinfo($file)['extension'];
                                $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                if (in_array($type, $arry_images)) {
                                    ?>
                                    <?php if (!empty($file)) {
                                        $url = base_url() . 'uploads/human_resources/ta3mem/' . $file;
                                    } else {
                                        $url = base_url('asisst/fav/apple-icon-120x120.png');
                                    } ?>
                                    <a target="_blank" onclick="show_img('<?= $url ?>')">
                                        <i class=" fa fa-eye"></i>
                                    </a>
                                    <?php
                                } elseif (in_array(strtoupper($type), $arr_doc)) {
                                    ?>
                                    <?php if (!empty($file)) {
                                        $url = base_url() . 'human_resources/ta3mem/Ta3mem_c/read_file/' . $file;
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
                        </td>
                        <!--   <td>
                                <?php
                        $file = $value->file;
                        if (!empty($file)) {
                            ?>
                                    <?php
                            $type = pathinfo($file)['extension'];
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                        <?php if (!empty($file)) {
                                    $url = base_url() . 'uploads/human_resources/ta3mem/' . $file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                            <i class=" fa fa-eye"></i>
                                        </a>
                                        <?php
                            } elseif (in_array(strtoupper($type), $arr_doc)) {
                                ?>
                                        <?php if (!empty($file)) {
                                    $url = base_url() . 'human_resources/ta3mem/Ta3mem_c/read_file/' . $file;
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
                            </td> -->
                      
                        <td style="width: 200px">
                           <a 
                                           onclick="get_all_data( <?= $value->id; ?>)">
                                            <i class="fa fa-search"> </i>الاجراء </a>
                                   
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
<?php } ?>
<div id="result">
</div>
<script>
    function get_all_data(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/ta3mem/Ta3mem_adv_c_request/check_d3wa",
            data: {id: id},
            
            success: function (data) {
                if(data!='')

{

    $("#result").html(data);

    $(".modal-startup").modal('show');

    

}
            }
        });
    }
</script>