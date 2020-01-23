<?php

abstract class Model{
    protected $qb;
    protected $table = ['product' => 'bp9hkyvvu', 'cart' => 'bp9kfyxfk', 'user' => 'bp9kfv25c'];
    public function __construct(){
        global $qb;
        $this->qb = $qb;
    }
}