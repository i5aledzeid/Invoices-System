<?php
    // require_once 'db_conn.php';
    include '../../db_conn.php';
    require_once '../../phpqrcode/qrlib.php';
    $path = 'images/';
    $qrcode = $path.time() . '.png';
    $qrimage = time(). '.png';
    // if (isset($_REQUEST['button'])) {
    if (isset($_POST['submit'])) {
        
        ////////////////////////////////////////////////////////////////////////
        $qrtext = $_POST['qrtext'];
        $invoice_number = $_POST['invoice_number'];
        $workshop_title = $_POST['workshop_title'];
        $workshop_subtitle = $_POST['workshop_subtitle'];
        $workshop_phone = $_POST['workshop_phone'];
        $workshop_location = $_POST['workshop_location'];
        $title = "فاتورة";
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $_POST['total'];
        $subtitle = $_POST['subtitle'];
        $tax = $_POST['tax'];
        $date = $_POST['date'];
        $customer_name = $_POST['customer_name'];
        $created_at = date('Y-m-d');
        // `invoice_number`, `...`, `...`, ...
        $sql = "INSERT INTO `workshop` (`invoice_number`, `workshop_title`, `workshop_subtitle`, `workshop_phone`, `workshop_location`, `title`, `date`, `subtitle`, `price`, `qty`, `tax`, `total`, `image`, `hijri_date`, `customer_name`, `created_by`, `created_at`, `qrtext`, `qrimage`) 
        VALUES ('$invoice_number', '$workshop_title', '$workshop_subtitle', '$workshop_phone', '$workshop_location', '$title', '$date', '$subtitle', '$price', '$qty', '$tax', '$total', 'image', 'hijri_date', '$customer_name', 'خالد زيد', '$created_at', '$qrtext', '$qrimage')";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: add_workshop_invoices.php?msg=NEW");
        }
        else {
            echo "Failed: " . mysqli_error($conn);
        }
        ////////////////////////////////////////////////////////////////////////
        
        // $qrtext = $_REQUEST['qrtext'];
        /*$qrtext = $_POST['qrtext'];
        $query = mysqli_query($conn, "INSERT INTO `workshop` SET qrtext='$qrtext', qrimage='$qrimage'");
        if ($query) { ?>
            <script>
                alert("تم إضافة البيانات!");
            </script>
        <?php }
        else { ?>
            <script>
                alert("Not!");
            </script>
        <?php }*/
    }
    QRcode::png($qrtext, $qrcode, 'H', 4, 4);
    echo '<img src='. $qrcode .'>';

    $qrimage = time(). '.png';
    
    /*if (isset($_POST['submit'])) {
        $invoice_number = $_POST['invoice_number'];
        $workshop_title = $_POST['workshop_title'];
        $workshop_subtitle = $_POST['workshop_subtitle'];
        $workshop_phone = $_POST['workshop_phone'];
        $workshop_location = $_POST['workshop_location'];
        $title = "فاتورة";

        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $_POST['total'];
        $subtitle = $_POST['subtitle'];
        $tax = $_POST['tax'];
        
        $date = $_POST['date'];
        $created_at = date('Y-m-d');
        
        ///////
        // $qrtext = $_POST['qrtext'];
        
        $sql = "INSERT INTO `workshop` (`id`, `invoice_number`, `workshop_title`, `workshop_subtitle`, `workshop_phone`, `workshop_location`, `title`, `date`, `subtitle`, `price`, `qty`, `tax`, `total`, `image`, `hijri_date`, `customer_name`, `created_by`, `created_at`, `qrtext`, `qrimage`) 
        VALUES (NULL, '$invoice_number', '$workshop_title', '$workshop_subtitle', '$workshop_phone', '$workshop_location', '$title', '$date', '$subtitle', '$price', '$qty', '$tax', '$total', 'image', 'hijri_date', 'customer_name', 'خالد زيد', '$created_at', '$qrtext', '$qrimage')";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: add_workshop_invoices.php?msg=NEW");
        }
        else {
            echo "Failed: " . mysqli_error($conn);
        }
        
    }*/
    
?>