<style>

    .one {
        border-style: solid;
        border-width: 1px;
        padding: 15px;
    }

</style>

 <?php
echo '
<div  class="DivPrint col-xs-10"  id="printableArea">
    <div class="DivPrint_p one">
<div class="container">
         <div class="row">
             <div class="col-lg-12">
                <h2>قسم الاتصالات الادارية بمركز التنمية ببريدة  43/3/7</h2>
               
                <div class="col-lg-3">
                    <h4>  صادر:- <span>'.$arabic_num.'</span></h4>
                    <h4>  التاريخ:- <span>' . $date.'</span></h4>
                      <h4>  المرفقات:- <span>' . $morfaq_num.'</span></h4>
                      <img src="'.base_url().'barcodes/barcode.php?text='.$id.'" alt="'.$id.'"  style="width: 460px;height: 80px;" />
                   
                </div>
                 <div class="col-lg-3">
                
                 <img src="'.base_url().'asisst/admin_asset/img/img.png" style="width: 90px;" >
                </div>

            </div>

        </div>

 </div>
 </div>

 </div>
 '; 
 ?> 
<!--
<div class="col-xs-12"  >
    <input type="button"    class="submit_button print_button" value="طباعة "/>
</div> -->
<style>

    @media print{
        .DivPrint_p{
            border:10px solid !important;
            padding: 5px 2% !important;

        }


        .DivPrint_p img {
            width: 1150px !important;
            height: 92px
        }
        .DivPrint_p p {
            text-align: center;
            margin-top: 2px;
        }
        #barcodeval{
            font-size: 35px;
            margin-top: 6px;

        }

        .DivPrint_p h4 {
            font-size: 40px ;
            text-align: center;
        }
        .print_button{
            display:none;
        }

    }
</style>
<script>
    function printdiv(printpage)
    {
        var headstr = "<html><head><style> @media print {.barcodeDiv { position: absolute;top: -5px;width: 100%;padding: 0px 2%;margin: 0px;border: 10px solid;}.barcodeDiv img {width: 1150px;height: 92px}.barcodeDiv p {text-align: center;margin-top: 2px;}#barcodeval{font-size: 35px;margin-top: 6px;}.barcodeDiv h4 {font-size: 40px ;text-align: center;}}</style><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
      //  window.close();
      //  document.body.innerHTML = oldstr;
       // return false;
    }


</script>

<?php  // $this->load->view('admin/requires/footer');?>
