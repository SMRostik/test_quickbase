<?php

class ProductController{
    public function index(){
        $title = "Products";
        $productModel = new Product();
        $products = $productModel->getProducts();
        de($products);

        require_once(ROOT."/view/product/products.php");
    }

    public function addProduct($id){
        echo $id;
    }
}