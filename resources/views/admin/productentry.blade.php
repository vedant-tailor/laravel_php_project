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
              <li class="breadcrumb-item active">Product Entry</li>
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
                <h3 class="card-title">Product Master <small></small></h3>
              </div>
              <!-- /.card-header -->
               <div class="">
             
                  @if(session('success'))

                  <h6 style="color:red;margin:10px;">{{session('success')}}</h6>
                  
                  @endif
                 
              </div>
              <!-- form start -->
               <form action="{{url('addproductentry')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category" required>
                        <option>Select Category</option>
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                        <option value="Children">Children</option>
            </select>
             @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Product Entry Master</label>
            <select class="form-control" name="product_entry">
              <option>Select Product</option>
              @foreach($viewproductentry as $row)
              <option value="{{$row->id}}">{{$row->productname}}</option>
              @endforeach
            </select>
            @error('product_entry')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Product Company</label>
            <input type="text" class="form-control" name="company" placeholder="Enter Company">
            @error('company')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Product Color</label>
            <select class="form-control" name="color" required>
                    <option>Select Color</option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Black">Black</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Orange">Orange</option>
                    <option value="Pink">Pink</option>
                    <option value="Pink">Brown</option>
            </select>
                 @error('color')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Material</label>
            <input type="text" class="form-control" name="material" placeholder="Enter material">
            @error('material')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Size</label>
            <input type="text" class="form-control" name="size" placeholder="Enter size">
            @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
            @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
            @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image1</label>
            <input type="file" name="image1" class="form-control-file">
            @error('image1')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image2</label>
            <input type="file" name="image2" class="form-control-file">
            @error('image2')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image3</label>
            <input type="file" name="image3" class="form-control-file">
            @error('image3')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>
          <div class="form-group">
            <label>Image4</label>
            <input type="file" name="image4" class="form-control-file">
            @error('image4')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter price">
            @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>category</th>
                    <th>productname</th>
                    <th>company</th>
                    <th>color</th>
                    <th>material</th>
                    <th>size</th>
                    <th>description</th>
                    <th>image</th>
                    <th>image1</th>
                    <th>image2</th>
                    <th>image3</th>
                    <th>image4</th>
                    <th>price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($viewpentry as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{optional($item->product)->productname ?? '(no product)'}}</td>
                    <td>{{$item->company}}</td>
                    <td>{{$item->color}}</td>
                    <td>{{$item->material}}</td>
                    <td>{{$item->size}}</td>
                    <td>{{$item->description}}</td>
                    <td>@if($item->image)<img src="{{asset('image_upload/'.$item->image)}}" width='80px'>@endif</td>
                    <td>@if($item->image1)<img src="{{asset('image_upload/'.$item->image1)}}" width='80px'>@endif</td>
                    <td>@if($item->image2)<img src="{{asset('image_upload/'.$item->image2)}}" width='80px'>@endif</td>
                    <td>@if($item->image3)<img src="{{asset('image_upload/'.$item->image3)}}" width='80px'>@endif</td>
                    <td>@if($item->image4)<img src="{{asset('image_upload/'.$item->image4)}}" width='80px'>@endif</td>
                    <td>{{$item->price}}</td>
                    <td><a href="{{url('editproductentry/'.$item->id)}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{url('deleteproductentry/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                 @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection