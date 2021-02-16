

<div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">نوع الشكوي</label>
                    <input type="text" name="shkwa_type_n" id="shkwa_type_n" value=""
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_shkwa_type').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           data-validation="required"
                           readonly>
                           <input type="hidden" name="shkwa_typee" id="shkwa_typee" 
                           value="" class="form-control "
                          readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_shkwa_type" 
                    onclick="get_details_shkwa_type()"
                            class="btn btn-success btn-next" style="">
                        <i class="fa fa-plus"></i></button>
 </div>


<!-- yara -->
<div class="modal fade" id="Modal_shkwa_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> نوع الشكوي </h4>
            </div>
            <div class="modal-body">


                <div id="shkwa_type_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show();"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span> أضافة 
                                    نوع الشكوي
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">نوع الشكوي</label>
                                    <input type="text" name="shkwa_type" id="shkwa_type"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_shkwa_type" style="display: block;">
                                    <button type="button" onclick="add_shkwa_type($('#shkwa_type').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_shkwa_type" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-warning " name="save" value="save" id="update_shkwa_type">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
