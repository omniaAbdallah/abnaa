<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style22.css">
<style type="text/css">

    .fa-print {
        padding: 6px 9px;
        font-size: 17px;
        /*margin: 3px;*/
        margin: -27px;
        margin-left: auto;
        line-height: 1.5;
        float: left;
        background-color: #b30dae;
        color: #fff;
        /* border-radius: 2px; */
        border-radius: 11px;
    }
</style>

<div class="col-xs-12 no-padding" >
    <div class="panel panel-default" style="height: 45px;">
        <!--<div class="panel-heading panel-title"><?=$title;?></div>-->
        <div class="panel-heading">
            <div class="panel-title">
                <h4> الموظفيين</h4>
            </div>

            <a target="_blank" href="<?=base_url()?>human_resources/Structure/print_result/1"  >
                <i class="fa fa-print" aria-hidden="true"></i> </a>
            <!--            <a href="#" onclick="print_s();" >-->
            <!--                <i class="fa fa-print" aria-hidden="true"></i> </a>-->
        </div>
        <div class="panel-body"  >
            <div class="about-boxes" id="about-boxes">
                <div class="tabs-bord">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Tab panes -->
                                <div class="tab-content tabs">
                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                        <?php
                                        if (isset($tree) && $tree != null) {
                                            //echo "???????<pre>";
                                            //print_r($tree);
                                            //echo "???????</pre>";
                                            buildTree($tree);
                                        }
                                        ?>
                                        <?php
                                        function buildTree($tree)
                                        {
                                            ?>
                                            <div class="row centered">
                                                <div class="col-md-12 col-md-offset-0">
                                                    <?php foreach ($tree as $record) { ?>
                                                        <div class="col-md-3 col-sm-3 "><!--centered-->
                                                            <div class="our-team fadeInDown animated delay-1s" >
                                                                <?php  if (!empty($record->emp_Edara)){?>
                                                                    <div class="pic">
                                                                        <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$record->emp_Edara[0]->personal_photo?>"
                                                                             onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a  href="#" data-toggle="modal" data-target="#modal_employees"
                                                                            style="color: #1288cd;" onclick="get_all_employees(<?=$record->emp_Edara[0]->qsm_id?>);">
                                                                            <span class="fa fa-users"></span> أسماء الموظفيين
                                                                        </a>
                                                                        <h3 class="title"><?php  echo 'الأستاذ/ة' ." : ". $record->emp_Edara[0]->employee; ?>
                                                                        </h3>

                                                                        <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $record->emp_Edara[0]->qsm_n; ?></h6>
                                                                        <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$record->emp_Edara[0]->tahwela_rkm?></h6>
                                                                        <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$record->emp_Edara[0]->email?></h6>

                                                                        <?php if (isset($record->subs)) { ?>
                                                                            <div id="accordion" data-toggle="collapse">
                                                                                <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$record->code?>">
                                                                                    <span class="fa fa-angle-down"></span>
                                                                                </a>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php }else{ ?>
                                                                    <div class="pic">
                                                                        <img title="" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="">
                                                                    </div>
                                                                    <div class="team-content">

                                                                        <h3 class="title"> غير محدد</h3>
                                                                        <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?=$record->name?></h6>
                                                                        <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i></h6>
                                                                        <h6 class="dawra-style"><i class="fa fa-envelope"></i></h6>
                                                                        <?php if (isset($record->subs)) { ?>
                                                                            <div id="accordion<?=$record->code?>" data-toggle="collapse">
                                                                                <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$record->code?>">
                                                                                    <span class="fa fa-angle-down"></span>
                                                                                </a>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                        <?php
                                                        if (isset($record->subs)) {
                                                            sub_buildTree($record->code, $record->subs);
                                                            // buildTree($record->subs);
                                                        }
                                                        ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                        <?php
                                        function sub_buildTree($code,$tree)
                                        {
                                            ?>
                                            <div id="collapse<?=$code?>" class="panel-collapse collapse">
                                                <div class="row">
                                                    <div class="col-md-12 col-md-offset-0">
                                                        <?php foreach ($tree as $record) { ?>
                                                            <div class="col-md-3 col-sm-6 ">
                                                                <div class="our-team fadeInDown animated delay-1s ">
                                                                    <?php  if (!empty($record->emp_Edara)){?>
                                                                        <div class="pic">
                                                                            <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$record->emp_Edara[0]->personal_photo?>"
                                                                                 onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                                        </div>
                                                                        <div class="team-content">
                                                                            <a  href="#" data-toggle="modal" data-target="#modal_employees"
                                                                                style="color: #1288cd;" onclick="get_all_employees(<?=$record->emp_Edara[0]->qsm_id?>);">
                                                                                <span class="fa fa-users"></span> أسماء الموظفيين
                                                                            </a>
                                                                            <h3 class="title"><?php  echo 'الأستاذ/ة' ." : ". $record->emp_Edara[0]->employee; ?>
                                                                            </h3>

                                                                            <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $record->emp_Edara[0]->qsm_n; ?></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$record->emp_Edara[0]->tahwela_rkm?></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$record->emp_Edara[0]->email?></h6>

                                                                            <?php if (isset($record->subs)) { ?>
                                                                                <div id="accordion<?=$record->code?>" data-toggle="collapse">
                                                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion<?=$code?>" href="#collapse<?=$record->code?>">
                                                                                        <span class="fa fa-angle-down"></span>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>

                                                                    <?php }else{ ?>
                                                                        <div class="pic">
                                                                            <img title="" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="">
                                                                        </div>
                                                                        <div class="team-content">

                                                                            <h3 class="title"> غير محدد</h3>
                                                                            <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?=$record->name?></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-envelope"></i></h6>
                                                                            <?php if (isset($record->subs)) { ?>
                                                                                <div id="accordion<?=$record->code?>" data-toggle="collapse">
                                                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion<?=$code?>" href="#collapse<?=$record->code?>">
                                                                                        <span class="fa fa-angle-down"></span>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if (isset($record->subs)) {
                                                                sub_buildTree($record->code, $record->subs);
                                                                // buildTree($record->subs);
                                                            }
                                                            ?>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
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


<div class="modal fade" id="modal_employees" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">أسماء الموظفين</h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_emp"></div>
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
    /*function get_all_employees(qsm_id){

        $.ajax({
            url: "<?php echo base_url();?>human_resources/Structure/get_all_employees",
            type: 'post',
            data: {qsm_id: qsm_id},
            beforeSend: function () {
                //  $('#past').show();
                $('#myDiv_emp').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_emp').html(d);
            }
        });
    }*/


    function get_all_employees(qsm_id) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $('#myDiv_emp').html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/Structure/get_all_employees/'+qsm_id,

            aoColumns: [
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

            colReorder: true,
            destroy: true

        });
    }


</script>

