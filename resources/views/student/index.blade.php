@extends('layouts.adminLayout')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">

          <div class="card pd-20 pd-sm-40">
            <h1 class="card-body-title">All Exam
                <a href="{{ route('student.create') }}" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Student</a>
            </h1>

            <div class="table-wrapper">
              <table id="datatable1" class="table display table-bordered responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">SN</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-15p">Phone</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                  @foreach ($students as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td><img src="{{ url($item->image) }}" width="80px" alt=""></td>
                        <td>
                            <a href="{{ route('student.edit',$item->id) }}" class="btn btn-success mb-2">Edit</a>
                            <form method="POST" action="{{ route('student.destroy',$item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->



@endsection
