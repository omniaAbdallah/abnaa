






          

             <table class="example table table-bordered center" style="   margin: auto;

   width: 80% !important;" >

    <thead>

    <tr>

    <th style="background: #737373;color: white;" colspan="4">محاور الجلسة </th>

    </tr>

      <tr>

        <th style="background: #737373;color: white; width: 5%;">م</th>

        <th style="background: #737373;color: white;">المحور</th>
        <th style="background: #737373;color: white;">المرفق</th>
        <th style="background: #737373;color: white;">القرار</th>
      </tr>

    </thead>

    <tbody>

    <?php 

    if(isset($open_galesa[0]->mehwr_details) and $open_galesa[0]->mehwr_details != ''){

        $x=0;

        foreach($open_galesa[0]->mehwr_details as $row){

$x++;

        ?>

        

        <tr>

          <td><?=$x?></td>

        <td><?=$row->mehwar_title ?></td>
        <td>

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
<td><?php 


if(isset($row->elqrar)&&!empty($row->elqrar))

{
echo '<span class="badge bg-green">'.$row->elqrar .'</span>' ;}else{echo 'لم يتم اتخاذ القرار';}  ?></td>

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



