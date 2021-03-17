


	<style type="text/css">
	
		.reply-comment{
			display: inline-block;
			width: 100%;
			margin-bottom: 20px
		}
		.reply-img{
			width: 15%;	
			float: right;
		}
		.reply-img img{
			width: 100%;
			max-width: 70px;
			height: 70px;
			border:1px solid #eee;
		}
		.reply-comment{
			float: right;
			width: 85%;
		}
		.label-inverse{
			background-color: #888;
			color: #fff;
		}
		.reply-comment  span.label{
			text-align: center;
			padding-right: 10px;
			display: inline-block;
			width: auto;
            font-size:14px;
		}
		.reply-comment .name{
			color: #888;
            font-size:15px;
		}
		.comments-sec .well{
			height: 100%;
		}
		.bubble-div img{
			width: 150px;
			max-width: 100%;
		}
        .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
            margin: 0 0 0 0;
        }
	</style>



</head>

<body id="page-top" data-spy="scroll" >
	
<?php
           
                $data["get_all"] = $get_mohma;
                $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","38","");
                $this->load->view('admin/Human_resources/mohma_v/getDetailsDiv', $data);
             
                ?>
  <div id="myDiv">
	<div class="comments-sec">
		<div class="col-xs-12 no-padding">
			<h5>التعليقات</h5>
			<div class="well col-xs-12 no-padding">
				<div class="col-md-9 padding-4">
                <?php
      //  echo '<pre>'; print_r($result);
        if(isset($result)&&!empty($result)){

           
            foreach ($result as $row){

                ?>
					<article class="reply-comment">
						
                        <div class="reply-img">
                                                            <img src="<?php if (isset($row->personal_photo) && $row->personal_photo != null) {
                                                                if ($_SESSION['role_id_fk'] == 3) {
                                                                    echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->personal_photo;
                                                                } else {
                                                                    echo base_url() . 'uploads/images/' . $row->personal_photo;
                                                                }
                                                            } else {
                                                                echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                                                            }
                                                            ?>"
                                                                 class="img-circle" width="45" height="45" alt="user">
                                                        </div>
						<div class="reply-comment ">
							<h5 class="name"><span class="label label-inverse"><?= $row->publisher_name;?> </span> <?= $row->date_ar;?> 
                            <!-- <a type="button" class="btn btn-danger btn-xs"  href="<?= base_url() . "human_resources/mohma/Mohma_c/delete_comment/" . $row->id ."/".$row->mohma_id_fk  ?>" style="float:left;"><i class="fa fa-trash"> </i></a>  -->
                           

                            <?php if ($row->publisher == $_SESSION['user_id']) { ?>
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                <button type="button" class="btn btn-default"  onclick='swal({
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
                            window.location="<?= base_url() . "human_resources/mohma/Mohma_c/delete_comment/" . $row->id ."/".$row->mohma_id_fk  ?>";
                            });'> <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                      
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                
                                </div>
                        <?php }?>

                        <?php if ($row->publisher == $_SESSION['emp_code']) { ?>
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    onclick='delete_comment(<?php echo $row->id ?>,<?= $row->mohma_id_fk ?>)'>
                                                                                <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                      
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                
                                </div>
                        <?php }?>
                           
                           
                           
                           
                             </h5>
							<p><?= $row->comment;?></p>
						</div>
					</article>
                    <?php } } ?>
				
				</div>
				<div class="col-md-3 padding-4">
					<div class="bubble-div text-center">
						<img src="<?php echo base_url()?>asisst/admin_asset/img/comment-bubble.png">
					</div>
				</div>
			</div>
		</div>
        </div>
        </div>
		<div class="col-xs-12 no-padding">
        <?php   echo form_open_multipart('human_resources/mohma/Mohma_c/add_comment/'.$get_all->id );?> 
			<div class="col-xs-12 form-group">
				<label class="label ">إضافة</label>
				<textarea class="form-control" rows="3" name="comment" id="comment"  data-validation="required" ></textarea>
                <input type="hidden"  name="to_emp_id_fk" id="to_emp_id_fk" value="<?=$get_mohma->emp_id_fk?>" >
			</div>
			
			
			<div class="col-md-3 form-group">
                <button class="btn btn-success btn-labeled"  type="button"
                                            name="add" value="add" onclick="add_comments(<?php echo $get_all->id ?>)"
                ><span class="btn-label"><i class="fa fa-reply"></i></span>إرسال</button>
			
                
            
            </div>
		</div>
        <?php
            echo form_close();
            ?>
	

<!-- model -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التعليقات  </h4>
            </div>
            <div class="modal-body" id="details_result">
          
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php

                ?>
               
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
    
	


	<script>
		new WOW().init();
		$('.some_class').datetimepicker();
	</script>



</body>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>


<script>
    function add_comments(id) {
        var comment = $('#comment').val();
        var to_emp_id_fk=$('#to_emp_id_fk').val();
    
        if (comment != '') {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/add_comments",
                type: "POST",
                data: {id: id, comment: comment,to_emp_id_fk:to_emp_id_fk},
                beforeSend: function () {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (d) {
                    $('#comment').val('');
                    swal({
                        title: " تمت الاضافه بنجاح ",
                        type: "success",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false
                    });
                    get_details_travel_typee(id);
                }
            });
        } else {
            //   $('#result').html('برجاء اختيار الموظف');
            swal({
                title: " برجاء ادخال كافه البيانات! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        }
    }
</script>
<script>
    function delete_comment(id, ticket) {
        swal({
                title: "هل تريد حذف التعليق?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    if (id != ' ') {
                        $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/delete_comment",
                            type: "POST",
                            data: {id: id},
                            success: function (d) {
                                swal({
                                    title: " تمت الحذف بنجاح ",
                                    type: "success",
                                    confirmButtonClass: "btn-warning",
                                    closeOnConfirm: false
                                });
                                get_details_travel_typee(ticket);
                            }
                        });
                    }
                } else {
                    swal({
                        title: "حدث خطا! ",
                        type: "warning",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false
                    });
                }
            });
    }
</script>
<script>
    function get_details_travel_typee(id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/load_comments",
            data: {id: id},
         
            success: function (d) {
                $('#myDiv').html(d);
            }
        });
    }
</script>
<script>
    function update_comment(id,ticket)
    {

    var comment=$('#comment_update').val();
 
    console.log(id);
    if(id !='')
{
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/mohma/Mohma_c/update_comments",
              type: "POST",
            data:{id:id,comment:comment},
            success:function(d){
				$('#detailsModal').modal('hide');
                swal({
    title: " تمت التعديل بنجاح ",
	text:" ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
get_details_travel_typee(ticket);
            }

        });
       } else{

     //   $('#result').html('برجاء اختيار الموظف');
        swal({
    title: "حدث خطا! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});



        }
    }
</script>
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
  
<?php }?>