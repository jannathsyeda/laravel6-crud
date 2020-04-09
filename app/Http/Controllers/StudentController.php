<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=student::paginate(3);
        return view('home',compact('students'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $student =new Student;
        $student->first_name = $request->firstname;
        $student->last_name  = $request->lastname;
        $student->email      = $request->email;
        $student->phone      = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student added successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('edit',compact('student'));

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
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $student =Student::find($id);
        $student->first_name = $request->firstname;
        $student->last_name  = $request->lastname;
        $student->email      = $request->email;
        $student->phone      = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Student::find($id)->delete();
        return redirect(route('home'))->with('successMsg','Student deleted successfully!');
    }
}
