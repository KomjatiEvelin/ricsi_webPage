<?php

namespace App\Controllers;


class Background extends BaseController{
    
    
    public function change()
    {
       
            $image = $this->request->getFile('backgrnd');
            $name="background.jpg";
            $image->move(ROOTPATH.'public/images',$name,true);
           
            return redirect()->to( base_url('/home'))->with('msg', 'Changed succesfully');
        
       
    }

}