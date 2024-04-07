<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        return view('User/listAllUsers',[
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User/addUser', ['error'=>'0']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = new User();
        // $user->name = $request->name;
        // $user->siape = $request->siape;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);

        // $user->save();

        $request->validate([
            'name'=>'required|string',
            'siape'=>'required|string|unique:users|max:7|min:7',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:4'
        ]);

        try{
            $user = User::create([
                'name'=>$request->name,
                'siape'=>$request->siape,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
        }
        catch(\Exception $exept){
            return redirect()->back()->withErrors([$exept->getMessage()]);
        }

        return redirect()->route('user.index', ['error'=>'nem deu erro']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('User/listUser',[
            'user'=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('User/editUser',[
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;

        if(filter_var($request->email,FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }
        if(!empty($user->password)){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
