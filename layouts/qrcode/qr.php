<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="qr_code_icon.ico">
    <title>QR</title>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <h3 align="center">QR GENERATION FORM</h3>
            <div class="box">
                <form action="qr_code.php" method="post">
                    <div class="form-group">
                        <label for="qr_text">QR TEXT</label>
                        <input type="text" name="qrtext" id="qrtext" class="form-control" placeholder="Enter QR text" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="button" value="QR Generate" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>