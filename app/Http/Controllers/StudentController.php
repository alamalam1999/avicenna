<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index() {
        $students = Student::latest()->paginate(10);
        return view('student.index', compact('students'));
    }


    public function create() {
        return  view('student.create');
    }

    public function store(Request $request) 
    {
                $this->validate($request, [
                    'image'             => 'required|image|mimes:png,jpg,jpeg',
                    'name'              => 'required',
                    'gender'            => 'required',
                    'nis'               => 'required',
                    'bornplace'         => 'required',
                    'borndate'          => 'required',
                    'religion'          => 'required',
                    'school'            => 'required',
                    'class'             => 'required',
                ]);

                    //upload image
            $image = $request->file('image');
            $image->storeAs('public/students', $image->hashName());

            $student = Student::create( [
                'image'         => $image->hashName(),
                'name'          => $request->name,
                'gender'        => $request->gender,
                'nis'           => $request->nis,
                'bornplace'     => $request->bornplace,
                'borndate'      => $request->borndate,
                'religion'      => $request->religion,
                'school'        => $request->school,
                'class'         => $request->class
            ]);

            if($student) {
                //pesan sukses
                return redirect()->route('student.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else
            {
                //pesan error
                return redirect()->route('student.index')->with(['error' => 'Data Gagal Disimpan!']);
            }

    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name'          => 'required',
            'gender'        => 'required',
            'nis'           => 'required',
            'bornplace'     => 'required',
            'borndate'      => 'required',
            'religion'      => 'required',
            'school'        => 'required',
            'class'         => 'required'
        ]);

        $student = Student::findOrFail($student->id);


        if($request->file('image') == "") {
            $student->update([
            'name'         => $request->name,
            'gender'       => $request->gender,
            'nis'          => $request->nis,
            'bornplace'    => $request->bornplace,
            'borndate'     => $request->borndate,
            'religion'     => $request->religion,
            'school'       => $request->school,
            'class'        => $request->class
            ]);
        } else 
        {
            Storage::disk('local')->delete('public/student/'.$student->image);

            $image = $request->file('image');
            $image->storeAs('public/students', $image->hashName());

            $student->update([
                'image'        =>$image->hashName(),
                'name'         =>$request->name,
                'gender'       =>$request->gender,
                'nis'          =>$request->nis,
                'bornplace'    =>$request->bornplace,
                'borndate'     =>$request->borndate,
                'religion'     =>$request->religion,
                'school'       =>$request->school,
                'class'        =>$request->class
            ]);
        }

        if($student){
            return redirect()->route('student.index')->with(['success' => 'Data Diupdate!']);
        }else
        {
            return redirect()->route('student.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        Storage::disk('local')->delete('public/students/'.$student->image);
        $student->delete();

        if($student) {
            return redirect()->route('student.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('student.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}

