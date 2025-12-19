@extends('layouts.app')

@section('title', 'اختيار الغرفة')

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
        max-width: 650px;
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
        left: 0;
        width: 120px;
        height: 3px;
        background: #e74c3c;
    }

    /* Information Alert */
    .card .alert {
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        text-align: right;
        animation: slideIn 0.5s ease;
    }

    .card .alert-info {
        background: #e8f4fc;
        color: #0c5460;
        border-right: 5px solid #3498db;
    }

    .card .alert-warning {
        background: #fff3cd;
        color: #856404;
        border-right: 5px solid #ffc107;
    }

    .card .alert h4 {
        color: #2c3e50;
        font-size: 1.3rem;
        margin-bottom: 15px;
        font-weight: 600;
        padding-bottom: 10px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    }

    .card .alert-info h4 {
        border-bottom-color: #b3e0ff;
    }

    .card .alert-warning h4 {
        border-bottom-color: #ffeaa7;
    }

    .card .alert p {
        margin: 12px 0;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .card .alert-info p {
        color: #2c3e50;
    }

    .card .alert-warning p {
        color: #856404;
    }

    .card .alert strong {
        font-weight: 600;
        min-width: 180px;
        display: inline-block;
    }

    .card .alert-info strong {
        color: #2980b9;
    }

    .card .alert-warning strong {
        color: #e67e22;
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
        border-color: #e74c3c;
        background: white;
        box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
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
        background: #e74c3c;
        color: white;
    }

    .form-group select option:hover {
        background: #ffebee;
    }

    /* Rooms capacity indicator in options */
    .form-group select option::after {
        content: attr(data-capacity);
        float: left;
        color: #666;
        font-size: 12px;
    }

    /* Buttons Container */
    .content .card form > div,
    .content .card > div:last-child {
        display: flex;
        gap: 15px;
        margin-top: 25px;
        flex-wrap: wrap;
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
        min-width: 180px;
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

    /* Secondary Button */
    .btn:not(.btn-success):not(.btn-danger) {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: white;
    }

    .btn:not(.btn-success):not(.btn-danger):hover {
        background: linear-gradient(135deg, #2980b9 0%, #1c5d8a 100%);
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(52, 152, 219, 0.3);
    }

    /* Danger Button */
    .btn-danger {
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        color: white;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(231, 76, 60, 0.3);
    }

    /* No Rooms Available State */
    .content .card > .alert-warning + div {
        justify-content: center;
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
        
        .content .card .alert strong {
            min-width: 150px;
        }
        
        .form-group select {
            padding: 14px 18px;
            padding-left: 45px;
        }
        
        .btn {
            padding: 15px;
            font-size: 15px;
            min-width: 160px;
        }
        
        .content .card form > div,
        .content .card > div:last-child {
            gap: 12px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 600px) {
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
            min-width: 120px;
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
            min-width: 100%;
            flex: 1 0 100%;
        }
        
        .content .card form > div,
        .content .card > div:last-child {
            flex-direction: column;
            gap: 10px;
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
            background: #e74c3c;
        }
        
        .content .card .alert-info {
            background: #1c2833;
            color: #d1d9e6;
            border-right-color: #3498db;
        }
        
        .content .card .alert-warning {
            background: #4d4200;
            color: #ffd54f;
            border-right-color: #ffb300;
        }
        
        .content .card .alert h4 {
            color: #ecf0f1;
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }
        
        .content .card .alert p {
            color: #bdc3c7;
        }
        
        .content .card .alert-info strong {
            color: #3498db;
        }
        
        .content .card .alert-warning strong {
            color: #f39c12;
        }
        
        .form-group label {
            color: #ecf0f1;
        }
        
        .form-group select {
            background: #34495e;
            border-color: #4a6572;
            color: #ecf0f1;
          }
        
        .form-group select:focus {
            background: #3b4f63;
            border-color: #e74c3c;
        }
        
        .form-group select option {
            background: #2c3e50;
            color: #ecf0f1;
        }
        
        .form-group select option:checked {
            background: #e74c3c;
            color: white;
        }
        
        /* Buttons in Dark Mode */
        .btn-success {
            background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #219653 0%, #1e8749 100%);
        }
        
        .btn:not(.btn-success):not(.btn-danger) {
            background: linear-gradient(135deg, #2980b9 0%, #1c5d8a 100%);
        }
        
        .btn:not(.btn-success):not(.btn-danger):hover {
            background: linear-gradient(135deg, #1c5d8a 0%, #154970 100%);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #a93226 0%, #922b21 100%);
        }
    }
</style>
<div class="card">
    <h2>اختيار الغرفة للطلب #{{ $housingRequest->id }}</h2>
    
    <div class="alert alert-info">
        <h4>الوحدة المختارة: {{ $unit->unit_name }}</h4>
        <p><strong>السعة القصوى للغرفة:</strong> {{ $unit->max_room_capacity }} طلاب</p>
        <p><strong>الغرف المتاحة:</strong> {{ $rooms->count() }} غرفة</p>
    </div>
    
    @if($rooms->count() > 0)
        <form method="POST" action="{{ route('admin.request.accept', $housingRequest->id) }}">
            @csrf
            <input type="hidden" name="housing_unit_id" value="{{ $unit->id }}">
            
            <div class="form-group">
                <label for="room_id">اختر الغرفة</label>
                <select id="room_id" name="room_id" class="form-control" required>
                    <option value="">-- اختر الغرفة --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">
                            الغرفة {{ $room->room_number }} 
                            (متاحة: {{ $room->occupied }}/{{ $unit->max_room_capacity }})
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <button type="submit" class="btn btn-success">تأكيد القبول</button>
                <a href="{{ route('admin.show.units', $housingRequest->id) }}" class="btn">العودة لاختيار وحدة</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">إلغاء</a>
            </div>
        </form>
    @else
        <div class="alert alert-warning">
            <h4>لا توجد غرف متاحة في هذه الوحدة!</h4>
            <p>جميع الغرف في هذه الوحدة ممتلئة.</p>
        </div>
        
        <div>
            <a href="{{ route('admin.show.units', $housingRequest->id) }}" class="btn">العودة واختيار وحدة أخرى</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">إلغاء</a>
        </div>
    @endif
</div>
@endsection