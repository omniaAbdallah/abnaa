<style >
.vertical-tabs .panel-footer {
    background-color: #e6e6e6;
    border-top: 1px solid #e1e6ef;
    display: inline-block;
    width: 100%;
    padding: 5px 10px;
}

.upChevron {
    display: none;
    /* position: absolute; */
    top: 0px;
    left: 0px;
    z-index: 1;
    font-size: 16px;
    cursor: pointer;
    background-color: #09704e;
    padding: 0px 9px;
    color: #fff;
    border-bottom-left-radius: 26px;
    border-bottom-right-radius: 26px;
    /* box-shadow: 0px 5px 0px #005237; */
    box-shadow: -1px 6px 8px #d48a00;
}
</style>



<div class="col-xs-12 ">
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
<div class="panel-heading">
<h3 class="panel-title"> إعداد السياسات   </h3>
</div>
<div class="panel-body">



<div class="col-md-12 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">بدل  الساعات الاضافية
</h5>
                        </div>
                        <div class="panel-body" style=" overflow: hidden;">
                            
                            <!--  -->
                            <table class="table">
  
  <tbody>
    <tr>
      <th scope="row">معامل حساب الساعة الاضافية خارج ساعات الدوام الرسمي خلال ايام العمل الرسمية </th>
     
      <td><input id="result1" name="result1" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">ساعه </th>
    </tr>
    <tr>
      <th scope="row">معامل حساب الساعة الاضافية خارج ساعات الدوام الرسمي خلال الأجازات والعطلات الرسمية         </th>
     
      <td><input id="result1" name="result1" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">ساعه </th>
    </tr>
    
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">


                            <button type="button" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                    </div>
                </div>
<!--  -->

<div class="col-md-6 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"> بدل انتداب داخلي 
</h5>
                        </div>
                        <div class="panel-body" style=" overflow: hidden;">
                            
                            <!--  -->
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">المستوي الوظيفي</th>
      <th scope="col">قيمة بدل الانتداب اليومي جزئي </th>
      <th scope="col">قيمة بدل الانتداب اليومي كلي </th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td><input type="text" id="part1" value="" class="form-control" ></td>
      <td ><input type="number" name="part1_achived" id="achived_part1" value="" class="form-control text-center" onchange="find_next(1)" onkeypress="validate_number(event)" data-validation="required"></td>
      <td><input type="number" id="result1" name="result1" data-validation="required" class="form-control text-center  result" value=""></td>
    </tr>
    <tr>
   
      <td><input type="text" id="part2" value="" class="form-control"></td>
      <td><input type="number" name="part2_achived" id="achived_part2" value="" class="form-control text-center"onkeypress="validate_number(event)" data-validation="required"></td>
    <td><input type="number" id="result2" data-validation="required" name="result2" class="form-control text-center  " value=""></td>
    </tr>
   
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">


                            <button type="button" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-md-6 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"> بدل انتداب خارجي 
</h5>
                        </div>
                        <div class="panel-body" style=" overflow: hidden;">
                            
                            <!--  -->
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">المستوي الوظيفي</th>
      <th scope="col">قيمة بدل الانتداب اليومي جزئي </th>
      <th scope="col">قيمة بدل الانتداب اليومي كلي </th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td><input type="text" id="part1" value="" class="form-control" ></td>
      <td ><input type="number" name="part1_achived" id="achived_part1" value="" class="form-control  text-center"  onkeypress="validate_number(event)" data-validation="required"></td>
      <td><input type="number" id="result1" name="result1" data-validation="required" class="form-control text-center  result" value=""></td>
    </tr>
    <tr>
   
      <td><input type="text" id="part2" value="" class="form-control" ></td>
      <td><input type="number" name="part2_achived" id="achived_part2" value="" class="form-control text-center " onkeypress="validate_number(event)" data-validation="required"></td>
    <td><input type="number" id="result2" data-validation="required" name="result2" class="form-control text-center  " value=""></td>
    </tr>
   
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">


                            <button type="button" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                    </div>
                </div>
               <!--  -->
               <div class="col-md-12 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">بدل التكليف بالوكالة 
</h5>
                        </div>
                        <div class="panel-body" style=" overflow: hidden;">
                            
                            <!--  -->
                            <table class="table">
  
  <tbody>
    <tr>
      <th scope="row">مدة التكليف   الحد الأدني بالاشهر   </th>
     
      <td><input id="result1" name="result1" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row">الحد الاقصي بالاشهر  </th>
      <td><input id="result1" name="result1" data-validation="required"  class="form-control text-center  result" value=""></td>
      <!-- <th scope="row">شهر </th>
     -->
    </tr>
    <tr>
      <th scope="row">بدل التكليف  الحد الادني    </th>
     
      <td><input id="result1" name="result1" data-validation="required"  class="form-control text-center  result" value=""></td>
      <th scope="row"> %الحد الاقصي      </th>
      <td><input id="result1" name="result1" data-validation="required"  class="form-control text-center  result" value=""></td>
      
      <th scope="row">  %من قيمة الراتب الأساسي    </th>
    </tr>
    
  </tbody>
</table>
                            <!--  -->
                        </div>
                        <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">


                            <button type="button" class="btn btn-labeled btn-success " style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                    </div>
                </div>
               <!--  -->
                </div>
                    </div>
                </div>