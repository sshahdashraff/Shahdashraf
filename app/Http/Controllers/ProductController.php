<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;

class ProductController extends Controller
{

    function index()
    {

        $products=Product::get();

        return view('product.index',['products'=>$products]);
    }
    function show($id)
    {
        $product=Product::findOrFail($id);

        return view('product.show',compact('product'));

    }
    function destroy($id)
    {
       Product::find($id)->delete();

        return redirect()->route('product.index');

    }
    function update($id)
    {
        $product=Product::find($id);

        return view('product.update',compact('product'));

    }
    function edit($id,Request $request)
    {

        $product = Product::find($id);
    //    $imagename=$product->photo;

        // if ($request->hasFile('photo')) {

        //     $image =$request->file('photo');
        //     $imagename=time().".".$image->getClientOriginalExtension();
        //     $image->move(public_path('images'),$imagename);
        //     $mimeType = $image->getClientMimeType();
        // }
        $product->update([
            'name' => $request->product_name,
            'price' => $request->product_price,
            'availability' => $request->product_availability,
            'category_id' => $request->category_id,
            // 'photo' => $imagename,
        ]);
        return redirect()->route('product.index');
    }


   function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_availability' => 'required|in:available,unavailable',
            'category_id' => 'required|exists:categories,id',
            // 'photo' => 'required',
        ]);
//         $image = $request->file('photo');
//         $imageName=$request->photo;
//     if ($image) {
//     $imageName = time() . '.' . $image->getClientOriginalExtension();
//     $image->move(public_path('images'), $imageName);
// }
    Product::create([
        'name' => $request->product_name,
        'price' => $request->product_price,
        'availability' => $request->product_availability,
        'category_id' => $request->category_id,
        // 'photo' => $imageName,
    ]);


    return redirect()->route('product.index');

}
}