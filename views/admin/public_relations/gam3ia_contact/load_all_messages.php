<?php
if (isset($records)&& !empty($records)){
    $x=1;
    ?>
    <div class="col-xs-12" id="main_content">
        <table id="examplee" class="table  table-bordered table-striped table-hover">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th> نوع التواصل</th>
                <th>  اسم المرسل</th>
                <th>  تاريخ الارسال</th>
                <th>    وقت الارسال</th>
                <th>   نص الرساله</th>
                <th>الاجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($records as $row){
                ?>
                <tr>
                    <td><?= $x++?></td>
                   <!-- <td>
                        <?php /*
                        if (!empty($row->contact_type_n)){
                            echo $row->contact_type_n;
                        }
                        */?>

                    </td>-->
                    <td>
                         <span style="background-color: <?php if (!empty($row->contact_type_color)){ echo $row->contact_type_color;}?>">
                                         <?php
                                         if (!empty($row->contact_type_n)){
                                             echo $row->contact_type_n;
                                         }
                                         ?>
                                    </span>

                    </td>
                    <td>
                        <?php
                        if (!empty($row->publisher_name)){
                            echo $row->publisher_name;
                        }
                        ?>

                    </td>
                    <td>
                        <?php
                        if (!empty($row->date_ar)){
                            echo $row->date_ar;
                        }
                        ?>

                    </td>
                    <td>
                        <?php
                        if (!empty($row->time)){
                            echo $row->time;
                        }
                        ?>

                    </td>

                    <td>
                        <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $row->id?>);">
                            <i class="fa fa-list "></i></a>
                    </td>
                    <td>
                        <a  class="btn  btn-xs" target="_blank" data-toggle="modal" style="padding: 1px 5px;" title="ارسال"
                            onclick="get_member_send_whats(<?=$row->id?>,'<?= $row->mother_mob?>');"  data-target="#send_data_whats">
                            <img  width="25" height="25"
                                  src="https://kawccq-sa.org/asisst/web_asset/img/dedication/wp.png">

                        </a>
                        <a data-toggle="modal" data-target="#egraaModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="$('#row_id').val(<?= $row->id?>)">
                            <i class="fa fa-list "></i> اجراء علي الرسالة</a>


                        <a href="#" onclick='swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: false
                                },
                                function(){
                                swal("تم الحذف!", "", "success");
                                window.location="<?= base_url()."public_relations/gam3ia_contact/Contact/delete_message/".$row->id?>";
                                });'>
                            <i class="fa fa-trash"> </i></a>
                    </td>
                   <!-- <td>
                        <a data-toggle="modal" data-target="#egraaModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="$('#row_id').val(<?= $row->id?>)">
                            <i class="fa fa-list "></i> اجراء علي الرسالة</a>


                        <a href="#" onclick='swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: false
                            },
                            function(){
                            swal("تم الحذف!", "", "success");
                            window.location="<?= base_url()."aqr/akarat/Akarat/delete_akar/" . $row->id?>";
                            });'>
                            <i class="fa fa-trash"> </i></a>
                    </td>-->

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
} else{
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
    <?php
}
?>

<script>

    $('#examplee').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
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
        "bDestroy": true
    } );



</script>


