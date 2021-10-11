@extends('ui_master.dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        {{-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard sale</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Dashboard sale</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="card">
            <div class="card-header">
                <h5>Add Product</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Name</label><span class="text-danger">*</span></h5>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name">
                        @error('name')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-file">
                            <label class="form-label">Image</label> <br>
                            <input type="file" name="image" class="form-file-input" id="image">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <img id="showImage" src="{{ (!empty($product->image))? url('upload/product_images/'.$product->image):url('upload/no_image.jpg')  }}" style="width: 100px; height: 100px; border: 1px solid #000000">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Price</label><span class="text-danger">*</span></h5>
                        <input type="number" name="price" class="form-control" placeholder="Enter product price" step=".01">
                        @error('price')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label><span class="text-danger">*</span></h5>
                        <textarea type="text" name="description" class="form-control" placeholder="Enter product description"></textarea>
                        @error('description')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status</label><span class="text-danger">*</span></h5>
                        <select class="form-control" name="status" id="status">
                            <option value="" selected="" disabled="">Select Product Status</option>
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                        @error('status')
                        <br> <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

            
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection