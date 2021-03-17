<?php if (isset($all) && (!empty($all))) { ?>
    <div class="col-md-12 no-padding">
        <div class="col-md-12 padding-4">


            <table class="table table-bordered ">
                <tr>
                    <th>فئة الجهات :</th>
                    <td> <?= $all->f2a_n ?></td>
                    <th> إسم الجهه الاساسيه :</th>
                    <td> <?= $all->name ?></td>
                </tr>
                <tr>
                    <th> الهاتف:</th>
                    <td> <?= $all->phone ?></td>
                    <th>الجوال :</th>
                    <td> <?= $all->gwal ?></td>
                </tr>
                <tr>
                    <th> الفاكس:</th>
                    <td> <?= $all->fax ?></td>
                    <th>البريد الالكتروني:</th>
                    <td> <?= $all->email ?></td>
                </tr>
              
                
            </table>


        </div>
      
     
    </div>

<?php  } else {
    ?>
    <div class="alert alert-danger">لا يوجد تفاصيل</div>
    <?php
} ?>
