<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title;?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($all) && !empty($all)) {
                $geha_id=$all->id;
                           
                        
              
              } else {
                            $geha_id='';
                           
                }
              
                
            
                     ?>
                <div class="col-md-12">


               
            <div class="form-group col-sm-3">
                <label class="label ">إسم  المسؤول</label>
                <input type="text" class="form-control" placeholder="" data-validation="required" name="name" id="name"
             
                >
                <input type="hidden"  id="id"
           
                >
            </div>

            <!--start 11-2-2020 rehab.dev---------------------------------------->
            <div class="form-group padding-4 col-md-3">
                <label class="label "> صفه المسؤول</label>

                <input type="text" name="safms2ol_name" id="safms2ol_name" value=""
                       class="form-control" data-validation="required"
                       style="cursor:pointer; width:80%;float: right;" autocomplete="off"
                       onclick="$(this).attr('readonly','readonly'); $('#Modal_safms2ol').modal('show');get_details_safms2ol();"
                       onblur="$(this).attr('readonly','readonly')"
                       onkeypress="return isNumberKey(event);"

                       readonly>
                <input type="hidden" name="safms2ol_fk" id="safms2ol_fk" value="" >

                <button type="button" data-toggle="modal" data-target="#Modal_safms2ol"
                        onclick="get_details_safms2ol()"
                        class="btn btn-success btn-next">
                    <i class="fa fa-plus"></i></button>
            </div>
            <!--start Modal_safms2ol ----------------------------------------------->
            <div class="modal fade" id="Modal_safms2ol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title ">   صفه المسؤول </h4>
                        </div>
                        <div class="modal-body">
                            <div id="mohema_n_show">
                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-12 form-group">
                                        <div class="col-sm-3  col-md-3 padding-4 ">

                                            <button type="button" class="btn btn-labeled btn-success "
                                                    onclick="$('#safms2ol_input').show(); show_add()"
                                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                                اضافه صفه المسؤول
                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 no-padding ">

                                        <div id="safms2ol_input" style="display: none">
                                            <div class="col-sm-3  col-md-5 padding-2 ">
                                                <label class="label ">  صفه المسؤول </label>
                                                <input type="text" name="safms2ol" id="safms2ol" data-validation="required"
                                                       value=""
                                                       class="form-control ">
                                                <input type="hidden" class="form-control" id="s_id" value="">
                                            </div>


                                            <div class="col-sm-3  col-md-2 padding-4" id="div_add_safms2ol" style="display: block;">
                                                <button type="button" onclick="add_safms2ol($('#safms2ol').val())"
                                                        style="    margin-top: 27px;"
                                                        class="btn btn-labeled btn-success" name="save" value="save">
                                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                </button>
                                            </div>
                                            <div class="col-sm-3  col-md-3 padding-4" id="div_update_safms2ol" style="display: none;">
                                                <button type="button"
                                                        class="btn btn-labeled btn-success " name="save" value="save" id="update_safms2ol">
                                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                </div>

                            </div>

                            <div class="col-sm-12 no-padding ">
                                <div id="myDiv_safms2ol">
                                    <br><br>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                            </div>
                    </div>
                </div>
            </div>

            <!--end Modal_safms2ol-------------------------------------------------->

            <!--end 11-2-2020----------------------------------------------->



                    <div class="form-group col-sm-3">
                <label class="label ">الهاتف</label>
                <input type="number" name="phone" class="form-control  " placeholder=""  id="phone"
               
                >
            </div>
            <div class="form-group col-sm-3">
                <label class="label ">الجوال</label>
                <input type="number" name="gwal" class="form-control  " placeholder=""  id="gwal"
              
                >
            </div>


                </div>
               
     <div class="col-md-12">
            
            <div class="form-group col-sm-4">
                <label class="label "> الفاكس </label>
                <input type="number" class=" some_class form-control  " name="fax" id="fax"
           
                >
            </div>
               
            <div class="form-group col-sm-4">
                <label class="label "> البريد الالكتروني</label>
                <input type="email" class=" some_class form-control  " name="email"id="email"
               
                >
            </div>
            <div class="form-group col-sm-4">
                <label class="label ">  العنوان</label>
                <input type="text" class=" some_class form-control  " name="address" id="address"
            
                >
            </div>

        

           
         
         
     </div>
     <div class="col-md-12">
                   
                    <div class="form-group col-md-4 col-sm-6 padding-4">
<!-- 
                        <button type="button " 
                                class="btn btn-labeled btn-success "  name="add" value="اضافه" onclick="add_ms2ol_geha(<?=$geha_id?>)"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button> -->
                        <div class="col-sm-3  col-md-2 padding-4" id="div_add_travel_type" style="display: block;">
                                    <button type="button" onclick="add_ms2ol_geha(<?=$geha_id?>)"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                        </div>
                                    <div class="col-sm-3  col-md-3 padding-4" id="div_update_travel_type" style="display: none;">
                                        <button type="button"
                                                class="btn btn-labeled btn-success " name="save" value="save" id="update_travel_type">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                        </button>
                                    </div>

                    </div>
                  
   </div>
            <!-- <div class="form-group col-sm-6">
                <input type="submit"name="add" value="اضافه" class="btn-success form-control">
            </div> -->
            </form>
        </div>
    </div>
</div>
<!-- update Modal1 -->
<div id="myDiv_geha1111">
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">مسؤولي الجهه </h3>
            </div>
        <div class="panel-body">
            <?php 
            
            if(isset($result)&&!empty($result)){?>
            
            <table id="geha" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم المسؤول </th>
                    <th> الفاكس</th>
                    <th>العنوان</th> 
                     <th>الهاتف</th> 
                     <th> الجوال</th>
                
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->fax;?></td> 
                        <td><?php echo $row->address;?></td>
                        <td><?php echo $row->phone;?></td> 
                      <td><?php echo $row->gwal;?></td> 
                  
                       
                        <td>
                            
                            
                           
                        <a onclick="update_ms2ol_geha(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

<a  onclick="delete_ms2ol_geha(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)"   ><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                          
                                                   
                 
                        </td>
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>
</div>

<script>
  
  function add_ms2ol_geha(id) {

     $('#div_update_travel_type').hide();
     $('#div_add_travel_type').show();
      //  alert(value);

     var name=$("#name").val();
     var safms2ol_name=$("#safms2ol_name").val();
     var safms2ol_fk=$("#safms2ol_fk").val();

      var phone=$("#phone").val();
      var gwal=$("#gwal").val();

     var fax=$("#fax").val();
     var email=$("#email").val();
     var address=$("#address").val();
     var notes=$("#notes").val();
     var geha=id;
      if (name != 0 && name != '' && email != 0 && email != '' && phone != 0
          && phone != ''  && safms2ol_name != '' && safms2ol_fk != '') {
          var dataString = 'name=' + name+'&geha='+ id +'&phone='+ phone+ '&gwal='+ gwal+  '&fax='+ fax+  '&email='+ email +  '&address='+ address+'&notes='+ notes + '&safms2ol_name='+safms2ol_name+ '&safms2ol_fk='+safms2ol_fk ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/employee_forms/mandate_setting/Gehat/add_ms2ol',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#safms2ol_name').val('');
                $('#safms2ol_fk').val('');
                $('#name').val('');
                $('#phone').val('');
                $('#gwal').val('');
                $('#fax').val('');
                $('#email').val('');
                $('#address').val('');
                $('#notes').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_m2sol_geha(geha);

              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",


      }
      ); 
      }

  }


</script>
<script>
    function get_details_m2sol_geha(geha) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{geha:geha},
            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_setting/Gehat/load_m2sol_geha",
            
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>
    <script>




$('#geha').DataTable( {
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
    function update_ms2ol_geha(id,geha) {
        var id = id;
        $('#div_add_travel_type').hide();
        $('#div_update_travel_type').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/employee_forms/mandate_setting/Gehat/getById_ms2ol_geha",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                console.log(obj);
              

                $('#name').val(obj.name);
                $('#safms2ol_name').val(obj.safms2ol_name);
                $('#safms2ol_fk').val(obj.safms2ol_fk);
                $('#id').val(obj.id);
                $('#phone').val(obj.phone);
                $('#gwal').val(obj.gwal);
                  $('#fax').val(obj.fax);
                    $('#email').val(obj.email);
                    $('#address').val(obj.address);
                    $('#notes').val(obj.notes);
                    


            }

        });

        $('#update_travel_type').on('click', function () {
          var id=$("#id").val();
            var name=$("#name").val();

            var safms2ol_name=$("#safms2ol_name").val();
            var safms2ol_fk=$("#safms2ol_fk").val();
     var phone=$("#phone").val();
     var gwal=$("#gwal").val();
     var fax=$("#fax").val();
     var email=$("#email").val();
     var address=$("#address").val();
     var notes=$("#notes").val();
         
     var dataString = 'id=' + id+'&name=' + name+'&phone='+ phone+ '&gwal='+ gwal+  '&fax='+ fax+  '&email='+ email +  '&address='+ address +  '&notes='+ notes + '&safms2ol_name='+safms2ol_name+ '&safms2ol_fk='+safms2ol_fk  ;
            $.ajax({
                url: "<?php echo base_url() ?>human_resources/employee_forms/mandate_setting/Gehat/update_ms2ol_geha",
                type: "Post",
                dataType: "html",
                data: dataString,
                success: function (html) {
                //  alert('hh');
                $('#name').val('');
                $('#safms2ol_name').val('');
                $('#safms2ol_fk').val('');
                $('#phone').val('');
                $('#gwal').val('');
                $('#fax').val('');
                $('#email').val('');
                $('#address').val('');
                $('#notes').val('');
                 
                $('#div_update_travel_type').hide();
                    $('#div_add_travel_type').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_m2sol_geha(geha);   

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_ms2ol_geha(id,geha) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/employee_forms/mandate_setting/Gehat/delete_ms2ol',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
               
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_m2sol_geha(geha); 

                }
            });
        }

    }
</script>


<!---11-2-2020 rehab.dev safms2ol scripts ---------------------------------------------------->

<script>
    function get_details_safms2ol() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_setting/Gehat/load_safms2ol",

            beforeSend: function () {
                $('#myDiv_safms2ol').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_safms2ol').html(d);

            }

        });
    }
</script>



<!--end 11-2-2020---------------------------------------------------------------------->


