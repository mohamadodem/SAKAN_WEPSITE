@extends('layouts.app')

@section('title', 'تقديم طلب سكن')

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
        max-width: 500px;
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
        margin-bottom: 25px;
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
        background: #f39c12;
    }

    /* Warning Alert */
    .card .alert {
        background: #fff3cd;
        color: #856404;
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        border-right: 5px solid #ffc107;
        text-align: right;
        animation: slideIn 0.5s ease;
    }

    .card .alert p {
        margin: 0;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .card .alert strong {
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

    /* Form Groups */
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

    /* Textarea Styling */
    .form-group textarea {
        width: 100%;
        padding: 16px 18px;
        font-size: 15px;
        border: 2px solid #ddd;
        border-radius: 10px;
        background: #f8f9fa;
        transition: all 0.3s ease;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        resize: vertical;
        min-height: 120px;
        line-height: 1.6;
        text-align: right;
        direction: rtl;
    }

    .form-group textarea:focus {
        outline: none;
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }

    .form-group textarea:hover {
        border-color: #bbb;
    }

    /* Placeholder Styling */
    .form-group textarea::placeholder {
        color: #999;
        font-style: italic;
        font-size: 14px;
    }

    /* Character Counter (Optional - can be added with JavaScript) */
    .form-group .char-counter {
        text-align: left;
        color: #666;
        font-size: 13px;
        margin-top: 8px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

    /* Submit Button */
    .btn {
        padding: 16px;
        font-size: 17px;
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 0.5px;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(46, 204, 113, 0.3);
        background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
    }

    /* Success Button Variant */
    .btn-success {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
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
            margin-bottom: 22px;
        }
        
        .content .card .alert {
            padding: 18px 22px;
        }
        
        .form-group textarea {
            padding: 14px 16px;
            font-size: 14px;
            min-height: 110px;
        }
        
        .content .card form .btn {
            padding: 15px;
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
            margin-bottom: 20px;
        }
        
        .content .card .alert {
            padding: 16px 20px;
            margin-bottom: 25px;
        }
        
        .content .card .alert p {
            font-size: 1rem;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            font-size: 15px;
            margin-bottom: 10px;
        }
        
        .form-group textarea {
            padding: 12px 14px;
            font-size: 14px;
            min-height: 100px;
            border-radius: 8px;
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
        
        .content .card .alert {
            padding: 14px 18px;
        }
        
        .form-group textarea {
            padding: 11px 13px;
            min-height: 90px;
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
            background: #f39c12;
        }
        
        .content .card .alert {
            background: #4d4200;
            color: #ffd54f;
            border-right-color: #ffb300;
        }
        
        .content .card .alert strong {
            color: #ffb300;
        }
        
        .form-group label {
            color: #ecf0f1;
        }
        
        .form-group textarea {
            background: #34495e;
            border-color: #4a6572;
            color: #ecf0f1;
        }
        
        .form-group textarea:focus {
            background: #3b4f63;
            border-color: #3498db;
        }
        
        .form-group textarea::placeholder {
            color: #95a5a6;
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
    <h2>تقديم طلب سكن جديد</h2>
    
    <div class="alert alert-warning">
        <p><strong>ملاحظة:</strong> سيتم مراجعة طلبك من قبل الإدارة وسيتم إعلامك بالنتيجة.</p>
    </div>
    
    <form method="POST" action="{{ route('student.request.create') }}">
        @csrf
        
        <div class="form-group">
            <label for="description">ملاحظات إضافية (اختياري)</label>
            <textarea id="description" name="description" rows="4" placeholder="أي معلومات إضافية تريد إضافتها..."></textarea>
            @error('description')
                <span>{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success" style="width: 100%;">إرسال الطلب</button>
    </form>
</div>
@endsection