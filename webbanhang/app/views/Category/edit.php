<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-edit"></i> Chỉnh sửa danh mục</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="/webbanhang/Category/update" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?>">

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Tên danh mục</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name"
                                value="<?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                            <div class="invalid-feedback">Vui lòng nhập tên danh mục.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Mô tả</label>
                            <textarea class="form-control shadow-sm" id="description" name="description" rows="3" required><?= htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                            <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/webbanhang/Category/list" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-arrow-left"></i> Hủy
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save"></i> Lưu thay đổi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Kiểm tra form trước khi submit
    (function() {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<?php include 'app/views/shares/footer.php'; ?>