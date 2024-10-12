<?php

namespace App\Http\Controllers\MVC\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Customers\Customer;
class CustomerController extends Controller
{
        // Register Page
        public function customerRegisterPage()
        {
            return view('customer.auth.register');
        }
    
        // Register Store
        public function registerCustomer(Request $request)
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
                $customer = Customer::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $phone,
                    'phone_verified_at' => now(),
                ]);
    
                $customer->save();
                return response()->json(['status' => 'success', 'message' => 'تم التسجيل بنجاح']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'حدث خطأ ما'], 500);
            }
        }
    
        // Login Page
        public function customerLoginPage()
        {
            return view('customer.auth.login');
        }
    
        
        // Login ِAction
        public function customerLogin(Request $request)
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
            $customer = Customer::where('email', $loginInput)
                            ->orWhere('phone', $loginInput)
                            ->first();
        
            // Check if seller exists
            if (!$customer) {
                return redirect()->route('customer.loginPage')->with('error', 'المستخدم غير موجود');
            }
        
            // Check seller status and request status
            if ($customer->status !== 'active') {
                return redirect()->route('customer.loginPage')->with('error', 'غير مصرح لك بالدخول');
            }
        
            // Check credentials
            if (Auth::guard('customer')->attempt(['email' => $customer->email, 'password' => $request->password]) || 
                Auth::guard('customer')->attempt(['phone' => $customer->phone, 'password' => $request->password])) {
                
                // If status is active and request is approved, redirect to dashboard
                return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
            } else {
                return redirect()->route('customer.loginPage')->with('error', 'البريد الالكتروني/رقم الهاتف أو كلمة المرور غير صحيحة');
            }
        }
}
