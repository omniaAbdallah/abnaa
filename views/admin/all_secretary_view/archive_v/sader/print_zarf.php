
<style>

    .one {
        /* border-style: solid; */
        border-width: 1px;
        padding: 15px;
    }
    @page { size: landscape; }
    @media print{
        .DivPrint_p{
            /* border:10px solid !important; */
            padding: 5px 2% !important;
            margin:auto;
           /* size: landscape !important;*/
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

<body onload="printDiv('printDiv')" id="printDiv">

<div  class="DivPrint col-xs-10"  id="printableArea">
<div class="DivPrint_p ">
<div class="container">
        <div class="row">
            <div class="col-lg-12">
           
               
                <div class="col-lg-3" style="margin-top: 300px;">
                    <!-- <h4><span style="margin-left: 400px;">/<?=$all_print_zarf->start_title;?></span></h4> -->
                    <h4><span><?=$all_print_zarf->start_title;?> / <?=$all_print_zarf->geha_name;?></span></h4>
                    <h4><span style="margin-left: -500px;"><?=$all_print_zarf->end_title;?></span></h4>
                     
                   
                </div>
                 

            </div>

        </div>

 </div>
 </div>
 </div>

</body>


<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
    window.print();
    window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 