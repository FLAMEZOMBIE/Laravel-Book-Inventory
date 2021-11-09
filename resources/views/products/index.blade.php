@extends('products.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 style="margin: 20px; color: white">List Book Product (Powered by FLAMEZOMBIE)</h4>
            </div>
            <div class="pull-right">
                <a style="margin: 20px" class="btn btn-success" href="{{ route('products.create') }}"> Create New Book</a>
            </div>
            <div class="pull-right">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat" style="margin-top: 25%; border-radius: 10px; opacity: 60%">Logout</button>
                </form>
            </div>
        </div>
        <div class="">
            <form action="{{ route('products.index') }}" method="GET" role="search" style="">

                <div class="input-group" style="width: 100% ">
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search Book" id="term">
                </div>
            </form>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table  style="color: white; text-align: center;">
        @foreach ($products as $product)
            <div class="col-md-3 my-3">
                    <img style="border: 5px solid #555;  margin: 10px; height: 300px;" src="/image/{{ $product->image }}" width="200px">
            
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="margin: 10px; text-align: center;">
     
                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Detail</a>
      
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
     
                            @csrf
                            @method('DELETE')
        
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
            </div>   
        @endforeach
    </table>
    
    {!! $products->links() !!}
        
@endsection