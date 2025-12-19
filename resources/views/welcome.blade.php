@extends('layouts.app')

@section('title', 'نظام السكن الجامعي')

@section('content')
<style>
    /* Main Content Container */
    .content > div {
        padding: 30px 0;
    }

    /* Page Title */
     h1 {
        text-align: center;
        color: #2c3e50;
        font-size: 2.5rem;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 3px solid #3498db;
        position: relative;
    }
     h1::after {
        content: '';
        position: absolute;
        bottom: -3px;
        right: 0;
        width: 100px;
        height: 3px;
        background: #e74c3c;
    }

    /* Cards Container */
    .content > div > div:last-child {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    /* Card Styles */
    .card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #eaeaea;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        border-color: #3498db;
    }

    /* Card Titles */
    .card h2 {
        color: #2c3e50;
        font-size: 1.8rem;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    /* Features List */
    .card ul {
        list-style: none;
        padding: 0;
        margin: 20px 0;
        flex-grow: 1;
    }

    .card ul li {
        padding: 12px 0;
        padding-right: 35px;
        position: relative;
        font-size: 1.1rem;
        color: #555;
        border-bottom: 1px dashed #eee;
        cursor: pointer;
    }

    .card ul li:last-child {
        border-bottom: none;
    }

    .card ul li::before {
        content: '✓';
        position: absolute;
        right: 0;
        top: 12px;
        width: 25px;
        height: 25px;
        background: #2ecc71;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    /* Card Paragraphs */
    .card p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 25px;
        flex-grow: 1;
    }

    /* Buttons Container */
    .card > div:last-child {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: auto;
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        padding: 14px 30px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        text-align: center;
        cursor: pointer;
        min-width: 180px;
    }

    .btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
    }

    /* Success Button Variant */
    .btn-success {
        background: #2ecc71;
    }

    .btn-success:hover {
        background: #27ae60;
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
    }

    /* ===== RESPONSIVE DESIGN ===== */

    /* Tablets */
    @media (max-width: 768px) {
        .content h1 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .content > div > div:last-child {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .card {
            padding: 25px;
        }

        .card h2 {
            font-size: 1.6rem;
        }

        .btn {
            padding: 12px 25px;
            min-width: 160px;
            font-size: 1rem;
        }

        .card ul li {
            font-size: 1rem;
        }
    }

    /* Mobile Phones */
    @media (max-width: 480px) {
        .content h1 {
            font-size: 1.7rem;
            padding: 0 15px 15px;
        }

        .content > div {
            padding: 20px 0;
        }

        .card {
            padding: 20px;
            margin: 0 10px;
        }

        .card h2 {
            font-size: 1.4rem;
        }

        .card > div:last-child {
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            width: 100%;
            min-width: auto;
            padding: 15px;
        }

        .card ul li {
            font-size: 0.95rem;
            padding: 10px 0;
            padding-right: 30px;
        }

        .card ul li::before {
            width: 22px;
            height: 22px;
            top: 10px;
            font-size: 0.9rem;
        }
    }

    /* Large Screens */
    @media (min-width: 1200px) {
        .content > div > div:last-child {
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .card {
            padding: 35px;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        .card {
            background: #2c3e50;
            border-color: #34495e;
            color: #ecf0f1;
        }

        .card h2 {
            color: #ecf0f1;
        }

        .card ul li {
            color: #bdc3c7;
        }

        .card p {
            color: #bdc3c7;
        }
    }
</style>
<div>
    <h1>أهلاً بك في نظام السكن الجامعي</h1>   
    <div>
        <div class="card">
            <h2>مزايا النظام</h2>
            <ul>
                <li> إدارة طلبات السكن الجامعي</li>
                <li> سهولة في التسجيل</li>
                <li> سرعة في الحصول على السكن</li>
                <li> توفير التفقات والمصاريف</li>
                <li> واجهة سهلة الاستخدام</li>
            </ul>
        </div>
        
        <div class="card">
            <h2>ابدأ الآن</h2>
            <p>سجل دخولك أو أنشئ حساب جديد للبدء</p>          
            <div>
                <a href="{{ route('login') }}" class="btn">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="btn btn-success">إنشاء حساب جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection