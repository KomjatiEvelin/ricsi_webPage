<?php

namespace App\Controllers;
use App\Models\Sponsor;

class Contact extends BaseController
{
	public function index(){

        if(!is_file(APPPATH.'/Views/pages/contactPage.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'Kapcsolat',
        ];

        echo view('templates/header',$data);
        echo view('pages/contactPage',$data);
        echo view('templates/footer',$data);
    }
}