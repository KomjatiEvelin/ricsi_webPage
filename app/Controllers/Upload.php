<?php

namespace App\Controllers;

use App\Models\Sponsor;
use App\Models\yearInfo;

class Upload extends BaseController{
    
    public function index(){
       
        $model=new Sponsor();
        $model2= new yearInfo();

        $data=[
            'datas'=> $model->getData(),
            'years'=>$model2->getData(),
            'title'=>'Feltöltés',
        ];
        if(session()->get('username')=="admin"){
        echo view('templates/header',$data);
        echo view('pages/addSponsor',$data);
        echo view('pages/addNewYear',$data);
        echo view('pages/uploadImage',$data);
        echo view('pages/setBackground',$data);
        echo view('templates/footer',$data);
        }
        else return redirect()->to('/home');

    }
   
}