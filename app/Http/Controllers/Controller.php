<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Contracts\Service\Attribute\Required;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 public function login(){
    return view('/welcome');
 }
  public function auth( Request $request){
if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
  
    return redirect()->route('products.index');
} else {
return redirect()->back()->with('danger', 'Email ou senha inválida');
 }
  }
  
   public function Admin(){
     return view( 'osuario');
   }
 
}


















