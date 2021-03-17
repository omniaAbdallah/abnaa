 
 <style>

.box {

    position: relative;

    border-radius: 3px;

    background: #ffffff;

    border-top: 3px solid #d2d6de;

    margin-bottom: 20px;

    width: 100%;

    box-shadow: 0 1px 1px rgba(0,0,0,0.1);

}

.box-header {

    color: #444;

    display: block;

    padding: 10px;

    position: relative;

}

.box-header.with-border {

    border-bottom: 1px solid #f4f4f4;

}

.box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {

    display: inline-block;

    font-size: 18px;

    margin: 0;

    line-height: 1;

}

.box-body {

    border-top-left-radius: 0;

    border-top-right-radius: 0;

    border-bottom-right-radius: 3px;

    border-bottom-left-radius: 3px;

    padding: 10px;

}

.box-footer {

    border-top-left-radius: 0;

    border-top-right-radius: 0;

    border-bottom-right-radius: 3px;

    border-bottom-left-radius: 3px;

    border-top: 1px solid #f4f4f4;

    padding: 10px;

    background-color: #fff;

}

.table-bordered {

    border: 1px solid #f4f4f4;

}

table {

    background-color: transparent;

}

.table {

    width: 100%;

    max-width: 100%;

    margin-bottom: 20px;

}

.table thead th {

    vertical-align: bottom;

    border-bottom: 2px solid #dee2e6;

}

.table-bordered thead td, .table-bordered thead th {

    border-bottom-width: 2px;

}

.table td, .table th {

    padding: .75rem;

    vertical-align: top;

    border-top: 1px solid #dee2e6;

}

.badge {

    display: inline-block;

    min-width: 10px;

    padding: 3px 7px;

    font-size: 12px;

    font-weight: 700;

    line-height: 1;

    color: #fff;

    text-align: center;

    white-space: nowrap;

    vertical-align: middle;

    background-color: #777;

    border-radius: 10px;

}

.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {

    background-color: #dd4b39 !important;

}

.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {

    background-color: #f39c12 !important;

}

.bg-light-blue, .label-primary, .modal-primary .modal-body {

    background-color: #3c8dbc !important;

}

.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {

    background-color: #00a65a !important;

}

  .classnewa{
        font-size: 17px !important;
    }

</style>


 
 
 <table class="example table table-bordered center" style="   margin: auto;
   width: 100% !important;" >
    <thead>
    <tr>
    <th style="background: #737373;color: white;" colspan="4">محاور الجلسة </th>
    </tr>
      <tr>
        <th style="background: #737373;color: white; width: 5%;">م</th>
        <th style="background: #737373;color: white; width: 40%;">المحور</th>
        <th style="background: #737373;color: white;width: 5%;">المرفق</th>
        <th style="background: #737373;color: white;">القرار</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    if(isset($mahwrs) and $mahwrs != ''){
        $x=0;
        foreach($mahwrs as $row){
$x++;
        ?>
        <tr>
          <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><?=$x?></td>
        <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><?php echo '<b>' .$row->mehwar_title .'</b>' ?></td>
        <td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>>
<?php
$mehwar_morfaq = $row->mehwar_morfaq;
if (!empty($mehwar_morfaq)) {
    ?>
    <?php
    $type = pathinfo($mehwar_morfaq)['extension'];
    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
    if (in_array($type, $arry_images)) {
        ?>
        <?php if (!empty($mehwar_morfaq)) {
            $url = base_url() . 'uploads/md/all_mehwr_gam3ia_omomia/' . $mehwar_morfaq;
        } else {
            $url = base_url('asisst/fav/apple-icon-120x120.png');
        } ?>

        <!-- <a target="_blank" onclick="show_img('<?= $url ?>')">
            <i class=" fa fa-eye"></i>
        </a> -->
        <?php if (!empty($mehwar_morfaq)) {
                                    $url = base_url() .'uploads/md/all_mehwr_gam3ia_omomia/'. $mehwar_morfaq;
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
                                   // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                   $url = base_url() .'uploads/md/all_mehwr_gam3ia_omomia/'. $mehwar_morfaq;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
        <!-- modal view -->

        <?php

    }

} else {

    echo 'لا يوجد';

}

?>



</td>
<td <?php if($row->opend==1){?> style="background-color: #f0ad4e;" <?php }?>><?php 


if(isset($row->elqrar)&&!empty($row->elqrar))

{
echo '<b style="color:#087908;">'.$row->elqrar .'</b>' ;}else{
    echo ' <b style="color:red;"> لم يتم اتخاذ القرار </b>' ;}  ?></td>

      </tr>

        

  <?php   } }

    

    ?>

    

      

    </tbody>

  </table> 

       

              

       
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



