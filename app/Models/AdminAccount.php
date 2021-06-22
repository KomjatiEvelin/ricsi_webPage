<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminAccount extends Model{
    protected $allowedFields=['uname','passwd'];

    protected $table='account';

    public function getUser($uname){
        
        return $this->asArray()
                    ->where(['uname'=>$uname])
                    ->first();
    }

    public function modifyPwd($pwd,$uname){

        return $this->update(['passwd'=>$pwd])
                    ->where(['uname'=>$uname]);
    }

}