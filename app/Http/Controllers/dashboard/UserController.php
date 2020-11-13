<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware(['permission:read-users'])->only('index');
        $this->middleware(['permission:create-users'])->only('create');
        $this->middleware(['permission:update-users'])->only('edit');
        $this->middleware(['permission:delete-users'])->only('destroy');
    }

    public function index()
    {
        $users = User::whereRoleIs('admin')->latest()->paginate(50);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(Request $request)
    {
        // return($request->all());
        $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'email'       => 'required|unique:users',
            'image'       => 'required|image',
            'password'    => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        $request_date  = $request->except(['password', 'permissions', 'password_confirmation', 'image']);

        $request_date['password'] = bcrypt($request->password);


        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users-images/' . $request->image->hashName(), 60));
        }
        // return $request->permissions;
        $request_date['image'] = $request->image->hashName();
        $user = User::create($request_date);

        $user->attachRole('admin');

        $user->syncPermissions($request->permissions);

        return    redirect()->route('dashboard.users.index')->with('success', __('site.add_seccessfully'));
    } //end of store




    public function edit(User $user)
    {

        return view('dashboard.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'email' => 'unique:users,email,' . $user->id,
            'image'       => 'image',
            'permissions' => 'required|min:1',

        ]);

        $request_date  = $request->except(['permissions', 'image']);
        if ($request->image) {
            if ($user->image != 'default.svg') {
                Storage::disk('public_uploads')->delete('/users-images/' . $user->image);
            }
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users-images/' . $request->image->hashName(), 60));
            $request_date['image'] = $request->image->hashName();
        }

        $user->update($request_date);

        $user->syncPermissions($request->permissions);

        return    redirect()->route('dashboard.users.index')->with('success', __('site.edit_seccessfully'));
    }


    public function destroy(User $user)
    {
        if ($user->image != 'default.svg') {
            Storage::disk('public_uploads')->delete('/users-images/' . $user->image);
        }
        $user->delete();
        return back()->with('success', __('site.delete_seccessfully'));
    }
}
