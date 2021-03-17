
<?php
     if (isset($result) && !empty($result)){
         ?>
         <div class="col-xs-12">

             <table class="table " style="table-layout: fixed">
                 <tbody>
                 <tr>
                     <td style="width: 105px;">
                         <strong>   اسم المرسل  </strong>
                     </td>
                     <td style="width: 10px;"><strong>:</strong></td>
                     <td><?= $result->publisher_name ?></td>
                     <td style="width: 135px;"><strong> رقم هوية المرسل</strong></td>
                     <td style="width: 10px;"><strong>:</strong></td>
                     <td><?= $result->publisher ?></td>

                 </tr>
                 <tr>
                     <td><strong> نص الرسالة </strong></td>
                     <td><strong>:</strong></td>
                     <td>
                         <?php if (!empty($result->content)){echo nl2br( $result->content);} else{ echo 'لا يوجد';}?>
                     </td>

                 </tr>


                 </tbody>
             </table>


         </div>
<?php
     }