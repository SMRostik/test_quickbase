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

        $cart_id = 0;
        if(!$this->qb->DoQuery($this->table['user'], sprintf("{'6'.EX.'%s'}", $user_id))){
            $data = array();
            $data[] = array('value' => $user_id, 'fid' => 6);
            $user = $this->qb->AddRecord($this->table['user'], $data, 1);
            $this->setCartItem($user->rid, $product_id, 1);
            $cart_id = $user->rid;
        } else {
            $user = $this->qb->DoQuery($this->table['user'], sprintf("{'6'.EX.'%s'}", $user_id));
            if($user[0][3]){
                $this->setCartItem($user[0][3], $product_id);
                $cart_id = $user[0][3];
            }
        }

        return $this->getCount($user_id);
    }

    public function getCount($user_id){
        $cart_id = 0;
        if(!$this->qb->DoQuery($this->table['user'], sprintf("{'6'.EX.'%s'}", $user_id))){
            return 0;
        } else {
            $user = $this->qb->DoQuery($this->table['user'], sprintf("{'6'.EX.'%s'}", $user_id));
            if($user[0][3]){
                $cart_id = $user[0][3];
            }
        }
        $cart_items = $this->qb->DoQuery($this->table['cart'], sprintf("{'8'.EX.'%s'}", $cart_id));
        if(gettype($cart_items) != "array") return 0;
        return count($cart_items);
    }

    protected function setCartItem($user_id, $product_id){
        $data = array();
        $data[] = array('value' => $user_id, 'fid' => 8);
        $data[] = array('value' => $product_id, 'fid' => 7);

        $cart = $this->qb->DoQuery($this->table['cart'], sprintf("{'8'.EX.'%s'} AND {'7'.EX.'%s'}", $user_id, $product_id));
        if($cart){
            $data[] = array('value' => ++$cart[0][6], 'fid' => 6);
            $user = $this->qb->EditRecord($this->table['cart'], $cart[0][3], $data);
        } else {
            $data[] = array('value' => 1, 'fid' => 6);
            $user = $this->qb->AddRecord($this->table['cart'], $data, 1);
        }
    }

    public function getCart($user_id){
        //de($this->qb->GetSchema($this->table['user']));
        $user = $this->qb->DoQuery($this->table['user'], sprintf("{'6'.EX.'%s'}", $user_id));
        $cart = $this->qb->DoQuery($this->table['cart'], sprintf("{'8'.EX.'%s'}", $user[0][3]));
        $rule = array();
        $cart = $cart ? $cart : [];
        foreach($cart as $value){
            $rule[] = sprintf("{'3'.EX.'%s'}", $value['7']);
        }
        $rules = implode(" OR ", $rule);
        $products = $this->qb->DoQuery($this->table['product'], $rules);
        $products = $products ? $products : [];
        foreach($products as $product_key => $product_value){
            foreach($cart as $cart_key => $cart_value){
                if($cart_value[7] == $product_value[3]){
                    $products[$product_key]['quantity'] = $cart_value[6];
                }
            }
        }
        return $products;
    }

    public function delProductFromCart($user_id, $product_id){
        $user = $this->qb->DoQuery($this->table['user'], sprintf("{'6'.EX.'%s'}", $user_id));
        $cart = $this->qb->DoQuery($this->table['cart'], sprintf("{'8'.EX.'%s'} AND {'7'.EX.'%s'}", $user[0][3], $product_id));
        $this->qb->DeleteRecord($this->table['cart'], $cart[0][3]);
    }
}