<?php
function buildTree($tree)
{
    ?>
    <ul id="tree3">
        <?php foreach ($tree as $record) { ?>
            <li>
                <a onclick="GetDiv_jobs(<?= $record->id ?>); load_data_structre(<?= $record->id ?>,this)" data-from_id="<?= $record->from_id ?>"
                   data-name="<?=$record->name ?>"  data-id="<?=$record->id ?>"
                   data-main_type="<?= $record->main_type ?>" data-from_code="<?= $record->from_code ?>"
                   data-level="<?= $record->level ?>"><?= $record->name ?></a>
                <?php
                if (isset($record->subs)) {
                    buildTree($record->subs);
                }
                ?>
            </li>
        <?php } ?>
    </ul>
    <?php
}
if (isset($tree) && $tree != null) {
    buildTree($tree);
}
?>