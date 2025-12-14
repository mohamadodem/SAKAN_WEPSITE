<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'room_id',
        'description',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($request) {
            // التحقق من أن الطالب لا يوجد له طلب pending أو accepted
            $existingRequest = self::where('student_id', $request->student_id)
                ->whereIn('status', ['pending', 'accepted'])
                ->exists();
            
            if ($existingRequest) {
                throw new \Exception('الطالب لديه بالفعل طلب قيد الانتظار أو تم قبوله.');
            }
        });

        static::updating(function ($request) {
            if ($request->isDirty('status') && in_array($request->status, ['pending', 'accepted'])) {
                $existingRequest = self::where('student_id', $request->student_id)
                    ->where('id', '!=', $request->id)
                    ->whereIn('status', ['pending', 'accepted'])
                    ->exists();
                
                if ($existingRequest) {
                    throw new \Exception('الطالب لديه بالفعل طلب قيد الانتظار أو تم قبوله.');
                }
            }
        });
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}