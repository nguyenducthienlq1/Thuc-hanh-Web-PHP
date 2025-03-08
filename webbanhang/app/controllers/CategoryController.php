<?php
// Require SessionHelper and other necessary files 
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // Hiển thị form thêm danh mục
    public function add()
    {
        include 'app/views/category/add.php';
    }

    // Xử lý thêm danh mục vào database
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $errors = [];

            // Kiểm tra dữ liệu đầu vào
            if (empty($name)) {
                $errors[] = "Tên danh mục không được để trống.";
            }

            if (empty($errors)) {
                $result = $this->categoryModel->addCategory($name, $description);

                if ($result) {
                    header('Location: /webbanhang/Category');
                } else {
                    $errors[] = "Lỗi khi thêm danh mục.";
                }
            }

            // Nếu có lỗi, load lại trang add với danh sách lỗi
            include 'app/views/category/add.php';
        }
    }

    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);

        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "<script>alert('Không tìm thấy danh mục!'); window.location.href='/webbanhang/Category/list';</script>";
        }
    }
    // Xử lý cập nhật danh mục
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $errors = [];

            // Kiểm tra dữ liệu đầu vào
            if (empty($id) || empty($name)) {
                $errors[] = "Tên danh mục không được để trống.";
            }

            if (empty($errors)) {
                $update = $this->categoryModel->updateCategory($id, $name, $description);

                if ($update) {
                    header('Location: /webbanhang/Category');
                } else {
                    $errors[] = "Lỗi khi cập nhật danh mục.";
                }
            }

            $category = $this->categoryModel->getCategoryById($id);
            include 'app/views/category/edit.php';
        }
    }
    public function delete($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /webbanhang/Category');
        } else {
            echo "<script>alert('Không thể xóa danh mục. Có thể danh mục này đang được sử dụng!'); window.location.href='/webbanhang/Category/list';</script>";
        }
    }
}
