<?php
require_once '../Connect/connect.php';

class Product extends connect
{
    public function getAllColor()
    {
        $sql = 'select * from variant_colors';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSize()
    {
        $sql = 'select * from variant_sizes';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategory()
    {
        $sql = 'select * from categores';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addProduct($name, $image, $price, $sale_price, $slug, $description, $category_id)
    {
        $sql = 'insert into product(name,image,price,sale_price,slug,description,category_id) values(?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $price, $sale_price, $slug, $description, $category_id]);
    }
    public function addGallery($product_id, $image)
    {
        $sql = 'insert into product_galleries(product_id,image) values (?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$product_id, $image]);
    }
    public function addProductVariant($price, $sale_price, $quantity, $product_id, $variant_color_id, $variant_size_id)
    {
        $sql = 'insert into product_variants(price,sale_price,quantity,product_id,variant_color_id,variant_size_id,created_at,updated_at) values(?,?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $product_id, $variant_color_id, $variant_size_id]);
    }
    public function getLastInsertId()
    {
        return $this->connect()->lastInsertId();
    }
    public function listProduct()
    {
        $sql = "select
        product.product_id as product_id,
        product.name  as product_name,
        product.price as product_price,
        product.sale_price as product_sale_price,
        product.image as product_image,
        product.slug as product_slug,
        categores.category_id as category_id,
        categores.name as category_name,
        product_variants.product_variant_Id as product_variant_id,
        variant_colors.color_name as variant_color_name,
        variant_sizes.size_name as variant_size_name

        from product
        left join categores on product.category_id = categores.category_id
        left join product_variants on product.product_id = product_variants.product_id
        left join variant_colors on product_variants.variant_color_id = variant_colors.variant_color_Id
        left join variant_sizes on product_variants.variant_size_id = variant_sizes.variant_size_Id
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedProducts = [];
        foreach ($listProduct as $product) {
            if (!isset($groupedProducts[$product['product_id']])) {
                $groupedProducts[$product['product_id']] = $product;
                $groupedProducts[$product['product_id']]['variants'] = [];
            }
            $groupedProducts[$product['product_id']]['variants'][] = [
                'product_id' => $product['product_id'],
                'product_variant_color' => $product['variant_color_name'],
                'product_variant_size' => $product['variant_size_name']
            ];
        }
        return $groupedProducts;
    }

    public function getProductById($product_id)
    {
        $sql = ' select
        product.product_id as product_id,
        product.name as product_name,
        product.price as product_price,
        product.sale_price as product_sale_price,
        product.image as product_image,
        product.description as product_description,
        product.slug as product_slug,
        categores.category_id as category_id,
        categores.name as category_name
        
        
        from product
        left join categores on product.category_id = categores.category_id
        where product.product_id =?';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductVariantById($product_id)
    {
        $sql = 'select 
        product_variants.product_variant_Id as product_variant_id,
        product_variants.price as variant_price,
        product_variants.sale_price as variant_sale_price,
        product_variants.quantity as variant_quantity,
        variant_colors.variant_color_Id as variant_color_id,
        variant_sizes.variant_size_Id as variant_size_id,
        variant_colors.color_name as variant_color_name,
        variant_sizes.variant_size_Id as variant_size_name
        
        
        
        from product_variants
        left join variant_colors on product_variants.variant_color_id = variant_colors.variant_color_Id
        left join variant_sizes on product_variants.variant_size_id = variant_sizes.variant_size_Id
        where product_variants.product_id =?
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductGalleryById()
    {
        $sql = 'select * from product_galleries where product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateProduct($product_id,$name,$image,$price,$sale_price,$slug,$description,$category_id)
    {
        $sql = 'update product set name =?,image=?,price = ?,sale_price=?,slug =?,description = ?,category_id =? where product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$image,$price,$sale_price,$slug,$description,$category_id,$product_id]);
    }
    public function updateProductVariant($product_variant_id, $product_id, $price, $sale_price, $quantity, $variant_color_id, $variant_size_id)
    {
        $sql = 'update product_variants set product_id=?, price=?,sale_price=?, quantity=?, variant_color_id=?, variant_size_id=? where product_variant_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$product_id, $price, $sale_price, $quantity, $variant_color_id, $variant_size_id, $product_variant_id]);

    }
    public function removeGallery()
    {
        $sql = 'delete from product_galeries where product_gallery_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['gallery_id']]);
    }
    public function getGallery()
    {
        $sql = 'select image from product_galleries where product_gallery_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['gallery_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function removeProductVariant()
    {
        $sql =  'delete from product_variants where product_variant_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['variant_id']]);
    }
    public function removeProduct()
    {
        $sql = 'delete from product where product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }
    public function getProductBySlug($slug)
    {
        $sql = '
        select
        product.product_id as product_id,
        product.name as product_name,
        product.price as product_price,
        product.sale_price as product_sale_price,
        product.image as product_image,
        product.slug as product_slug,
        product.description as product_description,
        categores.category_id as category_id,
        categores.name as category_name,
        product_variants.product_variant_Id as product_variant_id,
        product_variants.price as variant_price,
        product_variants.sale_price as variant_sale_price,
        product_variants.quantity as variant_quantity,
        variant_colors.color_name as variant_color_name,
        variant_colors.color_code as variant_color_code,
        variant_sizes.size_name as variant_size_name,
        product_galleries.image as product_gallery_image

        from product
        left join product_variants on product.product_id = product_variants.product_id
        left join categores on product.category_id = categores.category_id
        left join product_galleries on product.product_id = product_galleries.product_id
        left join variant_colors on product_variants.variant_color_id = variant_colors.variant_color_Id
        left join variant_sizes on product_variants.variant_size_id = variant_sizes.variant_size_Id
        where product.slug =?
        
        
        ';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$slug]);
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $groupedProducts = [];
        // loc qua tung san pham trong danh sach listproduct
        foreach ($listProduct as $product) {
            // neu san pham chua ton tai trong mang -> moi them vao
            if (!isset($groupedProducts[$product['product_id']])) {
                $groupedProducts[$product['product_id']] = $product;
                $groupedProducts[$product['product_id']]['variants'] = [];
                $groupedProducts[$product['product_id']]['galleries'] = [];

            }
            // kiem tra bien the da co trong mang variants chua
            $exists = false;
            foreach ($groupedProducts[$product['product_id']]['variants'] as $variant) {
                if (
                    $variant['variant_color_name'] == $product['variant_color_name'] &&
                    $variant['variant_size_name'] == $product['variant_size_name']
                ) {
                    $exists = true;
                    break;
                }
            }
            if (!$exists) {
                $groupedProducts[$product['product_id']]['variants'][] = [
                   'product_variant_id'=>$product['product_variant_id'],
                   'variant_color_name' => $product['variant_color_name'],
                   'variant_color_code' => $product['variant_color_code'],
                   'variant_size_name' =>$product['variant_size_name'],
                   'product_variant_price'=> $product['variant_price'],
                   'product_variant_sale_price'=> $product['variant_sale_price'],
                    'product_variant_quantity'=> $product['variant_quantity'],
                ];
            }
            if(!empty($product['product_gallery_image'] && !in_array($product['product_gallery_image'],
            $groupedProducts[$product['product_id']]['galleries']))){
                $groupedProducts[$product['product_id']]['galleries'][] = $product['product_gallery_image']
                
                ;
            }
        }

        return $groupedProducts;
    }
    public function searchProductsByName($keyword)
    {
        $sql = 'select * from product where name like :keyword';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':keyword','%'.$keyword. '%',PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByCategory($category_id)
    {
        $sql = "SELECT * FROM product WHERE category_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$category_id]);
        return $stmt->fetchAll();
    }
}
