

    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?php echo $title ; ?></h4>

            </div>
            <div class="panel-body" style="min-height: 300px;">
                <?php
                if (isset($records)&& !empty($records)){
                $x=1;
                ?>
                <div class="col-xs-12" id="main_content">
                    <table id="" class="table example  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th> نوع التواصل</th>
                            <th>  اسم المرسل</th>
                            <th>  تاريخ الارسال</th>
                            <th>    وقت الارسال</th>
                            <th>   نص الرساله</th>
                            <th>اجراء تم علي الرساله</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($records as $row){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
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
                                    <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_message(<?= $row->id?>);">
                                        <i class="fa fa-list "></i></a>
                                </td>

                                <td>

                                     <span style="background-color: <?php if (!empty($row->egraa_color)){ echo $row->egraa_color;}?>">

                                        <?php

                                        if (!empty($row->egraa_n)){

                                            echo $row->egraa_n;

                                        }

                                        ?>

                                    </span>


                                </td>



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

            </div>
        </div>
    </div>


<!-- detailsModal -->

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">نص الرسالة</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-defualt" data-dismiss="modal" aria-label="Close">إغلاق </button>
            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->



