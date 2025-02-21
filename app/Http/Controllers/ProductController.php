<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use  App\Http\Requests;
use  App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    public function index()
    {
        return view('product_form');
    }

    public function save(ProductRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Đặt tên file
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Lưu file
        }
        $product = [
            'category' => $request->input('category'),
            'information' => $request->input('information'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'image' => $imageName,

        ];

        $products = Session::get('products', []);
        $products[] = $product;
        Session::put('products', $products);
        return view('product_form')->with('success', 'Lưu sản phẩm thành công!');
    }


    public function show()
    {
        $products = Session::get('products', []);
        foreach ($products as &$product) {
            if (!empty($product['image']) && !empty($product['mimeType'])) {
                $product['image'] = 'data:' . $product['mimeType'] . ';base64,' . $product['image'];
            }
        }
        return view('product_list', compact('products'));
    }
    public function clear()
    {
        Session::forget('products');
        return redirect('/products')->with('success', 'Xóa tất cả sản phẩm thành công!');
    }
}