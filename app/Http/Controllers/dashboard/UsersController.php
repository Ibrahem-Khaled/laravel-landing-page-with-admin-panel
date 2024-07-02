<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'branch')->get();
        return view('dashboard.users', compact('users'));
    }

    public function otherPage()
    {
        $users = User::where('role', 'page')->get();
        return view('dashboard.otherPage', compact('users'));
    }

    // Store a newly created user in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'booking_link' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->booking_link = $request->booking_link;
        $user->description = $request->description;
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $user->image = $fileName;
        }

        $user->save();

        return redirect()->back()->with('success', 'User created successfully.');
    }

    // Update the specified user in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'booking_link' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->booking_link = $request->booking_link;
        $user->description = $request->description;
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($user->image && file_exists(public_path('images/' . $user->image))) {
                unlink(public_path('images/' . $user->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $user->image = $fileName;
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage.
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete the image file
        if ($user->image && file_exists(public_path('images/' . $user->image))) {
            unlink(public_path('images/' . $user->image));
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
