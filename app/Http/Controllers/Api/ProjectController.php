<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        // $projects = Project::all();
        // $projects = Project::with('type', 'technologies')->get(); //EAGER LOADING SENZA PAGINAZIONE
        $projects = Project::with('type', 'technologies')->paginate(3); //EAGER LOADING CON PAGINAZIONE

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
