<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ProductsDatatable;
use App\Http\Controllers\Controller;

use App\Model\Product;
use Illuminate\Http\Request;
 use Storage;

class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProductsDatatable $product) {
		return $product->render('admin.products.index', ['title' => trans('admin.products')]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.products.create', ['title' => trans('admin.create_products')]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {

		$data = $this->validate(request(),
			[
				'product_name_ar' => 'required',
				'product_name_en' => 'required',
				'desc_ar'         => 'required',
				'desc_en'         => 'required',
				'price'           => 'required',
				'department_id'            => 'required',
 			], [], [
				'product_name_ar'           => trans('admin.product_name_ar'),
				'product_name_en'           => trans('admin.product_name_en'),
				'desc_ar'                   => trans('admin.desc_ar'),
				'desc_en'           	    => trans('admin.desc_en'),
				'price'            			=> trans('admin.price'),
				'department_id'             => trans('admin.department_id'),
			]);
		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'products',
					'upload_type' => 'single',
					'delete_file' => '',
				]);
		}

		Product::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('products'));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$product = Product::find($id);
		$title   = trans('admin.edit');
		return view('admin.products.edit', compact('product', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $r, $id) {

		
			$data = $this->validate(request(),
			[
				'product_name_ar' => 'required',
				'product_name_en' => 'required',
				'desc_ar'         => 'required',
				'desc_en'         => 'required',
				'price'           => 'required',
				'department_id'            => 'required',
 			], [], [
				'product_name_ar'           => trans('admin.product_name_ar'),
				'product_name_en'           => trans('admin.product_name_en'),
				'desc_ar'                   => trans('admin.desc_ar'),
				'desc_en'           	    => trans('admin.desc_en'),
				'price'            			=> trans('admin.price'),
				'department_id'             => trans('admin.department_id'),
			]);

		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'products',
					'upload_type' => 'single',
					'delete_file' => Product::find($id)->logo,
				]);
		}

		Product::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('products'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$products = Product::find($id);
		Storage::delete($products->logo);
		$products->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$products = Product::find($id);
				Storage::delete($products->logo);
				$products->delete();
			}
		} else {
			$products = Product::find(request('item'));
			Storage::delete($products->logo);
			$products->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
	}
}
