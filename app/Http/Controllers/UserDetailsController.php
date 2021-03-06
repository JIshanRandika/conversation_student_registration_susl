<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserDetailsController extends Controller
{
    //
    public function index(){
        $users = DB::select('select * from users where is_permission > 0');
        return view('user_edit_view',['users'=>$users]);
    }

    public function show($id) {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('user_update',['users'=>$users]);
    }

    public function edit(Request $request,$id) {
        $regNum = $request->input('regNum');
        $name = $request->input('name');
        $email = $request->input('email');
        $is_permission = $request->input('is_permission');

        DB::update('update users set name = ?,email=?,regNum=?, is_permission=? where id = ?',[$name,$regNum,$email,$is_permission,$id]);
        return back()->with('success','Updated successfully');
    }
    public function destroy($id) {
        DB::delete('delete from users where id = ?',[$id]);
        return back()->with('success','successfully Deleted');
    }
}
