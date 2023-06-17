<?php
    function newLine() {
        echo "<br>";
    }
?>


<?php

function getTotalOfMonth5()
{
    include 'db_conn.php';
    echo '<p>';
    echo 'المجموع';

    $total = 0;

    $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='5' AND `week`='1'";
    $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='5' AND `week`='1'";
    $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='5' AND `week`='1'";
    $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='5' AND `week`='1'";
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    $result3 = mysqli_query($conn, $query3);
    $result4 = mysqli_query($conn, $query4);

    $query5 = "SELECT SUM(payload_total) As sumOf2 FROM drivers WHERE `month`='5' AND `week`='2'";
    $query6 = "SELECT SUM(trip_total) As sumOfIn2 FROM drivers WHERE `month`='5' AND `week`='2'";
    $query7 = "SELECT SUM(diesel) As sumOfTo2 FROM drivers WHERE `month`='5' AND `week`='2'";
    $query8 = "SELECT SUM(service_value) As sumOfFor2 FROM drivers WHERE `month`='5' AND `week`='2'";

    $result5 = mysqli_query($conn, $query5);
    $result6 = mysqli_query($conn, $query6);
    $result7 = mysqli_query($conn, $query7);
    $result8 = mysqli_query($conn, $query8);

    $query9 = "SELECT SUM(payload_total) As sumOf3 FROM drivers WHERE `month`='5' AND `week`='3'";
    $query10 = "SELECT SUM(trip_total) As sumOfIn3 FROM drivers WHERE `month`='5' AND `week`='3'";
    $query11 = "SELECT SUM(diesel) As sumOfTo3 FROM drivers WHERE `month`='5' AND `week`='3'";
    $query12 = "SELECT SUM(service_value) As sumOfFor3 FROM drivers WHERE `month`='5' AND `week`='3'";

    $result9 = mysqli_query($conn, $query9);
    $result10 = mysqli_query($conn, $query10);
    $result11 = mysqli_query($conn, $query11);
    $result12 = mysqli_query($conn, $query12);

    $query13 = "SELECT SUM(payload_total) As sumOf4 FROM drivers WHERE `month`='5' AND `week`='4'";
    $query14 = "SELECT SUM(trip_total) As sumOfIn4 FROM drivers WHERE `month`='5' AND `week`='4'";
    $query15 = "SELECT SUM(diesel) As sumOfTo4 FROM drivers WHERE `month`='5' AND `week`='4'";
    $query16 = "SELECT SUM(service_value) As sumOfFor4 FROM drivers WHERE `month`='5' AND `week`='4'";

    $result13 = mysqli_query($conn, $query13);
    $result14 = mysqli_query($conn, $query14);
    $result15 = mysqli_query($conn, $query15);
    $result16 = mysqli_query($conn, $query16);

    while ($row = mysqli_fetch_assoc($result)) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            while ($row3 = mysqli_fetch_assoc($result3)) {
                while ($row4 = mysqli_fetch_assoc($result4)) {

                    while ($row5 = mysqli_fetch_assoc($result5)) {
                        while ($row6 = mysqli_fetch_assoc($result6)) {
                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                while ($row8 = mysqli_fetch_assoc($result8)) {

                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                while ($row12 = mysqli_fetch_assoc($result12)) {

                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                        while ($row14 = mysqli_fetch_assoc($result14)) {
                                                            while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                while ($row16 = mysqli_fetch_assoc($result16)) {

                                                                    $total = ($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']))
                                                                        + ($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))
                                                                        + ($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))
                                                                        + ($row13['sumOf4'] - ($row14['sumOfIn4'] + $row15['sumOfTo4'] + $row16['sumOfFor4']));
                                                                    if ($total != 0) {
                                                                        echo number_format($total, 2);
                                                                    } else {
                                                                        echo '' . '0.00';
                                                                    }

                                                                }
                                                            }
                                                        }
                                                    }

                                                }
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }

                }
            }
        }
    }
    echo '</p>';
}

?>