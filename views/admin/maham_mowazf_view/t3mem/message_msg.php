<style>
    /*********** upload malti img ****/
    .block {
        background-color: rgba(١٠٨, ١٠٨, ١٠٨, 0.5);
        margin: 0 auto;
        margin-bottom: 30px;
        text-align: center;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    label.button {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background-color: #c72530;
        border: 1px solid #eee;
        color: #fff;
        padding: 7px 15px;
        margin: 5px 0;
        display: inline-block;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    label.button:hover {
        color: #c72530;
        background-color: #fff;
        border: 1px solid #ccc;
        cursor: pointer;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    input#images {
        display: none;
    }

    #multiple-file-preview {
        border: 1px solid #eee;
        margin-top: 10px;
        padding: 10px;
    }

    #files1 {
        border: 1px solid #eee;
        margin-top: 10px;
        padding: 10px;
    }

    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        min-height: 110px;
    }

    #sortable li {
        margin: 3px 3px 3px 0;
        float: left;
        width: 100px;
        height: 104px;
        text-align: center;
        position: relative;
        background-color: #FFFFFF;
    }

    #sortable li,
    #sortable li img {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    #sortable img {
        height: 104px;
    }

    .closebtn {
        color: #c72530;
        font-weight: bold;
        position: absolute;
        right: -1px;
        border-radius: 4px;
        padding: 0px 5px 0px 5px;
        background-color: #fff;
    }

    .closebtn h6 {
        font-size: 20px;
        margin: 0;
    }

    .r-img-message h2 {
        padding-top: 4px;
    }

    .r-img-message img {
        width: 100%;
        height: 75px;
        border-radius: 5px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .unread {
        background: #ccc;
    }

    .table-inbox tr.unread td {
        font-weight: 600;
        background: #ccc;
    }
</style>
<aside class="lg-side">
    <div class="inbox-head">
        <h3><?= $title ?></h3>
        <form action="#" class="pull-right position">
            <div class="input-append">
                <input type="text" class="sr-input" id="search_text" placeholder="بحث" oninput="make_search()">
                <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <div class="inbox-body">
        
        <div id="inbox-body" style="height: 600px; overflow-y: scroll">

            <table class="table table-inbox table-hover">
                <tbody id="table_serach">
                <?php $important_degree_color = array('label-danger', 'label-warning', 'label-primary');
              
                  $important_degree_title = array('هام جدا', "هام", "عادي");
                if (isset($my_t3mem) && !empty($my_t3mem)) {
                    foreach ($my_t3mem as $row) {
                       
                        if ($row->seen == 0) {
                            $unread = 'unread';
                        } else {
                            $unread = 'read';
                        }
                        
                        ?>
                        <tr class="<?= $unread ?>" title="<?= $row->emp_name; ?> - <?= $row->t3mem_data->subject; ?>"
                            data-id="<?= $row->id ?>">
                           
                            <td onclick="check_t3mem(<?= $row->id ?>)"
                                class="view-message  dont-show">
                                <?php if (isset($row->employee_photo) && !empty($row->employee_photo)) { ?>
                                    <img style=" padding: 2px; border-radius: 100px; border: 2px solid #eee;  height: 35px; width: 36px;"
                                         src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"
                                         class="border-green hidden-xs hidden-sm" alt="">
                                <?php } else { ?>
                                    <img style=" padding: 2px;  border-radius: 100px; border: 2px solid #eee;height: 35px; width: 36px;"
                                         src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"
                                         class="border-green hidden-xs hidden-sm" alt="">
                                <?php } ?>
                                <?= $row->emp_name; ?>
                     
                            </td>
                            <td onclick="check_t3mem(<?= $row->id ?>)"
                                class="view-message "><?= $row->t3mem_data->subject; ?></td>
                            <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                            <td class="view-message  text-right">
                                <span class="label label-warning pull-right" style="color: black;"><i
                                            class="fa fa-calendar"
                                            aria-hidden="true"></i><?=  $row->t3mem_data->msg_date; ?></span>
                
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                <?php } else { ?>
                    <div class="alert alert-danger" id="text111" style="display:none; color: #BD000A; display:block;">
                        لا يوجد رسائل واردة
                    </div>
                <?php } ?>

                </tbody>
            </table>
            <div class="text-center" id="load_spainer" style="display: none">
                <div class='loader-img'>
                    <div class='bar1'></div>
                    <div class='bar2'></div>
                    <div class='bar3'></div>
                    <div class='bar4'></div>
                    <div class='bar5'></div>
                    <div class='bar6'></div>
                </div>
            </div>
        </div>

    </div>

</aside>
<div class="clearfix"></div>
<div id="result_adv"></div>
<script>
   

   

    function make_search() {
        var search = $('#search_text').val();
        var trs = $('#table_serach  tr');
        for (var i = 0; i < trs.length; i++) {
            var text = trs[i].title;
            console.warn("title ::" + text);
            if (trs[i].title.toUpperCase().indexOf(search) > -1) {
                trs[i].style.display = '';
            } else {
                trs[i].style.display = 'none';
            }
        }
    }

    var lastScrollTop = 0, delta = 1;
    $('#inbox-body').scroll(function () {
        var nowScrollTop = $(this).scrollTop();
        var heightScroll = $(this).height();
        var heighttable = $('#table_serach').height();

        if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
            if (nowScrollTop > lastScrollTop) {
                /*ACTION ON SCROLLING DOWN*/
                if ((heightScroll + nowScrollTop) == (heighttable + 1)) {
                    console.log('Reached the bottom!');
                    get_data_pagination();
                }
            } else {
                /* ACTION ON  SCROLLING UP*/
            }
            lastScrollTop = nowScrollTop;
        }
    });


   
</script>
<script>
    

function check_t3mem(id) {
    $.ajax({
        type: 'post',
          url:  "<?=base_url() . 'maham_mowazf/t3mem/T3mem_c/check_d3wa_msg'?>",
          data:{id:id},
        success: function(data) {
            if(data!='')
            {
                $("#result_adv").html(data);
				$(".modal-startup").modal('show');
            }
        }
    });
}
</script>