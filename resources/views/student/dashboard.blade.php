@extends('layouts.app')

@section('title', 'لوحة تحكم الطالب')

@section('content')
<h1 style="margin-bottom: 1.5rem;">مرحباً، {{ auth()->user()->first_name }}</h1>

@if(!$student)
    <div class="alert alert-warning">
        <p>يجب إنشاء ملفك الشخصي أولاً قبل استخدام النظام.</p>
        <a href="{{ route('student.profile.create') }}" class="btn">إنشاء الملف الشخصي</a>
    </div>
@else
    <div class="card">
        <h2 style="margin-bottom: 1rem;">معلومات الملف الشخصي</h2>
        <p><strong>الرقم الجامعي:</strong> {{ $student->university_id }}</p>
        <p><strong>الكلية:</strong> {{ $student->faculty->faculty_name }}</p>
        <p><strong>السنة الدراسية:</strong> {{ $student->study_year }}</p>
        <p><strong>المحافظة:</strong> {{ $student->governorate }}</p>
        <a href="{{ route('student.profile.edit') }}" class="btn">تعديل الملف الشخصي</a>
    </div>
    
    <div class="card">
        <h2 style="margin-bottom: 1rem;">حالة طلب السكن</h2>
        
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
            <a href="{{ route('student.request.create') }}" class="btn btn-success" style="margin-top: 1rem;">
                تقديم طلب سكن جديد
            </a>
        @endif
        
        {{-- تم إزالة زر عرض سجل الطلبات بالكامل --}}
    </div>
@endif
@endsection