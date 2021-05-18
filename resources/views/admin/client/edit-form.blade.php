@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Slider Edit form</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.client.update',$slider->id)}} " method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input name="title" type="text" class="form-control" value="{{$slider->title}}"
                                               id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Subtitle</label>
                                        <input type="text" value="{{$slider->subtitle}}" name="subtitle"
                                               class="form-control" id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @if(isset($slider->image))
                                            <img src="{{asset('slider/'.$slider->image)}}" width="100px" alt="">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Link</label>
                                        <input name="link" value="{{$slider->link}}" type="text" class="form-control"
                                               id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>

                                    <div class="card-body">
                                        <input type="checkbox" name="status" data-on-text="active"
                                               data-off-text="inactive" @if($slider->status) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <input type="submit" value="save">
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
