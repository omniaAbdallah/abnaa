
<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');


?>
<style>
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .tab-content {
        margin-top: 15px;
    }


</style>
<table id="js_table_customer"

       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>رقم الملف</th>
        <th>الفئة</th>
        <th>الاسم</th>
        <th>رقم الهوية /السجل</th>
        <th>رقم الجوال</th>
        <th>تسجيل عبر</th>
        <th> القائم بالتسجيل</th>
        <th>الإجراء</th>


    </tr>
    </thead>
</table>
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


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/data',



            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
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
            colReorder: true



        });
    });
</script>


<script>
    function get_details(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Tataw3_c/get_details",
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

<?php      $this->load->view('admin/requires/footer'); ?>
