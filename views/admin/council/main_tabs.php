<div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-male" aria-hidden="true"></i></span> مجلس الادارة</h4>
                    </div>
                   <div class="col-sm-3">
                             <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                
                
                   <div class="col-xs-12 r-bottom">
                  <div class="panel-heading">
                        <ul class="nav nav-tabs">
                 <?php $arr=array('add_council'=>"إضافة مجلس الادارة",
                                  'add_magls'=>" إضافة عضو",
                                  'add_time_table'=>"إضافة جدول أعمال ",
                                  'minutes_and_decisions'=>"المحاضر والقرارات ",
                                  'follow_up'=>"المتابعة "); ?>
                      <?php foreach($arr as $key=>$value):
                          $active=''; 
                          if(isset($update_link) && $update_link !=null){
                           if($update_link == $key){ $active='class="active"';} 
                          }else{
                            if($this->uri->segment(3)== $key){ $active='class="active"';}  
                          } 
                           ?>
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."admin/Directors/".$key?>">
                                          <?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
                       
                        <li><a href="<?php echo base_url()?>General_assembly/add_member"> إضافة عضو جمعية عمومية  </a></li>
                       
                       
                        </ul>
                    </div>
                 </div>
