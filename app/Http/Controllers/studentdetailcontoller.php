<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\university;
use Hash;
use Validator;

class studentdetailcontoller extends Controller
{
    public function create(Request $req) {
        // dd($req->all());
    	$data = new university();
    	$data->name = $req->name;
    	$data->mobile = $req->mobile;
    	$data->alternate_mobile = $req->alt_mobile;
    	$data->email =$req->email;
    	$data->alternate_email = $req->alt_email;
    	$data->gender = $req->gender;
    	$data->address = $req->address;	
    	$data->course =	$req->course;
    	$data->country = $req->country;
    	$data->hobbies = implode(',', $req->hobbies);
    	$data->password = Hash::make($req->password);
    	$data->confirm_password =Hash::make($req->c_password);
    	$data->save();
    	return redirect('/university_details');
    }
    public function index() {
    	$data = university::all();
    	return view('home', compact('data'));
    }
    public function destroy($id) {
    	$data = university::find($id);
    	// dd($data);
    	$data->delete();
    	return redirect('/university_details');
    }
    public function edit($id) {
    	$data = university::find($id);
    	$hobbies = explode(',', $data->hobbies);
    	// dd($hobbies);	
    	return view('update',compact('data' ,'hobbies'));	
    }
    public function update(Request $req , $id) {
    	$data = university::find($id);
    	// dd($data);
    	$data->name = $req->name;
    	$data->mobile = $req->mobile;
    	$data->alternate_mobile = $req->alt_mobile;
    	$data->email =$req->email;
    	$data->alternate_email = $req->alt_email;
    	$data->gender = $req->gender;
    	$data->address = $req->address;	
    	$data->course =	$req->course;
    	$data->country = $req->country;
    	$data->hobbies = implode(',', $req->hobbies);
    	$data->password = Hash::make($req->password);
    	$data->confirm_password =Hash::make($req->c_password);
    	$data->save();
    	return redirect('/university_details');

    }
}
