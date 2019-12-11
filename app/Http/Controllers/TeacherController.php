<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $collection = Teacher::paginate(10);

        return view('teacher.index', [
            'pageTitle' => 'Professores',
            'collection' => $collection
        ]);
    }

    public function create(Request $request)
    {
        return view('teacher.form', [
            'pageTitle' => 'Cadastrar Professor'
        ]);
    }

    public function show(Request $request)
    {
        $professor = Teacher::find();
        return view('teacher.form', [
            'pageTitle' => 'Detalhes Professor'
        ]);
    }

    public function store(Request $request)
    {
        return true;
    }

    public function update(Request $request)
    {
        return true;
    }
}
