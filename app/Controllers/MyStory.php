<?php

namespace App\Controllers;
use App\Models\Sponsor;

class MyStory extends BaseController
{
	public function index(){
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'Kapcsolat',
        ];

        echo view('templates/header',$data);
        echo view('pages/myStory',$data);
        echo view('templates/footer',$data);
    }
}