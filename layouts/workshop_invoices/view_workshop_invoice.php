<?php
    session_start();
    include('../../db_conn.php');
    require_once('../../functions/hirji.class.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `workshop` WHERE invoice_number='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
?>
<!DOCTYPE html>
<html>

<head>
	<title>عرض الفاتورة</title>
	<link rel="stylesheet" href="../../assets/css/style-invoice-2.css">
	<?php include "../../functions/remove_branding.php"; ?>
	<style>
	    body {
	        /* change it */
	        background-color: #fff;
	    }
	</style>
</head>

<body>

	<div class="wrapper">
		<div class="invoice_wrapper">
			<div class="header">
				<div class="logo_invoice_wrap">
					<div class="logo_sec">
						<!-- <img src="mkh.png" alt="code logo"> -->
						<div class="title_wrap">
							<p class="title bold" style="font-size: 22px;">
							    <?php
                                    echo $row['workshop_title'];
                                ?>
							</p>
							<p class="sub_title" style="font-size: 15px;">
							    <?php
                                    echo $row['workshop_subtitle'];
                                ?>
							</p>
							<p class="sub_title" style="font-size: 15px;">جوال: 
							    <?php
                                    echo $row['workshop_phone'];
                                ?>
							</p>
							<p class="sub_title" style="font-size: 15px;">
							    <?php
                                    echo $row['workshop_location'];
                                ?>
							</p>
						</div>
					</div>
					<div class="logo_sec">
						<img src="../../assets/images/screenshots/mkh-black-white.png" alt="code logo">
					</div>
					<div class="invoice_sec">
						<!-- <p class="invoice bold">INVOICE</p> -->
						<p class="title bold" style="padding-bottom: 4px; font-size: 18px;">Al-Hamad Workshop</p>
						<p class="sub_title" style="font-size: 10px; padding-bottom: 4px; font-size: 14px;">Miantenance Diesel Cars</p>
						<p class="sub_title" style="font-size: 10px; padding-bottom: 4px; font-size: 14px;">Mobile: 050122376</p>
						<p class="sub_title" style="font-size: 10px; padding-bottom: 4px; font-size: 14px; direction: ltr; text-align: left;">Riyadh - Al Sulai - Al-Fozan
							Ind.</p>
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
						<p class="bold name" style="font-size: 16px; padding-bottom: 8px;">
							التاريخ:
							<span id="date">
							    <?php
                                    echo $row['date'] . ' م';
                                ?>
							</span>
						</p>
						<p class="bold name" style="font-size: 16px;">
							الموافق:
							<span id="date">
							    <?php
                                    // echo $row['hijri_date'];
                                    echo (new hijri\datetime())->format('D _j _M _Yهـ');
                                ?>
							</span>
						</p>
						<br>
						<p class="bold name" style="font-size: 16px;">
							إلى السيد:
							<span id="date">
							    <?php
                                    echo $row['customer_name'];
                                ?>
							</span>
						</p>
						<!-- <span>
			           123 walls street, Townhall<br/>
			           +111 222345667
			        </span> -->
					</div>
					<div class="total_wrap">
						<p class="invoice bold" style="text-align: center; padding-left: 130px;">
							<?php
                                echo $row['title'];
                            ?>
							<br>
							INVOICE
						</p>
					</div>
					<div class="total_wrap">
						<p>رقم الفاتورة</p>
						<p class="bold price">
						    <?php
                                echo $row['invoice_number'];
                            ?>
                        </p>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="main_table">
					<div class="table_header">
						<div class="row">
							<div class="col col_no" style="text-align: center;">#</div>
							<div class="col col_total" style="text-align: center; font-weight: bold;
    font-size: 16px;">القيمة الإجمالية</div>
							<div class="col col_price" style="text-align: center; font-weight: bold;
    font-size: 16px;">السعر الفردي</div>
							<div class="col col_qty" style="text-align: center; font-weight: bold;
    font-size: 16px;">الكمية</div>
							<div class="col col_des" style="text-align: center; font-weight: bold;
    font-size: 16px;">البيان</div>
						</div>
					</div>
					<div class="table_body">
						<div class="row">
							<div class="col col_no" style="border: 1px solid black; border-collapse: collapse;">
								<p>01</p>
							</div>
							<div class="col col_total" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['total'] == 0) {
								        echo '';
								    } else {
								        echo number_format($row['total'], 2);
								    }
								?></p>
							</div>
							<div class="col col_price" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['price'] == 0) {
								        echo '';
								    } else {
								        echo $row['price'];
								    }
								?></p>
							</div>
							<div class="col col_qty" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['qty'] == 0) {
								        echo '';
								    } else {
								        echo $row['qty'];
								    }
								?></p>
							</div>
							<div class="col col_des" style="border: 1px solid black; border-collapse: collapse;">
								<p class="bold"><?php echo $row['subtitle']; ?></p>
								<p></p>
							</div>
						</div>
						<div class="row">
							<div class="col col_no" style="border: 1px solid black; border-collapse: collapse;">
								<p>02</p>
							</div>
							<div class="col col_total" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['total2'] == 0) {
								        echo '';
								    } else {
								        echo number_format($row['total2'], 2);
								    }
								?></p>
							</div>
							<div class="col col_price" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['price2'] == 0) {
								        echo '';
								    } else {
								        echo $row['price2'];
								    }
								?></p>
							</div>
							<div class="col col_qty" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['qty2'] == 0) {
								        echo '';
								    } else {
								        echo $row['qty2'];
								    }
								?></p>
							</div>
							<div class="col col_des" style="border: 1px solid black; border-collapse: collapse;">
								<p class="bold"><?php echo $row['subtitle2']; ?></p>
								<p></p>
							</div>
						</div>
						<div class="row">
							<div class="col col_no" style="border: 1px solid black; border-collapse: collapse;">
								<p>03</p>
							</div>
							<div class="col col_total" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['total3'] == 0) {
								        echo '';
								    } else {
								        echo number_format($row['total3'], 2);
								    }
								?></p>
							</div>
							<div class="col col_price" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['price3'] == 0) {
								        echo '';
								    } else {
								        echo $row['price3'];
								    }
								?></p>
							</div>
							<div class="col col_qty" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['qty3'] == 0) {
								        echo '';
								    } else {
								        echo $row['qty3'];
								    }
								?></p>
							</div>
							<div class="col col_des" style="border: 1px solid black; border-collapse: collapse;">
								<p class="bold"><?php echo $row['subtitle3']; ?></p>
								<p></p>
							</div>
						</div>
						<div class="row">
							<div class="col col_no" style="border: 1px solid black; border-collapse: collapse;">
								<p>04</p>
							</div>
							<div class="col col_total" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['total4'] == 0) {
								        echo '';
								    } else {
								        echo number_format($row['total4'], 2);
								    }
								?></p>
							</div>
							<div class="col col_price" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['price4'] == 0) {
								        echo '';
								    } else {
								        echo $row['price4'];
								    }
								?></p>
							</div>
							<div class="col col_qty" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['qty4'] == 0) {
								        echo '';
								    } else {
								        echo $row['qty4'];
								    }
								?></p>
							</div>
							<div class="col col_des" style="border: 1px solid black; border-collapse: collapse;">
								<p class="bold"><?php echo $row['subtitle4']; ?></p>
								<p></p>
							</div>
						</div>
						<div class="row">
							<div class="col col_no" style="border: 1px solid black; border-collapse: collapse;">
								<p>05</p>
							</div>
							<div class="col col_total" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['total5'] == 0) {
								        echo '';
								    } else {
								        echo number_format($row['total5'], 2);
								    }
								?></p>
							</div>
							<div class="col col_price" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['price5'] == 0) {
								        echo '';
								    } else {
								        echo $row['price5'];
								    }
								?></p>
							</div>
							<div class="col col_qty" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['qty5'] == 0) {
								        echo '';
								    } else {
								        echo $row['qty5'];
								    }
								?></p>
							</div>
							<div class="col col_des" style="border: 1px solid black; border-collapse: collapse;">
								<p class="bold"><?php echo $row['subtitle5']; ?></p>
								<p></p>
							</div>
						</div>
						<div class="row">
							<div class="col col_no" style="border: 1px solid black; border-collapse: collapse;">
								<p>06</p>
							</div>
							<div class="col col_total" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['total6'] == 0) {
								        echo '';
								    } else {
								        echo number_format($row['total6'], 2);
								    }
								?></p>
							</div>
							<div class="col col_price" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['price6'] == 0) {
								        echo '';
								    } else {
								        echo $row['price6'];
								    }
								?></p>
							</div>
							<div class="col col_qty" style="border: 1px solid black; border-collapse: collapse;">
								<p><?php
								    if ($row['qty6'] == 0) {
								        echo '';
								    } else {
								        echo $row['qty6'];
								    }
								?></p>
							</div>
							<div class="col col_des" style="border: 1px solid black; border-collapse: collapse;">
								<p class="bold"><?php echo $row['subtitle6']; ?></p>
								<p></p>
							</div>
						</div>
					</div>
				</div><br>
				<div class="paymethod_grandtotal_wrap">
					<div class="paymethod_sec">
					    <!--<p class="bold name" style="font-size: 16px;">
							إلى السيد:
							<span id="date">
							    <?php
                                    echo $row['customer_name'];
                                ?>
							</span>
						</p><br>-->
						<p class="bold">آلية الدفع</p>
						<p>كاش</p>
					</div>
					<div class="grandtotal_sec">
						<p class="bold">
							<span>المجموع</span>
							<span>
							    <?php
                                    echo $row['total'];
                                ?>
							</span>
						</p>
						<p>
							<span>الضريبة
							    <?php
                                    echo $row['tax'] . '%';
                                ?>
							</span>
							<span>
							    <?php
                                    echo $row['total'] * ($row['tax'] / 100);
                                ?>
							</span>
						</p>
						<p class="bold">
							<span>الإجمالي</span>
							<span>
							    <?php
                                    echo $row['total'] + ($row['total'] * ($row['tax'] / 100)) . ' ريال سعودي';
                                ?>
							</span>
						</p>
					</div>
				</div>
			</div>
			<div class="footer">
				<p>شكراً لكم لتعاملكم معنا</p>
				<div class="terms">
					<p class="tc bold">مؤسسة ماجد خالد الحماد</p>
					<p>ورشة الحمَّاد لصيانة سيارات الديزل</p>
					<img src="images/<?php echo $row['qrimage'] ?>" alt="qr" id="qr">
				</div>
			</div>
		</div>
	</div>


</body>

</html>
<?php
}
?>