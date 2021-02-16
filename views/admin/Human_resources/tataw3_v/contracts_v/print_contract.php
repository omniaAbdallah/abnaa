<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<body onload="printDiv('printDiv')" id="printDiv">
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
        <h3 class="panel-title">  نموذج اتفاقية تطوع</h3> 
        </div>
        <div class="panel-body">
        
        <div class="col-sm-12 no-padding" >
            <!-- Nav tabs -->
           
            <!-- Tab panels -->
            <div >
                


                <div >
              

                <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr class="info">
                                            <th colspan="12" class="text-center"> نموذج اتفاقية تطوع</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                          <tr>
                                            <th colspan="3" class="info"> الفرصة التطوعية:</th>
                                            <td colspan="3" width="15%">
                                          
                                                           <?php
                                            
                                            if(isset($foras)&&!empty($foras))
                                            {
                                                echo $foras->forsa_name;
                                            }
                                            
                                            ?>
                                            </td>
                                            <th colspan="3" class="info"> طبيعية الفرصة التطوعية:</th>
                                            <th colspan="3" width="20%">
                                            
                                                          
                                            <?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['tabe3a_forsa'];
                                            }
                                            
                                            ?>
                                            </th>
											

                                        </tr>
										<tr>
                                            <th colspan="2" class="info"> المهمه الاساسية:</th>
                                            <td colspan="2" width="15%">
                                            
											<?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['mohma'];
                                            }
                                            
                                            ?>
                                            </td>
                                            <th colspan="2" class="info"> المكان:</th>
                                            <th colspan="2" width="20%">
                                            
                                                          
                                            <?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['mkan'];
                                            }
                                            
                                            ?>
                                            </th>
											<th colspan="2" class="info"> المدينة:</th>
                                            <th colspan="2" width="20%">
                                            
                                                          
                                            <?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['madina'];
                                            }
                                            
                                            ?>
                                            </th>

                                        </tr>
										<tr>
                                            <th colspan="3" class="info"> الجوال:</th>
                                            <td colspan="3" width="15%">
                                          
											<?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['jwal'];
                                            }
                                            
                                            ?>
                                            </td>
                                            <th colspan="3" class="info"> البريد الإلكتروني:</th>
                                            <th colspan="3" width="20%">
                                            
                                                          
                                            <?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['email'];
                                            }
                                            
                                            ?>
                                            </th>

                                        </tr>

                                        </table>
                                </div>
                </div>

				<!-- yaraaa -->
				<div class="col-md-12">

<h4>
السيد/ة ........<?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['motatw3_name'];}?>............ ورقم الهوية/...........<?php if(isset($volunteer)&&!empty($volunteer))
                                            {echo $volunteer['card_num'];}?>..........
</h4>

<p> يسر الجمعية الخيرية لرعاية الايتام -ابناء- أن ترحب بكم كأحد المتطوعين بقسم "<b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['qsm_n'];}?> "</b>
	  	 وحيث أن لديكم الرغبة في التطوع في الفرصة الموضحة اعلاة فقد تم تحديد مدير التطوع الاستاذ	<b>"<?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['moder_tatw3_n'];}?> "</b>
        للحصول علي دعمكم الاداري المباشر للحصول علي الدعم اللازم كمتطوع/ة	
		
		نرجو ألا تترددو في التواصل معه بخصوصاي استفسارات حول حالة مهامكم التطوعية
	<br>
		كما تم تحديد الاستاذ "<b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['moder_mobashr_n'];}?> "</b>" مدير اداره 
		"<b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['moder_mobashr_edara_n'];}?> "</b>"
		ليكون رئيسكم المباشر والمرجع الفني لفرصتكم التطوعية
		</p>	

		<p><b>
الفتره الزمنيه:
</b></p>

		<p>
		كما تم الاتفاق معكم لمده 
		<b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['moda'];}?></b>
		  يوم/شهر/سنه
	  بواقع <b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['num_hours'];}?></b>
	  . ساعة في اليوم/الاسبوع
	  <br>
	  بدا من يوم <b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['from_date'];}?></b>
	  وحتي يوم
	  <b><?php if(isset($volunteer)&&!empty($volunteer)){echo $volunteer['to_date'];}?></b>

		</p>
		<p>
		نرجو اذا لم تتمكنو من الحضور في المواعيد المتفق عليها أو لديكم ظروف معينه وكنتم ترغبون في تغيير هذه المواعيد التنسيق مع مرجعكم الاداري المباشر .

		</p>

				</div>
				<!-- yaraa -->


                                <div class="col-md-12">
                                    <table class=" table table-bordered">
                                    
                                        <thead>

                                        <tr >
                                            <th class="info">ماتتوقعه الجمعية منكم:</th>
                                            
                                        
                                   

                                      
                    
                
                                      

									
										<td>
										<ul>
										<li>التطوع في الاوقات المتفق عليها وإعلامها لأي طارئ يطرأ عليكم وترغبون في تعديل هذه الاوقات</li>
										
										<li>الالتزام بأهداف وسياستها الموضحة في دليل السياسات والأجراءات والذي سيتم تعريفكم عليه</li>
									
										<li>تحقيق المستهدفات المتفق عليها من الفرصة التطوعية وهي:</li>
										</ul>
										


										<?php  if (isset($plan1) && !empty($plan1)) {
                                            $x = 0;
                                           
                                            foreach ($plan1 as $row) {      
                                        ?>

                                        <!-- yara -->
                                        
                                                   
										<ul>        
										 <?php echo $x + 1; ?>-<?php echo $row->title; ?>
										</ul> 
										<?php $x++; }}?>
										</td>
                                                   
                                            
                                               
                                        <!-- yara -->
                                       
										 </tr>
									
										 </thead>
										 <tbody>
                                       

                                        </tbody>


                                    </table>

                                </div>
                               

								<div class="col-md-12">
                                    <table class=" table table-bordered" style="table-layout: fixed">
                                    
                                        <thead>

                                        <tr >
                                            <th class="info"> ما يمكن ان تتوقعه الجمعية :</th>

											<?php  if (isset($plan2) && !empty($plan2)) {
                                            $x = 0;
                                           
                                            foreach ($plan2 as $row) {      
                                        ?>

                                        <!-- yara -->
                                        
                                                   
                                                         
                                                    <td><?php echo $x + 1; ?>-<?php echo $row->title; ?></td>
                                                   
                                            
                                                
                                        <!-- yara -->
                                       <?php $x++; }}?>
                                            
                                        </tr>
                                        </thead>

                                      
                    
                
                                        <tbody>
                          
                                        

                                        </tbody>


                                    </table>

                                </div>
               


<!--  -->


                
                

             
                <!--  -->


                                        <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
									<tr>
                                            <th class="info">   المتطوع/ة:</th>
                                            <td width="15%"></td>
                                            <th class="info">  التوقيع:</th>
                                            <th width="20%"></th>

                                        </tr>
                                        <tr>
                                            <th class="info">  مدير التطوع:</th>
                                            <td width="15%"></td>
                                            <th class="info">  التوقيع:</th>
                                            <th width="20%"></th>

                                        </tr>
                                        

                                        </table>
                                </div>
                </div> 
                <!--  -->





              
                </body>







                </div>


                

            </div>
            </div>
            <!--  -->
          
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>








<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 