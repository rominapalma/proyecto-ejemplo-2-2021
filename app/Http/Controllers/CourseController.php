<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        if($courses->isEmpty()){
            //No hay cursos
            return response()->json([], 204);
        }
        //return response($courses, 200);
        return view('home',compact('courses'));
    }

    public function vistaCrearCurso()
    {
        $subjects = Subject::all();
        return view('ingresarcurso',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:2|max:255',
                'description' => 'required|min:2|max:255',
                'image' => 'required|min:2|max:255',
                'id_subject' => 'required|integer',
            ],
            [
                'name.required' => 'Debes ingresar un course',
                'name.min' => 'Debe ser de largo mínimo :min',
                'name.max' => 'Debe ser de largo máximo :max',
                'description.required' => 'Debes ingresar un course',
                'description.min' => 'Debe ser de largo mínimo :min',
                'description.max' => 'Debe ser de largo máximo :max',
                'image.required' => 'Debes ingresar un course',
                'image.min' => 'Debe ser de largo mínimo :min',
                'image.max' => 'Debe ser de largo máximo :max',
                'id_subject.required' => 'Debes ingresar un course',
                'id_subject.integer' => 'Debe ser un número',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        $newCourse = new Course();
        $newCourse->name = $request->name;
        $newCourse->description = $request->description;
        $newCourse->image = $request->image;
        $newCourse->id_subject = $request->id_subject;
        $newCourse->save();
        $courses = Course::all();
        /* return response()->json([
            'msg' => 'New course has been created',
            'id' => $newCourse->id,
        ], 201); */
        return view('home',compact('courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        if(empty($course)){
            return response()->json([], 204);
        }
        $subjects = Subject::all();
        //return response($course, 200);
        return view('editarcurso',compact('course','subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'nullable|min:2|max:255',
                'description' => 'nullable|min:2|max:255',
                'image' => 'nullable|min:2|max:255',
                'id_subject' => 'nullable|integer',
            ],
            [
                'name.min' => 'Debe ser de largo mínimo :min',
                'name.max' => 'Debe ser de largo máximo :max',
                'description.min' => 'Debe ser de largo mínimo :min',
                'description.max' => 'Debe ser de largo máximo :max',
                'image.min' => 'Debe ser de largo mínimo :min',
                'image.max' => 'Debe ser de largo máximo :max',
                'id_subject.integer' => 'Debe ser un número',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        $course = Course::find($id);
        if(empty($course)){
            return response()->json([], 204);
        }
        if ($request->name == $course->name && $request->description == $course->description && $request->image == $course->image && $request->id_subject == $course->id_subject){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 404);
        }
        if (!empty($request->name)){
            $course->name = $request->name;
        }
        if (!empty($request->description)){
            $course->description = $request->description;
        }
        if (!empty($request->image)){
            $course->image = $request->image;
        }
        if (!empty($request->id_subject)){
            $subject = Subject::find($request->id_subject);
            if(empty($subject)){
                return response()->json([
                    "message" => "No se encontró el id_subject"
                ], 404);
            }
            $course->id_subject = $request->id_subject;
        }
        $course->save();
        /* return response()->json([
            'msg' => 'Course has been edited',
            'id' => $course->id,
        ], 200); */
        $courses = Course::all();
        return view('home',compact('courses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if(empty($course)){
            return response()->json([],204);
        }
        $course->delete();
        /* return response()->json([
            'msg' => 'course has been deleted',
            'id' => $course->id,
        ], 200); */
        $courses = Course::all();
        return view('home',compact('courses'));
    }
}
