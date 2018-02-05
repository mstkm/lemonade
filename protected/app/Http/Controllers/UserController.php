<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where([['id','!=',Auth::user()->id],['is_deleted','0']])->get();
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::whereId($id)->first();
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'username'=> 'required',
            'name'=> 'required',
            'email'=> 'required|email|unique:users,username',
            'alamat'=> 'required|string',
            'phone'=> 'numeric|min:1|required',            
        ]);
        // return $request->all();
        $user =User::whereId($id)->first();
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->alamat = $request['alamat'];
        $user->noHP = $request['phone'];             
        $user->update();
        return redirect('admin')->with('status','Profile Berhasil Diperbarui!!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::whereId($id)->first();
        $user->is_deleted='1';
        $user->update();
        return back()->with('status','User berhasil dihapus!!');
    }
}
