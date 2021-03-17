<div id="show_edite">

<div class="col-sm-12 col-md-12 col-xs-12 ">

    <div class="panel panel-default">
    
 <?php
                             //  echo '<pre>'; print_r($result);
                               ?>
        <div class="panel-body" >
            <div class="form-group col-sm-12 col-xs-12 no-padding">
               

<table class="display table table-bordered responsive nowrap">
  <tbody>
    <tr>
     
      <td>إسم العضو</td>
       <td><?= $result->name;?></td>
    </tr>
    
    <tr>
          <td>رقم العضوية</td>
        <td><?= $result->odwiat->rkm_odwia_full;?></td>
    </tr>
    
        <tr>
          <td>رقم الهوية</td>
        <td><?= $result->card_num;?></td>
    </tr>
     
    
    
    <tr>
     <th>إسم المستخدم</th>
     <td><?= $result->memb_user_name;?></td>
    </tr>

    <tr>
     <th>حالة الحساب</th>
<td>
<?php
$arr = array(1 => 'الحساب نشط', 0 => 'الحساب غير نشط');
    foreach ($arr as $key => $value) {
        $select = '';
        if ($result->suspend != '') {
            if ($key == $result->suspend) {
                echo $value; 
            }
        }} ?>  
</td>
    </tr>
    
    
    <tr>
     <th>تعديل الحساب</th>
<td>
<a 
href="<?= base_url() . "gam3ia_omomia/Gam3ia_omomia/add_account_data/" .$result->id  ?>">
<i class="fa fa-pencil" title=" تعديل"></i>تعديل </a>

<!--
<a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: true
        },
        function(){
        editElectronic_cardOrders(<?= $result->id ?>);
        });'>
    <i class="fa fa-pencil"> تعديل الحساب </i> </a>
-->


</td>
    </tr>



  </tbody>
</table>
          
               
               
               
               
               
               
               
               
               <!--
                    <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                              <th>إسم العضو</th>
                               <th>رقم العضوية</th>
                                  <th>رقم الهوية</th>
                            <th>إسم المستخدم</th>
                          
                            <th>حالة الحساب</th>
                          
                            <th>تعديل الحساب</th>
                            
                        </tr>
                        </thead>
                        </tr>
                        <tbody>
                        <?php
                        $x = 1;
                      
                            ?>
                            <tr>
                                <td><?= ($x++) ?></td>
                                 <td><?= $result->name;?></td>
                                   <td><?= $result->odwiat->rkm_odwia_full;?></td>
                                     <td><?= $result->card_num;?></td>
                                
                                <td><?= $result->memb_user_name;?></td>
                               
                               
                                <td>
                             
                                
                                <?php
                                $arr = array(1 => 'الحساب نشط', 0 => 'الحساب غير نشط');
                                            foreach ($arr as $key => $value) {
                                                $select = '';
                                                if ($result->suspend != '') {
                                                    if ($key == $result->suspend) {
                                                        echo $value; 
                                                    }
                                                }} ?>
                                                
                                                
                                </td>

                                <td>
                                  
                                        <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                editElectronic_cardOrders(<?= $result->id ?>);
                                                });'>
                                            <i class="fa fa-pencil"> تعديل الحساب </i> </a>
                                     

                                 
                                </td>

                            </tr>
                     
                        </tbody>
                    </table>-->
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function editElectronic_cardOrders(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
        
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/editaccount",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_edite').html(d);
              //  $('#show_details').hide();

            }

        });
    }
</script>
