<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){
        return view('frontend.login');
    }

    public function login(Request $request ){
        // dd($request->all()) ;
        if(Auth::guard('customer')->attempt(['email'=>$request->email,
        "password"=>$request->password])){
            return redirect('/');
        } else {
            return redirect()->route('customer.login');
        }
    }

    public function destroy (Request $request)
    {
        
        Auth::guard('customer')->logout();
        

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('customer-login');
    }
}
