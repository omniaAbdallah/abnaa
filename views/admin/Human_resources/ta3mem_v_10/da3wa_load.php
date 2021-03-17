<!-- yaraaaaaaaaaaaaaaaaa -->

  <!-- yaraaaa26-7-2020 -->

<!-- yaraaaaaaaaaaaaaaaaa -->

  <!-- yaraaaa26-7-2020 -->

  <?php

 if(isset($da3wat) && !empty($da3wat) ){

	if($da3wat->seen=='' && empty($da3wat->seen) ){

 ?>

<div class="modal modal-startup fade" id="dawa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="

width: 90%;

">

        <div class="modal-content">

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

                      <h6 style="font-weight: bold !important; color: #09704e;text-align: center;">السلام عليكم ورحمة الله وبركاتة ، وبعد :</h6>

      

                    <div class="form-group col-sm-12 col-xs-12">

                        <h6 style="line-height: 25px; color: black; font-weight: bold; ">

                        <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>

          <?php if(isset($da3wat->basic_data->subject)&&!empty($da3wat->basic_data->subject))
          {
            echo $da3wat->basic_data->subject;
          }
          ?>

                        </h6>

                          <i  style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>  

                    </div>

         

              

                    <div class="form-group col-sm-12 col-xs-12">

                        <h6 style="line-height: 22px; color: #0068c1; font-weight: bold;text-align: center;">نسأل الله أن يتقبل طاعاتكم وصالح أعمالكم</h6>

						<h6 style="line-height: 22px; color: #0068c1; font-weight: bold;text-align: center;">تقبلوا تحياتنا والله يحفظكم</h6>

                    </div>

               

              

    

       

    </div>



<!-- /.box-body -->



<!-- yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->

<div class="modal-footer">

<div class="col-xs-12">



<div class="col-md-12" id="actionn">

<div class="col-md-4">

<a  onclick="confirm(<?=$da3wat->id?>,'accept')" class="btn btn-success btn-block"><b>تحديد كمقروء</b></a>

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

	



			<iframe src="<?=base_url()?>human_resources/ta3mem/Ta3mem_c/read_file/<?php if(isset($da3wat->basic_data->file)&&!empty($da3wat->basic_data->file))
          {echo $da3wat->basic_data->file;}?>" style="width: 100%; height:  400px;" frameborder="0">

			</iframe>

  

            </div>

      

                    </div>

                    

                          

       

                    

                    

            </div>

        </div>

    </div>

</div>

<?php  }}?>

<!-- yaraaaaaaaaaaaaaaaaa -->

  <!-- yaraaaa26-7-2020 -->

<!-- yaraaaaaaaaaaaaaaaaa -->

  <!-- yaraaaa26-7-2020 -->

  <script>
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
	
      url: '<?php echo base_url() ?>human_resources/ta3mem/Ta3mem_c/reply_dawa',
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
        url: '<?php echo base_url() ?>human_resources/ta3mem/Ta3mem_c/reply_dawa',
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
</script>