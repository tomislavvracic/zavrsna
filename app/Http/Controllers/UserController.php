<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index(){

        return view("user.index",[
            "users" => User::where("role_id", ">=", auth()->user()->role_id)->get()
        ]);
    }

    public function create(){
        return view("user.create");
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role_id' => $request->role,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);


        return redirect("users");
    }

    public function edit(Request $request, $id){
        return view("user.edit", [
            "user" => User::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if($request->role){
            $user->role_id = $request->role;
        }
        
        $user->save();
        return redirect("/users");
    }

    public function destroy(Request $request, $id){
        if($id == auth()->user()->id){
            User::destroy($id);
            return redirect("/");
        }
        User::destroy($id);
        return redirect("/users");
    }
}
