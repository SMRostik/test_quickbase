<?php

class Product extends Model{
    public function getProducts(){
        //de($this->qb->DoQuery($this->table['cart'], "{''.EX.''}"));
        return $this->qb->DoQuery($this->table['product'], "{'3'.XEX.'0'}");
    }
}