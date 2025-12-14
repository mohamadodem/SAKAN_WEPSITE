@extends('layouts.app')

@section('title', 'إنشاء الملف الشخصي')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">إنشاء الملف الشخصي</h2>
    
    <form method="POST" action="{{ route('student.profile.create') }}">
        @csrf
        
        <div class="form-group">
            <label for="university_id">الرقم الجامعي *</label>
            <input type="text" id="university_id" name="university_id" required>
            @error('university_id')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="gender">الجنس *</label>
            <select id="gender" name="gender" required>
                <option value="">اختر الجنس</option>
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
            </select>
            @error('gender')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="study_year">السنة الدراسية *</label>
            <select id="study_year" name="study_year" required>
                <option value="">اختر السنة الدراسية</option>
                @for($i = 1; $i <= 6; $i++)
                    <option value="{{ $i }}">السنة {{ $i }}</option>
                @endfor
            </select>
            @error('study_year')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="governorate">المحافظة *</label>
            <input type="text" id="governorate" name="governorate" required>
            @error('governorate')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="faculty_id">الكلية *</label>
            <select id="faculty_id" name="faculty_id" required>
                <option value="">اختر الكلية</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">حفظ الملف الشخصي</button>
    </form>
</div>
@endsection