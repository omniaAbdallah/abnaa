

<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
            <div class="col-sm-12  wow" >
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
    
    
    <?php   if(isset($all_sheck)&&$all_sheck!=null):?>
<table class=" col-sm-12  table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم الشيك</th>
                    <th style="text-align: right;" width="">إسم البنك</th> 
                    <th style="text-align: right;" width="">الإجراء </th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
         <?php $x=1; foreach($all_sheck as $row):?>   
         <tr>
         <td><?php echo $x++?></td>
         <td><?php echo $row->sheek_num;?></td>
         <td><?php echo $account_group[$row->maden]->name?></td>
         <td>
            
        <a href="<?php echo base_url().'admin/finance_accounting/deports_sheek/'.$row->vouch_num?>">
      <input class="btn btn-sm  btn-success" type="submit" value="ترحيل السند">
     </a>
        
         </td>
         <td>
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">
                   <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         
         </td>
         </tr>   
         
           <?php endforeach;?>
            </tbody></table>

<div id="optionearea3"></div>
   <?php else :?>
 <div class="alert alert-danger" >
     لا توجد شيكات للترحيل
          </div>
<?php endif ;?>         

<!-----------------  التفاصيل ---------------------------------------------------->
<?php include($details_page.'.php');?>
  
