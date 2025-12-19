@extends('layouts.app')

@section('title', 'لوحة تحكم الطالب')

@section('content')

<style>
    /* Dashboard Container */
    .content > div {
        padding: 20px 0;
    }

    /* Welcome Message */
    h1 {
        color: #2c3e50;
        font-size: 2.2rem;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #3498db;
        font-weight: 700;
    }
    /* Alert Messages */
    .alert {
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        border-right: 5px solid;
        animation: slideIn 0.5s ease;
    }
    .alert-warning {
        background: #fff3cd;
        color: #856404;
        border-right-color: #ffc107;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-right-color: #28a745;
    }
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border-right-color: #dc3545;
    }
    .alert p {
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    .alert p:last-child {
        margin-bottom: 0;
    }
    /* Cards Layout */
    .content > div:not(:first-child) {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }
    /* Individual Card */
    .card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #eaeaea;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    /* Card Headers */
    .card h2 {
        color: #2c3e50;
        font-size: 1.6rem;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
        font-weight: 600;
    }

    /* Profile Info */
    .card p {
        color: #555;
        font-size: 1.1rem;
        margin-bottom: 12px;
        line-height: 1.6;
    }

    .card p strong {
        color: #2c3e50;
        font-weight: 600;
        min-width: 140px;
        display: inline-block;
    }

    /* Request Status Cards */
    .card .alert {
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        animation: none;
    }

    .card .alert p {
        margin-bottom: 10px;
        font-size: 1rem;
    }

    .card .alert p:last-child {
        margin-bottom: 0;
    }

    /* Buttons in Dashboard */
    .btn {
        display: inline-block;
        padding: 12px 30px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        cursor: pointer;
        text-align: center;
        margin-top: 10px;
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

    /* Multiple Buttons Container */
    .card > a:last-of-type {
        margin-top: 20px;
        display: inline-block;
    }

    /* Animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ===== RESPONSIVE DESIGN ===== */

    /* Tablets */
    @media (max-width: 768px) {
        .content h1 {
            font-size: 1.8rem;
            margin-bottom: 25px;
        }
        
        .content > div:not(:first-child) {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .card {
            padding: 25px;
        }
        
        .card h2 {
            font-size: 1.4rem;
        }
        
        .alert {
            padding: 18px 20px;
        }
        
        .btn {
            padding: 11px 25px;
            font-size: 0.95rem;
        }
        
        .card p {
            font-size: 1rem;
        }
        
        .card p strong {
            min-width: 120px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 480px) {
        .content h1 {
            font-size: 1.6rem;
            padding: 0 15px 15px;
        }
        
        .content > div {
            padding: 15px 0;
        }
        
        .card {
            padding: 20px;
            margin: 0 10px;
        }
        
        .card h2 {
            font-size: 1.3rem;
            margin-bottom: 18px;
        }
        
        .alert {
            padding: 15px 18px;
            margin-bottom: 20px;
        }
        
        .alert p {
            font-size: 0.95rem;
        }
        
        .card p {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }
        
        .card p strong {
            min-width: 110px;
            display: block;
            margin-bottom: 5px;
        }
        
        .btn {
            width: 100%;
            padding: 14px;
            font-size: 1rem;
        }
    }

    /* Small Mobile Phones */
    @media (max-width: 360px) {
        .content h1 {
            font-size: 1.5rem;
        }
        
        .card {
            padding: 18px 15px;
        }
        
        .card h2 {
            font-size: 1.2rem;
        }
        
        .alert {
            padding: 14px 16px;
        }
        
        .card p {
            font-size: 0.9rem;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        .content h1 {
            color: #ecf0f1;
            border-bottom-color: #3498db;
        }
        
        .card {
            background: #2c3e50;
            border-color: #34495e;
            color: #ecf0f1;
        }
        
        .card h2 {
            color: #ecf0f1;
            border-bottom-color: #4a6572;
        }
        
        .card p {
            color: #bdc3c7;
        }
        
        .card p strong {
            color: #ecf0f1;
        }
        
        .alert-warning {
            background: #4d4200;
            color: #ffd54f;
            border-right-color: #ffb300;
        }
        
        .alert-success {
            background: #1b3b24;
            color: #81c784;
            border-right-color: #4caf50;
        }
        
        .alert-danger {
            background: #4a1c1c;
            color: #ff7b7b;
            border-right-color: #f44336;
        }
        
        .btn {
            background: #3498db;
        }
        
        .btn:hover {
            background: #2980b9;
        }
        
        .btn-success {
            background: #27ae60;
        }
        
        .btn-success:hover {
            background: #219653;
        }
    }
</style>
<div>
    <h1>مرحباً، {{ auth()->user()->first_name }}</h1>

    @if(!$student)
        <div class="alert alert-warning">
            <p>يجب إنشاء ملفك الشخصي أولاً قبل استخدام النظام.</p>
            <a href="{{ route('student.profile.create') }}" class="btn">إنشاء الملف الشخصي</a>
        </div>
    @else
        <div class="card">
            <h2>معلومات الملف الشخصي</h2>
            <p><strong>الرقم الجامعي:</strong> {{ $student->university_id }}</p>
            <p><strong>الكلية:</strong> {{ $student->faculty->faculty_name }}</p>
            <p><strong>السنة الدراسية:</strong> {{ $student->study_year }}</p>
            <p><strong>المحافظة:</strong> {{ $student->governorate }}</p>
            <a href="{{ route('student.profile.edit') }}" class="btn">تعديل الملف الشخصي</a>
        </div>
        
        <div class="card">
            <h2>حالة طلب السكن</h2>
        
            @if($request)
                @if($request->status == 'pending')
                    <div class="alert alert-warning">
                        <p><strong>طلب قيد المراجعة</strong></p>
                        <p><strong>تاريخ الطلب:</strong> {{ $request->created_at->format('Y-m-d') }}</p>
                        <p><strong>الحالة:</strong> قيد الانتظار - يتم مراجعة طلبك من قبل إدارة السكن</p>
                    </div>
                @elseif($request->status == 'accepted')
                    <div class="alert alert-success">
                        <p><strong>طلب مقبول</strong></p>
                        <p><strong>الوحدة السكنية:</strong> {{ $request->room->housingUnit->unit_name }}</p>
                        <p><strong>رقم الغرفة:</strong> {{ $request->room->room_number }}</p>
                        <p><strong>تاريخ القبول:</strong> {{ $request->updated_at->format('Y-m-d') }}</p>
                        <p><strong>ملاحظة:</strong> تم قبول طلبك وتم تخصيص الغرفة لك.</p>
                    </div>
                @elseif($request->status == 'rejected')
                    <div class="alert alert-danger">
                        <p><strong>طلب مرفوض</strong></p>
                        <p><strong>تاريخ الرفض:</strong> {{ $request->updated_at->format('Y-m-d') }}</p>
                        <p><strong>ملاحظة:</strong> يمكنك تقديم طلب جديد.</p>
                    </div>
                @endif
            @else
                <p>ليس لديك طلب سكن حالياً.</p>
            @endif
            
            {{-- زر إنشاء طلب جديد - يظهر فقط إذا لم يكن هناك طلب pending أو accepted --}}
            @if(!$student->hasActiveRequest())
                <a href="{{ route('student.request.create') }}" class="btn btn-success">
                    تقديم طلب سكن جديد
                </a>
            @endif
            
            {{-- تم إزالة زر عرض سجل الطلبات بالكامل --}}
        </div>
</div>
@endif
@endsection