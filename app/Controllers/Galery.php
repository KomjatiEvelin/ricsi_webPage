<?php

namespace App\Controllers;

use App\Models\Sponsor;
use App\Models\GaleryImages;
use App\Models\GaleryVideos;
use App\Models\yearInfo;

class Galery extends BaseController{
    
    public function index(){
        if(!is_file(APPPATH.'/Views/pages/galeryPage.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $model=new Sponsor();
        $model1=new GaleryImages();
        $model3=new GaleryVideos();
        $model2= new yearInfo();
        $data=[
            'datas'=> $model->getData(),
            'images'=>$model1->getData(),
            'videos'=>$model3->getData(),
            'years'=>$model2->getData(),
            'title'=>'Galéria',
        ];

        echo view('templates/header',$data);
        echo view('pages/galeryPage',$data);
        echo view('templates/footer',$data);

    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
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
                $extension = strtolower($this->getExtension($name));
                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")){
                    return redirect()->to( base_url('/upload'))
                                     ->with('msg', 'Sikertelen feltöltés, nem megfelelő fájltípus (elfogadott: jpg, jpeg, png)');
                }
                
                $image->move(ROOTPATH.'public/galeryImages',strtolower($name));
                $image1 = \Config\Services::image()
                        ->withFile(ROOTPATH.'public/galeryImages/'.strtolower($name))
                        ->resize(1280, 720, true, 'height')
                        ->save(ROOTPATH.'public/galeryImages/'.strtolower($name));
                $model->save([
                    'name'=>strtolower($name),
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

    public function uploadVideo()
    {
       try{
           
            $video = $this->request->getFile('video');
            $model=new GaleryVideos();
            $info="videó";
            if($this->request->getPost('info')!=""){
                $info=$this->request->getPost('info');
            }
           
            $name=$video->getRandomName();
                $extension = strtolower($this->getExtension($name));
                if (($extension != "mov") && ($extension != "mp4") && ($extension != "webm") && ($extension != "ogg")){
                    return redirect()->to( base_url('/upload'))
                                     ->with('msg', 'Sikertelen feltöltés, nem megfelelő fájltípus (elfogadott: mov,mp4,webm,ogg)');
                }
            $video->move(ROOTPATH.'public/video',$name);
            $model->save([
                'name'=>$name,
                'info'=> $info,
                
            ]);
            
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