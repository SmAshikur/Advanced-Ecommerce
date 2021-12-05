<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin',['except'=>array('login')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login  (Request $request){
        if($request->isMethod('post'))

            if( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect('/dashboard');
            }else{
                return redirect('/login');
            }

        return view('admin.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function settings(Request $request){
        if($request->isMethod('post')){
            // return $request;
             $data=$request->all();
             if(Hash::check($data['old_pwd'],Auth::guard('admin')->user()->password)){
                 if($data['new_pwd']==$data['confirm_pwd']){
                     Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                     Session::flash('success','password change Successfully');
                     return redirect()->back();
                 }else{
                     Session::flash('fail','password doesnt match');
                     return redirect()->back();
                 }
                     Session::flash('fail','your old password is not correct');
                     return redirect()->back();
             }
         }
        $admin=Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('admin.settings',compact('admin'));

    }
    public function adminUpdate(Request $request){
       // return $request;
        $admin=Admin::where('id',Auth::guard('admin')->user()->id)->first();
        if($request->has('image')){
            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extention;
            $file->move('images/admin',$fileName);
        }else if(empty($request->image)){
            $fileName=$request->current_img;
        }else{
            $fileName=" ";
        }
        $admin->image=$fileName;
         $admin->name=$request->name;
         $admin->type=$request->type;
         $admin->email=$request->email;
         $admin->mobile=$request->mobile;
         $admin->status=$request->status;
         $admin->update();
         Session::flash('success','password change Successfully');
         return redirect()->back();
    }
    public function pass(Request $request){
        $data=$request->all();
       // echo Auth::guard('admin')->user()->password;die();
        //echo "<pre>";print_r($data);die();
        if(Hash::check($data['old_pwd'],Auth::guard('admin')->user()->password)){
            echo true;
        }else{
            echo false;
        }
    }

     public function index() {
        //return view('admin.dashboard');
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
