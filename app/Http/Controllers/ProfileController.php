<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showEditProfileForm()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        
        // Return the view with user data
        return view('edit-profile', compact('user'));
    }

    // Method to handle profile updates
    public function updateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle profile picture update
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');
            $user->profile_picture_url = $path;
        }

        // Handle background picture update
        if ($request->hasFile('background_picture')) {
            $file = $request->file('background_picture');
            $path = $file->store('background_pictures', 'public');
            $user->background_picture_url = $path;
        }

        $user->save();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }

    // Method to handle profile picture updates
    public function updateProfilePicture(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Handle the file upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');
            
            // Update user's profile picture path
            $user->profile_picture_url = $path;
            $user->save();
        }

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Profile picture updated successfully!');
    }
}
