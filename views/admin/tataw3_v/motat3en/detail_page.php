<div class="col-xs-10 padding-4">
 

                            
      
<?php
	$dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
    $period = array('الصباح','المساء');
    $answer = array(1=>'نعم',2=>'لا');
	?>


<table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
        <td style="width: 105px;">
                <strong>اسم المتطوع : </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$volunteer['name']?></td>
            <td style="width: 105px;">
                <strong>رقم الهوية: </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$volunteer['id_card']?></td>
            
           
        </tr>
        <tr>
        <td  style="width: 80px;"><strong>فئه الطلب:</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
            <td><?php
            
                               
             if (isset($volunteer['f2a_talab'])&&($volunteer['f2a_talab']==1)){echo 'فرد';}elseif ($volunteer['f2a_talab']==2){echo 'جهه';}
                               
                            ?>
		</td>
        <td  style="width: 80px;"><strong> نوع التطوع:</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
       
            <td><?php
            
                               
             if (isset($volunteer['tato3_no3'])&&($volunteer['tato3_no3']==1)){echo 'بدون اجر';}elseif ($volunteer['tato3_no3']==2){echo 'بأجر';}
                               
                            ?>
		</td>

        </tr>
        <tr>
        <td  style="width: 10px;"><strong>الهاتف أو الجوال</strong></td>
            <td  style="width: 80px;"><strong>:</strong></td>
            <td  style="width: 80px;"><?=$volunteer['mobile']?></td>
            <td  style="width: 80px;"><strong>  البريد الإلكتروني </strong></td>
            <td  style="width: 80px;"><strong>:</strong></td>
            <td  style="width: 80px;"><?=$volunteer['email']?></td>
        
           
            
        </tr>
        <tr>
            
       
            
            <td style="width: 135px;"><strong>  المدينه</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$volunteer['city_name']?></td>
 <td style="width: 135px;"><strong>الحي</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$volunteer['hai_name']?></td>
        </tr>
       
        <tr>
       
        
                        




                         
						  
						  
						   <td  style="width:100px;"><strong>   الأيام</strong></td>
            <td  style="width: 10px;"><strong>:</strong></td>
            <td  style="width: 150px;">
                          <?php 
				    	$allDayes = array();
							$dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
				    	if(isset($volunteer)) {
				    		$allDayes = unserialize($volunteer['dayes']);
				    	}
				    	foreach ($dayes as $key => $value) { 
				    		   $type="hidden";
                            if(in_array($key,$allDayes)) {
                                   $type=" ";
						}
				    	?>
						
						 <label <?=$type?> class="form-check-label" for="gridcc<?=$key?>"><?=$value?></label>
				    
				    	<? } ?>
                          </td>



                          




       
		<td  style="width:100px;"><strong>   الفترات</strong></td>
            <td  style="width: 10px;"><strong>:</strong></td>
            <td  style="width: 150px;">
                          <?php 
				    	$allPeriods = array();
						    $period = array('الصباح','المساء','حفلات ولقاءات');
				    	if(isset($volunteer)) {
				    		$allPeriods = unserialize($volunteer['period']);
				    	}
				    	foreach ($period as $key => $value) { 
				    		   $type="hidden";
                            if(in_array($key,$allPeriods)) {
                               $type="";
                            }
				    	?>
				  
				    	
						 <label <?=$type?> class="form-check-label" for="gridcv<?=$key?>"><?=$value?></label>
				   
				    	<? } ?>
                          </td>
		
		
		 </tr>
       
        </tbody>
    </table>
   



</div>



</div>