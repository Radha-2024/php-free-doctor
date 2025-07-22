<?php
// app/Http/Controllers/Doctor/DashboardController.php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('doctor.dashboard');
    }

    public function logout(Request $request)
    {
        auth()->guard('doctor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('doctor.login');
    }
}
