<!--load_details_agaza_view-->

<?php
if (isset($item) && !empty($item)) {
    ?>
    <table class="table table-bordered" style="table-layout: fixed">
        <thead>
        <tr class="info">
            <th colspan="4" class="bordered-bottom">تفاصيل الاجازه</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th class="gray-background">نوع الاجازه:</th>
            <td width="15%"><?php echo $item->name; ?></td>
            <th class="gray-background">تاريخ بدايه الاجازه:</th>
            <th width="20%"><?php echo $item->agaza_from_date_m; ?></th>

        </tr>
        <tr>
            <th class="gray-background">تاريخ نهايه الاجازه:</th>
            <td><?php echo $item->agaza_to_date_m; ?></td>
            <th class="gray-background">عددايام الاجازه:</th>
            <td><?php echo $item->num_days; ?></td>

        </tr>

        <tr>
            <th class="gray-background">تاريخ مباشره العمل:</th>
            <td><?php echo $item->mobashret_amal_date_m; ?></td>
            <th class="gray-background">الموظف البديل:</th>
            <td><?= ($item->emp_badel_n != null) ? $item->emp_badel_n : 'لم يحدد'; ?></td>

        </tr>
        <tr>
            <th class="gray-background">العنوان اثناء الاجازه:</th>
            <td><?php echo $item->address_since_agaza; ?></td>
            <th class="gray-background">االجوال اثناء الاجازه:</th>
            <td><?php echo $item->emp_jwal; ?></td>


        </tr>
        <?php if (!empty($item->marad_name)) {?>
                                  <tr>
                                    <th class="gray-background"> اسم المرض:</th>
                                    <td><?php echo $item->marad_name; ?></td>
                                    <th class="gray-background">اسم المستشفى:</th>
                                    <td><?php echo $item->hospital_name; ?></td>

                                  </tr>
                                  <tr>
                                    <th class="gray-background">بداية التقرير الطبي :</th>
                                    <td><?php echo $item->taqrer_form_date_m; ?></td>
                                    <th class="gray-background">نهاية التقرير الطبي :</th>
                                    <td><?php echo $item->taqrer_to_date_m; ?></td>
                                  </tr>
                                  <tr>
                                  <?php if (!empty($item->hospital_report)) {
                                  $type = pathinfo($item->hospital_report)['extension'];
                                  $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                  $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                  if (in_array($type, $arry_images)) {
                                  $type_doc=1;
                                  } elseif (in_array(strtoupper($type), $arr_doc)) {
                                  $type_doc=2;
                                  }
                                  ?>
                                  <th class="gray-background">تقرير المستشفى:</th>
                                  <td>
                                  <a  href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $item->hospital_report .'/'.$type_doc.'/'.$type?>"
                                  target="_blank">
                                  <i class=" fa fa-eye"></i></a>
                                  </td>
                                  <?php } ?>
                                </tr>
                                <?php } ?>
        </tbody>
    </table>
<?php } ?>
