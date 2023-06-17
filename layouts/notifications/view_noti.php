<?php
    include '../../db_conn.php';
    $id = $_GET['id']; 
    $query2="select * from notifications WHERE id='$id'"; 
    $result2=mysqli_query($conn, $query2); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            direction: rtl;
        }
    </style>
    <title>Noti Array</title>
</head>
<body>
    <?php
        // echo '<pre>';
        /*print_r([
            0 => 'Khaled',
            1 => 'Mohammed',
            2 => 'Ahmed'
        ]);*/
        // echo '</pre>';
        /*$arr = array(1, 2, 3, 4);
        echo 'array[index] = ' . $arr[0] . '<br>';
        print_r($arr);*/
        /*$data = array(
            '0' => '1',
            '1' => '2'
        );*/
        /*foreach ($data as $key => $value) {
            $k[] = $key;
            $v[] = "'" . $value . "'";
        }*/
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        // print_r($k);
        // print_r($v);
        // echo $v;
        
    ?>
    <table align="center" border="1px" style="width:500px; line-height:30px; text-align: center;"> 
        <tr> 
            <th colspan="7"><h2>الإشعارات</h2></th> 
            </tr> 
                <th> # </th> 
                <th> عنوان </th> 
                <th> وصف </th> 
                <th> الحالة </th> 
                <th> النوع </th> 
                <th> المنشيء </th> 
                <th> التاريخ </th> 

            </tr> 
            
            <?php while($row=mysqli_fetch_assoc($result2)) 
            { 
            ?> 
            <tr> <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['title']; ?></td> 
            <td><?php echo $row['subtitle']; ?></td> 
            <td>
                <?php
                    if ($row['seen'] == 0) {?>
                        <a href="#">مقروءة</a>
                    <?php }
                    else { ?>
                        <a href="update_noti.php?id=<?php echo $row['id']; ?>">غير مقروءة<?php echo $row['seen']; ?></a>
                    <?php }
                ?>
            </td> 
            <td><?php echo $row['type']; ?></td> 
            <td><?php echo $row['created_by']; ?></td> 
            <td><?php echo $row['date']; ?></td> 
            </tr> 
        <?php 
                } 
            ?> 

	</table> 

</body>
</html>