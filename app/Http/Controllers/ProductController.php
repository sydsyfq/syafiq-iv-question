<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function viewProduct()
	{
		$datas['allData'] = Product::all();
		return view('backend.products.view_product', $datas);
	}

	public function addProduct()
	{
		return view('backend.products.add_product');
	}

	public function saveProduct(Request $req)
	{
		$validateData = $req->validate([
			'name' => 'required|unique:products,name',
			'price' => 'required',
			'description' => 'required',
			'status' => 'required',
		]);

		$data = new Product();
		$data->name = $req->name;
		$data->price = $req->price;
		$data->description = $req->description;
		$data->status = $req->status;

		if ($req->file('image')) {
			$file = $req->file('image');
			@unlink(public_path('upload/product_images/'.$data->image));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('/upload/product_images'),$filename);
			$data->image = $filename;
		}

		$data->save();

		$notification = array(
			'message' => 'Add Product Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('view.product')->with($notification);
	}

	public function editProduct($id)
	{
		$data = Product::find($id);
		return view('backend.products.edit_product', compact('data'));
	}

	public function updateProduct(Request $req, $id)
	{
		$data = Product::find($id);

		$validateData = $req->validate([
			'name' => 'required|unique:products,name,'.$data->id,
			'price' => 'required',
			'description' => 'required',
			'status' => 'required',
		]);

		$data->name = $req->name;
		$data->price = $req->price;
		$data->description = $req->description;
		$data->status = $req->status;

		if ($req->file('image')) {
			$file = $req->file('image');
			@unlink(public_path('upload/product_images/'.$data->image));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('/upload/product_images'),$filename);
			$data->image = $filename;
		}

		$data->save();

		$notification = array(
			'message' => 'Update Product Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('view.product')->with($notification);
	}

	public function deleteProduct($id)
	{
		$data = Product::find($id);
		$data->delete();

		$notification = array(
			'message' => 'Delete Product Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('view.product')->with($notification);
	}
}
