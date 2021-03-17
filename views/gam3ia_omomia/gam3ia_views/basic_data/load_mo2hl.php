<?php

                      //  echo '<pre>'; print_r($reasons_settings);

                        

                        if (!empty($science_qualification)) { ?>

                            <table id="example222" class=" example table table-bordered table-striped" role="table">

                                <thead>

                                <tr class="greentd">

                                    <th width="2%">#</th>

                                    <th class="text-center">المؤهل</th>

                                  

                             

                                </tr>

                                </thead>

                                <tbody>

                                <?php

                                $x = 1;

                                foreach ($science_qualification as $value) {

                                    ?>

                                    <tr>

                                        <td><a  data-title="<?= $value->id_setting ?>"

                                                   id="radio"

                                                   onclick="getTitle_mo2hl('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')">

                                        <?=$x?>
                                        </a>
                                        
                                        </td>

                                        <td>
                                        <a  data-title="<?= $value->id_setting ?>"

                                                   id="radio"

                                                   onclick="getTitle_mo2hl('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')">
                                        
                                        <?= $value->title_setting ?></a></td>

                                      

                                        

                                    </tr>

                                    <?php

                                $x++;}

                                ?>

                                </tbody>

                            </table>





                        <?php } else { ?>



                            <div class="alert alert-danger">لاتوجد بيانات !!</div>

                        <?php } ?>

                        <script>









    $('#example222').DataTable( {

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



