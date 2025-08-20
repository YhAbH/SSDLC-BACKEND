<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return Report::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $report = Report::create($request->all());

        return response()->json($report, 201);
    }

    public function updateStatus($id, Request $request)
    {
        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return response()->json($report, 200);
    }
}
