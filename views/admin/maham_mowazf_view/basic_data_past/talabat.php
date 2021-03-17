 
<style>
    

.media{ padding: 30px 0}
.media .panel{
    border: none;
    border-radius: 5px;
    box-shadow: none;
    margin-bottom: 14px;
}
.media .panel-heading{
    padding: 0;
    border: none;
    border-radius: 5px 5px 0 0;
}
.media .panel-title a{
   display: -webkit-box;
    padding: 15px 10px;
    background: #fff;
    font-size: 17px;
    font-weight: normal;
    color: #000000;
    letter-spacing: 0px;
    border: 1px solid #2b5c25;
    border-radius: 5px 5px 0 0;
    position: relative;
}
.media .panel-title a i{
   
    font-size: 22px;
    color: #f28d1e;
    margin-left: 5px
   
}
.media .panel-title a.collapsed{
    border-color: #2b5c2569;
    border-radius: 5px;
}
.media .panel-title a:before,
.media .panel-title a.collapsed:before,
.media .panel-title a:after,
.media .panel-title a.collapsed:after{
    font-family: 'FontAwesome';
    content:"\f106";
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 5px;
    background: #81BC48;
    font-size: 20px;
    color: #fff;
    text-align: center;
    position: absolute;
    left: 15px;
    opacity: 1;
    transform: scale(1);
    transition: all 0.3s ease 0s;
}
.media .panel-title a:after,
.media .panel-title a.collapsed:after{
    font-family: 'FontAwesome';
    content: "\f107";
    background: transparent;
    color: #000;
    opacity: 0;
    transform: scale(0);margin-top: -25px;
}
.media .panel-title a.collapsed:before{
    opacity: 0;
    transform: scale(0);
}
.media .panel-title a.collapsed:after{
    opacity: 1;
    transform: scale(1);
}
.media .panel-body{
    /* padding: 10px 10px; */
    background: #e8e8e8;
    border-top: none;
    font-size: 15px;
    color: #fff;
    line-height: 28px;
    letter-spacing: 1px;
    border-radius: 0 0 5px 5px;
}
    
    
.btn-label1 {
    position: relative;
    right: -14px;
    display: inline-block;
    padding: 9px 17px;
    background: rgb(239, 168, 34);
    border-radius: 2px 0 0 2px;
    color: #f3f3f3;
    font-size: 17px;
}
    
 .btn-labeled {
    padding-top: 0;
    padding-bottom: 0;
    margin: 0px 9px;
}   
    
    
    
    
    
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 0px;
  margin-left: 0px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #f2f1f7;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
   
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
     content: '';
    position: absolute;
    right: 100%;
    top: 50%;
    margin-top: -13px;
    border-left: 0;
    border-bottom: 13px solid transparent;
    border-top: 13px solid transparent;
    border-right: 10px solid #FF9800;
}

 a.list-group-item:hover, a.list-group-item:focus {
    color: #eae5e5;
    text-decoration: none;
    background-color: #080808;
}
    
    .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    text-shadow: 0 -1px 0 #3071a9;
    background-image: -webkit-linear-gradient(top,#428bca 0,#3278b3 100%);
    background-image: -o-linear-gradient(top,#428bca 0,#3278b3 100%);
    background-image: -webkit-gradient(linear,left top,left bottom,from(#428bca),to(#3278b3));
    background: radial-gradient(#000000cc, transparent);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff428bca', endColorstr='#ff3278b3', GradientType=0);
    background-repeat: repeat-x;
    border-color: #3278b3;
}
 
 
a.list-group-item {
    color: #f5ebeb;
}   
.list-group-item {
    position: relative;
    display: block;
    padding: 2px 1px;
    margin-bottom: -1px;
    background-color: #292727;
    border-bottom: 1px solid #ddd;
}    
    
 .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: #131415;
    border-color: #ddd;
}   
    
 .btn-link {
    font-weight: 600;
    color: #212223;
    cursor: pointer;
    border-radius: 0;
}   
    
 i.orange {
    color: #FF9800;
} 
    
    .btn-link:hover, .btn-link:focus {
    color: #FF9800;
    text-decoration: underline;
    background-color: transparent;
    }
    
div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
.all_cont{
    padding: 0 !important;
}
    
    .panel-default>.panel-heading {
    color: #424141;
    background-color: #f5f5f5;
    border-color: #ddd;

    /* text-align: right; */
}
 
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 8px 14px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
 background-color: #0a0a0adb;
    color: #ece5e5;
}

.topnav a.active {
  background-color: #000000;
  color: white;
}
 
</style>
 
<div class="topnav">
  <a  href="<?=base_url()?>/Dashboard/pprofile"><h5 class="glyphicon glyphicon-home"></h5> الرئيسية</a>
  <a href="<?=base_url()?>/Dashboard/phome" ><h5 class="glyphicon glyphicon-user"></h5> الملف الشخصى</a>
  <a href="<?=base_url()?>/Dashboard/talabat" class="active"><h5 class="glyphicon glyphicon-list-alt"></h5> الطلبات</a>
    <a href="<?=base_url()?>/Dashboard/estalmat"><h5 class="glyphicon glyphicon-comment"></h5> الإستعلامات</a>
    <a href="#"><h5 class="glyphicon glyphicon-time"></h5> ادارة الوقت</a>
    <a href="#" ><h5 class="glyphicon glyphicon-tasks"></h5> المهام</a>
    <a href="#" ><h5 class="glyphicon glyphicon-send"></h5> التراسل </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-money" aria-hidden="true"></i></h5> الرواتب </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-area-chart" aria-hidden="true"></i></h5> التقييمات</a>
</div>


 
	<div class="col-xs-12 all_cont">

        <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            
            <div class="col-lg-12 col-md-12   bhoechie-tab">
                      <!---------------------------------------الطلبات----------------------------------------->
                    
     	
    <div id="media" class="media">
    <div class="container-fluid">
        <div class="row">
     
<div class="col-md-12">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        
        
        <!--------------------------------------------- قسم التوظيف -------------------------------------------->
       <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
  <i class="fa fa-list" aria-hidden="true"></i>قسم التوظيف 
                                    </a>
                                    </h4>
                        </div>
                        

    
    <div id="collapsefive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingfive">
             <!---------------------------------------الطلبات----------------------------------------->
                      
     	<div class="col-xs-12">                  
      <div class="panel panel-default">
          <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="orders-btns">
                                <a href="#" data-toggle="modal" onclick="get_Job_request()" data-target="#ezn_Modal"
                                   class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span> طلب احتياج وظيفة</a>
                                <a href="#" data-toggle="modal" onclick="get_Disclaimer()" data-target="#ezn_Modal"
                                   class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span> إخلاء طرف</a>
                    
                            </div>
                        </div>

                    </div>
                </div>
 
            
</div>
          
    </div>             
 
           
                </div>

    </div>
        </div>

        <!---------------------------------------------  قسم الإجازات-------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingfour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"  href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                        <i class="fa fa-list" aria-hidden="true"></i>  قسم الإجازات
                    </a>
                </h4>
            </div>
             
<div id="collapsefour" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingfour">
    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                    <div class="panel panel-default">
                         
                        <div class="panel-body">
                            <div class="orders-btns">
                                <a data-toggle="modal" onclick="get_ezn()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span> طلب إستئذان</a>
                                <a data-toggle="modal" onclick="get_agaza()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span> طلب إجازة</a>
                                <!--<a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> مباشرة عمل بعد الإجازة</a>-->
                                <a href="#" data-toggle="modal" onclick="get_Mandate_order()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span> طلب إنتداب</a>
                                <a href="#" data-toggle="modal" onclick="get_Overtime_hours_orders()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span> طلب تكليف اضافي</a>
                                <a href="#" data-toggle="modal" onclick="get_Volunteer_hours()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                                class="fa fa-book"></i></span>طلب ساعات التطوع</a>
                            </div>
                        </div>

                    </div>
                </div>
 
</div>
 
        </div>
         
           
            </div>
 
    </div>
 
     
         
     
        </div>
        </div>
    </div>
    
           
                
            </div>
       
        </div>

</div> 

<div class="modal fade" id="ezn_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;height: 90%;overflow: auto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header"></h4>
            </div>
            <div class="modal-body" id="ezn_Modal_body">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

</script>






<script>
    function get_ezn() {
        $('#modal_header').text('طلب الأذن');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/all_ozonat/Ezn_order",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $('#from_time').mdtimepicker(); //Initializes the time picker
                $('#to_time').mdtimepicker(); //Initializes the time picker

                console.log('profile agaza ezn_order ');
            }
        });
    }

    function get_agaza() {
        $('#modal_header').text('طلب اجازة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/agazat/Vacation/add_vacation",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);

                console.log('profile agaza ezn_order ');
            }
        });
    }

    function get_Job_request() {
        $('#modal_header').text('طلب احتياج وظيفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },

                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}


                    ],

                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },

                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true


                });


//console.log('profile get_Job_request');
            }
        });
    }

    function get_Disclaimer() {
        $('#modal_header').text('إخلاء طرف');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/addDisclaimer",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


//console.log('profile get_Job_request');
            }
        });
    }

    function get_Mandate_order() {
        $('#modal_header').text('طلب انتداب');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


//console.log('profile get_Job_request');
            }
        });
    }

    function get_Overtime_hours_orders() {
        $('#modal_header').text('طلب تكليف إضافى');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


            }
        });
    }

    function get_Volunteer_hours() {
        $('#modal_header').text('طلب ساعات التطوع');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_volunteer_hours",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }


</script>
<script>
    function edite_Job_request(id) {
        $('#modal_header').text('تعديل طلب الوظيفة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/Update_requset",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },

                    aoColumns: [
                        {"bSortable": true},
                        //  { "bSortable": true },
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}


                    ],

                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },

                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true


                });

                console.log('profile agaza ');
            }
        });
    }

    function edite_Disclaimer(id) {
        $('#modal_header').text('تعديل طلب إخلاء طرف ');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/updateDisclaimer",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


//console.log('profile get_Job_request');
            }
        });
    }

    function edit_Mandate_order(id) {
        $('#modal_header').text('تعديل طلب  انتداب ');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/edit_Mandate_order",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }

    function edit_Overtime_hours_orders(id) {
        $('#modal_header').text('تعديل طلب  تكليف إضافى ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }

    function edit_Volunteer_hours(id) {
        $('#modal_header').text('تعديل طلب  ساعات التطوع ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }

    function edite_agaza(id) {
        $('#modal_header').text('تعديل طلب الاجازة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/edit_vacation",
            data: {id: id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                console.log('profile agaza ');
            }
        });
    }

    function edite_ezn(id) {
        $('#modal_header').text('تعديل طلب الأذن');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/all_ozonat/Ezn_order/Upadte_ezn",
            data: {id: id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $('#from_time').mdtimepicker(); //Initializes the time picker
                $('#to_time').mdtimepicker(); //Initializes the time picker

                console.log('profile agaza ');
            }
        });
    }
</script>

 