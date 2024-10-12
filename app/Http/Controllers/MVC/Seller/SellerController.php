<?php

namespace App\Http\Controllers\MVC\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Sellers\Seller;

class SellerController extends Controller
{
    // Register Page
    public function sellerRegisterPage()
    {
        return view('seller.auth.register');
    }

    // Register Store
    public function registerSeller(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 422);
        }

         // Retrieve the phone number from the session (stored during OTP verification)
        $phone = $request->session()->get('phone');

        if (!$phone) {
            return response()->json(['status' => 'error', 'message' => 'Phone number not found in session.']);
        }

        try {
            $seller = Seller::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $phone,
                'phone_verified_at' => now(),
            ]);

            $seller->save();
            return response()->json(['status' => 'success', 'message' => 'تم التسجيل بنجاح']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'حدث خطأ ما'], 500);
        }
    }

    // Login Page
    public function sellerLoginPage()
    {
        return view('seller.auth.login');
    }

    
    // Login ِAction
    public function sellerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('seller.loginPage')->withErrors($validator)->withInput();
        }
    
        // Get the login input (email or phone)
        $loginInput = $request->login;
    
        // Find the seller by email or phone
        $seller = Seller::where('email', $loginInput)
                        ->orWhere('phone', $loginInput)
                        ->first();
    
        // Check if seller exists
        if (!$seller) {
            return redirect()->route('seller.loginPage')->with('error', 'البائع غير موجود');
        }
    
        // Check seller status and request status
        if ($seller->status !== 'active') {
            return redirect()->route('seller.loginPage')->with('error', 'غير مصرح لك بالدخول');
        }
    
        if ($seller->request_status === 'pending') {
            return redirect()->route('seller.loginPage')->with('error', 'طلبك قيد المراجعة، يرجى الانتظار');
        }
    
        // Check credentials
        if (Auth::guard('seller')->attempt(['email' => $seller->email, 'password' => $request->password]) || 
            Auth::guard('seller')->attempt(['phone' => $seller->phone, 'password' => $request->password])) {
            
            // If status is active and request is approved, redirect to dashboard
            return redirect()->route('seller.dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return redirect()->route('seller.loginPage')->with('error', 'البريد الالكتروني/رقم الهاتف أو كلمة المرور غير صحيحة');
        }
    }




    // Seller Dashboard
    public function sellerDashboard()
    {
        return view('seller.sellerDashboard');
    }  

    
}
