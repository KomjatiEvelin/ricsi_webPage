<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleryVideos extends Model{
    protected $table='video';
    protected $allowedFields=['name','info'];

    public function getData($id=false){
        if($id===false){
            return $this->orderBy('id')
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