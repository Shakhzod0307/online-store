@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
<div class="row" >

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <div class="d-flex align-items-center justify-content-around">
                    <!-- Content Header (Page header) -->
        <section class="content-header">
      <div class="container-fluid">
        <div class="row text-align-center">

            
                <div class="alert alert-secondary" role="alert">
                    <h2 style="text-align: center;">My Product</h2>
                </div>
      
 
        </div>
      </div><!-- /.container-fluid -->
    </section>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif 

<div class="row mt-5">
@foreach ( $myproduct as $p )
<div class="col-xl-4 col-sm- mb-5 ">
    <div class="card" >                
        <div class="card-header text-center">                
            <img src="{{asset('public/Image')}}/{{$p->image}}" class="card-img-top" style="height: 150px;width:100%; object-fit:contain;" alt="...">
        </div>       
        <div class="card-body p-3">
            <div class=""row>
                <div class="col-8">
                    <div class="numbers">
                        <small class="d=flex align-items-center text-capitalize">
                            <i class="ri-store-2-fill me-1"></i><span></span>
                        </small>
                        <p class="mb-0 text-capitalize font-weight-bolder">Name: {{ $p->name }}</p>
                        <h5 class="font-weight-bolder mb-0">
                          Price:  ${{ number_format($p->price,0,'.','.') }}
                        </h5>
                        <small><span class="mb-0 text-capitalize font-weight-bolder">Description:</span> {{$p->description}}</small>
                    </div>
                </div>
                @if(Auth::user()->name=='Shahzod')
                    @if($p->sold!=0)
                    <a href="{{route('product.remove',$p->id)}}"><button type="button" value="0" name="sold" class="btn btn-primary btn-sm btn-block">Remove</button></a>
                    <a href="{{route('product.edit',$p->id)}}"><button type="button" class="btn btn-warning btn-sm btn-block">Edit</button></a>
                    <a href="{{route('product.delete',$p->id)}}"><button type="button" class="btn btn-danger btn-sm btn-block">Delete</button></a>
                    @else
                        <a href="{{route('product.edit',$p->id)}}"><button type="button" class="btn btn-warning btn-sm btn-block">Edit</button></a>
                        <a href="{{route('product.delete',$p->id)}}"><button type="button" class="btn btn-danger btn-sm btn-block">Delete</button></a>
                    @endif
                @else
                    <a href="{{route('product.buy',$p->id)}}"><button type="button" value="1" name="sold" class="btn btn-primary btn-sm btn-block">Buy</button></a>    
                    <a href="{{route('product.buy',$p->id)}}"><button type="button" value="1" name="sold" class="btn btn-warning btn-sm btn-block">Add to Wish list</button></a>    
                @endif  
            </div>
        </div>    
    </div>
</div>    
@endforeach


</div>
</div>
</div>
</div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@endsection