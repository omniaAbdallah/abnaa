
<table id="example_a3da" class="table table-striped table-bordered ">
    <thead>
    <tr class="info">
        <th>#</th>
        <th>رقم العضوية</th>
        <th>إسم العضو</th>
        <th>الجوال</th>
        <th>الرد على الدعوة</th>
        <th>إرسال عبر الواتساب</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($all_members) && !empty($all_members)) {
        $s = 1;
        foreach ($all_members as $member) { ?>
            <tr>
                <td><?php echo $s ?></td>
                <td><?php echo $member->rkm_odwia_full ?></td>
                <td><?php echo $member->laqb_title . '/' . $member->name ?></td>
                <td><?php echo $member->jwal ?></td>
                <?php $action_dawa_arr = array('accept' => 'تم الموافقة', 'refuse' => "تم الرفض", 'wait' => "تأجيل الرد"); ?>
                <td>
                    <?php if (array_key_exists($member->action_dawa, $action_dawa_arr)) {
                        echo $action_dawa_arr[$member->action_dawa];
                    } else {
                        echo 'جاري';
                    } ?>
                </td>
                <td>
                    <a  class="btn  btn-xs"  data-toggle="modal" style="padding: 1px 5px;" title="ارسال"
                        onclick="get_member_send_whats(<?=$member->id?>,<?=$member->jwal?>);"  data-target="#send_data_whats">
                        <img  width="25" height="25"
                              src="https://kawccq-sa.org/asisst/web_asset/img/dedication/wp.png">

                    </a>
                </td>
            </tr>
            <?php $s++;
        }
    }; ?>


    </tbody>
</table>


<div class="modal fade " id="send_data_whats" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document" style="width:70%;">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">  ارسال عبر الواتس </h3>
            </div>
            <div class="modal-body ">
                <input type="hidden" name="message_id" id="message_id"/>
                <input type="hidden" name="contact_mob" id="contact_mob"/>
                <div id="">
                    <!--------------------------------------------------->
                    <div class="form-group">

                    </div>
                    <?php
                    $mes = 'السلام عليكم ورحمة الله وبركاته/' .' '.'تسر  الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)  أن تتواصل مع حضراتكم..'
                    ?>

                    <input type="text" id="message_header" class="form-control" name="message_header" value="<?= $mes ?>" >
                    <label class="label">الرسالة</label>

                    <textarea style="width: 100%;" placeholder="اكتب نص الرساله هناااا" name="message_whats" id="message_whats" ></textarea>
                    <!------------------------------------------------------------------------------------------->
                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" style="float: left;" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="button" formtarget="_blank" style="float: right;" onclick="send_sms_whats();"  class="btn btn-success" >
                    <li class="fa fa-envelope-o"> ارسال</li></li></button>
            </div>

        </div>
    </div>
</div>


<script>
    function send_sms_whats()
    {
        var message_header  =$('#message_header').val();
        var message_whats=$('#message_whats').val();

        var contact_mob = '966'+$('#contact_mob').val();
        //  var contact_mob = '966'+'543629615';
        var full_message = message_header+message_whats ;
        if ($.trim($('#message_whats').val()).length < 1){
            swal({
                title:"من فضلك ادخل نص الرساله !",
                type:"warning" ,
                confirmButtonText:"تم"
            });
        }
        else {

            var link="https://web.whatsapp.com/send?phone="+contact_mob+"&text="+full_message+"&source&data";
            if (window.showModalDialog){
                window.showModalDialog(link,"popup","dialogWidth:600px;dialogHeight:600px");
            }else{
                window.open(link,"name","height=600,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes");
            }
            $('#send_data_whats').modal('hide');
            $('#message_whats').val('');
            $('#contact_mob').val('');
        }

    }
</script>

<script>
    function get_member_send_whats(valu,contact_mob)
    {
        $('#message_id').val(valu);
        $('#contact_mob').val(contact_mob);
    }
</script>

<script>

    $('#example_a3da').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            // {
            //     extend: "pdfHtml5",
            //     orientation: 'landscape'
            // },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );

</script>