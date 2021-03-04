<div class="col-xs-12 no-padding" >

<div class="col-sm-8 form-group">
<table class="table table-bordered ">

    <tbody>

    <tr>

    
    <td class="info">تاريخ الاتصال</td>

<td class="infotd text-center"><?= $crm_data['contact_date'] ?></td>



</tr>

<tr>     <td class="info">
وسيلة الاتصال</th>

        <td class="infotd text-center"> <?php foreach ($method_etsal as $row){
         
            if(isset($crm_data)){
             
                if($crm_data['wasela_etsal']== $row->conf_id ){ echo $row->title;}
             
               
            }}?>
          
         </td>
        </tr>
        <tr>
        <td class="info">نتيجة المكالمة</th>

       

        <td class="infotd text-center"> <?php foreach ($natega_etsal as $row){
         
         if(isset($crm_data)){
          
             if($crm_data['contact_result']== $row->conf_id ){ echo $row->title;}
          
            
         }}?>
       
      </td>

    </tr>

    
    <tr>

     

        <th class="info">رقم هوية الام</th>

        <td class="infotd text-center"><?php echo $crm_data['mother_national_num'] ?></td>
        </tr>
        <tr>
        <td class="info">رقم الطلب/الملف</td>
        <td class="infotd text-center"><?= $crm_data['file_num'] ?></td>

    </tr>

    <tr>

<td class="info">تفاصيل</td>

<td class="infotd text-center"><?= $crm_data['details'] ?></td>


</tr>
    

    </tbody>



</table>


</div> 


<!--  -->


                    <div class="col-md-4 form-group" id="Details">
                <?php if (isset($load_details) && (!empty($load_details))) {
//                    $data['file_num_data']=$file_num_data;
                    $this->load->view($load_details);
                }
               ?>
                </div> 
<!--  -->

                    </div> 

                   