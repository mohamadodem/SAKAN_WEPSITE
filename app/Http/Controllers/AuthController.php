<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'national_id' => 'required|string',
        'password' => 'required|string',
    ], [
        'national_id.required' => 'رقم الهوية مطلوب',
        'password.required' => 'كلمة المرور مطلوبة',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

        $user = User::where('national_id', $request->national_id)->first();

        if (! $user) {
            return back()->withErrors([
                'national_id' => 'رقم الهوية غير مسجل في النظام.',
            ])->withInput();
        }

        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'كلمة المرور غير صحيحة.',
            ])->withInput();
        }

        Auth::login($user);

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('student.dashboard');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // قواعد التحقق مع رسائل خطأ مخصصة
        $validator = Validator::make($request->all(), [
            'national_id' => 'required|string|unique:users|max:20|regex:/^[0-9]+$/',
            'phone'       => 'required|string|unique:users|max:20|regex:/^[0-9]+$/',
            'password'    => 'required|string|confirmed|min:6',
            'first_name'  => 'required|string|max:50|regex:/^[\p{Arabic}\s]+$/u',
            'last_name'   => 'required|string|max:50|regex:/^[\p{Arabic}\s]+$/u',
            'father_name' => 'required|string|max:50|regex:/^[\p{Arabic}\s]+$/u',
            'mother_name' => 'required|string|max:50|regex:/^[\p{Arabic}\s]+$/u',
        ], [
            'national_id.required' => 'رقم الهوية مطلوب',
            'national_id.unique'   => 'رقم الهوية مسجل مسبقاً',
            'national_id.regex'    => 'رقم الهوية يجب أن يحتوي على أرقام فقط',
            'phone.required'       => 'رقم الهاتف مطلوب',
            'phone.unique'         => 'رقم الهاتف مسجل مسبقاً',
            'phone.regex'          => 'رقم الهاتف يجب أن يحتوي على أرقام فقط',
            'password.required'    => 'كلمة المرور مطلوبة',
            'password.confirmed'   => 'كلمة المرور غير متطابقة',
            'password.min'         => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
            'first_name.required'  => 'الاسم الأول مطلوب',
            'first_name.regex'     => 'الاسم الأول يجب أن يحتوي على أحرف عربية فقط',
            'last_name.required'   => 'اسم العائلة مطلوب',
            'last_name.regex'      => 'اسم العائلة يجب أن يحتوي على أحرف عربية فقط',
            'father_name.required' => 'اسم الأب مطلوب',
            'father_name.regex'    => 'اسم الأب يجب أن يحتوي على أحرف عربية فقط',
            'mother_name.required' => 'اسم الأم مطلوب',
            'mother_name.regex'    => 'اسم الأم يجب أن يحتوي على أحرف عربية فقط',
        ]);

        // إذا فشل التحقق
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // إنشاء المستخدم
        $user = User::create([
            'national_id' => $request->national_id,
            'phone'       => $request->phone,
            'password'    => Hash::make($request->password),
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
        ]);

        Auth::login($user);

        return redirect()->route('student.profile.create');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
