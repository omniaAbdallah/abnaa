
<section class="content__">
    <div class="container-fluid__">

        <div class="panel">
        
            <!-- /.panel-header -->
            <div class="panel-body">
            
               <div class="row">
                    <div class="col-md-4 col-md-offset-md-4">
                        <?php //echo validation_errors(); ?>

                        <form action="<?=site_url('md/urgent_msg/Urgent_msg/process')?>" method="post">
                            <input type="hidden" name="id" value="<?=$all_msg_data->id?>" >
                            
                          <div class="col-xs-9 no-padding">
                            <div class="form-group has-danger mb-0">
                                <label >النص </label>
                                <input type="text" name="msg_name" value="<?=$all_msg_data->msg_name?>"
                                       class="form-control " required>
                            </div>
</div>
  <div class="col-xs-3 text-center" style="margin-top: 32px;">
                            <div class="form-group ">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                  <i class="fa fa-paper-plane"></i>حفظ</button>
                              
                            </div>
             </div>                
                            
                        </form>
                    </div>
                </div>
                
                
                
            
            
            
                <?php //print_r($all_users->result())
                ?>

               <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>النص</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach ($all_msgs->result() as $key => $value){
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$value->msg_name?></td>

                            <td class="text-center" width="160px">

                                <a href="<?=site_url('md/urgent_msg/Urgent_msg/edit/'.$value->id)?>"
                                   class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> تعديل </a>




                                <a href="<?=site_url('md/urgent_msg/Urgent_msg/del/'.$value->id)?>"
                                   onclick="return confirm('هل انت متأكد من الحذف ?')"
                                   class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> حذف </a>


                            </td>
                        </tr>
                        <?php
                    }

                    ?>

                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


    </div>
</section>
