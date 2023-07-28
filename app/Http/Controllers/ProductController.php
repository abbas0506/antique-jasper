<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subcategories = Subcategory::all();
        return view('admin.products.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'subcategory_id' => 'required',
        ]);

        try {
            $product = Product::create($request->all());

            if ($request->hasFile('image')) {
                //save product image
                $image_name = $product->code . '.' . $request->image->extension();

                $image_url = public_path('images/products/') . $image_name;

                //remove existing image
                if (file_exists($image_url)) {
                    unlink($image_url);
                }

                $request->file('image')->move(public_path('images/products/'), $image_name);



                //replace autosaved original url of uploaded image name by its formatted name
                $product->image = $image_name;
                $product->save();
            }

            return redirect()->route('subcategories.show', $request->subcategory_id)->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'code' => 'required|unique:products,code,' . $product->id, 'id',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if (!$request->color) $request->merge(['color' => null]);
        if (!$request->gender) $request->merge(['gender' => '']);
        try {
            $image_name = '';

            //if user has changed image, replace existing image 
            if ($request->hasFile('image')) {
                $existing_image_url = public_path('images/products/') . $product->image;

                //remove existing image
                if (file_exists($existing_image_url)) {
                    unlink($existing_image_url);
                }

                //save uploaded image
                $image_name = $product->code . '.' . $request->image->extension();
                $request->file('image')->move(public_path('images/products/'), $image_name);
            }

            //update by raw input as it is
            $product->update($request->all());

            //if image has been changed by user
            //replace uploaded image name by its formatted name
            if ($image_name != '')
                $product->image = $image_name;

            $product->save();

            return redirect()->route('subcategories.show', $product->subcategory_id)->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $subcategory = $product->subcategory;
        try {
            $product->delete();
            return redirect()->route('subcategories.show', $subcategory)->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
    public function add($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.products.create', compact('subcategory'));
    }
}
