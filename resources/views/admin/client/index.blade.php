@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simple Tables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                               placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($sliders as $slider)


                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            {{--                                            <td><img src="{{asset('storage/'.$slider->image)}}" width="100px" alt=""></td>--}}
                                            <td><img src="{{asset('slider/'.$slider->image)}}" width="100px" alt="">
                                            </td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->user->name}}</td>
                                            <td>
                                                @if($slider->status)
                                                   <span class="text-success"> Active</span>
                                                @else
                                                    <span class="text-danger">In Active</span>
                                                @endif
                                            </td>
                                            <td><a href="{{route('admin.client.edit',$slider->id)}}">Edit</a> |
                                                <a href="{{route('admin.client.delete',$slider->id)}}">Delete</a>
                                                <form action="{{route('admin.client.destroy',$slider->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">Delete</button>
                                                </form>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                {{$sliders->links('pagination::bootstrap-4')}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
