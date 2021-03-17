<div class="col-xs-12 padding-4">


    <div class="col-xs-6 ">
        <div class="col-md-12 " >
            <h5>   نوع الخدمة : <?= $get_all->khdma_name ?></h5>
        </div>
        <div class="col-md-12 " >
            <h5> وصف الخدمة : <?= $get_all->wasf_khdma ?></h5>
        </div>


       <!-- <table class="table " style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 105px;">
                    <h5>   نوع الخدمة :</h5>
                </td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?= $get_all->khdma_name ?></td>

            </tr>
            <tr>
                <td style="width: 135px;">
                    <h5> وصف الخدمة : </h5>
                </td>
                <td><?= $get_all->wasf_khdma ?></td>
            </tr>

            </tbody>
        </table>-->

    </div>

    <div class="col-xs-6 ">
        <h5>الفئات المستهدفة</h5>
        <table id="" class="table  table-bordered table-striped table-hover">
            <thead>
            <tr class="greentd">
                <th>فئة أ</th>
                <th>فئة ب</th>
                <th>فئة ج</th>
                <th>فئة د</th>
                <th>فئة هـ</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        if ($get_all->f_a==1){
                            ?>
                            <i class="fa fa-check" style="color: green;"></i>
                            <?php
                        } else{
                            ?>
                            <i class="fa fa-remove" style="color: red;"></i>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($get_all->f_b==1){
                            ?>
                            <i class="fa fa-check" style="color: green;"></i>
                            <?php
                        } else{
                            ?>
                            <i class="fa fa-remove" style="color: red;"></i>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($get_all->f_c==1){
                            ?>
                            <i class="fa fa-check" style="color: green;"></i>
                            <?php
                        } else{
                            ?>
                            <i class="fa fa-remove" style="color: red;"></i>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($get_all->f_d==1){
                            ?>
                            <i class="fa fa-check" style="color: green;"></i>
                            <?php
                        } else{
                            ?>
                            <i class="fa fa-remove" style="color: red;"></i>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($get_all->f_e==1){
                            ?>
                            <i class="fa fa-check" style="color: green;"></i>
                            <?php
                        } else{
                            ?>
                            <i class="fa fa-remove" style="color: red;"></i>
                            <?php
                        }
                        ?>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
   <!-- <div class="col-xs-6 ">
        <h5> المدخلات</h5>
        <table id="" class="table  table-bordered table-striped table-hover">
            <thead>
            <tr class="greentd">
                <th> العدد</th>
                <th> المبلغ</th>
                <th> رقم الفاتورة</th>
                <th> رقم الجهاز</th>
                <th>  السن</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?php
                    if ($get_all->relat_num==1){
                        ?>
                        <i class="fa fa-check" style="color: green;"></i>
                        <?php
                    } else{
                        ?>
                        <i class="fa fa-remove" style="color: red;"></i>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($get_all->relat_mabl3==1){
                        ?>
                        <i class="fa fa-check" style="color: green;"></i>
                        <?php
                    } else{
                        ?>
                        <i class="fa fa-remove" style="color: red;"></i>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($get_all->relat_rkm_fatora==1){
                        ?>
                        <i class="fa fa-check" style="color: green;"></i>
                        <?php
                    } else{
                        ?>
                        <i class="fa fa-remove" style="color: red;"></i>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($get_all->relat_rkm_gehaz==1){
                        ?>
                        <i class="fa fa-check" style="color: green;"></i>
                        <?php
                    } else{
                        ?>
                        <i class="fa fa-remove" style="color: red;"></i>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($get_all->relat_age==1){
                        ?>
                        <i class="fa fa-check" style="color: green;"></i>
                        <?php
                    } else{
                        ?>
                        <i class="fa fa-remove" style="color: red;"></i>
                        <?php
                    }
                    ?>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
-->

</div>

