<?php

namespace App\Controllers;
use App\Models\Sponsor;

class Credentials extends BaseController
{
	public function index(){
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'Ajánlások',
        ];

        echo view('templates/header',$data);
        echo view('pages/credentialsPage',$data);
        echo view('templates/footer',$data);
    }
}