<?php
namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'email_verified' => false
        ]);

        // Send email verification link
        $verificationLink = route('verify.email', ['email' => $user->email]);

        Mail::raw("Click here to verify your email: $verificationLink", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Verify your email');
        });

        return response()->json(['message' => 'Registration successful. Check your email to verify.']);
    }

    public function verifyEmail($email)
    {
        $user = Customer::where('email', $email)->firstOrFail();
        $user->email_verified = true;
        $user->save();

        return response("Email verified successfully! You may now log in.");
    }

}
