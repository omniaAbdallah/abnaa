
<?php 

$this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 

?>
<div class="col-xs-12 no-padding">
    <div class="col-md-2 padding-4">
        <?php //main_page
        $this->load->view('admin/maham_mowazf_view/t3mem/main_tabs');
        ?>
    </div>
    <div class="col-md-10 padding-4" id="page_content">
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        <?php if(isset($notifi) && !empty($notifi)){
       /* if (($notifi == 1)){ */?>
        get_my_emails('page_content','message_details',<?= $notifi ?>,1);
        /*get_my_emails('page_content', 'my_emails');*/
        <?php /*}elseif (($notifi == 2)) { ?>
        get_my_emails('page_content', 'my_sent_emails');
        <?php }*/
        } else{ ?>
      get_my_emails('page_content','my_emails')
        <?php } ?>
    });
</script>
<script>
    function get_my_emails(div_id, method, id, type) {
        console.log("id :: " + id);
        if (id) {
            if (!type) {
                type = 2;
            }
      
            var url_ajex = "<?php echo base_url();?>maham_mowazf/t3mem/Requestes/" + method + '/' + id + '/' + type
        } else {
            var url_ajex = "<?php echo base_url();?>maham_mowazf/t3mem/Requestes/" + method
        }
        $.ajax({
            type: 'get',
            url: url_ajex,
            beforeSend: function () {
                $('#' + div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#' + div_id).html(d);
                /*
                                $('.dropdown-toggle').dropdown();
                */
            }
        });
    }
</script>


<script>
    function get_all_count() {

        $.ajax({
            type: 'get',
            url: '<?php echo base_url()?>maham_mowazf/t3mem/Requestes/get_all_count',
            dataType: 'html',
            cache: false,
            success: function (response) {
                var all_count=JSON.parse(response);
                $('#ward_count').html(all_count.ward_count);
                $('#ward_adv_count').html(all_count.ward_adv_count);
                $('#started_count').html(all_count.started_count);
            }
        });
    }
  

</script>