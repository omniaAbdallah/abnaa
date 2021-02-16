<br>
                                                            <div class="w3-light-grey">
                                                            
                                                            <?php echo $current_vote->vote_option1;?>
  <div class="progress-bar progress-bar-green" style="width:<?if(isset($percentage_pos))echo$percentage_pos; else echo 0;?>%"><?if(isset($percentage_pos))echo$percentage_pos; else echo 0;?>%</div>
</div> <br>

<div class="w3-light-grey">
<?php echo $current_vote->vote_option2;?>
  <div class="progress-bar progress-bar-red" style="width:<?if(isset($percentage_neg))echo$percentage_neg; else echo 0;?>%"><?if(isset($percentage_neg))echo$percentage_neg ; else echo 0;?>%</div>
</div><br>

