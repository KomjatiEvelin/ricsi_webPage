<?php

namespace App\Models;

use CodeIgniter\Model;

class yearInfo extends Model{
    protected $table='yearinfo';
    protected $allowedFields=['year','text'];

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
        return $this->where(['year'=>$id])->delete();
    }
}