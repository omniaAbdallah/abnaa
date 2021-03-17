<table class="table table-hover">
                    <tbody>
                    
                    <tr>
                        <th>م</th>
                        <th>إسم الموظف</th>
                        <th>السبب</th>
                    </tr>
                   
                    <?php
                    if(isset($all_agaza)&&!empty($all_agaza))
                    {
                    foreach($all_agaza as $row){
                  
                        ?>
                         <tr>
                        <td><?= $row->id?></td>
                        <td><?= $row->emp_name?></td>
                        <td><span class="label label-success"> <?= $row->no3_agza?></span></td>
                        </tr>
                    <?php } }?>
                   
                  
                    <?php
                    if(isset($all_ezn)&&!empty($all_ezn))
                    {
                    foreach($all_ezn as $row){
                  
                        ?>
                          <tr>
                        <td><?= $row->id?></td>
                        <td><?= $row->emp_name?></td>
                        <td><span class="label label-warning"> <?php  if($row->no3_ezn==1){
                           echo 'استئذان شخصي'; }elseif($row->no3_ezn==2){ echo 'استئذان للعمل';}?></span></td>
                            </tr>
                        <?php } }?>
                
                  
                    <?php
                    if(isset($all_mandate)&&!empty($all_mandate))
                    {
                    foreach($all_mandate as $row){
                  
                        ?>
                          <tr>
                         <td><?= $row->id?></td>
                        <td><?= $row->emp_name?></td>
                        <td><span class="label label-primary">
                        <?php  if($row->mandate_type_fk==1){
                           echo 'انتداب  داخلي'; }elseif($row->mandate_type_fk==2){ echo 'انتداب  خارجي';}?>
                        </span></td>
                        </tr>
                        <?php }}?>
                  


                    </tbody>
                </table>