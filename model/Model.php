<?php

abstract class Model{
    protected $qb;
    protected $table = ['product' => 'bp9hkyvvu', 'cart' => 'bp9kfyxfk', 'user' => 'bp9kfv25c'];
    public function __construct(){
        global $qb;
        $this->qb = $qb;
    }

    protected function getImgUrl($table, $record, $field, $v = 0){
        return sprintf("https://qubitronic.quickbase.com/up/%s/a/r%s/e%s/v%s", $table, $record, $field, $v);
    }
}