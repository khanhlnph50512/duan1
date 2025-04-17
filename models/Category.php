<?php
require_once '../Connect/connect.php';

class Category extends connect
{
    public function listCategory()
    {
        $sql = 'select * from categores';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function create($name, $images, $status, $description)
    {
        $sql = 'insert into categores(name,image,status,description)  values(?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $images, $status, $description]);
    }
    public function update($id, $name, $images, $status, $description)
    {
        $sql = 'update categores set name=?,image=?,status=?,description=? where category_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $images, $status, $description, $id]);
    }
    
    public function detail()
    {
        $sql = 'select * from categores where category_id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function checkIfCategoryHasProducts($category_id)
    {
        $sql = 'SELECT COUNT(*) FROM product WHERE category_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$category_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['COUNT(*)'] > 0; // Nếu có sản phẩm, trả về true
    }

    // Xóa danh mục
    public function deleteCategory($category_id)
    {
        // Kiểm tra nếu danh mục có sản phẩm nào không
        if ($this->checkIfCategoryHasProducts($category_id)) {
            return false; // Không xóa được vì còn sản phẩm
        }

        $sql = 'DELETE FROM categores WHERE category_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$category_id]); // Xóa danh mục nếu không có sản phẩm
    }
}
