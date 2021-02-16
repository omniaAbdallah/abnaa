<style>
    .download-btn-text a {
        color: #fff;
        text-decoration: none;
    }
    .mbottom-20 {
        margin-bottom: 20px;
    }
    .top_icon_name {
        height: 80px;
        overflow: hidden;
        /* display: inline-block; */
        width: 100%;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #eee;
    }
    .reports .report_item .top_icon_name i {
        color: #ff0000;
        font-size: 35px;
        float: right;
        margin-left: 10px;
    }
    .download-btn-text {
        background-color: #95c11f;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
        color: #fff;
        display: inline-block;
        float: left;
        padding: 10px;
        width: 100%;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
    .panel-heading a:hover {
        color: #fff;
        /* background-color: #0c1e56; */
    }
</style>
<div class="col-md-12">
    <div class="panel panel-default" style="height: 650px">
        <div class="panel-heading panel-title"> التقارير المالية </div>
        <div class="panel-body">

            <div class="roundedBox">
                <div class="col-xs-12 no-padding">
                    <div class="stepwizard itab-2">
                        <div class="stepwizard-row setup-panel" data-active="1">
                            <div class="tab tab-1 stepwizard-step col-xs-4 no-padding active ">
                                <a href="#step-1" type="button" class="btn obj-tablink btn-default btn-warning">
                                    <span>الميزانيه <b class="badge">1</b></span></a>
                            </div>
                            <div class="tab tab-2  stepwizard-step col-xs-4 no-padding ">
                                <a href="#step-2" type="button" class="btn btn-default obj-tablink">
                                    <span>تقاريير رباعيه <b class="badge">2</b></span></a>
                            </div>
                            <div class="tab tab-3  stepwizard-step col-xs-4 no-padding ">
                                <a href="#step-3" type="button" class="btn btn-default obj-tablink">
                                    <span>التقاريير الماليه <b class="badge">3</b></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="setup-container">

                        <div class="setup-content" id="step-1">
                            <div class="form-group col-sm-12 col-xs-12 padding-4">
                                <?php
                                echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                ?>
                            </div>
                        </div>
                        <div class="setup-content" id="step-2">
                            <div class="form-group col-sm-12 col-xs-12 padding-4">
                                <?php
                                echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                ?>
                            </div>
                        </div>
                        <div class="setup-content" id="step-3">


                            <?php
                            $years = array_combine(range(date("Y"), 2012), range(date("Y"), 2012));
                            //print_r ($years);
                            ?>
                            <div class="form-group col-sm-3 col-xs-12 padding-4" style="">
                                <label class="label ">  العام </label>
                                <select name="year" class="form-control  " id="year"
                                        onchange="search()"
                                        data-validation="required" aria-required="true">
                                    <option value="0">-اختر-</option>
                                    <?php
                                    if (isset($years) && !empty($years)) {
                                        foreach ($years as $mag) {
                                            ?>
                                            <option
                                                    value="<?php echo $mag ?>"  ><?php echo $mag ?> </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <!--  -->
                            <div class="form-group col-sm-12 col-xs-12 padding-4" id="details">
                                <?php
                                echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                ?>
                            </div>
                        </div>
                        <!------------------------------------------------------------->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        /*********/
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPreviousBtn = $('.previousBtn'),
            SaveBtn = $('.save-btn');
        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);
            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-warning').addClass('btn-default');
                $item.addClass('btn-warning');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });
        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password']"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');
            /*$(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }*/
            if (isValid) {
                nextStepWizard.removeAttr('disabled').trigger('click');
                if (datactive < 3) {
                    datactive++;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }
            }
            //$(".stepwizard-row").append($moving_div);
        });
        allPreviousBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                previousStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');
            if (isValid) {
                previousStepWizard.removeAttr('disabled').trigger('click');
                if (datactive <= 3) {
                    datactive--;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }
            }
        });
        $(".setup-content input,.setup-content select").bind("keyup change", function (e) {
            var curStep = $(this).closest(".setup-content"),
                curInputs = curStep.find("input,input[type='text'],input[type='url'],select,input[type='number'],input[type='password']");
            if ($(this).val() != '') {
                $(this).parent().removeClass("has-error");
            } else {
                $(this).parent().addClass("has-error");
            }
        });
        $('div.setup-panel div a.btn-warning').trigger('click');
    });
</script>
<script>
    $(".itab-2").on("click mouseover mouseout", ".tab a", function (e) {
        switch (e.type) {
            case "mouseover": // -----------
                $(this).parent().addClass("hover");
                break;
            case "mouseout": // -----------
                $(this).parent().removeClass("hover");
                break;
            case "click": // -----------
                $(this).parent().addClass("active")
                    .siblings().removeClass("active");
                $(this).parent().parent().attr(
                    "data-active",
                    $(this).parent().index() + 1
                );
                break;
            default: // -----------
                break;
        }
    });
</script>

<script>
    $(document).ready(function () {

        <?php if (!empty($lastyear)){ ?>
            $('#year').val(<?=$lastyear?>);
            search();
        <?php } ?>
    });
</script>
<script>
    function search() {
        // $('#pop_rkm').text(rkm);
        var  row_id= $('#year').val();
        if(row_id !=0){
            $.ajax({
                url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_reports",
                type: 'post',
                data: {row_id: row_id},
                beforeSend: function () {
                    //  $('#past').show();
                    $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#details').html(d);
                }
            });
        }else{
            //   $('#past').hide();
            swal({
                    title: " برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>

