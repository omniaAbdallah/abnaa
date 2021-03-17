<style>

    .dawa-img {
        position: relative;
    }

    .dawa-img img {
        max-width: 100%;
        /* width: 724px;
         height: 483px*/
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

    /*
    .text-box:before {
        content: '';
        display: inline-block;

        height: 79%;
        vertical-align: middle;
    }*/
    .containerBox .ehdaa_to {
        position: absolute;
        display: inline-block;
        font-size: 17px; /*or whatever you want*/
        color: #003c42;
        font-weight: bold;
    }

    .containerBox .ehdaa_from {
        position: absolute;
        display: inline-block;
        font-size: 17px; /*or whatever you want*/
        color: #003c42;
        font-weight: bold;
    }

    .containerBox .luqb {
        position: absolute;
        display: inline-block;
        font-size: 17px; /*or whatever you want*/
        color: #003c42;
        font-weight: bold;
    }

    .containerBox .emp_name {
        position: absolute;
        display: inline-block;
        font-size: 17px; /*or whatever you want*/
        color: #003c42;
        font-weight: bold;
    }

    .containerBox .tabr3_type {
        position: absolute;
        display: inline-block;
        font-size: 17px; /*or whatever you want*/
        color: #003c42;
        font-weight: bold;
    }

    .containerBox img {
        display: block;
        max-width: 100%;
        /*  height: auto;*/
    }
    
    label{
        color: red;
    }
</style>

<div class="col-xs-12">
    <div class="panel panel-bd  ">
        <!--<div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>-->
        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-8">
                    <?php echo form_open_multipart(base_url() . 'public_relations/website/card_setting/Card_setting') ?>
                    <div class="col-md-12">
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label ">نوع البطاقة</label>
                            <select name="type_card" id="type_card"
                                    class="form-control" data-validation="required" aria-required="true">
                                <option value="">إختر</option>
                                <?php $type_card_arr = array(1 => 'إهداء', 2 => 'إهداء تبرع  ', 3 => ' بطاقة تهنئة  ');
                                foreach ($type_card_arr as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"> <?php echo $value; ?></option>
                                    <?php
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 padding-4">
                            <label class="label">إسم النموذج </label>
                            <input type="text" class="form-control " data-validation="required" name="namozg_name"
                                   value="">
                        </div>
                       
                       <!-- <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label">لون خط </label>
                            <input class="jscolor" name="color" value="" style="height: 34px; width: 100%">

                        </div>-->
                      <!--  <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label">حجم الخط </label>
                            <button type="button" class="btn btn-success fzincrease" onclick="increase()">+</button>
                            <span id="quant" >17px</span>
                            <button type="button" class="btn btn-danger fzdecrease" onclick="decrease()">-</button>
                            <button type="button" class="btn btn-warning fzbold"><b>Bold</b></button>
                        </div>-->
                       
                       
                        <div class="col-xs-12 padding-4">
                       
                        <div class="form-group col-md-5 col-sm-12 padding-4">
                            <label class="label">صورة النموذج <span style="color: red;">( التأكد من أن إمتداد الصورة jpg فقط وليس jpeg  ) بحجم 357 *506</span></label>
                            <input type="file" class="form-control " data-validation="required"
                                   name="namozg_image" accept="image/*"
                                   onchange="loadFile(event)" value=">">
                        </div>
                         </div>
                        
                            <div class="col-xs-12 padding-4">
                              <div class="col-xs-6 padding-4">
                             
                                    <div class="form-group  col-md-12 col-xs-12 padding-4">
                                        <div class="check-style">
                                            <input type="checkbox" name="ehdaa_to" id="choose-ehdaa_to" value="1"
                                                   checked="checked" onchange="if (this.checked){
                                                $('.ehdaa_to').show();
                                             }else {$('.ehdaa_to').hide();}">
                                            <label for="choose-ehdaa_to"> إهداء إلى </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-6 padding-4">
                                        <label class="label ">أعلى - أسفل </label>
                                        <input type="number" name="ehdaa_to_top" value="79" id="padT1"
                                               oninput='$(".ehdaa_to").css("top", this.value + "%");'
                                               class="form-control" max="100">
                                    </div>
                                    <div class="form-group col-md-4  col-xs-6 padding-4">
                                        <label class="label">يمين - يسار</label>
                                        <input type="number" name="ehdaa_to_right" value="48" id="padR1"
                                               oninput='$(".ehdaa_to").css("right", this.value + "%");'
                                               class="form-control" max="100">
                                    </div>
                               
                                </div>
                                 <div class="col-xs-6 padding-4">
                                <div class="padding-4 ">
                                    <div class="form-group  col-md-12 col-xs-12 padding-4">
                                        <div class="check-style">
                                            <input type="checkbox" name="ehdaa_from" id="choose-ehdaa_from" value="1"
                                                   onchange="if (this.checked){
                                                $('.ehdaa_from').show();
                                             }else {$('.ehdaa_from').hide();}">
                                            <label for="choose-ehdaa_from"> إهداء من </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-6 padding-4">
                                        <label class="label ">أعلى - أسفل </label>
                                        <input type="number" name="ehdaa_from_top" value="0"
                                               oninput='$(".ehdaa_from").css("top", this.value + "%");'
                                               class="form-control" max="100">
                                    </div>
                                    <div class="form-group col-md-4  col-xs-6 padding-4">
                                        <label class="label">يمين - يسار</label>
                                        <input type="number" name="ehdaa_from_right" value="0"
                                               oninput='$(".ehdaa_from").css("right", this.value + "%");'
                                               class="form-control" max="100">
                                    </div>
                                </div>
                                 </div>
 <div class="col-xs-6 padding-4">
                                <div class="padding-4">
                                    <div class="form-group  col-md-12 col-xs-12 padding-4">
                                        <div class="check-style">
                                            <input type="checkbox" name="luqb" id="choose-luqb" value="1" onchange="if (this.checked){
                                                $('.luqb').show();
                                             }else {$('.luqb').hide();}">
                                            <label for="choose-luqb"> اللقب </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-6 padding-4">
                                        <label class="label ">أعلى - أسفل </label>
                                        <input type="number" name="luqb_top" value="0"
                                               oninput='$(".luqb").css("top", this.value + "%");' class="form-control">
                                    </div>
                                    <div class="form-group col-md-4  col-xs-6 padding-4">
                                        <label class="label">يمين - يسار</label>
                                        <input type="number" name="luqb_right" value="0"
                                               oninput='$(".luqb").css("right", this.value + "%");'
                                               class="form-control">
                                    </div>
                                </div>
                                 </div>
                                 <div class="col-xs-6 padding-4">
                                <div class="no-padding">
                                    <div class="form-group  col-md-12 col-xs-12 padding-4">
                                        <div class="check-style">
                                            <input type="checkbox" name="emp_name" id="choose-emp_name" value="1"
                                                   onchange="if (this.checked){
                                                $('.emp_name').show();
                                             }else {$('.emp_name').hide();}">
                                            <label for="choose-emp_name"> إسم الموظف </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-6 padding-4">
                                        <label class="label ">أعلى - أسفل </label>
                                        <input type="number" name="emp_name_top" value="0"
                                               oninput='$(".emp_name").css("top", this.value + "%");'
                                               class="form-control" max="100">
                                    </div>
                                    <div class="form-group col-md-4  col-xs-6 padding-4">
                                        <label class="label">يمين - يسار</label>
                                        <input type="number" name="emp_name_right" value="0"
                                               oninput='$(".emp_name").css("right", this.value + "%");'
                                               class="form-control" max="100">
                                    </div>
                                </div>
                                  </div>
                                
                                <div class="col-xs-6 padding-4" > 
                                <div class="">
                                    <div class="form-group  col-md-12 col-xs-12 padding-4">
                                        <div class="check-style">
                                            <input type="checkbox" name="tabr3_type" id="choose-tabr3_type" value="1"
                                                   onchange="if (this.checked){
                                                $('.tabr3_type').show();
                                             }else {$('.tabr3_type').hide();}">
                                            <label for="choose-tabr3_type"> قيمة التبرع </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-6 padding-4">
                                        <label class="label ">أعلى - أسفل </label>
                                        <input type="number" name="tabr3_type_top" value="0"
                                               oninput='$(".tabr3_type").css("top", this.value + "%");'
                                               class="form-control">
                                    </div>
                                    <div class="form-group col-md-4  col-xs-6 padding-4">
                                        <label class="label">يمين - يسار</label>
                                        <input type="number" name="tabr3_type_rght" value="0"
                                               oninput='$(".tabr3_type").css("right", this.value + "%");'
                                               class="form-control">
                                    </div>
                                </div>
                                </div>
                            </div>

                       
                    </div>
                    <div class="col-sm-12 text-center">
                        <input type="hidden" name="font" id="font" value="17">
                        <button type="submit" class="btn-success btn-labeled btn" name="save" value="1">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>
                    <?php  echo form_close()?>
                </div>
                <div class="col-md-4" style="height: 680px; overflow: scroll">
                    <div class="container-fluid">
                        <div class="col-xs-12 text-center">
                            <h6 style="font-size: 13px; color: red;">ما سيتم كتابته سيظهر هنا " يمكنك تحريكه "</h6>
                            <div class="dawa-img containerBox">
                                <div class="text-box">
                                    <h4 class="ehdaa_to font" style="top:79%; right: 48%;d">إهداء إلى </h4>
                                    <h4 class="ehdaa_from font" style="top:0%; right:0%; display: none">إهداء من</h4>
                                    <h4 class="luqb font" style="top:0%; right:0%; display: none">اللقب</h4>
                                    <h4 class="emp_name font" style="top:0%; right:0%; display: none">إسم الموظف</h4>
                                    <h4 class="tabr3_type font" style="top:0%; right:0%; display: none">قيمة التبرع</h4>
                                </div>
                                <img style="width: 356px;height: 506px;" id="output" src="<?= base_url() ?>asisst/admin_asset/img/card_seeting/card(1).png">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
if (isset($all_cards) && !empty($all_cards)) {
    $x = 1;
    ?>
    <div class="col-sm-12 col-xs-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h3 class="panel-title"><?= $title ?></h3>
            </div>
            <div class="panel-body" style="min-height: 300px;">
                <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>نوع البطاقة</th>
                        <th>إسم النموذج</th>
                        <th>صورة النموذج</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_cards as $row) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?php if (key_exists($row->type_card, $type_card_arr)) {
                                    echo $type_card_arr[$row->type_card];
                                } else {
                                    echo 'غير محدد';
                                } ?></td>
                            <td><?= $row->namozg_name ?></td>
                        <td>
                                <?php
                                if (!empty($row->namozg_image)) {
                                    ?>
                                    <script> var json_obj<?=$row->id?> = '<?=json_encode($row)?>';</script>
                                    <a data-toggle="modal" data-target="#myModal-view"
                                       onclick=" show_detailes(json_obj<?=$row->id?>);
                                               $('#img_perview').attr('src','<?= base_url() . "uploads/public_relations/card_setting/" . $row->namozg_image ?>')">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>

                                    <?php
                                } else {
                                    echo 'لا يوجد ';
                                }
                                ?>

                            </td>
                            <td>
                                <a href="#" onclick='swal({
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
                                        window.location="<?php echo base_url(); ?>public_relations/website/card_setting/Card_setting/delete_card/<?php echo base64_encode($row->id); ?>";
                                        });'>
                                    <i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
     <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true" style="font-size: 35px;color: red;font-weight: bold;">&times;</span>
                   </button>-->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-xs-12 text-center">
                            <div class="dawa-img containerBox">
                                <div class="text-box">
                                    <h4 class="ehdaa_to" id="ehdaa_to" style="top:0%; right: 0%;display: none">إهداء إلى </h4>
                                    <h4 id="ehdaa_from"  class="ehdaa_to" style="top:0%; right:0%; display: none">إهداء من</h4>
                                    <h4 id="luqb"  class="ehdaa_to" style="top:0%; right:0%; display: none">اللقب</h4>
                                    <h4 id="emp_name" class="ehdaa_to" style="top:0%; right:0%; display: none">إسم الموظف</h4>
                                    <h4 id="tabr3_type" class="ehdaa_to" style="top:0%; right:0%; display: none">قيمة التبرع</h4>
                                </div>
                                <img id="img_perview" src="<?= base_url() ?>asisst/admin_asset/img/card_seeting/card(1).png" style="width: 357px;height: 506px">
                            </div>

                        </div>
                    </div>

                    <!-- <img src="<?= base_url() . "uploads/public_relations/settings/" . $row->img ?>" width="100%">-->
                </div>
            </div>
        </div>
    </div>
    <!-- modal view -->
    <?php
}
?>

<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>
    function show_detailes(obj) {
        console.log("detailes :: " +obj);
        var data= JSON.parse(obj);
        if (data.ehdaa_to == 1){
            $("#ehdaa_to").show();
        }else {
            $("#ehdaa_to").hide();
        }

        if (data.luqb == 1){
            $("#luqb").show();
        }else {
            $("#luqb").hide();
        }
        if (data.ehdaa_from == 1){
            $("#ehdaa_from").show();
        } else {
            $("#ehdaa_from").hide();
        }
        if (data.emp_name == 1){
            $("#emp_name").show();
        } else {
            $("#emp_name").hide();
        }
        if (data.tabr3_type == 1){
            $("#tabr3_type").show();
        }else {
            $("#tabr3_type").hide();
        }
        $("#ehdaa_to").css("top",data.ehdaa_to_top + "%");
        $("#ehdaa_to").css("right",data.ehdaa_to_right + "%");

        $("#luqb").css("top",data.luqb_top + "%");
        $("#luqb").css("right",data.luqb_right + "%");

        $("#ehdaa_from").css("top",data.ehdaa_from_top + "%");
        $("#ehdaa_from").css("right",data.ehdaa_from_right + "%");

        $("#emp_name").css("top",data.emp_name_top + "%");
        $("#emp_name").css("right",data.emp_name_right + "%");

        $("#tabr3_type").css("top", data.tabr3_type_top + "%");
        $("#tabr3_type").css("right", data.tabr3_type_rght + "%");


    }
</script>
<script>

    function increase() {
        var fontSize = parseInt($(".font").css("font-size"));
        fontSize = fontSize + 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.font').css({'font-size': fontSize});
    }   function decrease() {
        var fontSize = parseInt($(".font").css("font-size"));
        fontSize = fontSize + 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.font').css({'font-size': fontSize});
    }
</script>
