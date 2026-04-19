<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('person')->get();
        return view('teachers.index', compact('teachers'));
    }

    public function store(Request $request)
    {

        // Validación
        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:persons',
            'birthdate' => 'required|date',
            'phone' => 'nullable',
            'degree' => 'required',
            'entry_date' => 'required|date'
        ]);

        // Transacción
        DB::beginTransaction();

        try {
            $person = Person::create([
                'name' => $validated['name'],
                'surname' => $validated['surname'],
                'email' => $validated['email'],
                'birthdate' => $validated['birthdate'],
                'phone' => $validated['phone'],
            ]);

            $teacher = $person->teacher()->create([
                'degree' => $validated['degree'],
                'entry_date' => $validated['entry_date'],
            ]);

            DB::commit();

            return response()->json([
                'person' => $person,
                'teacher' => $teacher,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
    }
}
