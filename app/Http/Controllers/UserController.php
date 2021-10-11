<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect()->route('login');
	}

	public function viewUser()
	{
		$datas['allData'] = User::all();
		return view('backend.users.view_user', $datas);
	}

	public function addUser()
	{
		return view('backend.users.add_user');
	}

	public function saveUser(Request $req)
	{
		$validateData = $req->validate([
			'fullName' => 'required',
			'emailAddress' => 'required|unique:users,emailAddress',
			'phoneNumber' => 'required',
			'role' => 'required',
		]);

		$data = new User();
		$data->fullName = $req->fullName;
		$data->emailAddress = $req->emailAddress;
		$data->phoneNumber = $req->phoneNumber;
		$data->role = $req->role;
		$data->save();

		$notification = array(
			'message' => 'Add User Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('view.user')->with($notification);
	}

	public function editUser($id)
	{
		$data = User::find($id);
		return view('backend.users.edit_user', compact('data'));
	}

	public function updateUser(Request $req, $id)
	{
		$data = User::find($id);

		$validateData = $req->validate([
			'fullName' => 'required',
			'emailAddress' => 'required|unique:users,emailAddress,'.$data->id,
			'phoneNumber' => 'required',
			'role' => 'required',
		]);

		$data->fullName = $req->fullName;
		$data->emailAddress = $req->emailAddress;
		$data->phoneNumber = $req->phoneNumber;
		$data->role = $req->role;
		$data->save();

		$notification = array(
			'message' => 'Update User Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('view.user')->with($notification);
	}

	public function deleteUser($id)
	{
		$data = User::find($id);
		$data->delete();

		$notification = array(
			'message' => 'Delete User Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('view.user')->with($notification);
	}
}
