<style>

.box {

    position: relative;

    border-radius: 3px;

    background: #ffffff;

    border-top: 3px solid #d2d6de;

    margin-bottom: 20px;

    width: 100%;

    box-shadow: 0 1px 1px rgba(0,0,0,0.1);

}

.box-header {

    color: #444;

    display: block;

    padding: 10px;

    position: relative;

}

.box-header.with-border {

    border-bottom: 1px solid #f4f4f4;

}

.box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {

    display: inline-block;

    font-size: 18px;

    margin: 0;

    line-height: 1;

}

.box-body {

    border-top-left-radius: 0;

    border-top-right-radius: 0;

    border-bottom-right-radius: 3px;

    border-bottom-left-radius: 3px;

    padding: 10px;

}

.box-footer {

    border-top-left-radius: 0;

    border-top-right-radius: 0;

    border-bottom-right-radius: 3px;

    border-bottom-left-radius: 3px;

    border-top: 1px solid #f4f4f4;

    padding: 10px;

    background-color: #fff;

}

.table-bordered {

    border: 1px solid #f4f4f4;

}

table {

    background-color: transparent;

}

.table {

    width: 100%;

    max-width: 100%;

    margin-bottom: 20px;

}

.table thead th {

    vertical-align: bottom;

    border-bottom: 2px solid #dee2e6;

}

.table-bordered thead td, .table-bordered thead th {

    border-bottom-width: 2px;

}

.table td, .table th {

    padding: .75rem;

    vertical-align: top;

    border-top: 1px solid #dee2e6;

}

.badge {

    display: inline-block;

    min-width: 10px;

    padding: 3px 7px;

    font-size: 12px;

    font-weight: 700;

    line-height: 1;

    color: #fff;

    text-align: center;

    white-space: nowrap;

    vertical-align: middle;

    background-color: #777;

    border-radius: 10px;

}

.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {

    background-color: #dd4b39 !important;

}

.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {

    background-color: #f39c12 !important;

}

.bg-light-blue, .label-primary, .modal-primary .modal-body {

    background-color: #3c8dbc !important;

}

.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {

    background-color: #00a65a !important;

}

</style>

<div class="col-md-12">

<div class="col-md-4">



<div class="box box-primary">

            <div class="box-body box-profile">

              <img class="profile-user-img img-responsive img-circle"

                 src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/sympol2.png" alt="User profile picture">



              <h6 class="profile-username text-center">دعوة حضور جلسة جمعية عمومية</h6>



             



              <ul class="list-group list-group-unbordered">

                <li class="list-group-item">

                  <b>رقم الدعوة</b>  <span class="badge bg-yellow"><?php if(isset($da3wat->da3wa_rkm)&&!empty($da3wat->da3wa_rkm))

                   {

echo $da3wat->da3wa_rkm;

                   } 

                  ?></span>

                </li>

                <li class="list-group-item">

                  <b>تاريخ الدعوة</b> <span class="badge bg-green"><?php if(isset($da3wat->da3wa_date_ar)&&!empty($da3wat->da3wa_date_ar))

                   {

echo $da3wat->da3wa_date_ar;

                   } 

                  ?></span>

                </li>

                <li class="list-group-item">

                  <b>الموضوع</b>  <span class="badge bg-light-blue"> <?php if(isset($da3wat->mawdo3)&&!empty($da3wat->mawdo3))

                   {

echo $da3wat->mawdo3;

                   } 

                  ?></span>	

                </li>

              </ul>

              <?php if($da3wat->action_dawa==0 ||$da3wat->action_dawa=='' ){?>

              <div class="col-md-12" id="actionn">

              <div class="col-md-6">

              <a  onclick="confirm(<?=$da3wat->id?>,1)" class="btn btn-success btn-block"><b>قبول الدعوة</b></a>

              </div>

               <div class="col-md-6">

              <a onclick="confirm(<?=$da3wat->id?>,2)" class="btn btn-danger btn-block"><b>رفض الدعوة</b></a>

                </div>

              </div>

         

            <?php }?>

            </div>

            <!-- /.box-body -->

          </div>



</div>



<div class="col-md-8">

<div class="box">

            <div class="box-header">

              <h3 class="box-title">حضور الأعضاء  </h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body no-padding">

              <table id="example"  class="table table-condensed" cellspacing="0" width="100%">

                

                <thead>  

                <tr>

                  <th style="width: 5px">#</th>

                  <th>إسم العضو </th>

                  <th>رقم العضوية </th>

                   <th>رقم الجوال</th>

                  <th>الرد علي الدعوة</th>

                </tr>

              </thead>  

                <tbody>

                <?php if(isset($all_da3wa_members)&&!empty($all_da3wa_members))

                $x=1;

{

                foreach($all_da3wa_members as $row)

                {?>

                <tr>

                  <td><?=$x?></td>

                  <td><?php echo $row->member_data->laqb_title . '/' . $row->member_data->name; ?> </td>

                  <td><span class="badge bg-light-blue"><?php echo $row->odwiat_data->rkm_odwia_full; ?></span></td>

                  <td><span class="badge bg-default"><?php echo $row->member_data->jwal; ?></span></td>

                 <td><?php if($row->action_dawa==1) echo '<span class="badge bg-green">قبل الدعوة</span>'; 

                 elseif($row->action_dawa==2) echo '<span class="badge bg-red">رفض الدعوة</span>';

                 else echo'<span class="badge bg-blue">جاري</span>';

                 ?></td>

                </tr>

                <?php $x++; }}?>

           

              </tbody></table>

            </div>

            <!-- /.box-body -->

          </div>

</div>



</div>



<div class="col-md-12">

<div class="box">

            <div class="box-header">

              <h3 class="box-title"> محاور الجلسات </h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body no-padding">

              <table id="" class=" example table table-condensed">

                

                <thead>   

                <tr>

                  <th  >#</th>

                  <th>المحور</th>

                  <th> حالة المناقشة </th>

                  <th> القرار </th>

                   <th>  المرفق </th>

                </tr>

                </thead>

                <tbody>

                

                <?php $x = 1;
if(isset($result)&&!empty($result)){
            foreach ($result as $row) { ?>

            <tr>

                  <td><?php echo $x; ?></td>

                  <td><?php echo $row->mehwar_title; ?></td>

                  <td><?php if($row->elqrar_add==0)echo'<span class="badge bg-yellow">جاري المناقشة</span>';

                  else 

                  if($row->elqrar_add==1)echo'<span class="badge bg-green">تم المناقشة</span>'

                  ;?></td>

                  <td><?php if(isset($row->elqrar)&&!empty($row->elqrar)) echo '<span class="badge bg-green">'+$row->elqrar;

                  else echo'<span class="badge bg-yellow">جاري المناقشة</span>';

                  ?></span></td>

                 <td><?php

                        $mehwar_morfaq = $row->mehwar_morfaq;



                        if (!empty($mehwar_morfaq)) {

                            ?>

                            <?php

                            $type = pathinfo($mehwar_morfaq)['extension'];

                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');

                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');

                            if (in_array($type, $arry_images)) {

                                ?>

                                <?php if (!empty($mehwar_morfaq)) {

                                    $url = base_url() . 'uploads/md/all_mehwr_gam3ia_omomia/' . $mehwar_morfaq;

                                } else {

                                    $url = base_url('asisst/fav/apple-icon-120x120.png');

                                } ?>



                                <!-- <a target="_blank" onclick="show_img('<?= $url ?>')">

                                    <i class=" fa fa-eye"></i>

                                </a> -->

                                <a data-toggle="modal" data-target="#myModal-view_photo-<?= $row->id ?>">

                                    <i class="fa fa-eye" title=" قراءة"></i> </a>

                                      <!-- modal view -->

                                <div class="modal fade" id="myModal-view_photo-<?= $row->id ?>" tabindex="-1"

                                     role="dialog" aria-labelledby="myModalLabel">

                                    <div class="modal-dialog modal-lg" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal"

                                                        aria-label="Close"><span aria-hidden="true">&times;</span>

                                                </button>

                                                <h4 class="modal-title" id="myModalLabel">الصوره</h4>

                                            </div>

                                            <div class="modal-body">

                                           

                                           

                                            <img src="<?= base_url().'uploads/md/all_mehwr_gam3ia_omomia' .'/'. $mehwar_morfaq?>"

                                                             width="100%" alt="">

                                           

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">

                                                    إغلاق

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- modal view -->

                                <?php

                            } elseif (in_array(strtoupper($type), $arr_doc)) {

                                ?>

                                

                                <!-- <a href="<?php echo base_url() . 'gam3ia_omomia/Gam3ia_omomia/read_file_gam3ia/' . $mehwar_morfaq ?>"

                                   target="_blank">

                                    <i class=" fa fa-eye"></i></a> -->









                                    <a data-toggle="modal" data-target="#myModal-view_doc-<?= $row->id ?>">

                                    <i class="fa fa-eye" title=" قراءة"></i> </a>

                                      <!-- modal view -->

                                <div class="modal fade" id="myModal-view_doc-<?= $row->id ?>" tabindex="-1"

                                     role="dialog" aria-labelledby="myModalLabel">

                                    <div class="modal-dialog modal-lg" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal"

                                                        aria-label="Close"><span aria-hidden="true">&times;</span>

                                                </button>

                                                <h4 class="modal-title" id="myModalLabel">الملف</h4>

                                            </div>

                                            <div class="modal-body">

                                           

                                           

                                          

                                                             <iframe src="<?php echo base_url(); ?>/gam3ia_omomia/Gam3ia_omomia/read_file_gam3ia/<?=$mehwar_morfaq;?>" style="width: 100%; height:  640px;" frameborder="0">

        </iframe>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">

                                                    إغلاق

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- modal view -->

                                <?php

                            }

                        } else {

                            echo '<span class="badge bg-green">لا يوجد</span>';

                        }

                        ?>

</td>

                

                </tr>

                <?php

                $x++;

            }
        }
            ?>

        

         

            



              </tbody></table>

            </div>

            <!-- /.box-body -->

          </div>



</div>













<script>



    function show_img(src) {



        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');

        WinPrint.document.write('<img src="' + src + '">');

        WinPrint.document.close();

        WinPrint.focus();

    }

</script>



<script>

  

    

        function confirm(id,action) {

        swal({

  title: "هل انت متاكد من العملية?",

  type: "warning",

  showCancelButton: true,

  confirmButtonClass: "btn-danger",

  confirmButtonText: "نعم",

  cancelButtonText: "لا",

  closeOnConfirm: false,

  closeOnCancel: false

},

function(isConfirm) {

  if (isConfirm) {

    $.ajax({

                type: 'post',

                url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/reply_dawa',

                data: {id: id,action:action},

                dataType: 'html',

                cache: false,

                beforeSend: function()

                {

                    swal({

    title: "جاري  ... ",

    text: "",

    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

    showConfirmButton: false,

    allowOutsideClick: false

});

                },

                success: function (html) {

                    //   alert(html);

                   

                   // $('#Modal_esdar').modal('hide');

                  

                    swal({

                        title: "تم !",

  

  

        }

        );

        $('#actionn').hide();



                }

            });

  } else {

    swal("تم الالغاء","", "error");

  }

});





















    }

</script>

<script>





    $('#example').DataTable({

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

                exportOptions: {columns: ':visible'},

                orientation: 'landscape'

            },

            'colvis'

        ],

        colReorder: true

    });





</script>



