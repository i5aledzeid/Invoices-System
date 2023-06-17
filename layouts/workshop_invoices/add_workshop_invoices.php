<?php
    include "../../db_conn.php";
    // require_once '../../db_conn.php';
    /*require_once '../../phpqrcode/qrlib.php';
    $path = 'images/';
    $qrcode = $path.time() . '.png';*/
    $qrimage = time(). '.png';
    
    if (isset($_POST['submit'])) {
        $invoice_number = $_POST['invoice_number'];
        $workshop_title = $_POST['workshop_title'];
        $workshop_subtitle = $_POST['workshop_subtitle'];
        $workshop_phone = $_POST['workshop_phone'];
        $workshop_location = $_POST['workshop_location'];
        $title = "فاتورة";

        $price = $_POST['price'];
        $price2 = $_POST['price2'];
        $price3 = $_POST['price3'];
        $price4 = $_POST['price4'];
        $price5 = $_POST['price5'];
        $price6 = $_POST['price6'];
        $qty = $_POST['qty'];
        $qty2 = $_POST['qty2'];
        $qty3 = $_POST['qty3'];
        $qty4 = $_POST['qty4'];
        $qty5 = $_POST['qty5'];
        $qty6 = $_POST['qty6'];
        $total = $_POST['total'];
        $total2 = $_POST['total2'];
        $total3 = $_POST['total3'];
        $total4 = $_POST['total4'];
        $total5 = $_POST['total5'];
        $total6 = $_POST['total6'];
        $subtitle = $_POST['subtitle'];
        $subtitle2 = $_POST['subtitle2'];
        $subtitle3 = $_POST['subtitle3'];
        $subtitle4 = $_POST['subtitle4'];
        $subtitle5 = $_POST['subtitle5'];
        $subtitle6 = $_POST['subtitle6'];
        $tax = $_POST['tax'];
        $customer_name = $_POST['customer_name'];
        
        $date = $_POST['date'];
        $created_at = date('Y-m-d');
        
        ///////
        // $qrtext = $_POST['qrtext'];
        
        $sql = "INSERT INTO `workshop` (`id`, `invoice_number`, `workshop_title`, `workshop_subtitle`, `workshop_phone`, `workshop_location`, `title`, `date`, `subtitle`, `subtitle2`, `subtitle3`, `subtitle4`, `subtitle5`, `subtitle6`, `price`, `price2`, `price3`, `price4`, `price5`, `price6`, `qty`, `qty2`, `qty3`, `qty4`, `qty5`, `qty6`, `tax`, `total`, `total2`, `total3`, `total4`, `total5`, `total6`, `image`, `hijri_date`, `customer_name`, `created_by`, `created_at`, `qrtext`, `qrimage`) 
        VALUES (NULL, '$invoice_number', '$workshop_title', '$workshop_subtitle', '$workshop_phone', '$workshop_location', '$title', '$date', '$subtitle', '$subtitle2', '$subtitle3', '$subtitle4', '$subtitle5', '$subtitle6', '$price', '$price2', '$price3', '$price4', '$price5', '$price6', '$qty', '$qty2', '$qty3', '$qty4', '$qty5', '$qty6', '$tax', '$total', '$total2', '$total3', '$total4', '$total5', '$total6', 'image', 'hijri_date', '$customer_name', 'خالد زيد', '$created_at', '', '')";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: add_workshop_invoices.php?msg=NEW");
        }
        else {
            echo "Failed: " . mysqli_error($conn);
        }
        
        /*if ($query) {
            echo '
                <script>
                    alert("Data insert successfully!");
                </script>
            ';
        }
        QRcode::png($qrtext, $qrcode, 'H', 4, 4);
        echo '<img src='. $qrcode .'>';*/
    }
    
    /*if (isset($_REQUEST['submit'])) {
        $qrtext = $_REQUEST['qrtext'];
        $query = mysqli_query($conn, "INSERT INTO workshop SET qrtext='$qrtext', qrimage='$qrimage'");
        if ($query) { ?>
            <script>
                alert("Data insert successfully!");
            </script>
        <?php }
    }
    QRcode::png($qrtext, $qrcode, 'H', 4, 4);
    echo '<img src='. $qrcode .'>';*/
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>إضافة فاتورة</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style-invoice-3.css">
	<?php include "../../functions/remove_branding.php"; ?>
	<style>
	    input {
	        background: #FF4546;
	    }
	
	    #addButton {
	        left: 400px;
	        bottom: -200px;
	        background: #FF4546;
	        border-radius: 8px;
	        position: absolute;
	        border: none;
	        font-weight: bold;
	        padding: 8px;
	        padding-right: 16px;
	        padding-left: 16px;
	        cursor: pointer;
	    }
	    
	    #addButton:hover {
	        background: #fa7576;
	    }
	    
	</style>
</head>
<body>

<div class="wrapper">
	<div class="invoice_wrapper">
	    <form action="qr.php" method="post">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<!-- <img src="mkh.png" alt="code logo"> -->
					<div class="title_wrap">
						<p class="title bold">
						    <!-- disabled -->
						    <input type="text" name="workshop_title" value="ورشة الحماد" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" readonly>
						</p>
						<p class="sub_title">
							<input type="text" name="workshop_subtitle" value="لصيانة سيارات الديزل" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" readonly>
						</p>
						<p class="sub_title">
                            <label for="workshop_phone">جوال</label>
							<input type="text" name="workshop_phone" value="0501222376" style="height: 19px; width: 100%; border: none; border: 2px solid white;" readonly>
						</p>
						<p class="sub_title">
						    <input type="text" name="workshop_location" value="الرياض - السلي - صناعية الفوزان" style="height: 19px; width: 100%; border: none; border: 2px solid white;" readonly>
						</p>
					</div>
				</div>
				<div class="logo_sec">
					<img src="../../assets/images/screenshots/mkh-black-white.png" alt="code logo">
				</div>
				<div class="invoice_sec">
					<!-- <p class="invoice bold">INVOICE</p> -->
					<p class="title bold" style="padding-bottom: 4px;">Al-Hamad Workshop</p>
					<p class="sub_title" style="font-size: 10px; padding-bottom: 4px;">Miantenance Diesel Cars</p>
					<p class="sub_title" style="font-size: 10px; padding-bottom: 4px;">Mobile: 0501222376</p>
					<p class="sub_title" style="font-size: 10px; padding-bottom: 4px;">Riyadh - Al Sulai - Al-Fozan Ind.</p>
					<!-- <p class="invoice_no">
						<span class="bold">Invoice</span>
						<span>#3488</span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span>08/Jan/2022</span>
					</p> -->
				</div>
			</div>
            
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<!-- <p>Bill To</p> -->
	          		<p class="bold name">
						التاريخ:
						<span id="date">
						    <input type="date" name="date" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</span>
					</p>
					<p class="bold name">
						الموافق:
						<span id="date">
						    <input type="text" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</span>
					</p>
			        <!-- <span>
			           123 walls street, Townhall<br/>
			           +111 222345667
			        </span> -->
				</div>
				<div class="total_wrap">
					<p class="invoice bold" style="text-align: center;">
						فاتورة
						<br>
						INVOICE
					</p>
				</div>
				<div class="total_wrap">
					<p>رقم الفاتورة</p>
	          		<p class="bold price">
	          		    <input type="text" name="invoice_number" id="invoice_number" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" maxlength="10" required placeholder="رقم الفاتورة" onchange="findQR()">
	          		    <p class="bold price">
	          		    <input type="hidden" name="qrtext" id="qrtext" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" maxlength="10" required placeholder="QR">
	          		</p>
				</div>
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no" style="text-align: center;">NO.</div>
						<div class="col col_total" style="text-align: center;">القيمة الإجمالية</div>
						<div class="col col_price" style="text-align: center;">السعر الفردي</div>
						<div class="col col_qty" style="text-align: center;">الكمية</div>
						<div class="col col_des" style="text-align: center;">البيان</div>
					</div>
				</div>
				<div class="table_body" onmouseover="findSumTotals8()">
					<div class="row">
						<div class="col col_no">
							<p>01</p>
						</div>
						<div class="col col_total">
							<input type="text" name="total" id="total" onmouseover="findSumTotals8()" value="0" style="text-align: center; height: 19px; border: none; width: 100%; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_price">
							<input type="text" name="price" id="price" value="0" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_qty">
							<input type="text" name="qty" id="qty" value="0" onchange="findTotal()" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_des">
							<p class="bold"></p>
							<input type="text" name="subtitle" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" required>
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>02</p>
						</div>
						<div class="col col_total">
							<input type="text" name="total2" id="total2" value="0" onmouseover="findSumTotals8()" style="text-align: center; height: 19px; border: none; width: 100%; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_price">
							<input type="text" name="price2" id="price2" value="0" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_qty">
							<input type="text" name="qty2" id="qty2" value="0" onchange="findTotal2()" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_des">
							<p class="bold"></p>
							<input type="text" name="subtitle2" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>03</p>
						</div>
						<div class="col col_total">
							<input type="text" name="total3" id="total3" value="0" onmouseover="findSumTotals8()" style="text-align: center; height: 19px; border: none; width: 100%; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_price">
							<input type="text" name="price3" id="price3" value="0" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_qty">
							<input type="text" name="qty3" id="qty3" value="0" onchange="findTotal3()" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_des">
							<p class="bold"></p>
							<input type="text" name="subtitle3" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>04</p>
						</div>
						<div class="col col_total">
							<input type="text" name="total4" id="total4" value="0" onmouseover="findSumTotals8()" style="text-align: center; height: 19px; border: none; width: 100%; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_price">
							<input type="text" name="price4" id="price4" value="0" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_qty">
							<input type="text" name="qty4" id="qty4" value="0" onchange="findTotal4()" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_des">
							<p class="bold"></p>
							<input type="text" name="subtitle4" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>05</p>
						</div>
						<div class="col col_total">
							<input type="text" name="total5" id="total5" value="0" onmouseover="findSumTotals8()" style="text-align: center; height: 19px; border: none; width: 100%; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_price">
							<input type="text" name="price5" id="price5" value="0" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_qty">
							<input type="text" name="qty5" id="qty5" value="0" onchange="findTotal5()" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_des">
							<p class="bold"></p>
							<input type="text" name="subtitle5" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
					</div>
					<div class="row">
						<div class="col col_no">
							<p>06</p>
						</div>
						<div class="col col_total">
							<input type="text" name="total6" id="total6" value="0" onmouseover="findSumTotals8()" style="text-align: center; height: 19px; border: none; width: 100%; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_price">
							<input type="text" name="price6" id="price6" value="0" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_qty">
							<input type="text" name="qty6" id="qty6" value="0" onchange="findTotal6()" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
						<div class="col col_des">
							<p class="bold"></p>
							<input type="text" name="subtitle6" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
						</div>
					</div>
				</div>
			</div><br>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold name" style="font-size: 16px;">
							إلى السيد:
						<span id="date">
							<input type="text" name="customer_name" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" required>
						</span>
					</p><br>
					<p class="bold">آلية الدفع</p>
					<p>كاش</p>
				</div>
				<div class="grandtotal_sec">
			        <p class="bold">
			            <span>المجموع</span>
			            <span>
			                <input type="text" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
			            </span>
			        </p>
			        <p>
			            <span>الضريبة</span>
			            <span>
			               <input type="text" name="tax" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;" value="15" readonly>
			            </span>
			        </p>
			       	<p class="bold">
			            <span>الإجمالي</span>
			            <span>
			                <input type="text" id="sumtotals" style="height: 19px; width: 100%; border: none; border: 2px solid white; box-sizing: border-box;">
			                 ريال سعودي</span>
			        </p>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>شكراً لكم لتعاملكم معنا</p>
			<div class="terms">
		        <p class="tc bold">مؤسسة ماجد خالد الحماد</p>
		        <p>ورشة الحمَّاد لصيانة سيارات الديزل</p>
				<!--<img src="1686550606.png" alt="qr" id="qr">-->
				<input type="submit" name="submit" id="addButton" value="إضافة فاتورة" class="btn btn-success">
		    </div>
		</div>
		</form>
	</div>
</div>
<script>
    function findTotal() {
        var tot = 0;
        var arr1 = document.getElementById('price').value;
        var arr7 = document.getElementById('qty').value;
        tot = (arr1 * arr7);
        document.getElementById('total').value = tot;
    }
    function findTotal2() {
        var tot2 = 0;
        var arr2 = document.getElementById('price2').value;
        var arr8 = document.getElementById('qty2').value;
        tot2 = (arr2 * arr8);
        document.getElementById('total2').value = tot2;
    }
    function findTotal3() {
        var tot3 = 0;
        var arr3 = document.getElementById('price3').value;
        var arr9 = document.getElementById('qty3').value;
        tot3 = (arr3 * arr9);
        document.getElementById('total3').value = tot3;
    }
    function findTotal4() {
        var tot4 = 0;
        var arr4 = document.getElementById('price4').value;
        var arr10 = document.getElementById('qty4').value;
        tot4 = (arr4 * arr10);
        document.getElementById('total4').value = tot4;
    }
    function findTotal5() {
        var tot5 = 0;
        var arr5 = document.getElementById('price5').value;
        var arr11 = document.getElementById('qty5').value;
        tot5 = (arr5 * arr11);
        document.getElementById('total5').value = tot5;
    }
    function findTotal6() {
        var tot6 = 0;
        var arr6 = document.getElementById('price6').value;
        var arr12 = document.getElementById('qty6').value;
        tot6 = (arr6 * arr12);
        document.getElementById('total6').value = tot6;
    }
    function findSumTotals8() {
        var t7 = 0;
        var t1 = Number(document.getElementById('total').value);
        var t2 = Number(document.getElementById('total2').value);
        var t3 = Number(document.getElementById('total3').value);
        var t4 = Number(document.getElementById('total4').value);
        var t5 = Number(document.getElementById('total5').value);
        var t6 = Number(document.getElementById('total6').value);
        t7 = (t1 + t2 + t3 + t4 + t5 + t6);
        document.getElementById('sumtotals').value = t7;
        // alert(t7);
    }
    function findQR() {
        qr = document.getElementById('invoice_number').value;
        var ttt = document.getElementById('qrtext').value = "https://mkh888.000webhostapp.com/layouts/workshop_invoices/view_workshop_invoice.php?id=" + qr;
        alert(ttt);
        /*
        var qr = document.getElementById('invoice_number').value;
        var tt = document.getElementById('qrtext').value = "https://mkh888.000webhostapp.com/layouts/workshop_invoices/view_workshop_invoice.php?id=" + qr;
        alert(tt);
        */
    }
</script>
</body>
</html>