<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=DB::table('students')->get();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'required',
            'phone' => 'required'
        ]);

        $student=array(
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
        );

        $image=$request->file('image');
        $image_name=rand(9999,9999).".".strtolower($image->getClientOriginalExtension());

        $path='students/';
        $url=$path.$image_name;
        $image->move($path,$image_name);
        $student['image']=$url;
        DB::table('students')->insert($student);
        $notification=array(
            'messege'=>'Student Inserted SuccessfullY',
            'alert-type'=>'success'
            );

        return Redirect()->route('student.index')->with($notification);
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
        $student=DB::table('students')->where('id',$id)->first();
        return view('student.edit',compact('student'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $student=array(
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
        );


        $image=$request->file('new_image');
        if($image){

            $image_name=rand(9999,9999).".".strtolower($image->getClientOriginalExtension());

            $path='students/';
            $url=$path.$image_name;
            $image->move($path,$image_name);
            $student['image']=$url;
            DB::table('students')->where('id',$id)->update($student);
            $notification=array(
                'messege'=>'Student Updated SuccessfullY',
                'alert-type'=>'success'
                );

            return Redirect()->route('student.index')->with($notification);
        }else{
            DB::table('students')->where('id',$id)->update($student);
            $notification=array(
                'messege'=>'Student Updated SuccessfullY',
                'alert-type'=>'success'
                );

            return Redirect()->route('student.index')->with($notification);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Student Deleted SuccessfullY',
            'alert-type'=>'success'
            );

        return Redirect()->route('student.index')->with($notification);
    }
}
