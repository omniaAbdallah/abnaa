<div class="col-xs-12 padding-4">

    <input type="hidden" id="sader_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم الخبر  </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->id ?></td>
            <td style="width: 135px;"><strong> تاريخ الخبر </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->news_date)) {
                    echo  $get_all->news_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
               
            
        </tr>
      

        <tr>
            
       
        <td style="width: 105px;">
                <strong>      عنوان الخبر </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->news_title)) {
                    echo  $get_all->news_title;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
                 <td style="width: 105px;">
                <strong>      حاله الخبر</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if ($get_all->news_status==1) {
                    echo  'نشط';
                } else if ($get_all->news_status==2){
                    echo 'غير نشط' ;
                }
                ?></td>
           

        </tr>
        <tr>
        <td style="width: 135px;"><strong>  تفاصيل الخبر </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->news_content)) {
                    echo  $get_all->news_content;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
           <td style="width: 135px;"><strong>   كلمات افتتاحيه </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->news_words)) {
                    echo  $get_all->news_words;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
        </tr>
       
       



        </tbody>
    </table>


</div>



