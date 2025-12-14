@extends('layouts.app')

@section('title', 'نظام السكن الجامعي')

@section('content')
<div style="text-align: center; padding: 4rem 0;">
    <h1 style="margin-bottom: 2rem; color: #2c3e50;">مرحباً بك في نظام السكن الجامعي</h1>
    
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="card" style="margin-bottom: 2rem;">
            <h2 style="color: #3498db;">مزايا النظام</h2>
            <ul style="list-style: none; padding: 0; text-align: right;">
                <li style="padding: 0.5rem 0;">✓ إدارة طلبات السكن الجامعي</li>
                <li style="padding: 0.5rem 0;">✓ تخصيص الغرف حسب الجنس</li>
                <li style="padding: 0.5rem 0;">✓ متابعة حالة الطلبات</li>
                <li style="padding: 0.5rem 0;">✓ واجهة سهلة الاستخدام</li>
            </ul>
        </div>
        
        <div class="card">
            <h2 style="color: #27ae60;">ابدأ الآن</h2>
            <p style="margin-bottom: 1.5rem;">سجل دخولك أو أنشئ حساب جديد للبدء</p>
            
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('login') }}" class="btn" style="padding: 0.75rem 2rem;">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="btn btn-success" style="padding: 0.75rem 2rem;">إنشاء حساب جديد</a>
            </div>
        </div>
    </div>
</div>
@endsection