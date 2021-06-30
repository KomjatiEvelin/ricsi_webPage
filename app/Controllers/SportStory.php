<?php

namespace App\Controllers;
use App\Models\Sponsor;

class SportStory extends BaseController
{
	public function index(){
        if(!is_file(APPPATH.'/Views/pages/sportStory.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'A sportágról',
        ];

        echo view('templates/header',$data);
        echo view('pages/sportStory',$data);
        echo view('templates/footer',$data);
    }
}