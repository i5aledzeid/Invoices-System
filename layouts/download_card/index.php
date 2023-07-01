<?php require '../../database/db_conn.php';
include '../../database/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>
		<hr>
		<table border = 1>
			<tr>
			    <th scope="col">#</th>
                    <th scope="col">إسم العميل</th>
                    <th scope="col" class="car-number">رقم السيارة</th>
                    <th scope="col">رقم التحميل</th>
                    <th scope="col">مكان التحميل</th>
                    <th scope="col">رقم التنزيل</th>
                    <th scope="col">مكان التنزيل</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">إسم الناقل</th>
                    <th scope="col">رقم الناقل</th>
                    <th scope="col" class="date">تاريخ التنزيل</th>
                    <th scope="col">الشهر</th>
                    <th scope="col">رقم الفاتورة</th>
                    <th scope="col">سعر العميل</th>
                    <th scope="col">سعر الناقل</th>
                    <th scope="col">صرف الناقلين</th>
                    <th scope="col" class="date">تاريخ الصرف</th>
                    <th scope="col">رقم الصرف</th>
                    <th scope="col">نوع الصرف</th>
                    <th scope="col">قبض العملاء</th>
                    <th scope="col" class="date">تاريخ القبض</th>
                    <th scope="col">رقم القبض</th>
                    <th scope="col">نوع القبض</th>
			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM download_card");
			foreach($rows as $row) : ?>
			<tr>
			    <td> <?php echo $i++; ?> </td>
				<td> <?php echo $row["customer_name"]; ?> </td>
				<td> <?php echo $row["car_number"]; ?> </td>
				<td> <?php echo $row["loading_number"]; ?> </td>
				<td> <?php echo $row["loading_location"]; ?> </td>
				<td> <?php echo $row["download_number"]; ?> </td>
				<td> <?php echo $row["download_location"]; ?> </td>
				<td> <?php echo $row["quantity"]; ?> </td>
				<td> <?php echo $row["carrier_name"]; ?> </td>
				<td> <?php echo $row["carrier_number"]; ?> </td>
				<td> <?php echo $row["download_date"]; ?> </td>
				<td> <?php echo $row["month"]; ?> </td>
				<td> <?php echo $row["invoice_number"]; ?> </td>
				<td> <?php echo $row["customer_price"]; ?> </td>
				<td> <?php echo $row["carrier_price"]; ?> </td>
				<td> <?php echo $row["exchange_carriers"]; ?> </td>
				<td> <?php echo $row["exchange_date"]; ?> </td>
				<td> <?php echo $row["exchange_number"]; ?> </td>
				<td> <?php echo $row["exchange_type"]; ?> </td>
				<td> <?php echo $row["catch_clients"]; ?> </td>
				<td> <?php echo $row["catch_date"]; ?> </td>
				<td> <?php echo $row["catch_number"]; ?> </td>
				<td> <?php echo $row["catch_type"]; ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$name = $row[0];
    			$age = $row[1];
    			$country = $row[2];
    			$country2 = $row[3];
    			$country3 = $row[4];
    			$country4 = $row[5];
    			$country5 = $row[6];
    			$country6 = $row[7];
    			$country7 = $row[8];
    			$country8 = $row[9];
    			$country9 = $row[10];
    			$country10 = $row[11];
    			$country11 = $row[12];
    			$country12 = $row[13];
    			$country13 = $row[14];
    			$country14 = $row[15];
    			$country15 = $row[16];
    			$country16 = $row[17];
    			$country17 = $row[18];
    			$country18 = $row[19];
    			$country19 = $row[20];
    			$country20 = $row[21];
    			$country21 = $row[22];

			    // mysqli_query($conn, "INSERT INTO download_card VALUES('', '$name', '$age', '$country', '$country2', '$country3', '$country4', '$country5', '$country6', '$country7', '$country8', '$country9', '$country10', '$country11', '$country12', '$country13', '$country14', '$country15', '$country16', '$country17', '$country18', '$country19', '$country20', '$country21')");
			}

            print_r($row);
			echo
			"
			<script>
			alert('تم الاستيراد بنجاح!');
			document.location.href = '';
			</script>
			";
		}
		
		?>
	</body>
</html>
