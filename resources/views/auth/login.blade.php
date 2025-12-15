@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="card" style="max-width: 400px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">تسجيل الدخول</h2>
{{--     
    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-right: 1rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label for="national_id">رقم الهوية الوطنية</label>
            <input type="text" id="national_id" name="national_id" value="{{ old('national_id') }}" required autofocus>
            @error('national_id')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">تسجيل الدخول</button>
    </form>
    
    <div style="text-align: center; margin-top: 1rem;">
        <p>ليس لديك حساب؟ <a href="{{ route('register') }}">أنشئ حساب جديد</a></p>
    </div>
</div>

<style>
    .form-group {
        position: relative;
    }
    
    input:invalid {
        border-color: #e74c3c;
    }
    
    input:valid {
        border-color: #27ae60;
    }
</style>
@endsection