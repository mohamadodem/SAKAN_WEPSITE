@extends('layouts.app')

@section('title', 'اختيار الغرفة')

@section('content')
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