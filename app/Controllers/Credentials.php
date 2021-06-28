<?php

namespace App\Controllers;
use App\Models\Sponsor;

class Credentials extends BaseController
{
	public function index(){
        if(!is_file(APPPATH.'/Views/pages/credentialsPage.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
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