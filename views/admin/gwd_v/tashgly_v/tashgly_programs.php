<!------ table -------->
<style> 
.whitespaces {
        white-space: pre-wrap;
    }
    
    
    
    </style>  
<!-- details -->
<div class="col-xs-12 no-padding">
                   <div class="col-sm-12 col-xs-12">
                        <table class="table  table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <tr>
                                <th style="width: 110px">اسم الخطة </th>
                                <td>
                                  <span class="label" style="background-color: #32e26b"> 
                                  <?= $get_all->pln_name ?>
                             </span>
                               </td>
                               <th>تاريخ البداية </th>
                                <td><?= $get_all->pln_from_date ?> </td>
                            </tr>
                            
                            <tr>
                                <th> الخطة التشغيلية </th>
                                <td><?= $get_all->strategy_pln_name ?></td>
                                <th>تاريخ النهاية </th>
                                <td><?= $get_all->pln_to_date ?> </td>
                                 
                            </tr>
                            <tr>
                            <th>  مراجع الخطة</th>
                                <td> <span class="label" style="background-color: #32e26b"><?= $get_all->pln_reviser_name ?></span></td>
                                <th>معتمد الخطة</th>
                                <td> <span class="label" style="background-color: #ff8080"><?= $get_all->pln_suspender_name ?></span></td>
                           
                            </tr>
                            </tbody>
                        </table>
                </div>
	</div>
    <!-- details -->
    <div class="col-xs-12 no-padding">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
<!-- 
            <div class="panel-heading">

                <h3 class="panel-title">برامج الخطط التشغلية </h3>

            </div> -->
            <div class="panel-body" >

                <div class="col-md-12 no-padding">
                <table id="js_table_customer" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                        <thead>

                        <tr class="info">

                            <th class="text-center" style="width: 53px;">
                                <button type="button" data-toggle="modal" data-target="#Modal_strategy"
                                        onclick="load_add_tashgly_program(<?=$plan_id?>);"
                                        class="btn btn-success btn-next" style="float: right;">
                                    <i class="fa fa-plus"></i>إضافه برنامج للخطة التشغلية</button></th>


                            <th class="text-center">  البرنامج</th>
                            <th>  وصف البرنامج</th>
                            <th class="text-center">القيم المستهدفة والمتحققة</th>
                            <th class="text-center">الاجراءات</th>

                        </tr>

                        </thead>
                    </table>



                </div>

            </div>

        </div>

    </div>

<div class="modal fade" id="Modal_strategy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header">إضافه برنامج للخطة التشغلية  </h4>
            </div>
            <div class="modal-body">
                <div id="add_strategy_body">
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <input type="hidden" name="id" id="id" >
                <button type="button" onclick="save_program(<?=$plan_id?>);"
                        class="btn btn-labeled btn-success"
                        name="saves" id="saves" value="save" >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>    إضافه </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
                            class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>



            </div>
        </div>
    </div>
</div>

<!----- end table ------>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php

//echo $customer_js;

?>
<script type="text/javascript">
    $(document).ready(function() {

        load_page_program(<?=$plan_id?>);
    });
</script>
<script>
    function load_page_program(plan_id){

        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax":
            {
                "url":'<?php echo base_url(); ?>gwd/Tashgly/data_program',
                "type":"Post",
                "data":{
                    "plan_id":plan_id
                }
                
            }
            
             ,



            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }

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
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy:true


        });

    }

    function load_add_tashgly_program(pln_id) {
        $('#modal_header').text('إضافه برنامج للخطة التشغلية');
        $('#saves').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> إضافه ");

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/Tashgly/load_add_tashgly_program",
            data:{pln_id:pln_id},
            beforeSend: function () {
                $('#add_strategy_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function(d) {
                $('#add_strategy_body').html(d);
            }
        });
    }

    function get_tashgly_program(id,pln_id) {

        $("#Modal_strategy").modal('show');
        $('#modal_header').text(' تعديل برنامج للخطة التشغلية ');
        // $('#saves').val('تعديل');
        $('#saves').html("<span class=\"btn-label\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></span> تعديل ");
		
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gwd/Tashgly/load_add_tashgly_program",
            data:{id:id,pln_id:pln_id},
            beforeSend: function() {
                $('#add_strategy_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(d) {
                $('#add_strategy_body').html(d);
            }
        });

    }
    function delete_tashgly_program(id,pln_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Tashgly/delete_tashgly_program',
            data: {id: id,pln_id:pln_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                load_page_program(pln_id);
                //window.location.reload();

            }
        });

    }


</script>



