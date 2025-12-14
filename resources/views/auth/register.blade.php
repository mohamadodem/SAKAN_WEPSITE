@extends('layouts.app')

@section('title', 'إنشاء حساب جديد')

@section('content')
<div class="card" style="max-width: 500px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">إنشاء حساب جديد</h2>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>يرجى تصحيح الأخطاء التالية:</strong>
            <ul style="margin: 0; padding-right: 1rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="form-group">
            <label for="national_id">رقم الهوية الوطنية *</label>
            <input type="text" id="national_id" name="national_id" value="{{ old('national_id') }}" required>
            @error('national_id')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="phone">رقم الهاتف *</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password">كلمة المرور *</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
            <small style="color: #666;">يجب أن تكون كلمة المرور 6 أحرف على الأقل</small>
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">تأكيد كلمة المرور *</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="first_name">الاسم الأول *</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="last_name">اسم العائلة *</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="father_name">اسم الأب *</label>
            <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
            @error('father_name')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="mother_name">اسم الأم *</label>
            <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
            @error('mother_name')
                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.25rem;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">إنشاء حساب</button>
    </form>
    
    <div style="text-align: center; margin-top: 1rem;">
        <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل الدخول</a></p>
    </div>
</div>

<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    small {
        display: block;
        margin-top: 0.25rem;
        color: #666;
    }
    
    input {
        transition: border-color 0.3s;
    }
    
    input:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }
    
    .alert-danger ul {
        list-style-type: none;
    }
    
    .alert-danger li {
        padding: 0.25rem 0;
    }
</style>
@endsection