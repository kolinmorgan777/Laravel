<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EditController extends Controller
{

    public function execute($page) {
        echo $page + 4;
    }

    public function delete($page) {
        echo $page;
    }

    public function add(Request $request) {




        $name = Auth::user()->name;


        if ($request->isMethod('get')) {

            $data = [
                'name' => $name,
            ];

            return view('pages_add', $data);
        } else {
            
        }
    }

}
