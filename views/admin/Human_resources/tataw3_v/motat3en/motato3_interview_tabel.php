<style>
    .latest_notification .nav-tabs > li > a {
        margin-left: 10px;
    }

    .latest_notification .badge {
        position: absolute;
        top: 3px;
        left: -7px;
    }

    .latest_notification .btn-group > .btn {
        height: 22px;
        line-height: 10px;
    }

    .active .badge {
        color: #ffffff !important;
    }

    .panel-footer {
        display: inline-block;
        width: 100%;
    }

    .detailswork span.label {
        width: 100px;
    }

    .detailswork a {
        font-size: 16px;
    }

    .detailswork p {
        font-size: 16px;
    }

    .work-touchpoint-date .month {
        font-size: 10px;
        background-color: #fcb632;
    }

    .panel-body {
        border: 1px solid #eee;
    }
</style>

<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>
        <div class="panel-body">


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">


                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="dash_tab1">

                            <div class="col-xs-12 no-padding">
                                <?php if (isset($interview) && $interview != null){ ?>
                                <table id="" class="example table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th>رقم المقابله</th>
                                        <th>الفرصة التطوعية</th>
                                        <th>اسم المتقدم</th>
                                        
                                        <th> القائم بالتسجيل</th>
                                        <th>  التفاصيل</th>
                                        <th>الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr>
                                        <td><?=1?></td>
                                        <td><?= $interview->id ?></td>
                                        <td><?php 
                                        
                                        if(isset($foras)&&!empty($foras))
                                        {
                                        
                                       echo $foras->forsa_name; }?></td>
                                        
                                        <td><?php
                                        if(isset($vol_name)&&!empty($vol_name))
                                        {
                                        echo $vol_name->name; }?></td>
                                       
                                      

                                        
                                        <td><?= $interview->publisher_n ?></td>
                                        <td> <a href="#modal_details" data-toggle="modal"
                                                           onclick="get_details(<?=$interview->motatw3_id_fk; ?>)"> <i
                                                                    class=" fa fa-eye"></i></a> </td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning">إجراءات</button>
                                                <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
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
                                                                    window.location="<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/interview_volunteer/<?php echo $interview->motatw3_id_fk; ?>";
                                                                    });'>
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a>
                                                        </li>
                                                        <!-- <li><a href="#modal_details" data-toggle="modal"
                                                           onclick="get_details(<?=$interview->motatw3_id_fk; ?>)"> <i
                                                                    class=" fa fa-eye"></i>تفاصيل</a></li> -->
                                                            
                                                        <li> <a onclick="print_card(<?= $interview->motatw3_id_fk; ?>)" title="طباعه"><i
                                                            class="fa fa-print"></i>طباعة</a>
                                                        </li>   
                                                   
                                              
                                                       


                                                </ul>
                                            </div>


                                        </td>
                                    </tr>
                                                           
                                    <!--  -->
                                   
                            </tbody>
                            </table>
                            <?php } else { ?>
                                <div class="alert alert-danger">لا توجد طلبات واردة</div>
                            <?php } ?>
                        </div>


                       


                </div>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">تفاصيل </h4>
                </div>
                <div class="modal-body" id="details"></div>
                <div class="modal-footer" style="display: inline-block;width: 100%">

                    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
<script>
    function print_card(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/tataw3/Tataw3_c/print_card'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script> 
<script>
        function get_details(valu) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/tataw3/Tataw3_c/get_details_interview",
                data: {rkm: valu},
                beforeSend: function () {
                    $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {

                    $('#details').html(d);

                }
            });
        }
    </script>
    