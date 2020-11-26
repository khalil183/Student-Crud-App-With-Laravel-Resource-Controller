@extends('layouts.adminLayout')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="row row-sm mg-t-20">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title">Student Update <a href="{{ route('student.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> View Students</a></h6>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-gorup mt-2">
                                <label for="">Student Name</label>
                                <input type="text" name="name" placeholder="Student Name" class="form-control" value="{{ $student->name }}">
                            </div>
                            <div class="form-gorup mt-2">
                                <label for="">Student Phone</label>
                                <input type="text" name="phone" placeholder="Student Phone" class="form-control" value="{{ $student->phone }}">
                            </div>
                            <div class="form-gorup mt-2">
                                <label for="">Student Email</label>
                                <input type="email" name="email" placeholder="Student Email" class="form-control" value="{{ $student->email }}">
                            </div>
                            <div class="form-gorup mt-2">
                                <label for="">Student Image</label>
                                <input type="file" name="new_image" class="form-control">
                            </div>
                            <div class="form-gorup mt-2">
                                <label for="">Old Image</label>
                                <img src="{{ url($student->image) }}" width="80px" alt="">
                            </div>


                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-info mg-r-5">Update Student</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- card -->
                </form>
                </div><!-- col-6 -->
            </div>
        </div>
    </div>
@endsection
