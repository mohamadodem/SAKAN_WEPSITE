@extends('layouts.app')

@section('title', 'لوحة تحكم المدير')

@section('content')
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