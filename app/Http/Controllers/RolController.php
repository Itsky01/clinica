<?php
// controlador para reedirigir en caso de que sea admin o user
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index(){
    if (auth()->check() && auth()->user()-> rol =='1') {
           
        return redirect()->route('dash_user') ;
    
}else{

 if (auth()->check() && auth()->user()-> rol =='2') {
    
    return redirect()->route('dash_admin');
}else{

 return redirect('/');
}

}
}




}
