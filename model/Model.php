<?php

class Model{
    protected $qb;
    public function __construct(){
        global $qb;
        $this->qb = $qb;
    }
}