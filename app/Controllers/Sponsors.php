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
            $id=$this->request->getPost('id');
            $sponsor=$model->getData($id);
            unlink('images/'.$sponsor['img']);
            $model->deleteData($id);
        }
        $this->index();
    }

    public function updateSuper(){
        
        $model=new Sponsor();
        $id=$this->request->getPost('id');
        $name=$this->request->getPost('name');
        $text=$this->request->getpost('text');
        $image = $this->request->getFile('image');
        if(is_file($image)){
            $imgname=$image->getRandomName();
            $image->move(ROOTPATH.'public/images',$imgname);
            $sponsor=$model->getData($id);
            unlink('images/'.$sponsor['img']);
            $model->updateSuperWithImg($name,$imgname,$text,$id);
        }
        else
        {
            $model->updateSuper($name,$text,$id);
        }
        
        return redirect()->to( base_url('/upload'))->with('msg', 'Added succesfully');
    }
   
    public function deleteSuper(){
        $model=new Sponsor();
        $id=$this->request->getPost('id');
        $sponsor=$model->getData($id);
        unlink('images/'.$sponsor['img']);
        if($this->request->getMethod()==='post'){
            $model->updateSuperWithImg("","NULL","",$id);
        }
        $this->index();
    }
}