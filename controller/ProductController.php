<?php

class ProductController{
    public function index(){
        echo("<pre>");
        $productModel = new Product();
        print_r($productModel->getProducts());
        echo("</pre>");
    }
}