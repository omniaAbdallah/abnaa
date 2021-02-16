


<div class="col-md-12 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> رسالة جديدة </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
                    <div class="col-sm-12 padding-4">
                       <div class="form-group col-sm-4 no-padding">
                         <label class="label">الاسم</label>
                        
                         <input type="text" class="form-control"
                         placeholder=" حدد المرسل اليه" type="text" style="width: 91%;float: right;"
                                   name="name" id="name"  
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "

                                 

                                   value="<?=$result->name?>">
                        
                
                        
                        
                       </div>
                       

                       
                       <div class="form-group col-sm-4 padding-4">
                         <label class="label">الهاتف</label>
                         <input  class="form-control"
                          type="text"    readonly="readonly"
                                   name="person_mob" id="person_mob"  
                                  
                                

                                 

                                   value="<?=$result->jwal?>">
                       
                          
                        
                         
                       </div>
                       <div class="form-group col-sm-12 padding-4">
                         <label class="label">نص الرساله</label>
                       <input style="width: 100%; " class="form-control"  name="message_whats" id="message_whats" /> 
                       </div>
                       
                       
                      
                       
                    </div>
                    
                    
                   
                    
                            <div class="col-xs-2">
                              
                                <button type="button" formtarget="_blank" style="float: right;" onclick="send_sms_whats();"  class="btn btn-success" ><li class="fa fa-envelope-o"> ارسال</li></button>
                           
                            </div>
                </div>
             </div>   
         
     </div>
</div>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>



<script>
function send_sms_whats()
{
    
        
        
         var emp_name=$('#name').val();
        // var f2a=$('#f2a').val();
         var person_mob=$('#person_mob').val();
         var another_message=$('#message_whats').val();
       
     if((another_message !='') )
     {   
        

       

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/whats_app_mesg/Whats_mesg/send_sms_whats",
            data: {emp_name:emp_name,another_message:another_message,person_mob:person_mob},
            success: function (d) {
                

               var obj=JSON.parse(d);
               
              //location.href="https://web.whatsapp.com/send?phone=obj.person_mob&text=+obj.person_mob&source&data";
              var link="https://web.whatsapp.com/send?phone=+966"+obj.person_mob+"&text="+obj.msg+"&source&data";
             
              
             if (window.showModalDialog)
   window.showModalDialog(link,"popup","dialogWidth:600px;dialogHeight:600px");
else
   window.open(link,"name","height=600,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes");
               
//$('#send_data_whats').modal('hide');
// $('#name').val('');
// $('#f2a').val('');
// $('#person_mob').val('');
 $('#message_whats').val('');
// $('#emp_id').val('');
// $('#type').val('');

 
            }

        });
    }else
    {
        swal({
    title: " برجاء ادخال البيانات! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
    }

}


</script>

