<style>
    .info_detailes {
        width: unset !important;
        border-top: 1px solid #ffffff !important;
        border-right: 1px solid #ffffff !important;
        background-color: #e4e4e4 !important;
        color: black !important;
        font-size: 15px !important;
    }
</style>
<div class="col-xs-12 no-padding">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="info_detailes">??? ???????</th>
            <td><?= $crm_data['rkm_visit'] ?></td>
            <th class="info_detailes">????? ???????</th>
            <td><?= $crm_data['visit_date'] ?></td>
            <th class="info_detailes"> (??)???? ???????</th>
            <td><?php echo $crm_data['visit_time_from'] ?></td>
        </tr>


        <tr>
            <th class="info_detailes">(???)???? ???????</th>
            <td><?php echo $crm_data['visit_time_to'] ?></td>

            <td class="info_detailes">??? ??????</td>
            <td><?= $crm_data['emp_name'] ?></td>
            <th class="info_detailes">??? ???? ????</th>
            <td><?php echo $crm_data['mother_national_num'] ?></td>
        </tr>


        <tr>
            <td class="info_detailes">??? ?????</td>
            <td> <?php
                $search_type_arr = array(1 => '????? ??????',
                    2 => '??? ?????');
                if (key_exists($crm_data['search_type'], $search_type_arr)) {
                    echo $search_type_arr[$crm_data['search_type']];
                }
                ?>
            </td>

            <th class="info_detailes">????? ?? ???????</th>
            <td colspan="3"> <?php echo $crm_data['visit_reason_title']; ?>
            </td>
        </tr>


        <tr>
            <th class="info_detailes"> ??????? ???????</th>
            <td colspan="5"><?php if (isset($crm_data["visit_result"])) {
                    if (!empty($crm_data["visit_result"])) {
                        echo $crm_data["visit_result"];
                    }
                } ?></td>
        </tr>
        </thead>
    </table>
    <?php if (isset($action_visit_history) and $action_visit_history != null) { ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="7" style="background: #ffa6aa;" colspan="5">???????? ???? ??? ??? ?????</th>
            </tr>
            <tr>
                <th scope="col">?</th>
                <th scope="col">???????</th>
                <th scope="col">??? ???????</th>
                <th scope="col">????? ???????</th>
                <th scope="col">?????? ????????</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($action_visit_history) and $action_visit_history != null) {
                $count = 1;
                ?>

                <?php foreach ($action_visit_history as $hist) {
                    $count++;
                    ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $hist->action_n ?></td>
                        <td><?= $hist->action_time ?></td>
                        <td><?= $hist->action_date ?></td>
                        <td><?= $hist->action_emp_name ?></td>
                    </tr>
                <?php }
            }
            ?>
            </tbody>
        </table>
    <?php } ?>
    <!--        <div id="loc" style=" height: 400px;"></div>-->
    <div class="clearfix">&nbsp;</div>
    <div class="m-t-small">
        <div class="col-sm-3">
            <input type="hidden" name="lat" class="form-control" style="width: 110px;font-family: arial"
                   id="loc-lat" value="<?php if (isset($crm_data["lat"])) {
                if (!empty($crm_data["lat"])) {
                    echo $crm_data["lat"];
                }
            } else {
                echo '26.37506589156855';
            } ?>"/>
        </div>
        <div class="col-sm-3">
            <input type="hidden" name="lng" class="form-control" style="width: 110px;font-family: arial"
                   id="loc-lon" value="<?php if (isset($crm_data["lng"])) {
                if (!empty($crm_data["lng"])) {
                    echo $crm_data["lng"];
                }
            } else {
                echo '43.97146415710449';
            } ?>"/>
        </div>
    </div>
    <div class="clearfix"></div>
    <!--  -->
    <!--<div class="col-md-4 form-group" id="Details">
        <?php /*if (isset($load_details) && (!empty($load_details))) {
//                    $data['file_num_data']=$file_num_data;
            $this->load->view($load_details);
        }*/
    ?>
    </div>-->
    <!--  -->
</div>
<!--<script type="text/javascript" src="<?php /*echo base_url() */ ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript"
        src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>
<script src="<? /*= base_url() . 'asisst/web_asset/' */ ?>js/locationpicker.jquery.js"></script>
<script>
    var latit = $('#loc-lat').val();
    var longit = $('#loc-lon').val();
    $('#loc').locationpicker({
        mapTypeId: google.maps.MapTypeId.HYBRID,
        location: {
            latitude: latit,
            longitude: longit
        },
        radius: 300,
        zoom: 12,
        inputBinding: {
            latitudeInput: $('#loc-lat'),
            longitudeInput: $('#loc-lon'),
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>-->