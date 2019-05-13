<?php

namespace App\Http\Controllers;

use App\Limit;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Schoolmanage;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function admin_login(){
        if(Auth::check()){
            return redirect('reg_list');
        }
        return view('admin.login');
    }

    public function index(){
        $limit=Limit::find(1);
        return view('user.index')->with('limit',$limit);
    }
}
