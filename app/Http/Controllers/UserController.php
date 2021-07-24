<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate();
        return view('admin.users.index', ['users'=>$users]);
    }

    public function login()
    {
        return view('login');
    }

    public function logged(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ]);
        if(!auth()->attempt($request->only('username','password'))){
            return back()->with('status','Invalid credential details');
        }
        return redirect()->route('index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'username'=>'required|max:255|unique:users',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = time().rand() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        User::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'username'=>$request->username,
            'email'=>$request->email,
            'image'=>$imageName,
            'password'=>Hash::make($request->password),
            
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('index');
        
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profile',['user'=>$user]);
    }

    public function update(Request $r)
    {
        $user = auth()->user();
        if($user->username == $r->username){
            $this->validate($r,[
                'name'=>'required',
                'surname'=>'required',
            ]);
        }
        else{
            $this->validate($r,[
                'name'=>'required',
                'surname'=>'required',
                'username'=>'required|unique:users'
            ]);
        }
        
        $user->name = $r->name;
        $user->surname = $r->surname;
        $user->username = $r->username;
        if($r->password != ''){
            $this->validate($r,[
                'password'=>'required|confirmed'
            ]);
            $user->password = Hash::make($r->password);
        }
        if($r->image != null){
            $this->validate($r,[
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = $r->file('image');
            File::delete(public_path('images/'.$user->image));
            $imageName = time().rand() .'.'. $image->extension();
            $image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }
        $user->save();
        return redirect()->route('index',[])->with('message','Account successfully updated.');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('users');
    }

    public function comments_index()
    {
        $comments = Comment::paginate();
        return view('admin.comments.index', ['comments'=>$comments]);
    }

    public function comments_delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        return redirect()->route('comments');
    }
}
