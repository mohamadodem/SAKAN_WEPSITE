
@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

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
        max-width: 520px;
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
        width: 100px;
        height: 3px;
        background: #2ecc71;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 25px;
        text-align: right;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Input Fields */
    .form-group input[type="text"] {
        width: 100%;
        padding: 14px 16px;
        font-size: 15px;
        border: 2px solid #ddd;
        border-radius: 8px;
        background: #f8f9fa;
        transition: all 0.3s ease;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-group input[type="text"]:focus {
        outline: none;
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    /* Select Fields - Improved Styling */
    .form-group select {
        width: 100%;
        padding: 14px 16px;
        font-size: 15px;
        border: 2px solid #ddd;
        border-radius: 8px;
        background: #f8f9fa;
        transition: all 0.3s ease;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: left 16px center;
        background-size: 16px;
        padding-left: 45px;
    }

    .form-group select:focus {
        outline: none;
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    /* Selected option styling */
    .form-group select option {
        background: white;
        color: #333;
        padding: 10px;
    }

    .form-group select option:checked {
        background: #3498db;
        color: white;
    }

    /* Error Messages */
    .form-group span {
        display: block;
        color: #e74c3c;
        font-size: 13px;
        margin-top: 8px;
        text-align: right;
        padding-right: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
        background: #ffeaea;
        padding: 8px 12px;
        border-radius: 6px;
        border-right: 3px solid #e74c3c;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Update Button */
    .btn {
        width: 100%;
        padding: 16px;
        font-size: 17px;
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 0.5px;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(46, 204, 113, 0.3);
        background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
    }

    /* Form layout - Two columns on larger screens */
    @media (min-width: 768px) {
        .content .card form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        
        /* Make full width for single elements */
        .content .card form .btn {
            grid-column: span 2;
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
        
        .form-group input[type="text"],
        .form-group select {
            padding: 13px 15px;
        }
        
        .content .card form .btn {
            padding: 15px;
            font-size: 16px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 767px) {
        .content .card form {
            display: block;
        }
        
        .content .card {
            padding: 30px 25px;
        }
        
        .content .card h2 {
            font-size: 24px;
            margin-bottom: 22px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            font-size: 14px;
            margin-bottom: 8px;
        }
        
        .form-group input[type="text"],
        .form-group select {
            padding: 12px 14px;
            font-size: 14px;
        }
        
        .form-group select {
            padding-left: 40px;
            background-position: left 12px center;
        }
        
        .content .card form .btn {
            padding: 14px;
            font-size: 15px;
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
        
        .form-group input[type="text"],
        .form-group select {
            padding: 11px 13px;
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
            background: #2ecc71;
        }
        
        .form-group label {
            color: #ecf0f1;
        }
        
        .form-group input[type="text"],
        .form-group select {
            background: #34495e;
            border-color: #4a6572;
            color: #ecf0f1;
        }
        
        .form-group input[type="text"]:focus,
        .form-group select:focus {
            background: #3b4f63;
            border-color: #3498db;
        }
        
        .form-group select {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ecf0f1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        }
        
        .form-group select option {
            background: #2c3e50;
            color: #ecf0f1;
        }
        
        .form-group select option:checked {
            background: #3498db;
            color: white;
        }
        
        .form-group span {
            background: #4a1c1c;
            border-right-color: #e74c3c;
        }
        
        .content .card form .btn {
            background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
        }
        
        .content .card form .btn:hover {
            background: linear-gradient(135deg, #219653 0%, #1e8749 100%);
        }
    }
</style>
<div class="card">
    <h2>تعديل الملف الشخصي</h2>
    
    <form method="POST" action="{{ route('student.profile.edit') }}">
        @csrf
        
        <div class="form-group">
            <label for="university_id">الرقم الجامعي</label>
            <input type="text" id="university_id" name="university_id" value="{{ $student->university_id }}" required>
            @error('university_id')
                <span>{{ $message }}</span>
            @enderror
        </div>       
        <div class="form-group">
            <label for="gender">الجنس</label>
            <select id="gender" name="gender" required>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>أنثى</option>
            </select>
            @error('gender')
                <span>{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="study_year">السنة الدراسية</label>
            <select id="study_year" name="study_year" required>
                @for($i = 1; $i <= 6; $i++)
                    <option value="{{ $i }}" {{ $student->study_year == $i ? 'selected' : '' }}>السنة {{ $i }}</option>
                @endfor
            </select>
            @error('study_year')
                <span>{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="governorate">المحافظة</label>
            <input type="text" id="governorate" name="governorate" value="{{ $student->governorate }}" required>
            @error('governorate')
                <span>{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="faculty_id">الكلية</label>
            <select id="faculty_id" name="faculty_id" required>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ $student->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <span>{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn">تحديث الملف الشخصي</button>
    </form>
</div>
@endsection