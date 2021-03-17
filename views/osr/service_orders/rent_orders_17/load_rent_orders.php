<style type="text/css">

</style>

<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
     
        <div class="panel-body" style="min-height: 485px;">
           <div class="vertical-tabs">
			<ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
				<li class="nav-item active">
					<a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> بيانات العقد</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i class="fa fa-2x fa-keyboard-o "></i> بيانات المؤجر</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i class="fa fa-2x fa-keyboard-o "></i> بيانات المستأجر</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i class="fa fa-2x fa-keyboard-o "></i> بيانات المنشأة العقارية</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i class="fa fa-2x fa-keyboard-o "></i>  بيانات صكوك التملك</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag6" role="tab" aria-controls="pag6"><i class="fa fa-2x fa-keyboard-o "></i> بيانات العقار</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag7" role="tab" aria-controls="pag7"><i class="fa fa-2x fa-keyboard-o "></i> بيانات الوحدات الإيجارية</a>
				</li>
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag8" role="tab" aria-controls="pag8"><i class="fa fa-2x fa-keyboard-o "></i> التأجير من الباطن</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag9" role="tab" aria-controls="pag9"><i class="fa fa-2x fa-keyboard-o "></i> البيانات الماليه</a>
				</li>

			</ul>


			<div class="tab-content tab-content-vertical">
				<div class="tab-pane active" id="pag1" role="tabpanel">
				  
                   
						   <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px">رقم الطلب  </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
										  <?php if (isset($record)) {
                                   echo $record['talb_rkm'];
                               } else {
                                   echo $last_rkm;
                               } ?>
									 </span>
									   </td>
									   <th>رقم سجل العقد الأساس</th>
										<td><?php if (isset($record)) {
                                   echo $record['sgl_rkm_asas'];
                               }  ?> </td>
									</tr>
									
									<tr>
										<th> رقم سجل العقد  </th>
										<td><?php if (isset($record)) {
                                   echo $record['sgl_rkm'];
                               }  ?></td>
										<th>نوع العقد</th>
													<td>
                                                    <?php 
										$arr_yes_no = array('', 'جديد ', 'مجدد');
										for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
											$selected = '';
											if ($r == $record['no3_3akd']) {
												 echo $arr_yes_no[$r]; 
											}
											?>
										 
										<?php } ?>
										</td>
										 
									</tr>
									<tr>
										<th> تاريخ إبرام العقد  </th>
										<td><?php if (isset($record)) {
                                   echo $record['aakd_date'];
                               }  ?></td>
										<th> مكان إبرام العقد</th>
										<td> <span class="label" style="background-color: #32e26b"><?php if (isset($record)) {
                                   echo $record['aakd_place'];
                               }  ?></span></td>
							   
									</tr>
									<tr>
										<th> تاريخ بداية مدة الايجار </th>
										<td><?php if (isset($record)) {
                                   echo $record['start_rent_date'];
                               }  ?></td>
										<th> تاريخ نهايه مدة الايجار  </th>
										<td> <?php if (isset($record)) {
                                   echo $record['end_rent_date'];
                               }  ?></td>
								   
									</tr>
									</tbody>
								</table>
						</div>
	  

			</div>
				<div class="tab-pane" id="pag2" role="tabpanel">
                <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px">الاسم   </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
										<?php if(isset($record)) echo $record['mo2ger_name'] ?>
									 </span>
									   </td>
									   <th>الجنسية</th>
										<td>  <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['mo2ger_gensia'] == $value->id_setting) {
                                      echo $value->title_setting;
                                    }
                                    ?>
                                  
                                    <?
                                }
                            }
                            ?> </td>
									</tr>
									
									<tr>
										<th>نوع هوية </th>
										<td><?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
				
					if(isset($record) && $record['mo2ger_national_num_type'] == $value->id_setting) {
						echo $value->title_setting;
					}
			?>
		
			<?
				}
			}
			?></td>
										<th>رقم الهوية</th>
													<td><?php if(isset($record)) echo $record['mo2ger_national_num'] ?>
										</td>
										 
									</tr>
									<tr>
										<th> نسخه هوية    </th>
										<td><?php if(isset($record)) echo $record['mo2ger_national_ns5a'] ?></td>
										<th> رقم الجوال </th>
										<td> <span class="label" style="background-color: #32e26b"><<?php if(isset($record)) echo $record['mo2ger_phone'] ?></span></td>
							   
									</tr>
									<tr>
										<th> البريد الالكتروني</th>
										<td><?php if(isset($record)) echo $record['mo2ger_email'] ?></td>
										
								   
									</tr>
									</tbody>
								</table>
						</div>
				</div>
				<div class="tab-pane" id="pag3" role="tabpanel">
				
                <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px">الاسم   </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
                                          <?php if(isset($record)) echo $record['most2ger_name'] ?>
									 </span>
									   </td>
									   <th>الجنسية</th>
										<td>  <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['most2ger_gensia'] == $value->id_setting) {
                                      echo $value->title_setting;
                                    }
                                    ?>
                                  
                                    <?
                                }
                            }
                            ?> </td>
									</tr>
									
									<tr>
										<th>نوع هوية </th>
										<td><?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
				
					if(isset($record) && $record['most2ger_national_num_type'] == $value->id_setting) {
						echo $value->title_setting;
					}
			?>
		
			<?
				}
			}
			?></td>
										<th>رقم الهوية</th>
													<td><?php if(isset($record)) echo $record['most2ger_national_num'] ?>
										</td>
										 
									</tr>
									<tr>
										<th> نسخه هوية    </th>
										<td><?php if(isset($record)) echo $record['most2ger_national_ns5a'] ?></td>
										<th> رقم الجوال </th>
										<td> <span class="label" style="background-color: #32e26b"><<?php if(isset($record)) echo $record['most2ger_phone'] ?></span></td>
							   
									</tr>
									<tr>
										<th> البريد الالكتروني</th>
										<td><?php if(isset($record)) echo $record['most2ger_email'] ?></td>
										
								   
									</tr>
									</tbody>
								</table>
						</div>

				</div>
				<div class="tab-pane" id="pag4" role="tabpanel">
					
                <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px"> اسم المنشأة العقارية   </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
										<?php if(isset($record)) echo $record['mon42a_name'] ?>
									 </span>
									   </td>
									   <th> عنوان المنشأة العقارية</th>
										<td> <?php if(isset($record)) echo $record['mon42a_address'] ?> </td>
									</tr>
									
									<tr>
										<th> رقم السجل التجارى  </th>
										<td><?php if(isset($record)) echo $record['mon42a_sgl_num'] ?></td>
										<th>رقم  الهاتف</th>
													<td><?php if(isset($record)) echo $record['mon42a_phone'] ?>
										</td>
										 
									</tr>
									<tr>
										<th>رقم الفاكس    </th>
										<td><?php if(isset($record)) echo $record['mon42a_fax'] ?></td>
										<th> اسم  الوسيط</th>
										<td> <span class="label" style="background-color: #32e26b"><<?php if(isset($record)) echo $record['waseet_name'] ?></span></td>
							   
									</tr>
									<tr>
												   </td>
									   <th>الجنسية</th>
										<td>  <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['waseet_gensia'] == $value->id_setting) {
                                      echo $value->title_setting;
                                    }
                                    ?>
                                  
                                    <?
                                }
                            }
                            ?> </td>
                            <th>نوع هوية </th>
										<td><?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
				
					if(isset($record) && $record['waseet_national_num_type'] == $value->id_setting) {
						echo $value->title_setting;
					}
			?>
		
			<?
				}
			}
			?></td>
									</tr>
								
									<tr>
										
										<th>رقم الهوية</th>
													<td><?php if(isset($record)) echo $record['waseet_national_num'] ?>
										</td>
                                        <th> نسخه هوية    </th>
										<td><?php if(isset($record)) echo $record['waseet_national_ns5a'] ?></td>
									
										 
									</tr>
									<tr>
											<th> رقم الجوال </th>
										<td> <span class="label" style="background-color: #32e26b"><<?php if(isset($record)) echo $record['waseet_phone'] ?></span></td>
                                        <th> البريد الالكتروني</th>
										<td><?php if(isset($record)) echo $record['waseet_email'] ?></td>
										
									</tr>
									
									</tbody>
								</table>
						</div>
				</div>

				<div class="tab-pane" id="pag5" role="tabpanel">
                          <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px">  رقم الصك   </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
										<?php if(isset($record)) echo $record['sak_rkm'] ?>
									    </span>
									   </td>
									   <th> جهه الاصدار</th>
										<td> <?php if(isset($record)) echo $record['esdar_sak'] ?> </td>
									</tr>
									
									<tr>
										<th>  تاريخ   الإصدار  </th>
										<td><?php if(isset($record)) echo $record['esdar_sak_date'] ?></td>
										<th>  مكان الإصدار </th>
													<td><?php if(isset($record)) echo $record['esdar_sak_place'] ?>
										</td>
										 
									</tr>
									
									
									
									</tbody>
								</table>
						</div>
				</div>
			
                
                <div class="tab-pane" id="pag6" role="tabpanel">
                <!--  -->
                <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px"> العنوان الوطني  </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
										<?php if(isset($record)) echo $record['aakar_address'] ?>
									 </span>
									   </td>
									   <th> نوع بناء العقار </th>
										<td> <?php
                                if(isset($type_house) && $type_house != null) {
                                    foreach ($type_house as $value) {
                                       
                                        if(isset($record) && $record['aakar_bnaa_type'] == $value->id) {
                                            
                                            echo $value->title;
                                        }
                                ?>
                             
                                <?
                                    }
                                }
                                ?></td>
									</tr>
									
									<tr>
										<th>  نوع إستخدام العقار   </th>
										<td><?php
                                if(isset($type_use_house) && $type_use_house != null) {
                                    foreach ($type_use_house as $value) {
                                    
                                        if(isset($record) && $record['aakar_use_type'] == $value->id) {
                                         
                                            echo $value->title;
                                        }
                                ?>
                       
                                <?
                                    }
                                }
                                ?></td>
										<th>عدد الأدوار</th>
													<td><?php if(isset($record)) echo $record['num_adoar'] ?>
										</td>
										 
									</tr>
									<tr>
										<th>عدد الوحدات    </th>
										<td><?php if(isset($record)) echo $record['num_whda'] ?></td>
										<th> عدد المصاعد</th>
										<td> <span class="label" style="background-color: #32e26b"><?php if(isset($record)) echo $record['num_msad'] ?></span></td>
							   
									</tr>
									<tr>
												   </td>
									   <th> عدد المواقف  </th>
										<td>  <?php if(isset($record)) echo $record['num_mo2f'] ?>
                                  
                                   </td>
                            
									</tr>
								
									
									
									</tbody>
								</table>
						</div>
					<!-- j -->
				</div>
                
                <div class="tab-pane" id="pag7" role="tabpanel">
					<!-- h -->
                    <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th style="width: 110px"> نوع  الوحده   </th>
										<td>
										  <span class="label" style="background-color: #32e26b"> 
                                          <?php
                                if(isset($type_whda) && $type_whda != null) {
                                    foreach ($type_whda as $value) {
                                      
                                        if(isset($record) && $record['no3_whda'] == $value->id) {
                                           
                                            echo $value->title;
                                        }
                                ?>
                              
                                <?
                                    }
                                }
                                ?>
									 </span>
									   </td>
									   <th> رقم الوحده  </th>
										<td><?php if(isset($record)) echo $record['rkm_whda'] ?> </td>
									</tr>
									
									<tr>
										<th>  مؤثثة </th>
										<td><?php if(isset($record)) echo $record['moses_name'] ?></td>
										<th>رقم الدور </th>
													<td><?php if(isset($record)) echo $record['rkm_door'] ?>
										</td>
										 
									</tr>
									<tr>
										<th>حالة التأثيث      </th>
										<td><?php
                                if(isset($hala_t2ses) && $hala_t2ses != null) {
                                    foreach ($hala_t2ses as $value) {
                                      
                                        if(isset($record) && $record['moses_status'] == $value->id) {
                                         echo   $value->title;
                                        }
                                ?>
                              
                                <?
                                    }
                                }
                                ?></td>
										<th> خزائن مطبخ  مركبة</th>
										<td> <span class="label" style="background-color: #32e26b"><?php if(isset($record)) echo $record['kitchen_parts'] ?></span></td>
							   
									</tr>
									<tr>
												  
									   <th> نوع الغرفة </th>
										<td>  <?php if(isset($record)) echo $record['room_type'] ?>

                                        <th>  العدد </th>
										<td>  <?php if(isset($record)) echo $record['room_num'] ?>
                                  
                                   </td>
                                   <tr>
												  
									   <th> نوع التكييف</th>
										<td>  <?php if(isset($record)) echo $record['takeef_type'] ?>

                                        <th>  العدد </th>
										<td>  <?php if(isset($record)) echo $record['takeef_num'] ?>
                                  
                                   </td>
                            
									</tr>

                                    <tr>
												  
									   <th> رقم عداد الكهرباء </th>
										<td>  <?php if(isset($record)) echo $record['electric_num'] ?>

                                        <th>  القراءة الحالية </th>
										<td>  <?php if(isset($record)) echo $record['electric_read'] ?>
                                  
                                   </td>
                                   </tr>

                                   <tr>
												  
									   <th> رقم عداد المياه</th>
										<td>  <?php if(isset($record)) echo $record['water_num'] ?>

                                        <th>  القراءة الحالية </th>
										<td>  <?php if(isset($record)) echo $record['water_read'] ?>
                                  
                                   </td>
                                   </tr>


                                   <tr>
												  
                                                  <th> رقم عداد الغاز</th>
                                                   <td>  <?php if(isset($record)) echo $record['gas_num'] ?>
           
                                                   <th>  القراءة الحالية </th>
                                                   <td>  <?php if(isset($record)) echo $record['gas_read'] ?>
                                             
                                              </td>
                                              </tr>
									
									
									</tbody>
								</table>
						</div>
                    <!--  -->
				</div>
                <div class="tab-pane" id="pag8" role="tabpanel">
                <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
									
									
									   <th>  التأجير من الباطن  </th>
										<td> <?php 
                            $arr = array('', 'يحق ', 'لا يحق');
                            for ($r = 1; $r < sizeof($arr); $r++) {
                              
                                if ($r == $record['rent_from_baten']) {
                                    echo $arr[$r]; 
                                }
                                ?>
                               
                            <?php } ?> </td>
									</tr>
									
									
									
									</tbody>
								</table>
						</div>
				</div>
                <div class="tab-pane" id="pag9" role="tabpanel">
						<!-- h -->
                        <div class="col-sm-12 col-xs-12">
								<table class="table  table-striped table-bordered dt-responsive nowrap">
									<tbody>
									<tr>
										<th > اجره السعي(لا يدخل ضمن القيمة الإجمالية لعقد الإيجار) </th>
										<td>
                                        <?php if(isset($record)) echo $record['sa3y_ogra'] ?>
									   </td>
									   <th> مبلغ الضمان(لا يدخل ضمن القيمة الإجمالية لعقد الإيجار)  </th>
										<td><?php if(isset($record)) echo $record['daman_value'] ?> </td>
									</tr>
									
									<tr>
										<th>  الأجرة  الشهرية للكهرباء </th>
										<td><?php if(isset($record)) echo $record['electric_month_value'] ?></td>
										<th> الأجرة  الشهرية للغاز</th>
													<td><?php if(isset($record)) echo $record['gas_month_value'] ?>
										</td>
										 
									</tr>
									<tr>
										<th>حالة التأثيث      </th>
										<td><?php
                                if(isset($hala_t2ses) && $hala_t2ses != null) {
                                    foreach ($hala_t2ses as $value) {
                                      
                                        if(isset($record) && $record['moses_status'] == $value->id) {
                                         echo   $value->title;
                                        }
                                ?>
                              
                                <?
                                    }
                                }
                                ?></td>
										<th>الأجرة  الشهرية للمياه</th>
										<td> <span class="label" style="background-color: #32e26b"><?php if(isset($record)) echo $record['water_month_value'] ?></span></td>
							   
									</tr>
									<tr>
												  
									   <th>  الأجرة  الشهرية للمواقف </th>
										<td>  <?php if(isset($record)) echo $record['mawkf_month_value'] ?>

                                        <th>  الأجرة  الشهرية للإيجار </th>
										<td>  <?php if(isset($record)) echo $record['rent_month_value'] ?>
                                  
                                   </td>
                                   <tr>
												  
									   <th> عدد المواقف المستأجرة</th>
										<td>  <?php if(isset($record)) echo $record['num_mawkf_rent'] ?>

                                        <th>  دفعه الإيجار  الدوريه </th>
										<td>  <?php if(isset($record)) echo $record['rent_dawrey'] ?>
                                  
                                   </td>
                            
									</tr>

                                    <tr>
												  
									   <th>   دوره سداد الإيجار </th>
										<td>  <?php if(isset($record)) echo $record['dawret_rent_sadad'] ?>

                                        <th>  دفعه الإيجار  الاخيرة  </th>
										<td>  <?php if(isset($record)) echo $record['last_rent_value'] ?>
                                  
                                   </td>
                                   </tr>

                                   <tr>
												  
									   <th> عدد دفعات الإيجار</th>
										<td>  <?php if(isset($record)) echo $record['num_rent_df2at'] ?>

                                        <th>  إجمالي قيمة العقد  </th>
										<td>  <?php if(isset($record)) echo $record['total_value_aked'] ?>
                                  
                                   </td>
                                   </tr>


									
									
									</tbody>
								</table>
						</div>
                    </div>


			</div>
		</div>
        
        
        </div>
    </div>
</div>