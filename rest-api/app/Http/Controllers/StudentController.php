<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {

        //mendapatkan semua data student
        $students = Student::all();

        //jika data kosong maka kirim status code 204
        if ($students->isEmpty()) {
            $data = [
                "message" => "Resource is empty"
            ];
        }

        $student = Student::all();

        $data = [
            'message' => 'Get all Student',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {

        // validasi data request
        $request->validate([
            "nama" => "required",
            "nim" => "required",
            "email" => "required|email",
            "jurusan" => "required"
        ]);


        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request-> jurusan
        ];

        //membuat validasi
        $validatedData = $request->validate([
            "nama" => "required",
            "nim" => "numeric|required",
            "email" => "email|required",
            "jurusan" => "required"
        ]);

        $student = Student::create($validatedData);

        $data = [
            'message' => 'Data berhasil ditambahkan',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if(!$student){
            $data = [
                "message" => "Data Not Found"
            ];

            return response ()->json($data, 404);

        }

      
        $student = Student::find($id);
            $student->update($request->all());

        $data =[
            "message" => "Student is updated successfully",
            "data" => $student,
        ];

        return response()->json($data, 200);
    }

    public function destroy($id){
        $student = Student::find($id);
            $student->delete();
            $data = [
                "massage" => "student is deleted successfully",
                "dataDeleted" => $student,
            ];

            return response()->json($data, 200);
    }  
}
