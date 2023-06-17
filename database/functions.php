<?php
    require_once('db_conn.php');

    /*function display_data() {
        global $conn;
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sum_data() {
        global $conn;
        $query = "SELECT SUM(payload_total) As sum FROM drivers";
        $result = mysqli_query($conn, $query);
        return $result;
    }*/
    
    // service_value

    /*function display_sum_where_data() {
        global $conn;
        $query = "SELECT SUM(service_value) As a FROM drivers WHERE `month`='5' AND `week`='1'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sums_where_data() {
        global $conn;
        $query = "SELECT SUM(service_value) As b FROM drivers WHERE `month`='5' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumss_where_data() {
        global $conn;
        $query = "SELECT SUM(service_value) As c FROM drivers WHERE `month`='5' AND `week`='3'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumsss_where_data() {
        global $conn;
        $query = "SELECT SUM(service_value) As d FROM drivers WHERE `month`='5' AND `week`='4'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    
    function display_sum_where_date(/*$op, $table, int $m, int $w*///) {
        //global $conn;
        // $query = "SELECT SUM('$op') As x FROM '$table' WHERE `month`='$m' AND `week`='$w'";
        /*$query = "SELECT SUM(diesel) As x FROM drivers WHERE `month`='1' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }*/
    
    // payload_total

    /*function display_sum_where_data_payload_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As a FROM drivers WHERE `month`='5' AND `week`='1'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sums_where_data_payload_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As b FROM drivers WHERE `month`='5' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumss_where_data_payload_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As c FROM drivers WHERE `month`='5' AND `week`='3'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumsss_where_data_payload_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As d FROM drivers WHERE `month`='5' AND `week`='4'";
        $result = mysqli_query($conn, $query);
        return $result;
    }*/
    
    // diesel
    
    /*function display_sum_where_data_diesel() {
        global $conn;
        $query = "SELECT SUM(diesel) As a FROM drivers WHERE `month`='5' AND `week`='1'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sums_where_data_diesel() {
        global $conn;
        $query = "SELECT SUM(diesel) As b FROM drivers WHERE `month`='5' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumss_where_data_diesel() {
        global $conn;
        $query = "SELECT SUM(diesel) As c FROM drivers WHERE `month`='5' AND `week`='3'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumsss_where_data_diesel() {
        global $conn;
        $query = "SELECT SUM(diesel) As d FROM drivers WHERE `month`='5' AND `week`='4'";
        $result = mysqli_query($conn, $query);
        return $result;
    }*/
    
    // trip_total
    
    /*function display_sum_where_data_trip_total() {
        global $conn;
        $query = "SELECT SUM(trip_total) As a FROM drivers WHERE `month`='5' AND `week`='1'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sums_where_data_trip_total() {
        global $conn;
        $query = "SELECT SUM(trip_total) As b FROM drivers WHERE `month`='5' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumss_where_data_trip_total() {
        global $conn;
        $query = "SELECT SUM(trip_total) As c FROM drivers WHERE `month`='5' AND `week`='3'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumsss_where_data_trip_total() {
        global $conn;
        $query = "SELECT SUM(trip_total) As d FROM drivers WHERE `month`='5' AND `week`='4'";
        $result = mysqli_query($conn, $query);
        return $result;
    }*/
    
    // discounts
    
    /*function display_sum_where_data_discounts() {
        global $conn;
        $query = "SELECT SUM(discounts) As a FROM drivers WHERE `month`='5' AND `week`='1'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sums_where_data_discounts() {
        global $conn;
        $query = "SELECT SUM(discounts) As b FROM drivers WHERE `month`='5' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumss_where_data_discounts() {
        global $conn;
        $query = "SELECT SUM(discounts) As c FROM drivers WHERE `month`='5' AND `week`='3'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumsss_where_data_discounts() {
        global $conn;
        $query = "SELECT SUM(discounts) As d FROM drivers WHERE `month`='5' AND `week`='4'";
        $result = mysqli_query($conn, $query);
        return $result;
    }*/
    
    // total
    
    /*function display_sum_where_data_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As a FROM drivers WHERE `month`='5' AND `week`='1'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sums_where_data_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As b FROM drivers WHERE `month`='5' AND `week`='2'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumss_where_data_total() {
        global $conn;
        $query = "SELECT SUM(payload_total) As c FROM drivers WHERE `month`='5' AND `week`='3'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function display_sumsss_where_data_total() {
        global $conn;
        // $total = 0;
        /*$query = "SELECT SUM(payload_total) As d1 FROM drivers WHERE `month`='5' AND `week`='4'";
        $query2 = "SELECT SUM(trip_total) As d2 FROM drivers WHERE `month`='5' AND `week`='4'";
        $query3 = "SELECT SUM(diesel) As d3 FROM drivers WHERE `month`='5' AND `week`='4'";
        $query4 = "SELECT SUM(service_value) As d4 FROM drivers WHERE `month`='5' AND `week`='4'";
        $total = $query + $query2 + $query3 + $query4;
        $result = mysqli_query($conn, $total);
        return $result;*/
    /*}*/
?>