<?php
// Đọc dữ liệu từ file JSON
$file = 'data.json';
$data = json_decode(file_get_contents($file), true);

// Xử lý việc cập nhật
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $slug = $_POST['slug'];
    $new_link = $_POST['link'];

    // Cập nhật slug và link trong data
    $data[$slug] = $new_link;

    // Ghi dữ liệu lại vào file JSON
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    echo "Đã cập nhật link cho slug: $slug";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h2>Quản lý link chuyển hướng</h2>
    <form method="POST">
        <label for="slug">Slug:</label>
        <input type="text" name="slug" required><br><br>

        <label for="link">Link mới:</label>
        <input type="text" name="link" required><br><br>

        <button type="submit">Cập nhật link</button>
    </form>

    <h3>Các slug và link hiện tại:</h3>
    <ul>
        <?php foreach ($data as $slug => $link): ?>
            <li><?php echo $slug . ' => ' . $link; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
