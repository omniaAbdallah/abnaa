<style>
    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }
    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }
</style>
<div class="">
    <div class="panel-heading">
   
    </div>
    <!--display:block;text-align: center-->
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" onclick="load_tab_data('tab1');" data-toggle="tab">
            <i class="fa fa-users  " style=""></i> هيكل الموظفين </a></li>
            <li><a href="#tab2" onclick="load_tab_data('tab2');" data-toggle="tab">
            <i class="fa fa-tasks  " style=""></i> هيكل الإدارات </a></li>
            <li><a href="#tab3" data-toggle="tab"><i class="fa fa-paperclip" 
            style=""></i> ملف الهيكل التنظيمي المعتمد  </a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade in active" id="tab1">
                <?php
//                $result_1['manager'] = $manager;
//                $result_1['assistant_manager'] = $assistant_manager;
//                $result_1['all'] = $all;
                //$result_1['tree'] = $tree;
                //$this->load->view('admin/Human_resources/structure/search_result_1', $result_1);
                ?>
            </div>

            <div class="tab-pane fade " id="tab2">

                <?php
//                $result_2['manager'] = $manager;
//                $result_2['assistant_manager'] = $assistant_manager;
//                $result_2['all'] = $all;

                //$result_2['tree'] = $tree;
                //$this->load->view('admin/Human_resources/structure/search_result_2', $result_2);
                ?>
            </div>

            <div class="tab-pane fade " id="tab3">
                <iframe src="<?php echo base_url(); ?>human_resources/Structure/pdf/<?=$pdfname;?>" style="width: 100%; height:  640px;" frameborder="0">
                </iframe>
            </div>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        load_tab_data('tab1');
    });
</script>
<script>
    function load_tab_data(div_id) {
        $.ajax({
            url: "<?php echo base_url();?>human_resources/Structure/load_tab_data",
            type: 'post',
            data: {type: div_id},
            beforeSend: function () {
                //  $('#past').show();
                $('#'+div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                if(div_id == 'tab1'){ $('#tab2').html(''); }
                else if(div_id == 'tab2'){ $('#tab1').html(''); }
                $('#'+div_id).html(d);
            }
        });
    }
</script>