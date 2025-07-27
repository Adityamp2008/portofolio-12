<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\project;
use App\Models\Skill;

class homeController extends Controller
{
     public function index()
    {
        $informasi = Informasi::first();
        $project = project::all();
        $skills = Skill::all();
        return view('welcome', compact('informasi','project', 'skills'));
    }
}
