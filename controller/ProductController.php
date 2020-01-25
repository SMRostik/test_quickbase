<?php

class ProductController{
    public function index(){
        $title = "Products";
        $productModel = new Product();
        $products = $productModel->getProducts();

        require_once(ROOT."/view/product/products.php");
    }

    public function addProduct($id){
        echo $id;
    }

    public function product($id){
        
        $productModel = new Product();
        $product = $productModel->getProduct($id);
        $title = $product[6];
        //de($product);

        require_once(ROOT."/view/product/product.php");
    }
}