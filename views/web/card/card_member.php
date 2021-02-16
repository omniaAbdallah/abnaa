
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demoatheer.xyz/design/3own/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Apr 2018 10:01:08 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">


    <meta name="description" content="الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء">
    <meta name="author" content="الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء">

    <title><?php if ((isset($this->main_data)) && (!empty($this->main_data))) {
            echo $this->main_data->name;
        } else {
            echo '';
        } ?> </title>

    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= base_url() . 'asisst/web_asset/' ?>img/favicon/favicon-32x32.png">


    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/jquery.lightbox-0.5.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>plugin/modals/component.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/responsive.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
   <!--
    <link href="<?= base_url() . 'asisst/web_asset/' ?>plugin/revolution-slider/css/settings.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url() . 'asisst/web_asset/' ?>plugin/revolution-slider/css/layers.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url() . 'asisst/web_asset/' ?>plugin/revolution-slider/css/navigation.css" rel="stylesheet"
          type="text/css"/>
 <script src="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.css">
    -->
    
<style>
    #myListnews li {
        display: none;
    }
    .banner_page {
    position: relative;
    /* height: 200px; */
    height: 48px;
    background-position: center !important;
    /* opacity: 0.7; */
    background-size: cover !important;
}
.well{
    background: rgba(0,0,0,0.8) !important;
}
.banner_page {
    position: relative;
    /* height: 200px; */
    height: 31px;
    background-position: center !important;
    /* opacity: 0.7; */
    background-size: cover !important;
}
.ptop-30 {
    padding-top: 1px;
}
.well label {
    margin-bottom: 0px;
    color: #ffb42c;
    display: block;
    text-align: right;
    font-weight: 600;
}

.containerBox .card_h {
    font-size: 16px !important;
    color: #776d86 !important;
}
.banner_page .breadcrumb {
    background: rgba(0,0,0,0.8) !important;
}
.banner_page .breadcrumb li a {
    color: #fff;
}
</style>

<section class="banner_page">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">البطاقات</a></li>
            <li><a href="#">أرسل إهداء أو تهنئة</a></li>

        </ol>
    </div>

</section>

<section class="" style=" background: url(<?= base_url() . 'asisst/gam3ia_omomia_asset/img/login/brida.jpg' ?>);">
    <div class="container">
        <div class="col-md-12 no-padding">
                <?php
                echo form_open_multipart('web/card_member');
                ?>

                <div class="well">
                    <div class="col-md-3 form-group no-padding">

                        <div class=" col-sm-12  col-md-12 padding-4">
                            <label class="label label-green  "> نوع البطاقة </label>
                            <select class="form-control" name="type_card" id="type_card" data-validation="required"
                                    onchange="get_namozg_select(this.value,'namozg_name');">
                                <option value="">اختر</option>
                                <?php
                                $type_card_arr = array("1" => "إهداء", "2" => "إهداء متبرع", "3" => "بطاقة تهنئه");
                                foreach ($type_card_arr as $key => $value) {
                                    ?>
                                    <option value="<?php echo $key ?>"> <?php echo $value ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <br/> <br/><br/>
                        <div class=" col-sm-12  col-md-12 padding-4">
                            <label class="label label-green  "> إسم النموذج </label>

                            <select class="form-control  " onchange="get_complate_form(this.value,'complate_form')"
                                    id="namozg_name" name="namozg_name" data-show-subtext="true" data-live-search="true"
                                    data-validation="required" aria-required="true">
                                <option value="">اختر</option>
                            </select>
                        </div>

                        <pr>
                            <div id="complate_form"></div>


                    </div>
                    <div class="col-md-4">
                        <style>

                            .dawa-img {
                                position: relative;
                            }

                            .dawa-img img {
                                max-width: 100%;
 
                            }

                            .containerBox {

                                position: relative;
                                display: inline-block;
                            }

                            .text-box {
                                position: absolute;
                                height: 100%;
                                text-align: center;
                                width: 100%;
                            }


                            .containerBox .card_h {
                                position: absolute;
                                display: inline-block;
                                font-size: 15px; 
                                color: #003c42;
                                font-weight: bold;
                            }

                            .containerBox img {
                                display: block;
                                max-width: 100%;
                              
                            }
                            .font{
                                text-align: right;
                            }

                            label {
                                color: red;
                            }
                            
                            .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
     position: relative; 
     min-height: 1px; 
     padding-right: 0px; 
    padding-left: 0px; 
}*/
                        </style>

                                <div  id="html-content-holder" class="dawa-img containerBox">
                                    <div class="text-box">
                                        <h4 name="name_card_ehdaa_to" id="name_card_ehdaa_to" class="card_h font"
                                            style="top:79%; right: 48%;d">إهداء إلى </h4>
                                        <h4 name="name_card_ehdaa_from" id="name_card_ehdaa_from" class="card_h font"
                                            style="top:0%; right:0%; display: none">إهداء من</h4>
                                        <h4 name="name_card_luqb" id="name_card_luqb" class="card_h font"
                                            style="top:0%; right:0%; display: none"> <!--اللقب --> </h4>
                                        <h4 name="name_card_emp_name" id="name_card_emp_name" class="card_h font"
                                            style="top:0%; right:0%; display: none"><!--الإسم --></h4>
                                        <h4 name="name_card_tabr3_type" id="name_card_tabr3_type" class="card_h font"
                                            style="top:0%; right:0%; display: none">قيمة التبرع</h4>
                                    </div>
                                    <!--width: 356px;height: 506px; -->
                                   <img style="width: 100%;height: 100;" id="output" src="<?= base_url() ?>asisst/admin_asset/img/card_seeting/card(1).png">
                               
                               
                               
                                </div>

                        <div id="html-content-holder_1 "
                             style="background-color: #F0F0F1; color: #00cc65; background-size: contain; display: none;
                                    padding-left: 0px; padding-top: 10px; float: left;     margin-left: 120px;  width: 357px; height: 506px; ">
                            <!--                            <strong>Codepedia.info</strong><hr/>-->
                            <!--                            <h3 style="color: #3e4b51;">-->
                            <!--                                Html to canvas, and canvas to proper image-->
                            <!--                            </h3>-->
                            <!--                            --><?php ////$card_img = base_url() . 'uploads/public_relations/card_setting/205db52c-b4dc-4598-bf1b-daf588a0643d.jpg';?>
                            <!--                            <img alt="إهداء" id="card_image" src="" style="position: absolute;" >-->

                            <!--      <p  id="p_ehdaa_to" style="color: #3e4b51;  font-size: 14px; position: absolute; " >
                                      <label  style="display: none;" name="name_card_ehdaa_to" id="name_card_ehdaa_to" > </label>
                                  </p>

                                  <p  id="p_ehdaa_from" style="color: #3e4b51;  font-size: 14px; position: absolute; " >
                                      <label  style="display: none;" name="name_card_ehdaa_from" id="name_card_ehdaa_from" > </label>
                                  </p>

                                  <p id="p_luqb" style="color: #3e4b51;  font-size: 14px; position: absolute;  " >
                                      <label  style="display: none;" name="name_card_luqb" id="name_card_luqb" > </label>
                                  </p>

                                  <p id="p_emp_name" style="color: #3e4b51;  font-size: 14px; position: absolute; " >
                                      <label  style="display: none;" name="name_card_emp_name" id="name_card_emp_name" > </label>
                                  </p>

                                  <p id="p_tabr3_type" style="color: #3e4b51;  font-size: 14px; position: absolute; " >
                                      <label  style="display: none;" name="name_card_tabr3_type" id="name_card_tabr3_type" > </label>
                                  </p>-->
                        </div>


                    </div>
                    <div class="col-md-5" id="previewImage" style="width: 37%;">

                     <!--
                        <div id="previewImage">
                        </div>-->

                        <!--<button  type="submit" id="button" name="ADD" value="ADD"  class="btn btn-success " style="font-size: 16px;width: 150px;">
                            <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>-->

                    </div>
   <input id="btn-Preview-Image" type="button" class="btn btn-info" value="إنشاء البطاقة"/>
                        <a id="btn-Convert-Html2Image" href="#" class="btn btn-success" style="display: none;">تحميل البطاقة</a>
                     
                </div>
                <?php
                echo form_close();
                ?>
              <div style="color: #ff8a27; text-align: center;" class="panel-footerss">تم التطوير بواسطة شركة الأثير تك لتكنولوجيا المعلومات</div>
            

        </div><!-- col-md-12 -->

    </div>
</section>


<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/admin_asset/js/jquery-1.10.1.min.js"></script>-->
<script src="<?php echo base_url() ?>asisst/web_asset/js/html2canvas.js" type="text/javascript"></script>
<!--<script src="--><?php //echo base_url() ?><!--asisst/web_asset/js/html2canvas.min.js" type="text/javascript"></script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>-->


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>-->

<!--<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>-->

<script src="<?php echo base_url() ?>asisst/web_asset/js/dom-to-image.min.js" />
<script>

    /*domtoimage.toPng(node)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            document.getElementById('previewImage').appendChild(img);
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });*/
</script>

<script>
    $(document).ready(function () {
        var node = document.getElementById('html-content-holder');

        var element = $("#html-content-holder"); // global variable
        var getCanvas; // global variable

        $("#btn-Preview-Image").on('click', function () {

          /*  html2canvas(document.querySelector("#html-content-holder")[0]).then(canvas => {
                document.getElementById('previewImage').appendChild(canvas)
            });*/
        /*    html2canvas(element, {
                onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });*/

            domtoimage.toPng(node)
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    // document.getElementById('previewImage').appendChild(img);
                    $('#previewImage').html(img);
                })
                .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                });
            $("#btn-Convert-Html2Image").show();
        });

        //getCanvas.toDataURL('image/jpeg');
        $("#btn-Convert-Html2Image").on('click', function () {
            /*domtoimage.toBlob(node)
                .then(function (blob) {
                    window.saveAs(blob, 'card.png');
                });*/
            domtoimage.toJpeg(node, { quality: 0.95 })
                .then(function (dataUrl) {
                    var link = document.createElement('a');
                    link.download = 'card.jpeg';
                    link.href = dataUrl;
                    link.click();
                });
            /*var imgageData = getCanvas.toDataURL("image/png");
            // Now browser starts downloading it instead of just showing it
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#btn-Convert-Html2Image").attr("download", "your_card_name.png").attr("href", newData);*/
        });

    });

</script>


<script>
    function get_namozg_select(this_value, sub_id) {
        if (this_value != "" && this_value != 0) {
            var dataString = "type_card=" + this_value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Web/get_namozg_select',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    var html = '<option value=" ">إختر </option>';
                    for (i = 0; i < JSONObject.length; i++) {
                        html += '<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].namozg_name + '</option>';
                    }
                    $("#" + sub_id).html(html);
                    // $("#"+sub_id).selectpicker("refresh");
                }
            });
        }
    }
</script>

<script>
    function get_complate_form(this_value, sub_id) {
        if (this_value != "" && this_value != 0) {
            var dataString = "id=" + this_value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Web/get_complate_form',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#" + sub_id).html(html);
                    draw_on_image(this_value);
                }
            });
        }
    }
</script>

<script>
    /*var url = "https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_1280.jpg";

    $(document).ready(function() {
        $("#html-content-holder").css("background-image", `url(${url})`);
             .css("width", 640)
             .css("height", 374);
    });*/

    function draw_on_image(this_value) {
        if (this_value != "" && this_value != 0) {
            var dataString = "id=" + this_value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Web/draw_on_image',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    // html-content-holder
                    var card_img = "<?php echo base_url() . 'uploads/public_relations/card_setting/'; ?>";
                    var urlString = card_img + JSONObject.namozg_image;

                    document.getElementById("output").src = urlString;
                    // console.log(urlString );
                    // $("#html-content-holder").css("background-image", `url(${urlString})`);


                    if (JSONObject.ehdaa_to == 1) {
                        $("#name_card_ehdaa_to").show();
                        $("#name_card_ehdaa_to").css("top", JSONObject.ehdaa_to_top + "%");
                        $("#name_card_ehdaa_to").css("right", JSONObject.ehdaa_to_right + "%");
                       /* $("#p_ehdaa_to").css("top", JSONObject.ehdaa_to_top + "%");
                        $("#p_ehdaa_to").css("right", JSONObject.ehdaa_to_right + "%");*/
                    } else {
                        $("#name_card_ehdaa_to").hide();
                    }

                    if (JSONObject.luqb == 1) {
                        $("#name_card_luqb").show();
                        $("#name_card_luqb").css("top", JSONObject.luqb_top + "%");
                        $("#name_card_luqb").css("right", JSONObject.luqb_right + "%");
                        /* $("#p_luqb").css("top", JSONObject.luqb_top + "%");
                        $("#p_luqb").css("right", JSONObject.luqb_right + "%");*/
                    } else {
                        $("#name_card_luqb").hide();
                    }
                    if (JSONObject.ehdaa_from == 1) {
                        $("#name_card_ehdaa_from").show();
                        $("#name_card_ehdaa_from").css("top", JSONObject.ehdaa_from_top + "%");
                        $("#name_card_ehdaa_from").css("right", JSONObject.ehdaa_from_right + "%");
                        /* $("#p_ehdaa_from").css("top", JSONObject.ehdaa_from_top + "%");
                        $("#p_ehdaa_from").css("right", JSONObject.ehdaa_from_right + "%");*/
                    } else {
                        $("#name_card_ehdaa_from").hide();
                    }

                    if (JSONObject.emp_name == 1) {
                        $("#name_card_emp_name").show();
                        $("#name_card_emp_name").css("top", JSONObject.emp_name_top + "%");
                        $("#name_card_emp_name").css("right", JSONObject.emp_name_right + "%");
                        /*$("#p_emp_name").css("top", JSONObject.emp_name_top + "%");
                        $("#p_emp_name").css("right", JSONObject.emp_name_right + "%");*/
                    } else {
                        $("#name_card_emp_name").hide();
                    }

                    if (JSONObject.tabr3_type == 1) {
                        $("#name_card_tabr3_type").show();
                        $("#name_card_tabr3_type").css("top", JSONObject.tabr3_type_top + "%");
                        $("#name_card_tabr3_type").css("right", JSONObject.tabr3_type_rght + "%");
                        /* $("#p_tabr3_type").css("top", JSONObject.tabr3_type_top + "%");
                        $("#p_tabr3_type").css("right", JSONObject.tabr3_type_rght + "%");*/
                    } else {
                        $("#name_card_tabr3_type").hide();
                    }
                    // document.getElementById('html-content-holder').style.backgroundImage='url('+card_img+JSONObject.namozg_image+')';

                }
            });
        }
    }
</script>

<script>

    function get_make_design(type) {

        var dataString = "id=" + this_value;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>Web/draw_on_image',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                // html-content-holder
                var card_img = "<?php echo base_url() . 'uploads/public_relations/card_setting/'; ?>";
                var urlString = card_img + JSONObject.namozg_image;

                //document.getElementById("card_image").src = urlString;
                // console.log(urlString );
                $("#html-content-holder").css("background-image", `url(${urlString})`);
                // document.getElementById('html-content-holder').style.backgroundImage='url('+card_img+JSONObject.namozg_image+')';

            }
        });
    }
</script>




