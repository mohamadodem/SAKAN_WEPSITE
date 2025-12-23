@extends('layouts.app')

@section('title', 'اختيار الوحدة السكنية')

@section('content')

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