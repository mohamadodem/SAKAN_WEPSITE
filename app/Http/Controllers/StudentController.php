<?php

namespace App\Http\Controllers;


use App\Models\Faculty;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user    = Auth::user();/** */
        $student = $user->student;
        $request = null;

        if ($student) {
            $request = $student->requests()->latest()->first(); /*** */
        }

        return view('student.dashboard', compact('student', 'request'));
    }

    public function showCreateProfile()
    {
        $faculties = Faculty::all();
        return view('student.create-profile', compact('faculties'));
    }

    public function createProfile(HttpRequest $request)
    {
        $request->validate([
            'university_id' => 'required|string|unique:students|max:50',
            'gender'        => 'required|in:male,female',
            'study_year'    => 'required|integer|min:1|max:6',
            'governorate'   => 'required|string|max:100',
            'faculty_id'    => 'required|exists:faculties,id',
            
        ]);

        Student::create([
            'user_id'       => Auth::id(),
            'university_id' => $request->university_id,
            'gender'        => $request->gender,
            'study_year'    => $request->study_year,
            'governorate'   => $request->governorate,
            'faculty_id'    => $request->faculty_id,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'تم إنشاء الملف الشخصي بنجاح.');
    }

    public function showEditProfile()
    {
        $student   = Auth::user()->student;
        $faculties = Faculty::all();

        return view('student.edit-profile', compact('student', 'faculties'));
    }

    public function updateProfile(HttpRequest $request)
    {
        $student = Auth::user()->student;

        $request->validate([
            'university_id' => 'required|string|max:50|unique:students,university_id,' . $student->id,
            'gender'        => 'required|in:male,female',
            'study_year'    => 'required|integer|min:1|max:6',
            'governorate'   => 'required|string|max:100',
            'faculty_id'    => 'required|exists:faculties,id',
        ]);

        $student->update($request->only([
            'university_id',
            'gender',
            'study_year',
            'governorate',
            'faculty_id',
        ]));

        return redirect()->route('student.dashboard')->with('success', 'تم تحديث الملف الشخصي بنجاح.');
    }

    public function showCreateRequest()
    {
        $student = Auth::user()->student;

        if (! $student) {
            return redirect()->route('student.profile.create')
                ->with('error', 'يجب إنشاء الملف الشخصي أولاً.');
        }

        if ($student->hasActiveRequest()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'لديك بالفعل طلب قيد الانتظار أو تم قبوله.');
        }

        return view('student.create-request', compact('student'));
    }

    public function createRequest(HttpRequest $request)
    {
        $student = Auth::user()->student;

        if (! $student) {
            return redirect()->route('student.profile.create')
                ->with('error', 'يجب إنشاء الملف الشخصي أولاً.');
        }

        // التحقق من وجود طلب pending أو accepted
        if ($student->hasActiveRequest()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'لديك بالفعل طلب قيد الانتظار أو تم قبوله.');
        }

        $request->validate([
            'description' => 'nullable|string',
        ]);

        try {
            // البحث عن أي غرفة مناسبة (الغرفة ستتغير لاحقاً من قبل المدير)
            $defaultRoom = Room::whereHas('housingUnit', function ($query) use ($student) {
                $query->where('unit_gender', $student->gender);
            })
                ->first();

            if (! $defaultRoom) {
                return back()->with('error', 'لا توجد غرف متاحة حالياً.');
            }

            \App\Models\Request::create([
                'student_id'  => $student->id,
                'room_id'     => $defaultRoom->id,
                'description' => $request->description,
                'status'      => 'pending',
            ]);

            return redirect()->route('student.dashboard')
                ->with('success', 'تم إرسال طلب السكن بنجاح.');

        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

}
