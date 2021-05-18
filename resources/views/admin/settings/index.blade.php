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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Configuration</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.configuration.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input value="{{getConfiguration('address')}}" name="address" type="text" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Call to</label>
                                        <input type="text" value="{{getConfiguration('callto')}}" name="callto" class="form-control" id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mail to</label>
                                        <input value="{{getConfiguration('mailto')}}" name="mailto" type="text" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <img src="{{asset('storage/'.getConfiguration('logo'))}}" width="100px" alt="">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Ad1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="ad1" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <img src="{{asset('storage/'.getConfiguration('ad1'))}}" width="100px" alt="">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Ad2</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="ad2" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <img src="{{asset('storage/'.getConfiguration('ad2'))}}" width="100px" alt="">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Link</label>
                                        <input name="link" type="text" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>

                                </div>
                                <div class="card-body">
                                    <input type="checkbox" name="status" data-on-text="active"
                                           data-off-text="inactive" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
