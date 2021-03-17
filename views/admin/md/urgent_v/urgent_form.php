<style>
.box.collapsed-box .box-body,.box.collapsed-box .box-footer {
	display: none;
}

.box.height-control .box-body {
	max-height: 300px;
	overflow: auto;
}

.box-header:before,.box-body:before,.box-footer:before,.box-header:after,.box-body:after,.box-footer:after {
	content: " ";
	display: table;
}
.box-header:after,.box-body:after,.box-footer:after {
	clear: both;
}
.box-body {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px;
	padding: 10px;
}
.no-header .box-body {
	border-top-right-radius: 3px;
	border-top-left-radius: 3px;
}
.box-body>.table {
	margin-bottom: 0;
}

.box-body .fc {
	margin-top: 5px;
}

.box-body .full-width-chart {
	margin: -19px;
}

.box-body.no-padding .full-width-chart {
	margin: -9px;
}

.box-body .box-pane {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 3px;
}

.box-body .box-pane-right {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 0;
}
.box-footer {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px;
	border-top: 1px solid #f4f4f4;
	padding: 10px;
	background-color: #fff;
}

</style>
<section class="content__">
    <div class="container-fluid__">

        <div class="box">
            <div class="box-header">
            
                <div class="float-right">
                    <a href="<?=site_url('md/urgent_msg/Urgent_msg') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        رجوع للصفحة الرئيسية </a>
                </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-md-4">
                        <?php //echo validation_errors(); ?>

                        <form action="<?=site_url('md/urgent_msg/Urgent_msg/process')?>" method="post">
                            <input type="hidden" name="id" value="<?=$all_msgs->id?>" >
                            
                            
                            <div class="form-group has-danger mb-0">
                                <label >النص </label>
                                <input type="text" name="msg_name" value="<?=$all_msgs->msg_name?>"
                                       class="form-control " required>
                            </div>


                            <div class="form-group ">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                  <i class="fa fa-paper-plane"></i>حفظ</button>
                                <button type="reset" class="btn  btn-flat">Reset</button>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
                
                



    </div>
</section>









