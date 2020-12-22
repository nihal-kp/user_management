<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $user =  User::where(['email'=>$req->email,'password'=>$req->password])->first();
        if($req->email == 'admin@gmail.com' && $req->password == 'admin')
        {
            return redirect('/admin');
        }
        else if(!$user)
        {
            return '<script>
                        alert("Incorrect email and password!!"); 
                        window.location.href="/";
                    </script>';
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/profile');
        }
    }
    
    public function admin()
    {
        $users =  User::all();
        return view('admin',['users'=>$users]);
    }

    public function add(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:4',
            'email' => 'required|min:5|unique:users',
            'phone_number' => 'required|numeric|min:10',
            'password' => 'required|min:5|confirmed',
            'image' => 'file|mimes:png,jpg|max:1024',
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->phone = $req->phone_number;
        $user->address = $req->address;
        // $user->image = $req->file('image')->store('images');

        if($req->hasFile('image')) {
            
            $file = $req->file('image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $user->image = $fileName ;
        }
        else
        {
            return $req;
            $user->image = '';
        }

        $user->save();
        return '<script>
                    alert("Successfully added a new user!!"); 
                    window.location.href="/admin";
                </script>';
    }

    public function view($id)
    {
        $user = User::find($id);
        return view('view',['user'=>$user]);
    }

    public function delete($id)
    {    
        $user = User::find($id);
        $user->delete();
        return redirect("/admin");
    }

    public function search(Request $req)
    {
        $data = User::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['users'=>$data]);
    }


    public function signup(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:4',
            'email' => 'required|min:5|unique:users',
            'phone_number' => 'required|numeric|min:10',
            'password' => 'required|min:5|confirmed',
            'image' => 'file|mimes:png,jpg|max:1024',
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->phone = $req->phone_number;
        $user->address = $req->address;
        // $user->image = $req->file('image')->store('images');

        if($req->hasFile('image')) {
            
            $file = $req->file('image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $user->image = $fileName ;
        }
        else
        {
            return $req;
            $user->image = '';
        }
        $user->save();
        return '<script>
                    alert("Registration successfully completed!! Please login"); 
                    window.location.href="/";
                </script>';
    } 

    public function profile()
    {
        $userId = Session::get('user')['id'];
        $user = User::find($userId);
        return view ('profile',['user'=>$user]);
    }

    public function edit()
    {
        $userId = Session::get('user')['id'];
        $user = User::find($userId);
        return view ('edit',['user'=>$user]);
    }

    public function update(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:4',
            'email' => 'required|min:5',
            'phone_number' => 'required|numeric|min:10',
            'password' => 'required|min:5|confirmed',
            'image' => 'file|mimes:png,jpg|max:1024',
        ]);
        $userId = Session::get('user')['id'];
        $user = User::find($userId);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->phone = $req->phone_number;
        $user->address = $req->address;
        // $user->image = $req->file('image')->store('images');

        if($req->hasFile('image')) {
            
            $file = $req->file('image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $user->image = $fileName ;
        }
        else
        {
            return $req;
            $user->image = '';
        }
        $user->save();
        return '<script>
                    alert("Details updated"); 
                    window.location.href="/profile";
                </script>';
    }
}