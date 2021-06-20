<?php

namespace App\Models;

use CodeIgniter\Model;

class Sponsor extends Model{
    protected $table='sponsors';
    protected $allowedFields=['name','img','info','level'];

    public function getData($id=false){
        if($id===false){
            return $this->orderBy('level','DESC')
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