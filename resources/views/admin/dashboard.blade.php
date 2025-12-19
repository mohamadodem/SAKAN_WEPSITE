@extends('layouts.app')

@section('title', 'لوحة تحكم المدير')

@section('content')
<style>
    .content > div {
        padding: 25px 0;
    }

     h1 {
        color: #2c3e50;
        font-size: 2.5rem;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 3px solid #3498db;
        font-weight: 700;
        text-align: center;
    }

    /* Section Headers */
    h2 {
        color: #34495e;
        font-size: 1.8rem;
        margin: 35px 0 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #ecf0f1;
        font-weight: 600;
    }
    /* Tables */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0 30px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    table thead {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
    }

    table th {
        padding: 18px 15px;
        text-align: right;
        font-weight: 600;
        font-size: 16px;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #ecf0f1;
    }

    table tbody tr:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    table tbody tr:last-child {
        border-bottom: none;
    }

    table td {
        padding: 16px 15px;
        text-align: right;
        color: #2c3e50;
        font-size: 15px;
        border: none;
    }

    /* Actions Column */
    table td:last-child {
        min-width: 300px;
    }

    /* Request Details Row */
    table tbody tr[style*="display: none"] + tr[style*="display: none"] {
        display: none;
    }

    #details- + * {
        background: #f8f9fa;
    }

    #details- + * td {
        padding: 0;
    }

    /* Request Details Card */
    .request-details {
        padding: 25px;
        background: white;
        margin: 10px;
        border-radius: 8px;
        border-left: 5px solid #3498db;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    .request-details h3 {
        color: #2c3e50;
        font-size: 1.4rem;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ecf0f1;
    }

    .request-details p {
        margin-bottom: 12px;
        color: #555;
        font-size: 1.05rem;
        line-height: 1.6;
    }

    .request-details p strong {
        color: #2c3e50;
        font-weight: 600;
        min-width: 150px;
        display: inline-block;
    }

    /* Action Buttons */
    .btn {
        display: inline-block;
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 6px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        margin: 0 3px;
        min-width: 100px;
        text-align: center;
    }

    .btn-view {
        background: #3498db;
        color: white;
    }

    .btn-view:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
    }

    .btn-success {
        background: #2ecc71;
        color: white;
    }

    .btn-success:hover {
        background: #27ae60;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(46, 204, 113, 0.3);
    }

    .btn-danger {
        background: #e74c3c;
        color: white;
    }

    .btn-danger:hover {
        background: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);
    }

    /* Forms inside tables */
    table form {
        display: inline;
    }

    /* Status Badges (يمكن إضافتها إذا أردت) */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-accepted {
        background: #d4edda;
        color: #155724;
    }

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
    }

    /* ===== RESPONSIVE DESIGN ===== */

    /* Large Tablets */
    @media (max-width: 1024px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        table th,
        table td {
            min-width: 150px;
        }
        
        table td:last-child {
            min-width: 350px;
        }
    }

    /* Tablets */
    @media (max-width: 768px) {
        .content h1 {
            font-size: 2rem;
            margin-bottom: 25px;
        }
        
        .content h2 {
            font-size: 1.6rem;
            margin: 30px 0 18px;
        }
        
        table th {
            padding: 14px 12px;
            font-size: 14px;
        }
        
        table td {
            padding: 12px 10px;
            font-size: 13px;
        }
        
        .btn {
            padding: 8px 12px;
            font-size: 12px;
            min-width: 80px;
            margin: 2px;
        }
        
        .request-details {
            padding: 20px;
        }
        
        .request-details h3 {
            font-size: 1.2rem;
        }
        
        .request-details p {
            font-size: 0.95rem;
        }
        
        .request-details p strong {
            min-width: 120px;
            display: block;
            margin-bottom: 5px;
        }
    }

    /* Mobile Phones */
    @media (max-width: 480px) {
        .content h1 {
            font-size: 1.7rem;
            padding: 0 15px 15px;
        }
        
        .content h2 {
            font-size: 1.4rem;
            padding: 0 15px 10px;
        }
        
        table {
            border-radius: 8px;
            margin: 15px 0;
        }
        
        table th,
        table td {
            padding: 10px 8px;
            font-size: 12px;
        }
        
        .btn {
            display: block;
            width: 100%;
            margin: 5px 0;
            padding: 10px;
        }
        
        table td:last-child {
            min-width: auto;
        }
        
        .request-details {
            padding: 15px;
            margin: 5px;
        }
        
        .request-details p strong {
            min-width: 100px;
            font-size: 0.9rem;
        }
        
        /* Hide some columns on mobile */
        table th:nth-child(4),
        table td:nth-child(4),
        table th:nth-child(5),
        table td:nth-child(5) {
            display: none;
        }
    }

    /* Small Mobile Phones */
    @media (max-width: 360px) {
        .content h1 {
            font-size: 1.5rem;
        }
        
        .content h2 {
            font-size: 1.3rem;
        }
        
        table th,
        table td {
            padding: 8px 6px;
            font-size: 11px;
        }
        
        .request-details p {
            font-size: 0.85rem;
        }
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        .content h1 {
            color: #ecf0f1;
            border-bottom-color: #3498db;
        }
        
        .content h2 {
            color: #ecf0f1;
            border-bottom-color: #4a6572;
        }
        
        .content > div > p {
            background: #2c3e50;
            color: #bdc3c7;
            border-color: #4a6572;
        }
        
        table {
            background: #2c3e50;
            color: #ecf0f1;
        }
        
        table thead {
            background: linear-gradient(135deg, #1a252f 0%, #2980b9 100%);
        }
        
        table tbody tr {
            border-bottom-color: #4a6572;
        }
        
        table tbody tr:hover {
            background: #34495e;
        }
        
        table td {
            color: #ecf0f1;
        }
        
        .request-details {
            background: #34495e;
            border-left-color: #3498db;
        }
        
        .request-details h3 {
            color: #ecf0f1;
            border-bottom-color: #4a6572;
        }
        
        .request-details p {
            color: #bdc3c7;
        }
        
        .request-details p strong {
            color: #ecf0f1;
        }
    }
</style>
<h1>لوحة تحكم المدير</h1>
<!-- الطلبات قيد الإنتظار -->
<div>
    <h2>الطلبات قيد الانتظار</h2>
    @if($pendingRequests->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>اسم الطالب</th>
                    <th>الكلية</th>
                    <th>تاريخ الطلب</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->student->user->first_name }} {{ $request->student->user->last_name }}</td>
                        <td>{{ $request->student->faculty->faculty_name }}</td>
                        <td>{{ $request->created_at->format('Y-m-d') }}</td>
                        <td>
                            <button class="btn btn-view" data-id="{{ $request->id }}">عرض التفاصيل</button>
                            <a href="{{ route('admin.show.units', $request->id) }}" class="btn btn-success">قبول</a>
                            <form action="{{ route('admin.request.reject', $request->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رفض هذا الطلب؟')">رفض</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="details-{{ $request->id }}">
                        <td colspan="5">
                            <div class="request-details">
                                <h3>تفاصيل الطلب</h3>
                                <p><strong>الاسم الكامل:</strong> {{ $request->student->user->first_name }} {{ $request->student->user->last_name }}</p>
                                <p><strong>رقم الهوية:</strong> {{ $request->student->user->national_id }}</p>
                                <p><strong>رقم الهاتف:</strong> {{ $request->student->user->phone }}</p>
                                <p><strong>اسم الأب:</strong> {{ $request->student->user->father_name }}</p>
                                <p><strong>اسم الأم:</strong> {{ $request->student->user->mother_name }}</p>
                                <p><strong>الكلية:</strong> {{ $request->student->faculty->faculty_name }}</p>
                                <p><strong>السنة الدراسية:</strong> {{ $request->student->study_year }}</p>
                                <p><strong>المحافظة:</strong> {{ $request->student->governorate }}</p>
                                <p><strong>الجنس:</strong> {{ $request->student->gender == 'male' ? 'ذكر' : 'أنثى' }}</p>
                                <p><strong>ملاحظات الطلب:</strong> {{ $request->description ?: 'لا توجد ملاحظات' }}</p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>لا توجد طلبات قيد الانتظار.</p>
    @endif
</div>
<!-- الطلبات المقبولة -->
<div>
    <h2>الطلبات المقبولة</h2>
    @if($acceptedRequests->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>اسم الطالب</th>
                    <th>الكلية</th>
                    <th>الوحدة السكنية</th>
                    <th>رقم الغرفة</th>
                    <th>تاريخ القبول</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acceptedRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->student->user->first_name }} {{ $request->student->user->last_name }}</td>
                        <td>{{ $request->student->faculty->faculty_name }}</td>
                        <td>{{ $request->room->housingUnit->unit_name }}</td>
                        <td>{{ $request->room->room_number }}</td>
                        <td>{{ $request->updated_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>لا توجد طلبات مقبولة.</p>
    @endif
</div>
<!-- الطلبات المرفوضة -->
<div>
    <h2>الطلبات المرفوضة</h2>
    @if($rejectedRequests->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>اسم الطالب</th>
                    <th>الكلية</th>
                    <th>تاريخ الرفض</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rejectedRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->student->user->first_name }} {{ $request->student->user->last_name }}</td>
                        <td>{{ $request->student->faculty->faculty_name }}</td>
                        <td>{{ $request->updated_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>لا توجد طلبات مرفوضة.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // إظهار/إخفاء تفاصيل الطلب
        const viewButtons = document.querySelectorAll('.btn-view');
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const requestId = this.getAttribute('data-id');
                const detailsRow = document.getElementById('details-' + requestId);
                
                if (detailsRow.style.display === 'none') {
                    detailsRow.style.display = 'table-row';
                    this.textContent = 'إخفاء التفاصيل';
                } else {
                    detailsRow.style.display = 'none';
                    this.textContent = 'عرض التفاصيل';
                }
            });
        });
    });
</script>
@endsection