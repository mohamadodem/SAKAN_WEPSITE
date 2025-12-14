@extends('layouts.app')

@section('title', 'تقديم طلب سكن')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">تقديم طلب سكن جديد</h2>
    
    <div class="alert alert-warning">
        <p><strong>ملاحظة:</strong> سيتم مراجعة طلبك من قبل الإدارة وسيتم إعلامك بالنتيجة.</p>
    </div>
    
    <form method="POST" action="{{ route('student.request.create') }}">
        @csrf
        
        <div class="form-group">
            <label for="description">ملاحظات إضافية (اختياري)</label>
            <textarea id="description" name="description" rows="4" placeholder="أي معلومات إضافية تريد إضافتها..."></textarea>
            @error('description')
                <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success" style="width: 100%;">إرسال الطلب</button>
    </form>
</div>
@endsection