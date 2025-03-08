<?php include 'app/views/shares/header.php'; ?>

<div class="container">
    <h1 class="mt-4">Danh sách sản phẩm</h1>

    <a href="/webbanhang/Product/add" class="btn btn-success mb-3">Thêm sản phẩm mới</a>

    <!-- Sử dụng class "row" để tạo lưới cho sản phẩm -->
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <!-- Mỗi sản phẩm sẽ chiếm 3 cột trên màn hình lớn, 6 cột trên màn hình vừa, và 12 cột trên màn hình nhỏ -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <?php if (!empty($product->image)) : ?>
                        <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                            class="card-img-top" alt="Ảnh sản phẩm"
                            style="max-width: 100%; height: auto; border-radius: 5px;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?></p>
                        <p><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>
                        <p><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>

                        <!-- Các nút sửa và xóa -->
                        <div class="btn-group" role="group">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm" style="margin-right: 10%;">Sửa</a>
                            <a href=" /webbanhang/Product/delete/<?php echo $product->id; ?>"
                                class="btn btn-danger btn-sm" style="margin-right: 10%"
                                onclick=" return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>