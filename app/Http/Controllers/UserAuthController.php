<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function index(){


        $allusers=User::all();
        

        return view('user.index' ,['all_users'=>$allusers]);
    }

    public function edit($id){
        $singleuser=User::find($id);
     return view('user.edit',['single_user'=>$singleuser]);  
    }

    public function delete($id){

    }
}
