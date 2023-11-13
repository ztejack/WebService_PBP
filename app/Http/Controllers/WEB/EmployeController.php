<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\GajiSlip;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
    }
    public function store()
    {
    }
    public function store_employe()
    {
    }
    public function update()
    {
    }
    public function update_employe()
    {
    }
    public function archive()
    {
    }
    public function search()
    {
    }
    public function findByUuid($uuid)
    {
        $employee = Employe::where('uuid', $uuid)->first();

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json(['employee' => $employee]);
    }
}
