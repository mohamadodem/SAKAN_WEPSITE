@extends('layouts.app')

@section('title', 'قبول طلب سكن')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">قبول طلب سكن</h2>
    
    <div class="request-details" style="margin-bottom: 2rem;">
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
            <label for="housing_unit_id">الوحدة السكنية *</label>
            <select id="housing_unit_id" name="housing_unit_id" required onchange="loadRooms(this.value)">
                <option value="">اختر الوحدة السكنية</option>
                @foreach($housingUnits as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->unit_name }} - السعة: {{ $unit->max_room_capacity }} طالب/غرفة</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="room_id">الغرفة *</label>
            <select id="room_id" name="room_id" required disabled>
                <option value="">اختر الغرفة</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success" style="width: 100%;">تأكيد القبول</button>
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
@endsection