<?php //main_page
$this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 
        ?>
        <br>
<div class="col-xs-12 no-padding">
    <div class="col-md-2 padding-4">
        <?php //main_page
        $this->load->view('admin/all_secretary_view/email/main_tabs');
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
        get_emails('page_content');
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
            var url_ajex = "<?php echo base_url();?>all_secretary/email/Requestes/" + method + '/' + id + '/' + type
        } else {
            var url_ajex = "<?php echo base_url();?>all_secretary/email/Requestes/" + method
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
    function make_star(email_id, star_value, type) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Requestes/make_star',
            data: {id: email_id, star_value: star_value, type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('#satr_' + email_id).toggleClass('inbox-started');
                get_all_count();

            }
        });
    }
</script>

<script>
    function get_all_count() {

        $.ajax({
            type: 'get',
            url: '<?php echo base_url()?>all_secretary/email/Requestes/get_all_count',
            dataType: 'html',
            cache: false,
            success: function (response) {
                var all_count=JSON.parse(response);
                $('#ward_count').html(all_count.ward_count);
                $('#deleted_count').html(all_count.deleted_count);
                $('#started_count').html(all_count.started_count);
                $('#send_count').html(all_count.send_count);
            }
        });
    }
    function update_seen() {
        $.ajax({
            type: 'get',
            url: '<?php echo base_url()?>all_secretary/email/Requestes/update_seen',
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('.unseen').hide('slow');

            }
        });
    }

</script>