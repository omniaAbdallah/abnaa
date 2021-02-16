<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
          <?php echo $msg=$this->session->flashdata('msg');?>
        <div class="panel-body">
         <!--   ////////////////////////////////////////////////////////////////////-->
          <div class="col-md-12 no-padding">
                    <div class="form-group col-md-12 padding-4" >
                        <label class="label ">المبلغ</label>
                        <input id="emp_name" readonly="readonly"   class="form-control" type="text" name="emp_name" value="<?=$value_of_qst;?>" >
                    </div>
            </div>
        </div>
    </div>
</div>