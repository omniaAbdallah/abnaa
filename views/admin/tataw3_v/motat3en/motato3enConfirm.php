<style>
.latest_notification .nav-tabs>li>a {
    margin-left: 10px;
}
.latest_notification .badge {
    position: absolute;
    top: 3px;
    left: -7px;
}
.latest_notification .btn-group>.btn {

    height: 22px;
    line-height: 10px;
}
.active .badge {
    color: #ffffff !important;
}
.panel-footer{
    display: inline-block;
    width: 100%;
}
.detailswork span.label{

    width: 100px;

}
.detailswork a{
    font-size: 16px;
}
.detailswork p{
     font-size: 16px;  
}
.work-touchpoint-date .month {
      font-size: 10px;
    background-color: #fcb632;
    }
.panel-body {
    border: 1px solid #eee;
}
</style>


<div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>طلبات التطوع</h4>
                </div>
            </div>
            <div class="panel-body">



    
    



<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">
    <div class="latest_notification">
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> تنبيهات جديدة</a></li>
        <li role="presentation"><a href="#dash_tab2" aria-controls="dash_tab2" role="tab" data-toggle="tab"><i class="fa fa-thumb-tack"></i>  طلبات موافق عليها </a></li>
        <li role="presentation"><a href="#dash_tab3" aria-controls="dash_tab3" role="tab" data-toggle="tab"><i class="fa fa-retweet"></i>   طلبات  مرفوضة </a></li>
       
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dash_tab1">
        
          <div class="col-xs-12 no-padding">
		  <?php if(isset($newVolunteers) && $newVolunteers != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr class="info">
											<th>م</th>
											<th>الفئه</th>
							                <th>الإسم</th>
							                <th>الهاتف</th>
							                <th>المدينه</th>
											<th>الحي</th>
							                <th>البريد الإلكتروني</th>
							                <!-- <th>التفاصيل</th> -->
							                <th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($newVolunteers as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?php if (isset($value->f2a_talab)&&($value->f2a_talab==1)){echo 'فرد';}elseif ($value->f2a_talab==2){echo 'جهه';}?></td>
							                <td><?=$value->name?></td>
							                <td><?=$value->mobile?></td>
							                <td><?=$value->city_name?></td>
											<td><?=$value->hai_name?></td>
							                <td><?=$value->email?></td>
											<!-- <td>
											<a href="#modal_details"  data-toggle="modal"  onclick="get_details(<?php echo $value->id;?>)"> <i class="btn fa fa-list"></i></a>
											</td> -->
											
											<td>
                                <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
               
                    
                                              <li> <a href="#" onclick='swal({
                                    title: "هل انت متأكد من التعديل ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-warning",
                                    confirmButtonText: "تعديل",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    window.location="<?php echo base_url(); ?>tataw3/Tataw3_c/edit_volunteer/<?php echo $value->id; ?>";
                                    });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a></li>
                               <li> <a href="#" onclick='swal({
                                    title: "هل انت متأكد من الحذف ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "حذف",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    swal("تم الحذف!", "", "success");
                                    window.location="<?php echo base_url(); ?>tataw3/Tataw3_c/delete/<?php echo $value->id; ?>";
                                    });'>
                                    <i class="fa fa-trash"> </i>حذف</a></i>
                                    <li>
                                    <a    aria-hidden="true"
                                               data-toggle="modal" 
                                               data-target="#myModal_reason_end<?=$value->id?>"><i class="fa fa-archive"> </i> اعتماد المتطوع</a></li>

											   <li> <a href="#modal_details"  data-toggle="modal"  onclick="get_details(<?php echo $value->id;?>)"> <i class=" fa fa-list"></i>تفاصيل</a></li>



                                               <li> <a href="<?php echo base_url(); ?>tataw3/Tataw3_c/add_morfqat/<?php echo $value->id; ?>"   > <i class=" fa fa-upload"></i>اضافه مرفقات</a></li>
											   
                                             
                  </ul>
                </div> 
			
                
                            </td>
										</tr>
										<!--  -->
										<div class="modal fade" id="myModal_reason_end<?= $value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اعتماد المتطوع </h4>
            </div>
            <div class="modal-body" style="
    height: 171px;
">
            <div class="form-group col-sm-12">    
			
		<?php	echo form_open_multipart('tataw3/Tataw3_c/add_confirm'); ?>
			<div class="form-group col-md-4 col-sm-6 padding-4" >
				<label class="label"> الاجراء</label>
				<div class="form-group">
					<div class="radio-content">
						<input type="radio" id="esnad1<?= $value->id?>" onchange=" get_reason_end(<?=$value->id?>);" name="esnad_to"   class="f2a_types" value="1"  >
						<label for="esnad1<?= $value->id?>" class="radio-label"> موافقه</label>
					</div>
					<div class="radio-content">
						<input type="radio"  id="esnad2<?= $value->id?>" name="esnad_to" onchange=" get_reason_end(<?=$value->id?>);"  class="f2a_types" value="2" >
						<label for="esnad2<?= $value->id?>" class="radio-label"> رفض</label>
					</div>
				</div>
				</div>
               <div class="form-group col-md-4 col-sm-6 padding-4" 
                     >
                    <label class="label  "> سبب اعتماد  </label>
                    <!-- <input type="text" name="reason_name" id="reason_name<?=$value->id?>" value=""
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:80%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); get_reason_end(<?=$value->id?>);"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly> -->

                <select name="reason_name"  id="reason_name<?=$value->id?>" class="form-control "  onchange = "($('#reason_id_fk<?=$value->id?>').val($('option:selected',this).text()))"
                            >
                       
                        
                        
                    </select>
                    <input type="hidden" name="reason_id_fk" id="reason_id_fk<?=$value->id?>" value="">  
                          
                    <!-- <button type="button" data-toggle="modal" data-target="#myModal_end<?=$value->id?>" 
                    onclick="get_reason_end(<?=$value->id?>);"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button> -->
                </div>
               
                </div>
            </div>
            <div class="modal-footer">
			<input type="hidden" name="id" id="id<?=$value->id?>" value="<?=$value->id?>">
			
				<button type="button" onclick=" add_reason(<?=$value->id?>) " name="add" value="add" class="btn btn-success">حفظ</button>

				      <!-- 	<button type="submit" name="refuse" value="3" class="btn btn-danger">مرفوض</button> -->
						  <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <!-- <button type="button"
                                class="btn btn-labeled btn-success "  onclick="add_reason(<?= $value->id?>)"
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button> -->
            </div>
		
        </div>
    </div>
</div>
		
		
		<!--  -->
<div class="modal fade" id="myModal_end<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title">  اسباب الاعتماد :
                </h4>
            </div>
            <div class="modal-body">
           
             
             </div>
       </div>
   </div>
</div>
</div>								<!--  -->
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات واردة</div>
								<?php } ?>
          </div>
        
        
        </div>
        <div role="tabpanel" class="tab-pane" id="dash_tab2">
        
          <div class="col-xs-12 no-padding">
		  <?php if(isset($acceptedVolunteers) && $acceptedVolunteers != null){ ?>
		            			<table id="" class=" example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
							                <th>الإسم</th>
							                <th>الهاتف</th>
											<th>المدينه</th>
											<th>الحي</th>
							                <th>البريد الإلكتروني</th>
							                <th>التفاصيل</th>
							                <th>القائم بالموافقه</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($acceptedVolunteers as $value) { 
										?>
										<tr >
											<td><?=($x++)?></td>
							                <td><?=$value->name?></td>
							                <td><?=$value->mobile?></td>
                                            <td><?=$value->city_name?></td>
											<td><?=$value->hai_name?></td>
							                <td><?=$value->email?></td>
											<td>
											<a href="#modal_details"  data-toggle="modal"  onclick="get_details(<?php echo $value->id;?>)"> <i class="btn fa fa-list"></i></a>
											</td>
											<td>
												<?=$value->suspend_publisher_name?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات موافق عليها</div>
								<?php } ?>
        
         </div>
        
        </div>
        <div role="tabpanel" class="tab-pane" id="dash_tab3">
            <div class="col-xs-12 no-padding">
			<?php if(isset($refusedVolunteers) && $refusedVolunteers != null){ ?>
		            			<table id="exampleee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
							                <th>الإسم</th>
							                <th>الهاتف</th>
											<th>المدينه</th>
											<th>الحي</th>
							                <th>البريد الإلكتروني</th>
							                <th>التفاصيل</th>
											<th>القائم بالرفض</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($refusedVolunteers as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
							                <td><?=$value->name?></td>
							                <td><?=$value->mobile?></td>
							                <td><?=$value->city_name?></td>
											<td><?=$value->hai_name?></td>
							                <td><?=$value->email?></td>
											<td>
											<a href="#modal_details"  data-toggle="modal"  onclick="get_details(<?php echo $value->id;?>)"> <i class="btn fa fa-list"></i></a>
											</td>
											<td>
												<?=$value->suspend_publisher_name?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات مرفوضة</div>
								<?php } ?>
        
         </div>
        </div>
        
    
    </div>
</div>


            

</div>
</div>

</div>







<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل </h4>
            </div>
            <div class="modal-body" id="details"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
               

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function get_reason_end(id) {
		// $('#pop_rkm').text(rkm);
		var type = $('input[name=esnad_to]:checked').val();
        $.ajax({
			type: 'post',
			data:{type:type,id:id},
            url: "<?php echo base_url();?>tataw3/Tataw3_c/load_reason",
            beforeSend: function () {
                $('#reason_name'+id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#reason_name'+id).html(d);
            }
        });
    }
</script>
<script>
    function getTitle_reason(id,tat_id,value) {
        $('#reason_id_fk'+tat_id).val(id);
        $('#reason_name'+tat_id).val(value);
        $('#myModal_end'+tat_id).modal('hide');
    }
</script>

<script>
    function get_details(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>tataw3/Tataw3_c/get_details",
			data:{rkm:valu},
			beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success:function(d){


$('#details').html(d);


            }

        });
    }
</script>
<script>
$('#exampleee').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        'copy',
        'csv',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },

        {
            extend: 'print',
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],
    colReorder: true
} );



</script>


<script>
  function add_reason(id) {
       var id=id;
    var reason_id_fk=$('#reason_name'+id).val();
    var reason_name=$('#reason_id_fk'+id).val();
    var esnad_to=$('input[name=esnad_to]:checked').val();
      if (reason_id_fk != 0 && reason_id_fk != '' && reason_name != 0 && reason_name != '') {
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>tataw3/Tataw3_c/add_confirm',
              data: {id:id,reason_id_fk:reason_id_fk,reason_name:reason_name,esnad_to:esnad_to},
              dataType: 'html',
              cache: false,
              success: function (html) {
                $('#myModal_reason_end'+id).modal('hide');
                  swal({
                      title: "تم انهاء المعامله بنجاح!",
      }
      );
     window.location.reload();

              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",
      }
      );
      }
  }
</script>