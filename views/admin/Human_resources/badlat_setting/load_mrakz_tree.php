<table id="examplex" class="table table-bordered " role="table">
    <thead>
    <tr class="info">
        <th style="font-size: 15px; width:88px !important; ">م</th>
        <th style="font-size: 15px;" class="text-left"> رقم مركز تكلفة الاب</th>
        <th style="font-size: 15px;" class="text-left">إسم مركز تكلفة الاب</th>
        <th style="font-size: 15px;" class="text-left">رقم مركز تكلفة</th>
        <th style="font-size: 15px;" class="text-left">إسم مركز تكلفة</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($marakez) && $marakez != null) {
        buildTreeTable_markz($marakez);
    }
    function buildTreeTable_markz($tree, $count = 1)
    {
        $types = array(1 => 'رئيسي', 2 => 'فرعي');
        $nature = array('', 'مدين', 'دائن');
        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
        $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
        foreach ($tree as $record) {
            $onclick = "alert('ليس حساب فرعي');";
            if ($record->markz_no3 == 2) {
                $onclick = "$('#markz').val(" . $record->id . "); $('#markez_name').val('" . $record->name . "'); $('#myModal_markz_taklfaa').modal('hide');";
                ?>
                <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
                    onclick="<?= $onclick ?>">
                    <td class="forTd"><?= $count++ ?></td>
                     <td class="forTd"><?= $record->acount_parent['code'] ?></td>
                    <td class="forTd"><?= $record->acount_parent['name'] ?></td> 
                    <td class="forTd"><?= $record->code ?></td>
                    <td class="forTd"><?= $record->name ?></td>
                </tr>
                <?php
            }
            ?>
            <?php
            if (isset($record->subs)) {
                $count = buildTreeTable_markz($record->subs, $count++);
            }
        }
        return $count;
    }
    ?>
    </tbody>
</table>
<script>
    $('#examplex').DataTable({
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
                exportOptions: {
                    columns: ':visible'
                },
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        destroy: true
    });
</script>