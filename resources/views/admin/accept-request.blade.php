<!-- @extends('layouts.app')

@section('title', 'قبول طلب سكن')

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
        border-bottom: 3px solid #27ae60;
        position: relative;
    }

    .card h2::after {
        content: '✓';
        position: absolute;
        bottom: -12px;
        right: 50%;
        transform: translateX(50%);
        width: 24px;
        height: 24px;
        background: #27ae60;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    /* Request Details */
    .request-details {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        border-right: 5px solid #3498db;
        text-align: right;
        animation: slideIn 0.5s ease;
    }

    .request-details h3 {
        color: #2c3e50;
        font-size: 1.3rem;
        margin-bottom: 20px;
        font-weight: 600;
        padding-bottom: 12px;
        border-bottom: 2px solid #e0e0e0;
    }

    .request-details p {
        margin: 12px 0;
        color: #555;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .request-details strong {
        color: #2c3e50;
        font-weight: 600;
        min-width: 150px;
        display: inline-block;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
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
        border-color: #27ae60;
        background: white;
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2327ae60' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    }

    .form-group select:hover {
        border-color: #bbb;
    }

    /* Disabled Select Styling */
    .form-group select:disabled {
        background: #e9ecef;
        color: #6c757d;
        cursor: not-allowed;
        border-color: #ced4da;
    }
    .form-group select:disabled:hover {
        border-color: #ced4da;
    }

    /* Option Styling */
    .form-group select option {
        padding: 12px;
        font-size: 14px;
        background: white;
        color: #2c3e50;
    }

    .form-group select option:checked {
        background: #27ae60;
        color: white;
    }

    .form-group select option:hover {
        background: #e8f6ef;
    }

    /* Submit Button */
    .content .card form .btn {
        width: 100%;
        padding: 16px;
        font-size: 17px;
        background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
    }

    .content .card form .btn::before {
        content: '✓';
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-weight: bold;
        font-size: 18px;
    }

    .content .card form .btn:hover {
        background: linear-gradient(135deg, #219653 0%, #1e8749 100%);
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(39, 174, 96, 0.3);
    }

    .content .card form .btn:active {
        transform: translateY(-1px);
    }

    /* Loading Indicator for AJAX */
    .loading {
        display: none;
        text-align: center;
        color: #3498db;
        font-size: 14px;
        margin-top: 10px;
    }

    .loading::after {
        content: '';
        display: inline-block;
        width: 12px;
        height: 12px;
        border: 2px solid #f3f3f3;
        border-top: 2px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 8px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
        
        .request-details {
            padding: 22px;
        }
        
        .request-details h3 {
            font-size: 1.2rem;
        }
        
        .request-details p {
            font-size: 1rem;
        }
        
        .request-details strong {
            min-width: 120px;
        }
        
        .form-group select {
            padding: 14px 18px;
            padding-left: 45px;
        }
        
        .content .card form .btn {
            padding: 15px;
            font-size: 16px;
        }
        
        .content .card form .btn::before {
            right: 15px;
            font-size: 16px;
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
        
        .request-details {
            padding: 20px;
            margin-bottom: 25px;
        }
        
        .request-details h3 {
            font-size: 1.1rem;
        }
        
        .request-details p {
            font-size: 0.95rem;
        }
        
        .request-details strong {
            min-width: 100px;
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
        
        .content .card form .btn {
            padding: 14px;
            font-size: 15px;
        }
        
        .content .card form .btn::before {
            right: 12px;
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
        
        .request-details {
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
            border-bottom-color: #27ae60;
        }
        
        .content .card h2::after {
            background: #27ae60;
            color: white;
        }
        
        .request-details {
            background: #34495e;
            border-right-color: #3498db;
            color: #ecf0f1;
        }
        
        .request-details h3 {
            color: #ecf0f1;
            border-bottom-color: #4a6572;
        }
        
        .request-details p {
            color: #bdc3c7;
        }
        
        .request-details strong {
            color: #ecf0f1;
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
            border-color: #27ae60;
        }
        
        .form-group select:disabled {
            background: #2c3e50;
            color: #7f8c8d;
            border-color: #4a6572;
        }
        
        .form-group select option {
            background: #2c3e50;
            color: #ecf0f1;
        }
        
        .form-group select option:checked {
            background: #27ae60;
            color: white;
        }
        
        .content .card form .btn {
            background: linear-gradient(135deg, #219653 0%, #1e8749 100%);
        }
        
        .content .card form .btn:hover {
            background: linear-gradient(135deg, #1e8749 0%, #1a7431 100%);
        }
        
        .loading::after {
            border-top-color: #3498db;
            border-color: #2c3e50;
        }
    }
</style>
<div class="card">
    <h2>قبول طلب سكن</h2>
    
    <div class="request-details">
        <h3>معلومات الطالب</h3>
        <p><strong>الاسم:</strong> {{ $request->student->user->first_name }} {{ $request->student->user->last_name }}</p>
        <p><strong>الكلية:</strong> {{ $request->student->faculty->faculty_name }}</p>
        <p><strong>الجنس:</strong> {{ $request->student->gender == 'male' ? 'ذكر' : 'أنثى' }}</p>
        <p><strong>السنة الدراسية:</strong> {{ $request->student->study_year }}</p>
        <p><strong>المحافظة:</strong> {{ $request->student->governorate }}</p>
    </div>
    
    <form method="POST" action="{{ route('admin.request.accept', $request->id) }}">
        @csrf
        
        <div class="form-group">
            <label for="housing_unit_id">الوحدة السكنية</label>
            <select id="housing_unit_id" name="housing_unit_id" required onchange="loadRooms(this.value)">
                <option value="">اختر الوحدة السكنية</option>
                @foreach($housingUnits as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->unit_name }} - السعة: {{ $unit->max_room_capacity }} طالب/غرفة</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="room_id">الغرفة</label>
            <select id="room_id" name="room_id" required disabled>
                <option value="">اختر الغرفة</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">تأكيد القبول</button>
    </form>
</div>

<script>
    function loadRooms(unitId) {
        const roomSelect = document.getElementById('room_id');
        
        if (!unitId) {
            roomSelect.innerHTML = '<option value="">اختر الغرفة</option>';
            roomSelect.disabled = true;
            return;
        }
        
        // جلب الغرف المتاحة عبر AJAX
        fetch(`/admin/housing-unit/${unitId}/rooms`)
            .then(response => response.json())
            .then(rooms => {
                roomSelect.innerHTML = '<option value="">اختر الغرفة</option>';
                
                rooms.forEach(room => {
                    const option = document.createElement('option');
                    option.value = room.id;
                    option.textContent = `الغرفة ${room.room_number} - متاحة: ${room.occupied}/${room.housing_unit.max_room_capacity}`;
                    roomSelect.appendChild(option);
                });
                
                roomSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء تحميل الغرف');
            });
    }
</script>
@endsection -->