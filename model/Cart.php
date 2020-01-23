<?php

class Cart extends Model{
    public function addProductToCart($user_id, $product_id){
        // if(isset($_COOKIE['cart']) && $_COOKIE['cart']){
        //     $cart = json_decode($_COOKIE['cart']);
        //     if(isset($cart->{$product_id}) && $cart->{$product_id}){
        //         $cart->{$product_id}++;
        //     } else {
        //         $cart->{$product_id} = 1;
        //     }
        //     setcookie("cart", json_encode($cart));
        // } else {
        //     $cart = array();
        //     $cart[$product_id] = 1;
        //     setcookie("cart", json_encode($cart));
        // }

        if(!$this->qb->DoQuery($this->table['user'], sprintf("{''.EX.'%s'}", $user_id))){
            $data = array();
            $data[] = array('value' => $user_id, 'fid' => 6);
            $user = $this->qb->AddRecord($this->table['user'], $data, 1);
            $this->setCartItem($user->rid, $product_id, 1);
        } else {
            $user = $this->qb->DoQuery($this->table['user'], sprintf("{''.EX.'%s'}", $user_id));
            if($user[0]['id']){
                $this->setCartItem($user[0]['id'], $product_id);
            }
        }
        

        //de($this->qb->DoQuery($this->table['user'], "{''.EX.'383ea0502bfdb3526f3b72e1c349ed66'}"));
    }

    protected function setCartItem($user_id, $product_id, $quantity = 0){
        $data = array();
        $data[] = array('value' => $user_id, 'fid' => 8);
        $data[] = array('value' => $product_id, 'fid' => 7);
        if($quantity){
            $data[] = array('value' => $quantity, 'fid' => 6);
        } else {
            $cart = $this->qb->DoQuery($this->table['cart'], sprintf("{'8'.EX.'%s'} AND {'7'.EX.'%s'}", $user_id, $product_id));
            de($cart);
            // if($cart){
            //     $data[] = array('value' => ++$cart[0][6], 'fid' => 6);
            // }
            exit;
        }
        $user = $this->qb->AddRecord($this->table['cart'], $data, 1);
    }
}