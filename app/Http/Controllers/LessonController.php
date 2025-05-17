<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lesson::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'copies' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $lesson = Lesson::create($fields);

        return $lesson;
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return $lesson;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'copies' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $lesson->update($fields);

        return $lesson;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response()->json(['message' => 'Lesson deleted successfully.'], 200);
    }
}
