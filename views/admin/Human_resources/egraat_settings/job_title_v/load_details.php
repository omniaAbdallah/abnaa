<div class="col-xs-12 padding-4">

    <input type="hidden" id="sader_id" value="<?= $get_all->id ?>">

    <table class="table " style="table-layout: fixed">

        <tbody>

        <tr>

            <td style="width: 105px;">

                <strong>  رقم المسمي الوظيفي  </strong>

            </td>

            <td style="width: 10px;"><strong>:</strong></td>

            <td><?= $get_all->id ?></td>

        <td style="width: 105px;">

                <strong>     المسمي الوظيفي </strong>

            </td>

            <td style="width: 10px;"><strong>:</strong></td>

            <td><?php if (!empty($get_all->title)) {

                    echo  $get_all->title;

                } else{

                    echo 'غير محدد' ;

                }

                ?></td>

<td style="width: 105px;">

        <strong>     كود المسمي الوظيفي </strong>

    </td>

    <td style="width: 10px;"><strong>:</strong></td>

    <td><?php if (!empty($get_all->code)) {

            echo  $get_all->code;

        } else{

            echo 'غير محدد' ;

        }

        ?></td>

</tr>

<tr>

<td style="width: 105px;">

    <strong>    الادارة  </strong>

</td>

<td style="width: 10px;"><strong>:</strong></td>

<td><?php 
                        
                        foreach ($mainDepartments as $value){

$select=''; if(!empty($get_all->edara)){ if($get_all->edara == $value->id){
    
   echo $value->title;} }}

?></td>

<td style="width: 105px;">

    <strong>      القسم </strong>

</td>

<td style="width: 10px;"><strong>:</strong></td>

<td><?php
                if(isset($sub_department)&&!empty($sub_department))
                {
                   
                foreach ($sub_department as $key) {
                    $select = '';
                    if($get_all->qsm != '') {
                        if ($key->id == $get_all->qsm) {
                            echo $key->title;
                        }} }}?></td>

<td style="width: 105px;">

<strong>     
المرجع المباشر </strong>

</td>

<td style="width: 10px;"><strong>:</strong></td>

<td> <?php
                foreach ($mosma_wazefy as $key) {
                    $select = '';
                    if($get_all->marg3_mobasher != '') {
                        if ($key->id == $get_all->marg3_mobasher) {
                            echo $key->title;
                        }} }?>
                  
                    </td>

</tr>

        </tbody>

    </table>

</div>