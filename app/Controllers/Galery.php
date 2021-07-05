<?php

namespace App\Controllers;

use App\Models\Sponsor;
use App\Models\GaleryImages;
use App\Models\yearInfo;

class Galery extends BaseController{
    
    public function index(){
        if(!is_file(APPPATH.'/Views/pages/galeryPage.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
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
       try{
           
            $images = $this->request->getFiles('image');
            $model=new GaleryImages();
            $info="kép";
            if($this->request->getPost('info')!=""){
                $info=$this->request->getPost('info');
            }
            foreach($images['image'] as $image){
                $name=$image->getRandomName();
                $image->move(ROOTPATH.'public/galeryImages',$name);
                $model->save([
                    'name'=>$name,
                    'year'=> $this->request->getPost('year'),
                    'info'=> $info,
                
                ]);
            }
            return redirect()->to( base_url('/upload'))->with('msg', 'Sikeres feltöltés');
        }
        catch(\Exception $e){
            
            return redirect()->to( base_url('/upload'))->with('msg', 'Sikertelen feltöltés '.$e->getMessage());
    
        }
        
       
    }

    public function addyear(){
        try{
                $model2= new yearInfo();
                $year=$this->request->getPost('year');
                $model2->save([
                    'year'=>$year,
                    'text'=>$this->request->getPost('text'),
                ]); 
                return redirect()->to( base_url('/upload'))->with('msg', 'Sikeres hozzáadás');
               
            }
            catch(\Exception $e){
                return redirect()->to( base_url('/upload'))->with('msg', 'Sikertelen hozzáadás '.$e->getMessage());
            }
    }

    public function delete(){

        try{
            $model=new GaleryImages();
            if($this->request->getMethod()==='post'){
                $model->deleteData($this->request->getPost('id'));
            }
            unlink(ROOTPATH.'public/galeryImages/'.$this->request->getPost('name'));
            return redirect()->to( base_url('/galery'))->with('msg', 'Sikeres törlés');
        }
        catch(\Exception $e){
            return redirect()->to( base_url('/galery'))->with('msg', 'Sikertelen törlés '.$e->getMessage());
        }
    }

    public function deleteYear(){

        try{
            $model=new yearInfo();
            if($this->request->getMethod()==='post'){
                $model->deleteData($this->request->getPost('year'));
            }
            return redirect()->to( base_url('/galery'))->with('msg', 'Sikeres törlés');
            
        }
        catch(\Exception $e){
            return redirect()->to( base_url('/galery'))->with('msg', 'Sikertelen törlés '.$e->getMessage());
        }
    }
}