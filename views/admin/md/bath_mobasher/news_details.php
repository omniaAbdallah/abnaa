
	<style type="text/css">
	
    .reply-comment{
        display: inline-block;
        width: 100%;
        margin-bottom: 20px
    }
    .reply-img{
        width: 15%;	
        float: right;
    }
    .reply-img img{
        width: 100%;
        max-width: 70px;
        height: 70px;
        border:1px solid #eee;
    }
    .reply-comment{
        float: right;
        width: 85%;
    }
    .label-inverse{
        background-color: #888;
        color: #fff;
    }
    .reply-comment  span.label{
        text-align: center;
        padding-right: 10px;
        display: inline-block;
        width: auto;
        font-size:14px;
    }
    .reply-comment .name{
        color: #888;
        font-size:15px;
    }
    .comments-sec .well{
        height: 100%;
    }
    .bubble-div img{
        width: 150px;
        max-width: 100%;
    }
    .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
        margin: 0 0 0 0;
    }
</style>

<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">بث مباشر</h3>
            <div class="panel-body">
				<?php if(isset ($exist)&&empty($exist)&&$exist==0){?>
                <div class="col-sm-12 no-padding form-group">


   
    <div class="col-sm-3  col-md-5 padding-2 ">
        <label class="label   ">رابط الفيديو </label>
        <input type="text" name="vedio_link" id="vedio_link" 
               value=""
               class="form-control ">

    </div>


    <div class="col-sm-3  col-md-2 padding-4" id="div_add_vedio" style="display: block;">
        <button type="button" onclick="add_vedio()"
                style="    margin-top: 27px;"
                class="btn btn-labeled btn-success" name="save" value="save">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    <div class="col-sm-3  col-md-3 padding-4" id="div_update_vedio" style="display: none;">
        <button type="button"
                class="btn btn-labeled btn-success " name="save" value="save" id="update_vedio">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
        </button>
    </div>


</div>
                <?php }else{?>
                    <div id="updateee" style="display:none;" class="col-sm-12 no-padding form-group">


   
<div class="col-sm-3  col-md-5 padding-2 ">
    <label class="label   ">رابط الفيديو </label>
    <input type="text" name="vedio_link" id="vedio_link" 
           value=""
           class="form-control ">

</div>


<div class="col-sm-3  col-md-2 padding-4" id="div_add_vedio" style="display: block;">
    <button type="button" onclick="add_vedio()"
            style="    margin-top: 27px;"
            class="btn btn-labeled btn-success" name="save" value="save">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>
</div>
<div class="col-sm-3  col-md-3 padding-4" id="div_update_vedio" style="display: none;">
    <button type="button"
            class="btn btn-labeled btn-success " name="save" value="save" id="update_vedio">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
    </button>
</div>


</div>
                <?php }?>
<br>
<br>
<div id="myDiv_geha1111"><br><br>
<?php
                    if (isset($vedios) && !empty($vedios)){
                        $x=1;
                       
                        ?>
                    <table  id="" class="table example table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                            
                              
                              <th> الملف</th>
                            
                              <th>التاريخ</th>
                              <th>بواسطة</th>
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                       // foreach ($vedio as $vedios){
                         
                            ?>
                            <tr>
                                <td><?= $x?></td>
                              
                                
                                <td>
                                
                                        <a data-toggle="modal" data-target="#myModal-view_vedio-<?= $vedios->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view_vedio-<?= $vedios->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الفيديو</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <iframe width="800" height="500" src="https://www.youtube.com/embed/<?= $vedios->link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal view -->
                                   
                                </td>
                               
                                <td>
                                    <?php
                                    if (!empty($vedios->date_ar)){
                                        echo $vedios->date_ar;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($vedios->publisher_name)){
                                        echo $vedios->publisher_name;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                <i class="fa fa-pencil" style="cursor: pointer"
                                       onclick="update_vedio(<?= $vedios->id ?>)"></i>
                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_vedio(<?= $vedios->id ?>)"></i>
                                </td>
                            </tr>
                        <?php
                      //  }
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
		</div>
        
    
<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">عرض الملف </h4>
            </div>
            <div class="modal-body" > 
            <div class="attachimage">
         
                   </div>
            </div>
           
        </div>
    </div>
</div>
<!-- myModal Modal -->



<!-- myModal Modal -->



<!-- links -->
<script>
    function get_details_vedio() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',

            url: "<?php echo base_url();?>md/bath_mobasher/Bath_mobsher/load_vedio",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>

<script>
  
  function add_vedio() {

      $('#div_update_vedio').hide();
      $('#div_add_vedio').show();
      //  alert(value);
var title=$('#vedio_title').val();
var link=$('#vedio_link').val();

     
      if (title != 0 && title != '' && link != 0 && link != '' ) {
        
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>md/bath_mobasher/Bath_mobsher/add_vedio',
              data: {title:title,link:link},
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#vedio_title').val('');
                $('#vedio_link').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      $('#updateee').hide();
      get_details_vedio();

              }
          });
      }
      else{
        swal({
    title: " برجاء ادخال البيانات! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});

      }

  }


</script>
<script>
    function update_vedio(id) {
        var id = id;
        $('#updateee').show();
        $('#div_add_vedio').hide();
        $('#div_update_vedio').show();

        
        $.ajax({
            url: "<?php echo base_url() ?>md/bath_mobasher/Bath_mobsher/getById_vedio",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
             
               console.log(obj.link);
              
                $('#vedio_link').val(obj.link);

            }

        });

        $('#update_vedio').on('click', function () {
            var title=$('#vedio_title').val();
var link=$('#vedio_link').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>md/bath_mobasher/Bath_mobsher/update_vedio",
                type: "Post",
                dataType: "html",
                data: {id:id,link:link},
                success: function (html) {
                    //  alert('hh');
                    $('#vedio_title').val('');
                $('#vedio_link').val('');
                    $('#div_update_vedio').hide();
                    $('#div_add_vedio').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_vedio();    
        $('#updateee').hide();
                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_vedio(id,news_id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل تريد الحذف؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/bath_mobasher/Bath_mobsher/delete_vedio',
                data: {id: id,news_id:news_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                 
                
                  
                    swal({
                        title: "تم الحذف !",
  
  
        }
        );
        get_details_vedio(news_id);
        $('#updateee').show();
                }
            });
        }

    }
</script>