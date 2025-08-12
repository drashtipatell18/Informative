<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
    public function Users()
    {
        $users = User::with('role')->get();
        return view('users.view_user', compact('users'));
    }

    public function UserCreate()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.create_user', compact('roles'));
    }

    public function UserStore(Request $request)
    {
        $ImageName = null;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ImageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/users'), $ImageName);
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'photo' => $ImageName,
            'google_id' => $request->input('google_id'),
            'facebook_id' => $request->input('facebook_id'),
        ]);

        return redirect()->route('users')->with('success', 'User created successfully.');
    }
    public function UserEdit($id)
    {
        $roles = Role::pluck('name', 'id');
        $user = User::findOrFail($id);
        return view('users.create_user', compact('user', 'roles'));
    }

   public function UserUpdate(Request $request, $id)
    {
        $user = User::find($id);

        // Store the old photo name for potential cleanup
        $oldPhoto = $user->photo;

        if ($request->hasFile('photo')) {
            // Handle new file upload
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/users'), $filename);

            // Delete old photo file if it exists
            if ($oldPhoto && file_exists(public_path('images/users/' . $oldPhoto))) {
                unlink(public_path('images/users/' . $oldPhoto));
            }

            $newPhoto = $filename;
        } else {
            // Retain the old photo if no new file is uploaded
            $newPhoto = $request->input('old_photo');
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'photo' => $newPhoto, // Use the correct variable here
            'google_id' => $request->input('google_id'),
            'facebook_id' => $request->input('facebook_id'),
        ]);

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }
    public function UserDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('danger', 'User deleted successfully.');
    }
}
