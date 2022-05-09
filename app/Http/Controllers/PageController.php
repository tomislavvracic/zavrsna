<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index(){
 
        $pages = Page::join('users', function ($join) {
            $join->on('users.id', '=', 'pages.user_id')
                 ->where('users.role_id', '>=', auth()->user()->role_id);
        })
        ->get();
        return view("page.index",[
            "pages" => $pages
        ]);
    }

    public function create(){
        return view("page.create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'image' => ['required'],
        ]);


        $img = Storage::disk("public")->put("/images/", $request->file("image"));

        $page = new Page();
        $page->title = $request->title;
        $page->text = $request->text;
        $page->img = $img;
        $page->user_id = auth()->user()->id;
        $page->category_id = 2;
        $page->save();

        // $page = Page::create([
        //     'title' => $request->title,
        //     'text' => $request->text,
        //     'img' => $request->image,
        //     'user_id' => auth()->user()->id,
        // ]);

        return redirect("/pages");
    }

    public function edit(Request $request, $id){
        return view("page.edit", [
            "page" => Page::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
        ]);
        
        $page = Page::find($id);

        $page->title = $request->title;
        $page->text = $request->text;
        if($request->image){
            $img = Storage::disk("public")->put("/images/", $request->file("image"));
            $page->img = $img;
        }
        $page->save();
        return redirect("/pages");
    }

    public function destroy(Request $request, $id){
        Page::destroy($id);
        return redirect("/pages");
    }
}