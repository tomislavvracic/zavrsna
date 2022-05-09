<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
class NewsController extends Controller
{
    public $pages;

    public function index(Request $request, $id = null){
        if($id != null){
            $this->pages = Page::where("user_id",$id)->paginate(2);
        }
        else{
            $this->pages = Page::paginate(2);
        }
        
        return view('dashboard',[
            "pages" => $this->pages,
            "users" => User::all()
        ]);
    }
}
