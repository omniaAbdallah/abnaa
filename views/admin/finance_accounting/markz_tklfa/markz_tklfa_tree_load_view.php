<fieldset>
    <legend>شجرة مراكز التكلفة</legend>
    <div class=" col-md-2 col-sm-12 col-xs-12 padding-4"></div>
    <div class=" col-md-8 col-sm-12 col-xs-12 padding-4">
        <div class="panel-body" style="height: 400px; overflow-y: scroll;">
            <div class="col-sm-12 col-xs-12 no-padding">
                <?php function buildTree($tree)
                {
                    $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
                    ?>
                    <ul id="tree3">                            <?php foreach ($tree as $record) { ?>
                            <li><a data-toggle="modal" data-target="#add_editMarkz_tklfaa"
                                   onclick="add_editMarkz_tklfaa(<?= $record->id ?>,2,this)"> <span class="dalel-num"
                                                                                                   style="background-color: <?= $color[$record->level] ?>">                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                </a>
                                <div class="pull-right">                                        <?php if ($record->parent != 0) {
                                        if ($record->markz_no3 == 2) { ?><a
                                            onclick=' swal({
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
                                                window.location="<?= base_url() . 'finance_accounting/markz_tklfa/Markz_tklfaa_order/delete_markz/' . $record->id ?>";
                                                });'
                                             title="حذف"><i class="fa fa-trash"></i>
                                            </a>                                            <?php }
                                    } ?> <a title="إضافة" id="add_account" data-toggle="modal"
                                            data-target="#add_editMarkz_tklfaa" data-parent="<?= $record->id ?>"
                                            data-parent_name="<?= $record->code . '--' . $record->name ?>"
                                            data-parent_code="<?= $record->code ?>"
                                            data-ttype="<?= $record->ttype ?>" data-level="<?= $record->level ?>"
                                            onclick="add_editMarkz_tklfaa(0,1,this,<?= $record->code ?>);"><i
                                                class="fa fa-plus-square"></i></a> <a data-toggle="modal"
                                                                                      data-target="#add_editMarkz_tklfaa"
                                                                                      onclick="add_editMarkz_tklfaa(<?= $record->id ?>,2,this)"
                                                                                      title="تعديل الحساب"><i
                                                class="fa fa-pencil-square"></i></a>
                                </div> <?php if (isset($record->subs)) {
                                    buildTree($record->subs);
                                } ?>                                </li>                            <?php } ?>
                    </ul>                        <?php }

                if (isset($tree) && $tree != null) {
                    buildTree($tree);
                } ?>                </div>
        </div>
    </div>
    <div class=" col-md-2 col-sm-12 col-xs-12 padding-4"></div>
</fieldset>
