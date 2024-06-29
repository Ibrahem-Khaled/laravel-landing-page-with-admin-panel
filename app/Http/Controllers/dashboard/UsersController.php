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
        $users = User::all();
        return view('dashboard.users', compact('users'));
    }

    // Store a newly created user in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable',
            'booking_link' => 'nullable',
            'description' => 'nullable|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->booking_link = $request->booking_link;
        $user->description = $request->description;
        $user->save();

        return redirect()->back()->with('success', 'User created successfully.');
    }

    // Update the specified user in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable',
            'booking_link' => 'nullable',
            'description' => 'nullable|string',
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
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage.
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
