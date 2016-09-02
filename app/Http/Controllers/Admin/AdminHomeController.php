<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Hash;

class AdminHomeController extends Controller
{
  /**
    * Show the form for index a new resource.
    *
    * @return Response
    */
	public function index()
	{
			return view('admin.home');
	}

  /**
    * Show the form for  a login page.
    *
    * @return Response
    */
	public function getLogin()
	{
			return view('admin.login');
	}

  /**
   * postLogin a newly created resource in storage.
   *
   * @return Response
   */
	public function postLogin(Request $request)
	{
			$username = $request->input('username');
			$password = $request->input('password');

			$userisadmin = DB::table('users')->where('name',$username)->value('isadmin');
			$userpassword = DB::table('users')->where('name',$username)->get()->all();

			foreach ($userpassword as $users) {
					$userpwd = $users->password;
			}

			if($userisadmin == 1)
			{
				if(Hash::check($request->input('password'), $userpwd))
				{
					session(['isAdminLogin' => true]);
					return redirect('admin/');
				}
				else
				{
					$request->session()->flash('status','Password is not true!');
					return view('admin.login');
				}
			}
			else{
					$request->session()->flash('status', 'You are not Admin!');
					return Redirect('admin/login');
			}
	}

  /**
   * lgoinout the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
	public function loginout(Request $request)
	{
			$request->session()->flush();
			return redirect('admin/');
	}

}
