<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;


class CrudsController extends Controller
{

    public function index() {
        return response(Student::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function update(Request $request, $id) {
        $updateData = Crud::findOrFail($id);
        $updateData->update();
        return response(null, Response::HTTP_OK);
    }

}
