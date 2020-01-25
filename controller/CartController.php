<?php

class CartController{
    public function addToCart($id){
        $cart = new Cart();
        echo $cart->addProductToCart($this->getUserId(), $id);
    }

    public function getCart(){
        $cart = new Cart();
        $products = $cart->getCart($this->getUserId());
        //echo 111;
        require_once(ROOT."/view/cart/cart.php");
    }

    public function getCount(){
        $cart = new Cart();
        echo $cart->getCount($this->getUserId());
    }

    public function delProductFromCart($id){
        $cart = new Cart();
        $cart->delProductFromCart($this->getUserId(), $id);
    }

    private function getUserId(){
        if(isset($_COOKIE['user_id']) && $_COOKIE['user_id']){
            return $_COOKIE['user_id'];
        } else {
            $user_id = md5(uniqid());
            setcookie('user_id', $user_id);
            return $user_id;
        }
    }
}