 <!-- <section class="content-header">
	<div class="header-icon">
		<i class="fa fa-dashboard"></i>
	</div>
	<div class="header-title">
		<h1>الصفحة الرئيسية</h1>
		<small>محتويات الصفحة الرئيسية</small>
	</div>

</section> -->


<style>
	.isDisabled {

		cursor: not-allowed;

	}
</style>

<section class="content" style="padding-top: 10px;">
    <div class="col-md-1"></div>

	<div class="col-md-10 col-xs-12 no-padding">

	<?php

		$image_name ='asisst/admin_asset/img/logo-atheer.png';
		if(isset($_SESSION['main_data_info'])) {

			$image_name = 'uploads/images/' . $_SESSION['main_data_info']->logo;

			if (file_exists($image_name) == 1) {
				$image_name = "uploads/images/" . $_SESSION['main_data_info']->logo;
			} else {
				$image_name = 'asisst/admin_asset/img/logo-atheer.png';
			}
		}


		?>


		<div class="index-icons no-padding grid_system">
			<?php if(isset($main_groups) && $main_groups!=null && !empty($main_groups)){ 
				  $count_sec="0.1";$count_row=1; ?>
			<?php  foreach ($main_groups as $row):


			     if($count_row %4 == 0){$count_row=1; }   ?>
                 <!--col-md20 col-md-3 col-sm-4-->                 
				<div class="padding-2 <?php echo  $row->sub[0]->class?> wow fadeIn" data-wow-delay="<?php echo($count_sec)?>s" >
					<div class="box" style="background-color: <?php echo  $row->sub[0]->bg_color?>;">
						<?php if($row->count_level > 0){
									$link_to="Dash/mian_group/".$row->sub[0]->page_id ;
								}else{
									$link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
								}?>
						<?php

						if($row->permission==0){
							$classs='isDisabled';
							$url='';
						}else{
							$classs='';
							$url='#sub_cats';
						}
						?>

						<a  data-toggle="modal"  onclick="get_sub_cats(<?=$row->page_id_fk?>);"   href="<?=$url?>" alt="" class="center-block <?=$classs?> " style="color: <?php echo  $row->sub[0]->color?>;">
						<!--	<img src="<?php  echo  base_url()."uploads/pages_images/thumbs/".$row->sub[0]->page_image?>" 
                                  alt="" class="center-block">-->
                                  <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->sub[0]->page_image ?>"
								 onerror="this.src='<?php echo base_url()."$image_name"?>'"
								 alt="" class="center-block" />
							<h5 class="text-center">  <?php echo  $row->sub[0]->page_title?>  </h5>
						</a>
					</div>
				</div>

			<?php  $count_sec +="0.2";$count_row +=1;  endforeach;?>
			<?php }?>

			
		</div>








	</div> 
    <div class="col-md-1"></div>
</section><!--content-->


 <!--------------------------------------------------------------------------------------------------------------------->
<style>

	.sub_cats .modal-content {
		box-shadow: none;
		background-color: rgba(0,0,0,0.7);
	}
	.sub_cats .title{
	    margin-top: 2px; 
	    position: relative;
    background-color: #f9a61a;
    border-radius: 15px;
    display: inline-block;
    padding: 9px 20px;
    color: #fff;
    text-align: center;
    min-width: 200px;
    padding-right: 50px;
    font-size: 15px;

	}
	.sub_cats .title i {
	  
        background-color: #f9a61a;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        position: absolute;
        right: 0;
        top: -7px;
        line-height: 45px;
        text-align: center;
        font-size: 23px;
	}
	#edrat-elnezam .inner-edrat{
		margin-top: 30px;
		/* display: inline-block; */
		width: 100%;
		float: right;
	}
	#edrat-elnezam .tree li  {
		color: #fff;
	}
	#edrat-elnezam .tree li a{
		color: #fff;
		font-size: 16px;

	}
	#edrat-elnezam  .tree li a:hover{
		color: #f9a61a;
	}

	#edrat-elnezam  .tree ul {
		margin-right: 10px;
		position: relative;
		margin-left: 0;
	}
	#edrat-elnezam  .tree ul li {
		padding-left: 0;
	}
	#edrat-elnezam  .tree ul ul {
		margin-left: 0;
	}
	#edrat-elnezam  .tree ul li:last-child:before{
		display: none;
	}
    .left_man img{
        width: 100%;
        height: auto;
        border: 0;
        border-radius: 0;
        margin-top: 250px;
    }

</style>

 <div class="modal fade sub_cats" id="sub_cats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	 <div class="modal-dialog  " role="document" style="width:30%;">
		 <div class="modal-content" style="display: inline-block;width: 450px;min-height:485px;">
			 <div class="modal-body" style="padding: 2px;">






				 <!--  <input type="text" class="form-control" id="filter" name="filter" class="filter" placeholder="بحــــــــــــــــث" style="height: 50px;margin-bottom: 10px;text-align: center;font-size: 18px;"/> -->
				 <div class="rocket-links col-xs-12 no-padding ">

					 <div class="col-xs-8 col-md-8 no-padding" id ="edrat-elnezam" role="tablist" aria-multiselectable="true">




					 </div>
                     <div class="col-md-4 hidden-xs">
                        <div class="left_man">
                            <img src="<?php echo base_url()?>asisst/admin_asset/img/icons/man-arab-icon.png" />
                        </div>
                     </div>
				 </div>













			 </div>
		 </div>
	 </div>
 </div>

 <!--------------------------------------------------------------------------------------------------------------------->



 <script src="https://www.gstatic.com/firebasejs/3.7.2/firebase.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script>
	 // Initialize Firebase
	 var config = {
		 apiKey: "AIzaSyCIxbRbrTnNrMD7Iqg9v9-IQr_DK_iCNPw",
		 authDomain: "shop-31d52.firebaseapp.com",
		 databaseURL: "https://shop-31d52.firebaseio.com",

		 storageBucket: "",
		 messagingSenderId: "204884469548",
	 };
	 firebase.initializeApp(config);

	 const messaging = firebase.messaging();

	 messaging.requestPermission()
		 .then(function() {
			 console.log('Notification permission granted.');
			 return messaging.getToken();
		 })
		 .then(function(token) {
			 //console.log(token); // Display user token
			 $.ajax({
				 type:'POST',
				 url:'<?php echo base_url();?>Notification_controller/save_token',
				 data:{token : token},
				 success:function(data){
					 // $("#msg").html(data);
					 //alert(d);
					 console.log(token);

				 }
			 });
		 })
		 .catch(function(err) { // Happen if user deney permission
			 console.log('Unable to get permission to notify.', err);
		 });

	 messaging.onMessage(function(payload){
		 // console.log('onMessage',payload);
		 notificationTitle = payload.notification.title;
		 notificationOptions = {
			 body: payload.notification.body,
			 icon: payload.notification.icon,
			 image:  payload.notification.image,
			 sound:  payload.notification.sound
		 };
		 var notification = new Notification(notificationTitle,notificationOptions);

	 })

 </script>


<script>

	function get_sub_cats(val_id)
	{
		$.ajax({
			type:'post',
			url:"<?php echo base_url();?>Dash/get_sub_cats",
			data:{val_id:val_id},
			success:function(d){

           $('#edrat-elnezam').html(d);
				//alert(d);



			}

		});

	}

</script>

<!--------------------------------------------------------------------->
<?php 
/**
 * 
 */ 
 ?>

<div id="result">

</div>


<script>
/*setInterval(function() {
	check_t3mem();
},30000);
function check_t3mem() {
    $.ajax({
        type: 'post',
         url:  "<?=base_url() . 'human_resources/ta3mem/Ta3mem_c/check_d3wa'?>",
        success: function(data) {
            if(data!='')
            {
                $("#result").html(data);
				$(".modal-startup").modal('show');
            }
        }
    });
}*/
</script>

<!-- yaraa -->


<!------------------------------------------------------------------------>
<!-- yaraaaaaaaaaaaaaaaaa -->
  <!-- yaraaaa26-7-2020 -->
<!-- yaraaaaaaaaaaaaaaaaa -->
  <!-- yaraaaa26-7-2020 -->
  <div id="result_">
  <?php
  /*
 if(isset($da3wat) && !empty($da3wat) ){
	if($da3wat->seen=='' && empty($da3wat->seen) ){
 ?>
<div class="modal modal-startup fade" id="dawa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="
    width: 139%;
">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">
                 <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
تعميم داخلي</h6>
            </div>
            <div class="modal-body">
    <div class="col-xs-12">
                    <h6 class="" style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                       الاستاذ/<?= $da3wat->emp_name; ?>
                    </h6>
                      <h6 style="font-weight: bold !important; color: #09704e;text-align: center;">
                      السلام عليكم ورحمة الله وبركاتة ، وبعد :</h6> 
      
                    <div class="form-group col-sm-12 col-xs-12">
                        <h6 style="line-height: 25px; color: black; font-weight: bold; ">
                        <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>
بالتعاون مع رواد الإدارة للإستشارات الإدارية يسرنا أن نقدم لكم دورة " التميز المؤسسي بين الواقع والتطلعات " <br />
<p style="text-align: center; font-size: 16px;">
للأستاذ 
<br />
عبدالعزيز بن حمد السليم
</p>
<p style="text-align: center; font-size: 22px;background: #ffc24eb8;color: black;">
وذلك يوم الإثنين 18-2-1442هـ من الساعة 4م إلي الساعة 6م في مقر الجمعية
</p>





                        </h6>
                          <i  style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>  
                    </div>
         
              
                    <div class="form-group col-sm-12 col-xs-12">
                    
						<h6 style="line-height: 22px; color: #0068c1; font-weight: bold;text-align: center;">تقبلوا تحياتنا والله يحفظكم</h6>
                    </div>
               
              
    
       
    </div>

<!-- /.box-body -->

<!-- yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<div class="modal-footer">
<div class="col-xs-12">

<div class="col-md-12" id="actionn">
<div class="col-md-4">
<a  onclick="confirm(<?=$da3wat->id?>,'accept')" class="btn btn-success btn-block"><b> تحديد كمقروء</b></a>
</div>
 <div class="col-md-4">
<a onclick="confirm(<?=$da3wat->id?>,'refuse')" class="btn btn-danger btn-block"><b>تحديد كغير مقروء</b></a>
  </div>
  <div class="col-md-4">
<a onclick="confirm(<?=$da3wat->id?>,'wait')" class="btn btn-warning btn-block"><b> النظر  لاحقا</b></a>
  </div>
</div>
 <br /> <br />
    </div>
  
       <div class=" col-xs-12 ">
	

			<iframe src="<?=base_url()?>Dash/read_file/tamem3.pdf" style="width: 100%; height:  400px;" frameborder="0">
			</iframe>
  
            </div>
      
                    </div>
                    
                          
       
                    
                    
            </div>
        </div>
    </div>
</div>
<?php  }}
*/
?>
</div>

<!-- yaraaaaaaaaaaaaaaaaa -->
  <!-- yaraaaa26-7-2020 -->
<!-- yaraaaaaaaaaaaaaaaaa -->
  <!-- yaraaaa26-7-2020 -->
<script>
/*
 $(document).ready(function () {
    $(".modal-startup").modal('show');
});
setInterval(function() {
	check_notification_chat();
},30000);

function check_notification_chat() {
    $.ajax({
        type: 'post',
         url:  "<?=base_url() . 'Dash/check_d3wa'?>",
        success: function(data) {
            if(data!='')
            {
                $("#result").html(data);
				$(".modal-startup").modal('show');
            }
        }
    });
}*/
</script>
<script>
/*
function confirm(id,action) {
    if(action=='refuse')
    {
      //  $('#refuse_d3wa').show();

        
        swal({
title: "هل انت متاكد من العملية?",
type: "warning",
showCancelButton: true,
confirmButtonClass: "btn-danger",
confirmButtonText: "نعم",
cancelButtonText: "لا",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm) {
if (isConfirm) {
$.ajax({
      type: 'post',
	
      url: '<?php echo base_url() ?>Dash/reply_dawa',
      data: {id: id,action:action},
      dataType: 'html',
      cache: false,
      beforeSend: function()
      {
          swal({
title: "جاري  ... ",
text: "",
imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
showConfirmButton: false,
allowOutsideClick: false
});
      },
      success: function (html) {
          //   alert(html);
          $('#dawa').modal('hide');
          swal({
              title: "تم !",
}
);
      }
  });
} else {
swal("تم الالغاء","", "error");
}
});
    
    }else{
swal({
title: "هل انت متاكد من العملية?",
type: "warning",
showCancelButton: true,
confirmButtonClass: "btn-danger",
confirmButtonText: "نعم",
cancelButtonText: "لا",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm) {
if (isConfirm) {
$.ajax({
        type: 'post',
        url: '<?php echo base_url() ?>Dash/reply_dawa',
        data: {id: id,action:action},
        dataType: 'html',
        cache: false,
        beforeSend: function()
        {
            swal({
title: "جاري  ... ",
text: "",
imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
showConfirmButton: false,
allowOutsideClick: false
});
        },
        success: function (html) {
            //   alert(html);
            $('#dawa').modal('hide');
            swal({
                title: "تم !",
}
);
        }
    });
} else {
swal("تم الالغاء","", "error");
}
});
    }
}
*/
</script>




  <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-ui.js" type="text/javascript"></script>

<script>
/*
 $(document).ready(function () {
	console.warn("check check_tataw3 :: ready");
	check_tataw3();
    setInterval(check_tataw3, (1000 * 60 * min));

		});
function check_tataw3() {
    $.ajax({
        type: 'post',
         url:  "<?=base_url() . 'human_resources/tataw3/Emptatw3/check_tataw3'?>",
        success: function(data) {
            if(data!='')
            {
                $("#result_tataw3").html(data);
				$(".modal-startup_tataw3").modal('show');
				
            }
        }
    });
}
*/

</script>
<script>

 $(document).ready(function () {
	console.warn("check check_t3mem :: ready");
	check_t3mem();
    setInterval(check_t3mem, (1000 * 60 * min));

		});
function check_t3mem() {
    $.ajax({
        type: 'post',
         url:  "<?=base_url() . 'human_resources/ta3mem/Ta3mem_c/check_d3wa'?>",
        success: function(data) {
            if(data!='')
            {
                $("#result").html(data);
				$(".modal-startup").modal('show');
				
            }
        }
    });
}

   /* $(document).ready(function () {
        console.warn("check check_t3mem :: ready");
        check_t3mem();

        setInterval(check_t3mem, (1000 * 60 * min));

    });



    function check_t3mem() {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'human_resources/ta3mem/Ta3mem_c/check_d3wa'?>",
            success: function (data) {
                if (data != '') {
                    $('.modal').modal('hide'); // closes all active pop ups.
                    $('.modal-backdrop').remove(); // removes the grey overlay.
                    $("#result").html(data);
                    $(".modal-startup").modal('show');
                }
            }
        });
    }
*/
  /*  function check_adv() {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'human_resources/ta3mem/Ta3mem_adv_c/check_d3wa'?>",
            success: function (data) {
                if (data != '') {
                  
                    $('.modal-backdrop').remove() // removes the grey overlay.
                    $("#result").html(data);
                    $(".modal-startup").modal('show');
                }
            }
        });
    }
*/
   /* function check_msg() {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'human_resources/ta3mem/Ta3mem_msg_c/check_d3wa'?>",
            success: function (data) {
                if (data != '') {
        
                    $('.modal-backdrop').remove() // removes the grey overlay.
                    $("#result").html(data);
                    $(".modal-startup").modal('show');
                }
            }
        });
    }*/
</script>

