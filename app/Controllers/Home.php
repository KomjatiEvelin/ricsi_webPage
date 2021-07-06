<?php

namespace App\Controllers;
use App\Models\Sponsor;

class Home extends BaseController
{
	public function index(){
        if(!is_file(APPPATH.'/Views/pages/home.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $model=new Sponsor();
        $data=[
            'datas'=> $model->getData(),
            'title'=>'Főoldal',
            ];

        echo view('templates/header',$data);
        echo view('pages/home',$data);
        echo view('templates/footer',$data);
    }

    
}
