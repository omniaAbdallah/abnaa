<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .top_radio{
        margin-bottom: 15px;
    }
    .top_radio input[type=radio] {
        height: 24px;
        width: 24px;
        line-height: 0px;
        vertical-align: middle;
        margin-right: -33px;
        top: -5px;

    }
    .top_radio .radio,.top_radio .radio {
        vertical-align: middle;
        font-size:16px;

        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
        text-align: right;

    }
    .radio input[type="radio"] {
        opacity: 1;
    }
</style>

<style type="text/css">

    .btn-group.mega-btn .dropdown-menu{
        left: 50% !important;
        right: auto !important;
        text-align: center !important;
        transform: translate(-50%, 0) !important;
    }


    @media (max-width: 480px) {
        .btn-group.mega-btn .dropdown-menu{
            min-width:350px;
        }
    }
    @media (min-width: 480px) and (max-width: 767px) {
        .btn-group.mega-btn .dropdown-menu{
            min-width:470px;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .btn-group.mega-btn .dropdown-menu{
            min-width:750px;
        }
    }
    @media (min-width: 992px) (max-width: 1150px) {
        .btn-group.mega-btn .dropdown-menu{
            min-width:900px;
        }
    }
    @media (min-width: 1151px){
        .btn-group.mega-btn .dropdown-menu{
            min-width:544px;
        }
    }

    .mega-col{
        width: 50%;
        float: right;
        list-style: none;
        text-align: right;
        padding-right: 5px;
    }
    .mega-col li{

    }



    li.mega-col-header {
        font-size: 18px;
        border-bottom: 3px double;
        margin-bottom: 8px;
        padding-left: 5px;
        padding-right: 0px;
    }
    .dropdown-menu li .mega-col:first-child{
        border-left: 2px dotted #eee;
        padding-left: 5px;
    }
</style>


<div class="panel ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php //echo $title?>  </h3>
        <!------------------------------------------------------------------------------------------------------>
        <?php


        if ($tat_data["final_suspend"] == 4) { ?>
            <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
                <span class="">رقم ملف التطوع</span>
            </button>
            <button class="btn btn-success  btn-sm progress-button ">
                <span class=""> <?php echo $tat_data["file_num"];?></span>
            </button>

        <?php }else{?>
            <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
                <span class="">رقم طلب التطوع</span>
            </button>
            <button class="btn btn-success  btn-sm progress-button ">
                <span class=""> <?php echo $tat_data["id"];?></span>
            </button>
        <?php  } ?>



        <?php

        // echo $_SESSION['role_id_fk'];
        //if($_SESSION['role_id_fk'] == 1){}

        ?>


            <div class="btn-group">
                <button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
                <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick='swal({
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
                        window.location="<?=base_url()?>human_resources/tataw3/Tataw3_c/edit_volunteer/<?=$tat_data['id']?>";
                        });'>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل </a>
                    </li>
                    <!--
                    <li><a href="#" onclick='swal({
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
                        window.location="<?=base_url()?>human_resources/tataw3/Tataw3_c/delete/<?=$tat_data['id']?>";
                        });'>
                        <i class="fa fa-trash"> </i> حذف </a></li>
                    -->
                    <!--data-toggle="modal" data-target="#Modal_attach" onclick="load_all_attach('. $value->id.')"-->
                    <li><a title="عرض المرفق"
                           href="'<?=base_url()?>human_resources/tataw3/Tataw3_c/add_attach/<?=$tat_data['id']?>" >
                            <i class="fa fa-upload" aria-hidden="true"></i> اضافة مرفقات </a>
                    </li>
                    <!--<li><a href="#modal_details" data-toggle="modal"
                           onclick="get_details(<?=$tat_data['id']?>)"> <i
                                    class=" fa fa-eye"></i>تفاصيل</a></li>-->
                    <li><a href="<?php echo base_url(); ?>human_resources/tataw3/tataw3_c/tato3_interviews/<?=$tat_data['id']?>">
                            <i class="fa fa-list" aria-hidden="true"></i>مقابلات المتطوع</a>

                </ul>
            </div>



            <?php
            if($tat_data['halt_motatw3'] ==0){
                $status_f_title =  'طلب جاري';
                $status_Btn_class = 'info';
                $status_Btn_class_i = 'info';
            }else{
                $status_f_title =  $tat_data['halt_motatw3_n'];
                $status_Btn_class = $files_status_color ;
                $status_Btn_class_i = '';
            } ?>

            <div class="btn-group">

                <button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
                    <?php if($tat_data['final_suspend'] !=4){?> disabled="disabled"  <?php } ?>
                        data-target="#modal-FileConidtion"
                        class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?> btn-sm" onclick="GetFileStatus(<?php echo $tat_data['id'];?>)"><i
                        class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>

                </button>


            </div>

            <div class="modal fade" id="modal-FileConidtion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="FileConidtion">



                    </div>
                </div>
            </div>



        <!-------------------------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------------------>
    </div>
</div>


<script>
    function GetFileStatus(tat_id) {
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>human_resources/tataw3/Tataw3_c/GetFileStatus',
            data:{tat_id:tat_id},
            dataType:'html',
            cache:false,
            success: function(html){
                $("#FileConidtion").html(html);
            }
        });
    }
</script>

<script>
    function change_file_status(process_id,title,tat_id){

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/tataw3/Tataw3_c/change_file_status",
            data:{process_id:process_id,title:title,tat_id:tat_id},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>

