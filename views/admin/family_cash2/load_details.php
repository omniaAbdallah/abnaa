<div class="col-sm-12">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم رب الاسره  </th>
            <th class="text-center">إسم مسؤول الحساب البنكى  </th>
            <th class="text-center"> رقم الحساب  </th>

            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php  $total =0;$x=1; foreach ($sarf_details as $row){
             $total += $row->value?>
        <tr>
            <td><?=$x++;?></td>
            <td><?=$row->file_num_basic?></td>
            <td><?=$row->father_full_name?></td>
            <td><?=$row->person_name?></td>
            <td><?=$row->bank_account_num?></td>

            <td><?=($row->mother_num_in+$row->down_child+$row->up_child)?></td>
            <td><?=$row->mother_num_in?></td>
            <td><?=$row->down_child?></td>
            <td><?=$row->up_child?></td>
            <td><?=$row->value?></td>
        </tr>
        <?php  }?>
        <tr>
          <td colspan="9"> الاجمالى</td>
          <td><?=$total?></td>
        </tr>
        </tbody>
        </table>
</div>