<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Illuminate\Http\Response
     */
	public function profile() {
		$user = Auth::user();
		return view('users.profile', array('user' => Auth::user()));
	}

    /**
     * Update user avatar.
     *
     * @return \Illuminate\Http\Response
     */
	public function updateAvatar(Request $request) {
		if ($request->hasFile('avatar')) {

			$avatar = $request->file('avatar');
			$user = Auth::user();

			$prevImg = $user->avatar;
			if ($prevImg != 'default.jpg') {
				$path = public_path('/uploads/avatars/');
				File::delete($path . $prevImg);
			}

			$filename = $user->name . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->fit(300, 300)->save(public_path('/uploads/avatars/') . $filename);


			$user->avatar = $filename;
			$user->save();
		}

		return view('users.profile', array('user' => Auth::user()));
	}
}
