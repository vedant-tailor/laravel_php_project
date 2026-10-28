@extends('admin.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product Entry</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update ProductEntry<small></small></h3>
              </div>
              <!-- /.card-header -->
               <div class="">
             
                  @if(session('success'))

                  <h6 style="color:red;margin:10px;">{{session('success')}}</h6>
                  
                  @endif
                 
              </div>
              <!-- form start -->
              <form id="quickForm" method="post" action="{{url('updateproductentry/'.$editproductentry->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
      
          <div class="form-group">
            <label>Category</label>
            <input type="text" value="{{$editproductentry->category}}" class="form-control" name="category" placeholder="Enter category">
            @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Product Entry Master</label>
            <select class="form-control" name="product_entry">

              @foreach($viewproductentry as $row)
              <option value="{{ $row->id }}" {{ $editproductentry->pnameid == $row->id ? 'selected' : '' }}>
                                    {{ $row->productname }}
                                </option>
              @endforeach
            </select>
            @error('product_entry')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Product Company</label>
            <input type="text" value="{{$editproductentry->company}}" class="form-control" name="company" placeholder="Enter Company">
            @error('company')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Color</label>
            <input type="text" value="{{$editproductentry->color}}" class="form-control" name="color" placeholder="Enter color">
            @error('color')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Material</label>
            <input type="text" value="{{$editproductentry->material}}" class="form-control" name="material" placeholder="Enter material">
            @error('material')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Size</label>
            <input type="text" value="{{$editproductentry->size}}" class="form-control" name="size" placeholder="Enter size">
            @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" >{{$editproductentry->description}}</textarea>
            @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
            @if($editproductentry->image)
              <img src="{{asset('image_upload/'.$editproductentry->image)}}" width='150px' class="mt-2">
            @endif
            @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image1</label>
            <input type="file" name="image1" class="form-control-file">
            @if($editproductentry->image1)
              <img src="{{asset('image_upload/'.$editproductentry->image1)}}" width='150px' class="mt-2">
            @endif
            @error('image1')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image2</label>
            <input type="file" name="image2" class="form-control-file">
            @if($editproductentry->image2)
              <img src="{{asset('image_upload/'.$editproductentry->image2)}}" width='150px' class="mt-2">
            @endif
            @error('image2')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image3</label>
            <input type="file" name="image3" class="form-control-file">
            @if($editproductentry->image3)
              <img src="{{asset('image_upload/'.$editproductentry->image3)}}" width='150px' class="mt-2">
            @endif
            @error('image3')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image4</label>
            <input type="file" name="image4" class="form-control-file">
            @if($editproductentry->image4)
              <img src="{{asset('image_upload/'.$editproductentry->image4)}}" width='150px' class="mt-2">
            @endif
            @error('image4')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Price</label>
            <input type="text" value="{{$editproductentry->price}}" class="form-control" name="price" placeholder="Enter price">
            @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection