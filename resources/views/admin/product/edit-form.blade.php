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
                            <form action="{{route('admin.product.update',$slider->id)}} " method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Produt name</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Short Desc</label>
                                        <textarea name="short_description" id="" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Desc</label>
                                        <textarea name="description" id="" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Product image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Size chart</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="size_chart" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Shipping policy</label>
                                        <textarea name="shipping_policy" id="" cols="30" rows="10"></textarea>

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sku</label>
                                        <input name="sku" type="text" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <input name="quantity" type="number" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Material</label>
                                        <input name="material" type="text" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>


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
