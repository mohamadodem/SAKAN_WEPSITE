<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام السكن الجامعي - @yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== CONTAINER ===== */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== HEADER STYLES ===== */
        header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            padding: 10px 0;
        }

        /* ===== NAVIGATION STYLES ===== */
        nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 6px;
            transition: all 0.3s ease;
            display: block;
            font-size: 1.1rem;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        /* ===== MAIN CONTENT STYLES ===== */
        main {
            flex: 1;
            padding: 30px 0;
            min-height: calc(100vh - 140px);
        }

        /* ===== ALERT MESSAGES ===== */
        .alert {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            font-weight: 500;
            border-right: 5px solid;
            animation: slideIn 0.5s ease;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-right-color: #28a745;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-right-color: #dc3545;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* ===== FOOTER STYLES ===== */
        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 25px 0;
            margin-top: auto;
            border-top: 4px solid #3498db;
        }

        footer p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        /* ===== RESPONSIVE DESIGN ===== */

        /* Tablets */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .logo {
                font-size: 1.6rem;
            }

            nav ul {
                justify-content: center;
                gap: 15px;
                flex-wrap: wrap;
            }

            nav ul li a {
                padding: 8px 12px;
                font-size: 1rem;
            }

            main {
                padding: 20px 0;
            }

            .container {
                padding: 0 15px;
            }
        }

        /* Mobile Phones */
        @media (max-width: 480px) {
            .logo {
                font-size: 1.4rem;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            nav ul li {
                width: 100%;
            }

            nav ul li a {
                text-align: center;
                padding: 12px;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .alert {
                padding: 12px 15px;
                font-size: 0.95rem;
            }

            footer {
                padding: 20px 0;
            }

            footer p {
                font-size: 1rem;
            }
        }

        /* Large Desktops */
        @media (min-width: 1200px) {
            .container {
                padding: 0;
            }
        }
    </style>
</head>
<body>
            <header>
                <div class="container header-content">
            <div class="logo">الهيئة العامة للمدينة الجامعية</div>
            <nav>
                <ul>
                    @auth
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                    <li><a href="{{ route('welcome') }}">الصفحة الرئيسية</a></li>
                    <!-- <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                        <li><a href="{{ route('register') }}">إنشاء حساب</a></li> -->
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>جميع الحقوق محفوظة &copy; {{ date('Y') }}</p>
        </div>
    </footer>
</body>
</html>