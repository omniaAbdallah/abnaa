<div class="col-xs-12 padding-4">
    <div class="col-xs-6 ">
        <div class="col-md-12 " >
            <h5>   نوع الخدمة : <?= $get_all->khdma_name ?></h5>
        </div>
        <div class="col-md-12 " >
            <h5> وصف الخدمة : <?= $get_all->wasf_khdma ?></h5>
        </div>
        <div class="col-md-12 " >
            <h5> الضوابط والشروط : <?= $get_all->dawabet_shroot ?></h5>
        </div>
        <div class="col-md-12 " >
            <h5> قنوات الخدمة : <?= $get_all->knawat_khdma ?></h5>
        </div>
        <div class="col-md-12 " >
            <h5> اتفاقية مستوى الخدمة : <?= $get_all->mostwa_khdma ?></h5>
        </div>
       
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
   
</div>