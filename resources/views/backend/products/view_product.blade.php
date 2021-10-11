@extends('ui_master.dashboard')
@section('content')

<div class="pc-container">
    <div class="pcoded-content">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">Product List</h3>
                    <a href="{{ route('add.product') }}" style="float: right;" class="btn btn-success" href>Add Product</a>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th width="25%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ (!empty($product->image))? url('upload/product_images/'.$product->image):url('upload/no_image.jpg')  }}"></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        <a href="{{ route('edit.product',$product->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.product',$product->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection