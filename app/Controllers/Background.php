<?php

namespace App\Controllers;


class Background extends BaseController{
    
    

    public function change()
    {
       try{
            $image = $this->request->getFile('backgrnd');
            $name="background.jpg";
           
            $image->move(ROOTPATH.'public/images',$name,true);
           
            $image1 = \Config\Services::image()
                ->withFile(ROOTPATH.'public/images/'.strtolower($name))
                ->resize(1920, 1080, true, 'height')
                ->save(ROOTPATH.'public/images/'.strtolower($name));

            return redirect()->to( base_url('/home'))->with('msg', 'Sikeres módosítás');
       }
       catch(\Exception $e){
            return redirect()->to( base_url('/home'))->with('msg', 'Sikertelen módosítás '.$e->getMessage());
       }
          
    }

}