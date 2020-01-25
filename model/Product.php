<?php

class Product extends Model{
    public function getProducts(){
        // $prod = $this->qb->DoQuery($this->table['product'], "{''.EX.''}");
        // $data = array();
        //     $data[] = array('value' => $prod[0][7], 'fid' => 9);
        // de($this->qb->uploadFiles($this->table['product'], $prod[0][3], $data));
        // de($this->qb->DoQuery($this->table['product'], "{''.EX.''}"));
        return $this->qb->DoQuery($this->table['product'], "{'3'.XEX.'0'}");
    }

    public function getProduct($id){
        return $this->qb->DoQuery($this->table['product'], sprintf("{'3'.EX.'%s'}", $id))[0];
    }
}