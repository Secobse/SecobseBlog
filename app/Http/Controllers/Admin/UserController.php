<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        $users = User::latest('created_at')->Paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users= User::find($id);

        if($users->isadmin == 0)
        {
          $users->isadmin = DB::update('update users set isadmin = 1 where id = ?', [$id]);
          return redirect('admin/users');
        }
        else
        {
          $users->isadmin = DB::update('update users set isadmin = 0 where id = ?', [$id]);
          return redirect('admin/users');
        }
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('admin/users');
    }
}
