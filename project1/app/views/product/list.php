<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <!-- Liên kết tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Danh sách sản phẩm</h1>
        <a href="/project1/Product/add" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
        <ul class="list-group">
            <?php foreach ($products as $product): ?>
                <li class="list-group-item">
                    <h5><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Giá:</strong> <?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?></p>
                    <a href="/project1/Product/edit/<?php echo $product->getID(); ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="/project1/Product/delete/<?php echo $product->getID(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Liên kết tới Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>