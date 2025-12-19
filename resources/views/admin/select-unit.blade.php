@extends('layouts.app')

@section('title', 'اختيار الوحدة السكنية')

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

    /* Card Container */
    .card {
        max-width: 600px;
        width: 100%;
        padding: 40px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid #e1e5eb;
        text-align: center;
        margin: 0 auto;
    }

    /* Title */
    .card h2 {
        color: #2c3e50;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding-bottom: 20px;
        border-bottom: 3px solid #3498db;
        position: relative;
    }

    .card h2::after {
        content: '';
        position: absolute;
        bottom: -3px;
        right: 0;
        width: 120px;
        height: 3px;
        background: #9b59b6;
    }

    /* Information Alert */
    .card .alert {
        background: #e8f4fc;
        color: #0c5460;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        border-right: 5px solid #3498db;
        text-align: right;
        animation: slideIn 0.5s ease;
    }

    .card .alert h4 {
        color: #2c3e50;
        font-size: 1.3rem;
        margin-bottom: 15px;
        font-weight: 600;
        border-bottom: 2px solid #b3e0ff;
        padding-bottom: 10px;
    }

    .card .alert p {
        margin: 12px 0;
        font-size: 1.1rem;
        line-height: 1.6;
        color: #2c3e50;
    }

    .card .alert strong {
        color: #2980b9;
        font-weight: 600;
        min-width: 100px;
        display: inline-block;
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

    /* Form Styling */
    .card form {
        margin-top: 30px;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 30px;
        text-align: right;
    }

    .form-group label {
        display: block;
        margin-bottom: 12px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 16px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Select Styling */
    .form-group select {
        width: 100%;
        padding: 16px 20px;
        font-size: 15px;
        border: 2px solid #ddd;
        border-radius: 10px;
        background: #f8f9fa;
        transition: all 0.3s ease;
        color: #2c3e50;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        cursor: pointer;
        appearance: none;
        padding-left: 50px;
    }

    .form-group select:focus {
        outline: none;
        border-color: #9b59b6;
        background: white;
        box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.1);
        }

    .form-group select:hover {
        border-color: #bbb;
    }

    /* Option Styling */
    .form-group select option {
        padding: 12px;
        font-size: 14px;
        background: white;
        color: #2c3e50;
    }

    .form-group select option:checked {
        background: #9b59b6;
        color: white;
    }

    .form-group select option:hover {
        background: #f0e6f5;
    }

    /* Buttons Container */
    .card form > div {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    /* Buttons Styling */
    .btn {
        display: inline-block;
        padding: 16px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        text-align: center;
        flex: 1;
    }

    .btn-success {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        color: white;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(46, 204, 113, 0.3);
    }

    /* Cancel/Back Button */
    .btn:not(.btn-success) {
        background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
        color: white;
    }

    .btn:not(.btn-success):hover {
        background: linear-gradient(135deg, #7f8c8d 0%, #6c7b7d 100%);
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(127, 140, 141, 0.3);
    }

    /* Responsive Buttons */
    @media (max-width: 768px) {
        .content .card form > div {
            flex-direction: column;
            gap: 12px;
        }
        
        .btn {
            width: 100%;
        }
    }

    /* ===== RESPONSIVE DESIGN ===== */

    /* Tablets */
    @media (max-width: 768px) {
        .content .card {
            max-width: 90%;
            padding: 35px 30px;
        }
        
        .content .card h2 {
            font-size: 26px;
            margin-bottom: 25px;
        }
        
        .content .card .alert {
            padding: 22px;
        }
        
        .content .card .alert h4 {
            font-size: 1.2rem;
        }
        
        .content .card .alert p {
            font-size: 1rem;
        }
        
        .form-group select {
            padding: 14px 18px;
            padding-left: 45px;
        }
        
        .btn {
            padding: 15px;
            font-size: 15px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 480px) {
        .content .card {
            padding: 30px 25px;
        }
        
        .content .card h2 {
            font-size: 24px;
            margin-bottom: 22px;
        }
        
        .content .card .alert {
            padding: 20px;
            margin-bottom: 25px;
        }
        
        .content .card .alert h4 {
            font-size: 1.1rem;
        }
        
        .content .card .alert p {
            font-size: 0.95rem;
        }
        
        .content .card .alert strong {
            min-width: 80px;
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            font-size: 15px;
            margin-bottom: 10px;
        }
        
        .form-group select {
            padding: 13px 16px;
            padding-left: 40px;
            font-size: 14px;
        }
        
        .btn {
            padding: 14px;
            font-size: 14px;
        }
    }

    /* Small Mobile Phones */
    @media (max-width: 360px) {
        .content .card {
            padding: 25px 20px;
        }
        
        .content .card h2 {
            font-size: 22px;
        }
        
        .content .card .alert {
            padding: 18px;
        }
        
        .form-group select {
            padding: 12px 14px;
            padding-left: 35px;
            background-position: left 12px center;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        main {
            background: #1a1a1a;
        }
        
        .content .card {
            background: #2c3e50;
            border-color: #34495e;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        
        .content .card h2 {
            color: #ecf0f1;
            border-bottom-color: #3498db;
        }
        
        .content .card h2::after {
            background: #9b59b6;
        }
        
        .content .card .alert {
            background: #1c2833;
            color: #d1d9e6;
            border-right-color: #3498db;
        }
        
        .content .card .alert h4 {
            color: #ecf0f1;
            border-bottom-color: #3498db;
        }
        
        .content .card .alert p {
            color: #bdc3c7;
        }
        
        .content .card .alert strong {
            color: #3498db;
        }
        
        .form-group label {
            color: #ecf0f1;
        }
        
        .form-group select {
            background: #34495e;
            border-color: #4a6572;
            color: #ecf0f1;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ecf0f1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        }
        
        .form-group select:focus {
            background: #3b4f63;
            border-color: #9b59b6;
        }
        
        .form-group select option {
            background: #2c3e50;
            color: #ecf0f1;
        }
        
        .form-group select option:checked {
            background: #9b59b6;
            color: white;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #219653 0%, #1e8749 100%);
        }
        
        .btn:not(.btn-success) {
            background: linear-gradient(135deg, #7f8c8d 0%, #6c7b7d 100%);
        }
        
        .btn:not(.btn-success):hover {
            background: linear-gradient(135deg, #6c7b7d 0%, #5d6b6c 100%);
        }
    }
</style>
<div class="card">
    <h2>اختيار الوحدة السكنية للطلب #{{ $request->id }}</h2>
    
    <div class="alert alert-info">
        <h4>معلومات الطالب:</h4>
        <p><strong>الاسم:</strong> {{ $request->student->user->first_name }} {{ $request->student->user->last_name }}</p>
        <p><strong>الجنس:</strong> {{ $request->student->gender == 'male' ? 'ذكر' : 'أنثى' }}</p>
        <p><strong>الكلية:</strong> {{ $request->student->faculty->faculty_name }}</p>
    </div>
    
    <form method="POST" action="{{ route('admin.show.rooms', $request->id) }}">
        @csrf
        
        <div class="form-group">
            <label for="housing_unit_id">اختر الوحدة السكنية *</label>
            <select id="housing_unit_id" name="housing_unit_id" class="form-control" required>
                <option value="">-- اختر الوحدة السكنية --</option>
                @foreach($housingUnits as $unit)
                    <option value="{{ $unit->id }}">
                        {{ $unit->unit_name }} 
                        (السعة: {{ $unit->max_room_capacity }} طالب/غرفة)
                        - الغرف المتاحة: {{ $unit->total_rooms - $unit->occupied_rooms }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class="btn btn-success" style="flex: 1;">التالي: اختيار الغرفة</button>
            <a href="{{ route('admin.dashboard') }}" class="btn" style="flex: 1;">إلغاء والعودة</a>
        </div>
    </form>
</div>
@endsection