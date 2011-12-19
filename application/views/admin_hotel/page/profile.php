<?php

$o = <<<HTML
<!-- profile.php -->
<div class="content-admin-right"><a id="c119"></a>
    <div class="tx-rwadminhotelmlm-pi1">
        <link type="text/css" href="$asset_url/admin_hotel/styleTableSorter.css" rel="stylesheet" />
        <link type="text/css" href="$asset_url/admin_hotel/style.css" rel="stylesheet" />
        <link type="text/css" href="$asset_url/admin_hotel/form.css" rel="stylesheet" />
        <script type="text/javascript" src="$asset_url/admin_hotel/jquery-latest.js"></script>
        <script type="text/javascript" src="$asset_url/admin_hotel/jquery.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#tablesorter-demo").tablesorter({sortList:[[0,0],[2,1]], widgets: ["zebra"]});
                $("#options").tablesorter({sortList: [[0,0]], headers: { 3:{sorter: false}, 4:{sorter: false}}});
            });
            function deletedRecord(url,name,uid){
                var response = confirm("Are you sure to delete '"+name+"' ?")
                if (response){
                    //window.location.href = url+"?tx_rwadminhotelmlm_pi1[action]=delete";
                    window.location.href = url+"?tx_rwadminhotelmlm_pi1[action]=delete&tx_rwadminhotelmlm_pi1[uidRoom]="+uid;
                }
            };
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#destination").change(function(){
                    var destination = $("#destination").val();
                    $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "$current_url?eID=tx_rwadminhotelmlm_pi1&cmd=getDestinationProfile&destination="+destination,
                        //data: "country="+country,
                        success: function(msg){
                            $("#destination_detail").html(msg.valueOf());
                        }
                    });

                });

                $("#destination_detail").change(function(){
                    var propinsi = $("#destination_detail").val();
                    $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "$current_url?eID=tx_rwadminhotelmlm_pi1&cmd=getCity&propinsi="+propinsi,
                        //data: "country="+country,
                        //cache: false,
                        success: function(msg){
                            //alert(msg.valueOf());
                            $("#kota").html(msg.valueOf());
                        }
                    });
                });

                $("#datepicker1").click(function(){
                    alert();
                    var datepicker = $("#datepicker").val();
                    var datepickers = $("#datepicker1").val();
                    $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "$current_url?eID=tx_rwadminhotelmlm_pi1&cmd=getDatepicker&datepicker="+datepicker+"&datepickers="+datepickers,
                        //data: "country="+country,
                        //cache: false,
                        success: function(msg){
                            //alert(msg);
                            $("#night").val(msg.valueOf());
                            alert(msg.valueOf());
                        }
                    });
                });
            });
        </script>
        <div id="pack" style="border: 1px solid rgb(187, 187, 187); overflow: auto; width: 100%; height: 500px; ">
            <table id="tablesorter-demo" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
                <tbody>
                <form action="$form_action" method="POST" enctype="multipart/form-data">
                    <tr class="even">
                        <td>Hotel Name</td>
                        <td><input type="text" name='hotel_name' value="$hotel_name" $disable size="50"/></td>
                    </tr>
                    <tr class="odd">
                        <td>Location</td>
                        <td>
                            <textarea name='location' cols="38" $disable>$location</textarea>
                        </td>
                    </tr>
                    <tr class="even">
                        <td>Destination</td>
                        <td>$destination</td>
                    </tr>
                    $DestDetail
                    <tr class="even">
                        <td>Star</td>
                        <td>$star</td>
                    </tr>
                    <tr class="odd">
                        <td>Image</td>
                        <td>
                            <img src="$upload_url/tx_rwadminhotel_mlm/$image" width=320px; height=150px;>
                            $upload_button
                        </td>

                    </tr>
                    <tr class="even">
                        <td>Description</td>
                        <td>
                            <textarea name="desc" cols="38" $disable>$description</textarea>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td>Google Map</td>
                        <td>
                            <textarea name="map" cols="38" $disable>$map</textarea>
                        </td>
                    </tr>
                    <tr class="even">
                        <td>Email</td>
                        <td><input type="text" name="email" value="$email" $disable size="50"/></td>
                    </tr>
                    $form_button
                </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
HTML;

echo $o;