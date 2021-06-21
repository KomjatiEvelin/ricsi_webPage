<?php

namespace App\Controllers;

use App\Models\Sponsor;

class Sponsors extends BaseController{
    
    public function index(){
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'Szponzorok',
        ];

        echo view('templates/header',$data);
        echo view('pages/sponsors',$data);
        echo view('templates/footer',$data);

    }


    public function create()
    {
       
        $name="";
          
            $logo = $this->request->getFile('logo');
            $name=$logo->getRandomName();
            $logo->move(ROOTPATH.'public/images',$name);
            $model=new Sponsor();
            $model->save([
                'name' => $this->request->getPost('name'),
                'img'=>$name,
                'info'  => $this->request->getPost('info'),
                'level'=>$this->request->getPost('level'),
                
            ]);
            return redirect()->to( base_url('/upload'))->with('msg', 'Added succesfully');
        
       
    }

    public function delete(){
        $model=new Sponsor();
        if($this->request->getMethod()==='post'){
            $model->deleteData($this->request->getPost('id'));
        }
        $this->index();
    }

    public function updateSuper(){
        
        $model=new Sponsor();
        $id=$this->request->getPost('id');
        $name=$this->request->getPost('name');
        $text=$this->request->getpost('text');
        $logo = $this->request->getFile('logo');
            $name=$logo->getRandomName();
            $logo->move(ROOTPATH.'public/images',$name);
        
        //TODO UPDATE DATABASE
    }
   
}