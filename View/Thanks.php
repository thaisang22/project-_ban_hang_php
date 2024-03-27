<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cảm ơn bạn vì đã đặt hàng!</h1>
        <p>Đơn hàng sẽ tới tay bạn trong thời gian sớm nhất</p>
        <p>Mã đơn hàng của bạn là Order ID: <strong><?php echo isset($_GET['orderId']) ? htmlspecialchars($_GET['orderId']) : ''; ?></strong></p>

        <p>Nếu có vấn đề gì hãy liên hệ với chúng tôi qua số 0559657785.</p>
        <a href="" class="button">Continue Shopping</a>
    </div>
</body>
</html>
