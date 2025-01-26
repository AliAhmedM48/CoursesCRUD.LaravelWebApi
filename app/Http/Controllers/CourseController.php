<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function getAll()
    {

        $courses = $this->courseService->getAllCourses();

        return response()->json([
            'success' => true,
            'message' => 'Courses retrieved successfully.',
            'data' => $courses
        ], 200);
    }

    public function getOne($id)
    {

        $course = $this->courseService->getOneCourse($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
                'data' => null
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Course retrieved successfully.',
            'data' => $course
        ], 200);
    }

    public function createCourse(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'instructor_name' => 'required|string|max:255',
            'duration' => 'nullable|integer'
        ]);

        $course = $this->courseService->createCourse($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Course created successfully.',
            'data' => $course
        ], 201);
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'instructor_name' => 'required|string|max:255',
            'duration' => 'nullable|integer'
        ]);

        $updatedCourse = $this->courseService->updateCourse($course, $validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Course updated successfully.',
            'data' => $updatedCourse
        ], 200);
    }

    public function deleteCourse($id)
    {

        $course = $this->courseService->deleteCourse($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Couse deleted successfully.',
        ], 200);
    }
}
