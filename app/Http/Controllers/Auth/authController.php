<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Professor;

class authController extends Controller
{
    // --- 1. DISPLAY THE MAIN LOGIN PAGE (Fixes your error) ---
    public function showLogin()
    {
        return view('Auth.login');
    }

    // --- 2. ADMIN SPECIFIC LOGIN (From your image) ---
    public function adminLogin()
    {
        return view('Auth.admin');
    }

    // --- 3. MAIN LOGIN CHECKER (Handles Students, Profs, & Admins) ---
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Check Admin
        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('dashboard')->with('success', 'Welcome Admin ' . $admin->name);
        }

        // Check Student
        $student = Student::where('email', $credentials['email'])->first();
        if ($student && Hash::check($credentials['password'], $student->password)) {
            Auth::guard('student')->login($student);
            // Redirects students to the main dashboard as you requested
            return redirect()->route('dashboard')->with('success', 'Welcome Student ' . $student->name);
        }

        // Check Professor
        $professor = Professor::where('email', $credentials['email'])->first();
        if ($professor && Hash::check($credentials['password'], $professor->password)) {
            Auth::guard('professor')->login($professor);
            return redirect()->route('professor.dashboard')->with('success', 'Welcome Professor ' . $professor->name);
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }

    // --- 4. ADMIN SPECIFIC CHECKER (From your image) ---
    public function adminCheckLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('dashboard')->with('success', 'Hello ' . $admin->name);
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }

    // --- 5. LOGOUT ---
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) Auth::guard('admin')->logout();
        elseif (Auth::guard('student')->check()) Auth::guard('student')->logout();
        elseif (Auth::guard('professor')->check()) Auth::guard('professor')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}