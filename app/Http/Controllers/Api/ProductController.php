<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Product;

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
        $products = Product::filters($filters)->latest()->customPaginate($filters);
        return response()->json([
            'meta' => [
                'has_next' => ($products->lastPage() > $products->currentPage()) ? true : false ,
                'total_count' => $products->total(),
                'page_count' => $products->lastPage(),
                'page_size' => $products->perPage(),
                'page_id' => $products->currentPage(),
            ],
            'result' => $products->all(),
            'status' => 'successful'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $product = Product::create($params);

        return response()->json([
            'result' => $product->toArray(),
            'status' => 'successful'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        return response()->json([
            'result' => $product->toArray(),
            'status' => 'successful'
        ]);
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
        return response()->json([
            'result' => $product->toArray(),
            'status' => 'successful'
        ]);
    }
}
