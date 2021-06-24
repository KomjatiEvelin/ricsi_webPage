<?php

namespace App\Controllers;

use App\Models\Sponsor;
use App\Models\GaleryImages;
use App\Models\yearInfo;

class Galery extends BaseController{
    
    public function index(){
        $model=new Sponsor();
        $model1=new GaleryImages();
        $model2= new yearInfo();
        $data=[
            'datas'=> $model->getData(),
            'images'=>$model1->getData(),
            'years'=>$model2->getData(),
            'title'=>'Galéria',
        ];

        echo view('templates/header',$data);
        echo view('pages/galeryPage',$data);
        echo view('templates/footer',$data);

    }


    public function upload()
    {
       
            $images = $this->request->getFiles('image');
            $model=new GaleryImages();
            foreach($images['image'] as $image){
                $name=$image->getRandomName();
                $image->move(ROOTPATH.'public/galeryImages',$name);
                $model->save([
                    'name'=>$name,
                    'year'=> $this->request->getPost('year'),
                
                ]);
            }
            return redirect()->to( base_url('/upload'))->with('msg', 'Added succesfully');
        
       
    }

    public function addyear(){
        $model2= new yearInfo();
        $year=$this->request->getPost('year');
        $model2->save([
            'year'=>$year,
            'text'=>$this->request->getPost('text'),
    ]); 
    return redirect()->to( base_url('/upload'))->with('msg', 'Added succesfully');
    }

    public function delete(){
        $model=new GaleryImages();
        if($this->request->getMethod()==='post'){
            $model->deleteData($this->request->getPost('id'));
        }
        unlink(ROOTPATH.'public/galeryImages/'.$this->request->getPost('name'));
        return redirect()->to( base_url('/galery'))->with('msg', 'Deleted succesfully');
    }

    public function deleteYear(){
        $model=new yearInfo();
        if($this->request->getMethod()==='post'){
            $model->deleteData($this->request->getPost('year'));
        }
        return redirect()->to( base_url('/galery'))->with('msg', 'Deleted succesfully');
    }
}