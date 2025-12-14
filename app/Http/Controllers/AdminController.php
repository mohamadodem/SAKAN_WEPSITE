<?php

namespace App\Http\Controllers;

use App\Models\Request as HousingRequest;
use App\Models\Student;
use App\Models\HousingUnit;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingRequests = HousingRequest::with(['student.user', 'student.faculty', 'room.housingUnit'])->where('status', 'pending')->get();
        $acceptedRequests = HousingRequest::with(['student.user', 'student.faculty', 'room.housingUnit'])->where('status', 'accepted')->get();
        $rejectedRequests = HousingRequest::with(['student.user', 'student.faculty', 'room.housingUnit'])->where('status', 'rejected')->get();
        
        return view('admin.dashboard', compact('pendingRequests', 'acceptedRequests', 'rejectedRequests'));
    }

    public function showAcceptForm($id)
    {
        // عرض نموذج اختيار الوحدة
        $request = HousingRequest::with('student')->findOrFail($id);
        
        // فقط الوحدات المناسبة لجنس الطالب
        $housingUnits = HousingUnit::where('unit_gender', $request->student->gender)->get();
        
        return view('admin.select-unit', compact('request', 'housingUnits'));
    }
    
    public function showRoomsForm(Request $request, $id)
    {
        // استلام بيانات النموذج
        $requestData = $request->validate([
            'housing_unit_id' => 'required|exists:housing_units,id'
        ]);
        
        $housingRequest = HousingRequest::with('student')->findOrFail($id);
        $unit = HousingUnit::findOrFail($requestData['housing_unit_id']);
        
        // التحقق من أن الوحدة مناسبة لجنس الطالب
        if ($unit->unit_gender !== $housingRequest->student->gender) {
            return back()->with('error', 'هذه الوحدة غير مناسبة لجنس الطالب');
        }
        
        // جلب الغرف المتاحة
        $rooms = Room::where('housing_unit_id', $unit->id)
            ->where('occupied', '<', $unit->max_room_capacity)
            ->get();
        
        return view('admin.select-room', compact('housingRequest', 'unit', 'rooms'));
    }
    
    public function acceptRequest(Request $request, $id)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'housing_unit_id' => 'required|exists:housing_units,id'
        ]);
        
        $housingRequest = HousingRequest::with('student')->findOrFail($id);
        $room = Room::with('housingUnit')->findOrFail($validated['room_id']);
        
        // التحقق من السعة
        if ($room->occupied >= $room->housingUnit->max_room_capacity) {
            return back()->with('error', 'الغرفة ممتلئة');
        }
        
        // تحديث الطلب
        $housingRequest->update([
            'room_id' => $room->id,
            'status' => 'accepted'
        ]);
        
        // تحديث عداد الغرفة
        $room->increment('occupied');
        
        // إذا كانت الغرفة أصبحت مشغولة لأول مرة
        if ($room->occupied == 1) {
            $room->housingUnit->increment('occupied_rooms');
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'تم قبول الطلب بنجاح');
    }
    
    public function rejectRequest($id)
    {
        $housingRequest = HousingRequest::findOrFail($id);
        $housingRequest->update(['status' => 'rejected']);
        
        return redirect()->route('admin.dashboard')->with('success', 'تم رفض الطلب بنجاح');
    }
}
