<style>
.label_y {
    font-size: ;
    text-align:;
    color: ;
    }  
</style>

<?php echo form_open_multipart(base_url() . 'st/ezn_edafa/Ezn_edafa/add_attach') ?>
        <input type="hidden" name="set"  id="set"  value="<?=$id?>"/>

          
                <div class="col-sm-12 no-padding form-group">
                <div class="col-sm-3  col-md-4 padding-2 ">
                                    <label class="label_y ">اسم المرفق   </label>              
                       <input type="text" name="title" id="title"  class="form-control" data-validation="reuqired">
                </div>
                       <div class="col-sm-3  col-md-3 padding-2 ">
                                    <label class="label_y">المرفق </label>   
<input type="file" name="file[]"
data-validation="reuqired"
           class="form-control "
           id="file" />
           </div>
           <div class="col-sm-3  col-md-2 padding-4" style="display: block;">
           <button type="button"
           onclick="upload_img(<?=$id?>)"
             style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" 
                        
                        value="save"     name="save" id="saves" >
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                </div>
                <!--  -->
           </div>

                      
          
            
          
                <!--<input type="hidden" name="id" id="id" >-->
              
               
            </form>
                
                <!-- tabel -->
                <table id="examplee" class="table table-bordered table-striped table-hover">
            <thead>
            <tr class="info">
                <th  style="text-align: center;">م</th>
				   <th  style="text-align: center;">اسم المرفق</th>
<th  style="text-align: center;">المرفق </th>
<th  style="text-align: center;">الاجراء </th>
            </tr>

            </thead>
            <tbody id="morfq_table">

            <?php
           // echo '<pre>';
         //   print_r($get_supplier);
            if (isset($get_supplier->morfqat) && !empty($get_supplier->morfqat)) {
                // $x=1;
                $z = 1;
                foreach ($get_supplier->morfqat as $m) 
                    {
                        ?>
                        <td>
						<?= $z ?>
						</td>
						<td>
						<?= $m->title ?>
						</td>

                            <td  >
                                <?php
                    //   $x++;
                    $ext = pathinfo($m->file, PATHINFO_EXTENSION);
                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');

                    ?>
                    <!--  <input class="form-control"  type="file" name="morfaq[]"  value="" > -->

                    <?php
                    if (in_array($ext, $image)) {
                        ?>
                        <!-- <a data-toggle="modal" data-target="#myModal-view-<?= $m->id ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a> -->
                            <!-- <a data-toggle="modal"
                                       onclick="$('#img_morfaq').attr('src','<?= base_url() . "uploads/st/ezn_edafa/" . $m->file ?>')"
                                       data-target="#myModal-view">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a> -->
                                        
                                <?php if (!empty($m->file)) {
                                    $url = base_url() . 'uploads/st/ezn_edafa/' . $m->file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                        <?php

                    } elseif (in_array($ext, $file)) {
                        ?>
                        <?php
                        ?>
                        <!-- <a target="_blank" href="<?= base_url() . "st/ezn_edafa/Ezn_edafa/read_file/" . $m->file ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a> -->
                            <?php if (!empty($m->file)) {
                                   // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                    $url =base_url().'st/ezn_edafa/Ezn_edafa/read_file/'.$m->file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                        <?php
                    }
                    ?>
                     </td>


<td style="width: 10%">
    <a href="#" onclick='swal({
            title: "هل انت متأكد من الحذف ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "حذف",
            cancelButtonText: "إلغاء",
            closeOnConfirm: false
            },
            function(){
            swal("تم الحذف!", "", "success");
            delete_my_morfaq("<?= $m->ezn_rkm_fk ?>",<?= $m->id ?>);
            });'>
        <i class="fa fa-trash"> </i></a>

</td>

<!--                                                                    window.location="<?= base_url() . "st/esalat/Esalat_estlam/delete_attach/" . $attach->id . '/' . $esal_id ?>";
-->
</tr>
<?php
$z++;



 }
            } 
                ?>

            </tbody>
            
        </table>

        <script>




$('#examplee').DataTable( {
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

<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>

    function show_bdf(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>

<script>

    function  upload_img(set)
    {


        var files = $('#file')[0].files;
        var title = $('#title').val();
        //var row = $('#row').val();
        console.log(title);
        if(files.length==0)
        {

            swal({
    title: " برجاء ادخال  المرفق ! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});

        }
        else if(title==''){
            swal({
    title: " برجاء ادخال   اسم المرفق ! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
        }
        else{
        var error = '';
        var form_data = new FormData();
        for(var count = 0; count<files.length; count++)
        {
            var name = files[count].name;


            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','png','pdf','PNG','PDF','xls','doc','docx','txt','rar']) == -1)
            {
                error += "Invalid " + count + " Image File"
            }
            else
            {
                form_data.append("file[]", files[count]);
                form_data.append("title",title );
                form_data.append("set",set );
            }
        }
        if(error == '') {




            $.ajax({
                url:"<?php echo base_url(); ?>st/ezn_edafa/Ezn_edafa/add_morfq", //base_url() return http://localhost/tutorial/codeigniter/
                method:"POST",
                data:form_data,
              
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
                  
                },
                success:function(data)
                {
                   // alert(data);

                     //$('#images').show();
                    
                     $('#title').val('');
                     $('#file').val('');
                     swal("تم الحفظ بنجاح !");
                    
                     get_attach(set);
                      //  get_details(row);
                      
                 }
             });
             

        }

    }
    }

    function delete_my_morfaq(elem, attach) {
      

      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/delete_attach',
          data: {attach: attach},
          dataType: 'html',
          cache: false,
          success: function (html) {
              get_attach(elem);
          }
      });

  }


</script>