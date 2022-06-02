<?php

namespace App\Http\Controllers;


use App\Models\phone;
use App\Models\memeber;
use Illuminate\Http\Request;

class MemeberController extends Controller
{
   

    public function add_member(){
            $phone=new phone();
            $phone->pnumber=('32423423423');
            $memeber=new memeber();
            $memeber->name="Anish Kumar";
            $memeber->save();
            echo "<pre>";
            print_r($memeber);
            echo "</pre>";
            //$memeber->phone()->save($phone);

            return "data added";
            



    }
}
