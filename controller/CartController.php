<?php

class CartController{
    public function addToCart($id){
        $cart = new Cart();
        $cart->addProductToCart($this->getUsetId(), $id);
    }

    private function getUsetId(){
        if(isset($_COOKIE['user_id']) && $_COOKIE['user_id']){
            return $_COOKIE['user_id'];
        } else {
            $user_id = md5(uniqid());
            setcookie('user_id', $user_id);
            return $user_id;
        }
    }
}