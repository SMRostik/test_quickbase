<?php

class Product extends Model{
    public function getProducts(){
        $products = $this->qb->DoQuery($this->table['product'], "{'3'.XEX.'0'}");
        foreach($products as $key => $value){
            if($value[7]){
                $products[$key]['imgUrl'] = $this->getImgUrl($this->table['product'], $value[3], 7);
            }
        }
        return $products;
    }

    public function getProduct($id){
        $product = $this->qb->DoQuery($this->table['product'], sprintf("{'3'.EX.'%s'}", $id))[0];
        $product['imgUrl'] = $this->getImgUrl($this->table['product'], $product[3], 7);
        return $product;
    }
}