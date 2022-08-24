<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $products = Product::filters($filters)->latest()->paginate(5);
        return view('product/index', compact('products', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $params = $request->only(
            'name',
            'code',
            'brand',
            'price',
            'description',
            'image',
            'type',
            'status'
        );
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $params['image']->getClientOriginalExtension();
            $params['image']->move(public_path('images/product'), $filename);
            $params['image'] = $filename;
        }
        Product::create($params);
        return redirect()->route('products.index')->withSuccess('Thêm mới sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product/detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $product = Product::findOrFail($id);
        $params = $request->only(
            'name',
            'code',
            'brand',
            'price',
            'description',
            'image',
            'type',
            'status'
        );
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('images/product/' . $product->image);
            if ($product->image && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $filename = time() . '.' . $params['image']->getClientOriginalExtension();
            $params['image']->move(public_path('images/product'), $filename);
            $params['image'] = $filename;
        } elseif (empty($params['image'])) {
            unset($params['image']);
        }
        $product->update($params);
        return redirect()->route('products.index')->withSuccess('Chỉnh sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path('images/product/' . $product->image);
        if ($product->image && file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        return redirect()->route('products.index')->withSuccess('Xóa sản phẩm thành công');
    }
}
