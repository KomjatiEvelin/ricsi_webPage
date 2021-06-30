<?php

namespace App\Controllers;
use App\Models\Sponsor;

class MyStory extends BaseController
{
	public function index(){
        if(!is_file(APPPATH.'/Views/pages/myStory.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'Történetem',
        ];

        echo view('templates/header',$data);
        echo view('pages/myStory',$data);
        echo view('templates/footer',$data);
    }
}