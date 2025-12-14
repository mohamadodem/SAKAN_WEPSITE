
@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">تعديل الملف الشخصي</h2>
    
    <form method="POST" action="{{ route('student.profile.edit') }}">
        @csrf
        
        <div class="form-group">
            <label for="university_id">الرقم الجامعي *</label>
            <input type="text" id="university_id" name="university_id" value="{{ $student->university_id }}" required>
            @error('university_id')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="gender">الجنس *</label>
            <select id="gender" name="gender" required>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>أنثى</option>
            </select>
            @error('gender')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="study_year">السنة الدراسية *</label>
            <select id="study_year" name="study_year" required>
                @for($i = 1; $i <= 6; $i++)
                    <option value="{{ $i }}" {{ $student->study_year == $i ? 'selected' : '' }}>السنة {{ $i }}</option>
                @endfor
            </select>
            @error('study_year')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="governorate">المحافظة *</label>
            <input type="text" id="governorate" name="governorate" value="{{ $student->governorate }}" required>
            @error('governorate')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="faculty_id">الكلية *</label>
            <select id="faculty_id" name="faculty_id" required>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ $student->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">تحديث الملف الشخصي</button>
    </form>
</div>
@endsection