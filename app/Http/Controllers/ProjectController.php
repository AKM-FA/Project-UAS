<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Submission;

class ProjectController extends Controller
{
    public function index()
    {
        return view('frontend.master');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'university' => 'required|string|max:255',
        ]);

        Registration::create([
            'name' => $request->name,
            'email' => $request->email,
            'university' => $request->university,
        ]);

        return response()->json(['message' => 'Registration successful']);
    }

    public function submitLink(Request $request)
    {
        \Log::info('submitLink method called');
        $request->validate([
            'email' => 'required|email|max:255',
            'link' => 'required|url|max:255|unique:submissions,link',
        ]);

        Submission::create([
            'email' => $request->email,
            'link' => $request->link,
        ]);

        \Log::info('Submission created');
        return response()->json(['message' => 'Link submitted successfully']);
    }
}
