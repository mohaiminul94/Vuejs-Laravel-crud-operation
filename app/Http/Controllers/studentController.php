<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class studentController extends Controller
{
    public function index() {
        return view('index');
    }
    
    public function store(Request $request) {
        Student::create($request->all());
        return view('index');
    }
    
    public function view() {
        $allStudents= Student::all();
        return $allStudents;
    }
    
    public function update(Request $request, $id) {
        Student::findorFail($id)->update($request->all());
    }

    public function delete($id) {
        Student::find($id)->delete();
    }
}
