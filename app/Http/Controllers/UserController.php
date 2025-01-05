<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        return view('user_dashboard', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }

    public function updateProfilePicture(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture_url = Storage::url($path);
            $user->save();
        }

        return redirect()->route('dashboard')->with('success', 'Profile picture updated successfully.');
    }
}
