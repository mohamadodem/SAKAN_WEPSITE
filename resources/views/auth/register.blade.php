@extends('layouts.app')

@section('title', 'إنشاء حساب جديد')

@section('content')

<style>
    main {
        display: flex;
        align-items: flex-start; 
        justify-content: center;
        flex: 1;
        padding: 30px 20px;
        background: #f4f4f4;
        min-height: calc(100vh - 140px);
    }
    .card {
        max-width: 480px;
        width: 100%;
        padding: 40px 35px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e1e5eb;
        text-align: center;
        margin: 0 auto;
    }

    /* Title */
    .card h2 {
        color: #333;
        display: flex;
        padding: 20px;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: 600;
        font-family: sans-serif;
    }

    /* General Alert */
    .content .card .alert {
        background: #f8d7da;
        color: #721c24;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        text-align: right;
        border-right: 4px solid #dc3545;
        font-weight: 500;
    }
    /* Form Groups */
    .form-group {
        margin-bottom: 18px;
        text-align: right;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
        font-size: 14px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-group label:after {
        content: " *";
        color: #e74c3c;
    }
    /* Input Fields */
    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 12px 14px;
        font-size: 15px;
        border: 1.5px solid #d1d9e0;
        border-radius: 6px;
        background: #fff;
        transition: all 0.3s ease;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-group input[type="text"]:focus,
    .form-group input[type="password"]:focus {
        outline: none;
        border-color: #2c80ff;
        box-shadow: 0 0 0 3px rgba(44, 128, 255, 0.1);
    }
    /* Error Messages */
    .form-group div[style*="color: red"],
    .form-group div:not(.form-group) {
        color: #e74c3c;
        font-size: 12px;
        margin-top: 5px;
        text-align: right;
        padding-right: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
    }
    /* Helper Text */
    .form-group small {
        display: block;
        margin-top: 5px;
        color: #666;
        font-size: 12px;
        text-align: right;
        font-style: italic;
    }
    /* Register Button */
    .btn {
        width: 100%;
        padding: 14px;
        font-size: 16px;
        background: #2c80ff;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 0.5px;
    }
    .btn:hover {
        background: #1a6fe0;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 128, 255, 0.2);
    }

    /* Login Link Section */
   .new-a {
        padding-top: 25px;
        margin-top: 25px;
        border-top: 1px solid #eaeaea;
    }

    .new-a p {
        color: #666;
        font-size: 16px;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .new-a a {
        color: #2c80ff;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-right: 5px;
    }

    .new-a a:hover {
        color: #1a6fe0;
        text-decoration: underline;
    }
    /* Form Grid for Name Fields */
    .card form {
        display: flex;
        flex-direction: column;
    }

    /* Responsive adjustments for form */
    @media (min-width: 576px) {
        .content .card form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 20px;
        }
        
        /* Make these fields span full width */
        .form-group:nth-child(1),
        .form-group:nth-child(2),
        .form-group:nth-child(3),
        .form-group:nth-child(4),
        .btn,
        .card > div:last-child {
            grid-column: span 2;
        }
    }

    /* Tablets */
    @media (max-width: 768px) {
        .content .card {
            max-width: 450px;
            padding: 35px 30px;
            max-height: 80vh;
        }
        
        .content .card h2 {
            font-size: 24px;
            margin-bottom: 22px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding: 11px 13px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 575px) {
        .content .card {
            max-width: 95%;
            padding: 30px 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            max-height: 75vh;
        }
        
        .content .card h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        .form-group label {
            font-size: 13px;
            margin-bottom: 6px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding: 10px 12px;
            font-size: 14px;
        }
        
        .content .card form .btn {
            padding: 13px;
            font-size: 15px;
        }
        
        .content .card > div:last-child p {
            font-size: 14px;
        }
    }

    /* Small Mobile Phones */
    @media (max-width: 360px) {
        .content .card {
            padding: 25px 20px;
        }
        
        .content .card h2 {
            font-size: 20px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding: 9px 11px;
            font-size: 13px;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        main {
            background: #1a1a1a;
        }
        
        .content .card {
            background: #2a2a2a;
            border-color: #404040;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        
        .content .card h2 {
            color: #ffffff;
            border-bottom-color: #2c80ff;
        }
        
        .form-group label {
            color: #cccccc;
        }
        
        .form-group input[type="text"],
        .form-group input[type="password"] {
            background: #333;
            border-color: #555;
            color: #ffffff;
        }
        
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #2c80ff;
        }
        
        .form-group small {
            color: #999;
        }
        
        .content .card > div:last-child {
            border-top-color: #404040;
        }
        
        .content .card > div:last-child p {
            color: #aaaaaa;
        }
        
        .content .card .alert {
            background: #3c1a1a;
            color: #ff7b7b;
            border-right-color: #ff5252;
        }
    }
</style>
<div class="card">
    <h2>إنشاء حساب جديد</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>يرجى تصحيح الأخطاء :</strong>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="national_id">رقم الهوية الوطنية </label>
            <input type="text" id="national_id" name="national_id" value="{{ old('national_id') }}" required>
            @error('national_id')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">كلمة المرور </label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div>
                    {{ $message }}
                </div>
            @enderror
            <small style="color: #666;">يجب أن تكون كلمة المرور 6 أحرف على الأقل</small>
        </div>

        <div class="form-group">
            <label for="password_confirmation">تأكيد كلمة المرور </label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="first_name">الاسم الأول </label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_name">اسم العائلة </label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="father_name">اسم الأب </label>
            <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
            @error('father_name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mother_name">اسم الأم </label>
            <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
            @error('mother_name')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn">إنشاء حساب</button>
    </form>

    <div class = "new-a">
        <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل الدخول</a></p>
    </div>
</div>
@endsection
