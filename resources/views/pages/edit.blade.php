@extends('layouts.app')

@section('content')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="text-align: center;">Product edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
              <form action="{{route('product.edited',$prod->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName">Product Name</label>
                    <input type="text" name="name" id="inputName" value="{{$prod->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Product Description</label>
                    <textarea id="inputDescription" name="description" value="{{$prod->description}}" placeholder="{{$prod->description}}" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputprice">Product Price</label>
                    <input type="number" name="price" id="inputprice" value="{{$prod->price}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_id" id="inputprice" value="0">
                </div>
                <div class="form-group">
                    <label for="inputimage">Product Image</label>
                    <input type="file" id="inputimage" name="image" value="{{$prod->image}}" accept=".svg, .jpg, .png" class="form-control">
                </div>
                <div class="row">
                    <div class="col-12">
                    <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Submit " class="btn btn-success float-right">
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- jQuery -->
<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
@endsection