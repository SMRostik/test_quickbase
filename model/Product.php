<?php

class Product extends Model{
    public function getProducts(){
        return $this->qb->DoQuery("bp9hkyvvu", "{''.EX.''}");
    }
}