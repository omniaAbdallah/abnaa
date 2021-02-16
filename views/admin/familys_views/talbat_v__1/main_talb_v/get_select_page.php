  <datalist id="cityname">
<?php
     if(isset($mother )  && !empty($mother) &&  $mother !=null){
       foreach ($mother as $mother_row){
           ?>
       <option value="<?=$mother_row->full_name?>">
       <?php }?>
<?php }?>
<?php
if(isset($member )  && !empty($member) &&  $member !=null){
    foreach ($member as $member_row){
?>
    <option value="<?=$member_row->member_full_name?>">
    <?php }?>
<?php }?>
</datalist>