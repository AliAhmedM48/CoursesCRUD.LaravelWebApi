<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function getAllCourses($perPage = 3)
    {
        return Course::paginate($perPage);
    }

    public function getOneCourse($id)
    {

        $course = Course::find($id);

        if (!$course) {
            return null;
        }
        return $course;
    }

    public function createCourse(array $data)
    {
        $course = new Course();
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->duration = $data['duration'];
        $course->instructor_name = $data['instructor_name'];

        $course->save();

        return $course;
    }

    public function updateCourse(Course $course, array $data)
    {
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->duration = $data['duration'];
        $course->instructor_name = $data['instructor_name'];

        $course->save();

        return $course;
    }

    public function deleteCourse($id)
    {

        $course = Course::find($id);

        if (!$course) {
            return null;
        }

        $course->delete();
        return $course;
    }
}
