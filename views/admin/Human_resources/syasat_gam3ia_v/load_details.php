
<style>

.info_detailes {

    width: unset !important;

    border-top: 1px solid #ffffff !important;

    border-right: 1px solid #ffffff !important;

    background-color: #e4e4e4 !important;

    color: black !important;

    font-size: 15px !important;

}

</style>
<div class="col-xs-12 padding-4">

    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>

      <th class="info_detailes">
                <strong> الفئة </strong>
            </th>
           
            <td>   <?php $arrx = array(
                'sysa' => ' السياسات',
                'laeha' => 'اللوائح',
                'egraa'=>'إجراءت ',
               'namozg'=> 'النماذج'
            );
            
      
            if(!empty($result->fe2a_fk))
            {
              echo $arrx[$result->fe2a_fk];
            }
                                        ?>
     
</td>
          <th class="info_detailes">
                <strong> الادارة </strong>
            </th>
           
            <td><?php 
                                      
                                      if(!empty($result->edara_n))
                                      {
                                          echo $result->edara_n;
                                      }
                                    ?></td>

            </tr>

            <?php if(empty($result->fe2a_fk) || $result->fe2a_fk=='laeha' ||$result->fe2a_fk=='sysa' ){?>
<tr>
 <th class="info_detailes">
                <strong>  الاسم</strong>
            </th>
           
                    <td><?=$result->title?>
                          </td>
</tr>
 <?php }else if(!empty($result->fe2a_fk)&& $result->fe2a_fk=='egraa')
{?>
<tr>
 <th class="info_detailes">
                <strong> اسم الاجراء</strong>
            </th>
           
                    <td><?=$result->title?>
                          </td>
   
 <th class="info_detailes">
                <strong>  رقم الاصدار</strong>
            </th>
           
                    <td><?=$result->rkm?></td>
                          

                  
</tr>
 <?php }else if(!empty($result->fe2a_fk)&& $result->fe2a_fk=='namozg'){?>
    <tr>
                    <th class="info_detailes">
                <strong> اسم النموذج  </strong>
            </th>
           
                    <td><?=$result->title?>
                          </td>
 </div>
 <th class="info_detailes">
                <strong> رقم النموذج  </strong>
            </th>
           
                    <td><?=$result->rkm?></td>
                          

                   
 <?php }?>

            <tr>
      <th class="info_detailes">
                <strong>   المرفق </strong>
            </th>
           
            <td>   <?php
     if(isset($result->attach_file)&&!empty($result->attach_file))
     {
        $ext = pathinfo($result->attach_file, PATHINFO_EXTENSION);
        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                            $folder ='uploads/human_resources/sysat_gam3ia';
                                    if (in_array($ext,$image)){
                                 if (!empty($result->attach_file)) {
                                    $url = base_url() .'uploads/human_resources/sysat_gam3ia' .'/'. $result->attach_file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                                <?php
                            }  elseif (in_array($ext,$file)){
                                 if (!empty($result->attach_file) &&($ext=='pdf'||$ext=='PDF')) {
                                   $url = base_url() .  'human_resources/sysat_gam3ia/Sysat_gam3ia_c/read_file/'. $result->attach_file;
                                   ?>
                                    <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                   <?php
                                }else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
<?php
 if(!empty($result->attach_file) &&($ext=='doc'||$ext=='docx')){?>
    <a href="<?= base_url().'human_resources/sysat_gam3ia/Sysat_gam3ia_c/download_file'.'/'.$result->id?>" >  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a>
<?php }
?>
                                <?php
                            }}
                         
                        ?></td>
  <th class="info_detailes">
        <strong>     النشر </strong>
    </th>
    <td>
                                <?php
$nsher = array('all'=> 'داخلي وخارجي'
, 'in_view' => 
'داخلي فقط'
,'out_view'=>
' خارجي فقط');
                                    if (!empty($result->nashr_fk)){
                                        echo $nsher[$result->nashr_fk];
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
</tr>


<tr>
<th class="info_detailes">
    <strong>    حالة العرض  </strong>
</th>

<td>
                                <?php
                                $halet = array('active' => 'نشط'
                                , 'unactive' => 
                                ' غير نشط');

                                    if (!empty($result->halet_3rd)){
                                        echo $halet[$result->halet_3rd];
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
  
                                <?php  if(!empty($result->fe2a_fk)&& $result->fe2a_fk=='namozg'){?>

                   

                    <th class="info_detailes">
                <strong> رمز النموذج  </strong>
            </th>
           
                    <td><?=$result->ramz?> </td>
                   
 <?php }else if(!empty($result->fe2a_fk)&& $result->fe2a_fk=='egraa'){?>

 <th class="info_detailes">
                <strong> تاريخ الاصدار </strong>
            </th>
           
                    <td><?=$result->d_date_ar?> </td>
                    <?php }?>
                          </tr>
           
        </tbody>
    </table>
</div>