@extends('layouts.app')

@section('title', 'تسجيل الدخول')

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

    /* Form Groups */
    .form-group {
        margin-bottom: 22px;
        text-align: right;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        padding: 10px;
        font-weight: 600;
        color: #555;
        font-size: 15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Input Fields */
    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 14px 16px;
        font-size: 16px;
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
    .form-group .error {
        color: #e74c3c;
        font-size: 13px;
        margin-top: 6px;
        text-align: right;
        padding-right: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Login Button */
    .card .btn {
        width: 100%;
        padding: 15px;
        font-size: 17px;
        background: #2c80ff;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 0.5px;
    }

    .card .btn:hover {
        background: #1a6fe0;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 128, 255, 0.2);
    }

    /* Register Link Section */
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
    footer {
        margin-top: auto;
    }
    /* Tablets */
    @media (max-width: 768px) {
        .content .card {
            max-width: 380px;
            padding: 40px 35px;
        }

        .content .card h2 {
            font-size: 26px;
            margin-bottom: 22px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding: 13px 15px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 480px) {
        .content .card {
            max-width: 90%;
            padding: 35px 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
        }

        .content .card h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 14px;
            margin-bottom: 7px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding: 12px 14px;
            font-size: 15px;
        }

        .content .card form .btn {
            padding: 14px;
            font-size: 16px;
        }

        .new-a p {
            font-size: 15px;
        }
    }

    /* Small Mobile Phones */
    @media (max-width: 360px) {
        .content .card {
            padding: 30px 20px;
        }

        .content .card h2 {
            font-size: 22px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding: 11px 13px;
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

        .new-a {
            border-top-color: #404040;
        }

        .new-a p {
            color: #aaaaaa;
        }
    }
</style>
<div class="card">
        <h2>تسجيل الدخول</h2>
    <form method="POST" action="{{ route('login') }}">
            @csrf
        
        <div class="form-group">
            <label for="national_id">رقم الهوية الوطنية</label>
            <input type="text" id="national_id" name="national_id" value="{{ old('national_id') }}" required autofocus>
            @error('national_id')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error">
                     {{ $message }}
                </div>
            @enderror
        </div>   
            <button type="submit" class="btn">تسجيل الدخول</button>   
        <div class="new-a">
            <p>ليس لديك حساب؟ <a href="{{ route('register') }}">أنشئ حساب جديد</a></p>
        </div>
    </form>
</div>
@endsection