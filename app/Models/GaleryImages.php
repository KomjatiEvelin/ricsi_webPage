<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleryImages extends Model{
    protected $table='galery';
    protected $allowedFields=['name','year','info'];

    public function getData($id=false){
        if($id===false){
            return $this->orderBy('year','DESC')
                        ->findAll();
        }

        return $this->asArray()
                    ->where(['id'=>$id])
                    ->first();
    }

    public function deleteData($id){
        return $this->delete($id);
    }
}