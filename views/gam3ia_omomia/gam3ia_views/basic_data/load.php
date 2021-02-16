<?php

                      //  echo '<pre>'; print_r($reasons_settings);

                        

                        if (!empty($job_role)) { ?>

                            <table id="example2" class=" example table table-bordered table-striped" role="table">

                                <thead>

                                <tr class="greentd">

                                    <th width="2%">#</th>

                                    <th class="text-center">المهنه</th>

                                  

                                   

                                </tr>

                                </thead>

                                <tbody>

                                <?php

                                $x = 1;

                                foreach ($job_role as $value) {

                                    ?>

                                    <tr>

                                        <td><a  data-title="<?= $value->id_setting ?>"

                                                   id="radio"

                                                   onclick="getTitle('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')">
<?=$x?>
                                        </a>
                                        </td>

                                        <td>
                                        <a  data-title="<?= $value->id_setting ?>"

id="radio"

onclick="getTitle('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')"> 
                                        
                                        <?= $value->title_setting ?> </a></td>

                                      

                                        

                                    </tr>

                                    <?php

                               $x++; }

                                ?>

                                </tbody>

                            </table>





                        <?php } else { ?>



                            <div class="alert alert-danger">لاتوجد بيانات !!</div>

                        <?php } ?>

                        <script>









    $('#example2').DataTable( {

        dom: 'Bfrtip',

        buttons: [

            'pageLength',

            'copy',

            'csv',

            'excelHtml5',

            {

                extend: "pdfHtml5",

                orientation: 'landscape'

            },



            {

                extend: 'print',

                exportOptions: { columns: ':visible'},

                orientation: 'landscape'

            },

            'colvis'

        ],

        colReorder: true

    } );







</script>



