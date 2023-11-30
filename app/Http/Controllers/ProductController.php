<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        //$this->authorize('view', auth()->user());
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        //return view('product.create');
        return redirect()->route('product.index');
    }

    public function store()
    {
        $all_data = request()->validate([
            'article' => 'required|string|min:10|unique:products',
            'name' => 'required|string|alpha_num:ascii|unique:products',
            'status' => 'string',
        ]);
        $array = request()->all();

        foreach ($array as $array_key => $array_value) {
            if ((str_starts_with($array_key, 'data->atr_name')) and (isset($array_value))) {
                $num = substr_replace($array_key, '', 0, 14); //удалить все, кроме номера атрибута - 1

                $key = $array_value; //color
                //$key = request('data->atr_name' . $num);
                $value = request('data->atr_value' . $num); //black
                $all_data["data->$key"] = $value; //добавить color:black в конец массива

            }
        }
        Product::create($all_data);
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //return view('product.show', compact('product'));
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        //return view('product.edit', compact('product'));
        return redirect()->route('product.index');
    }

    public function update(Product $product)
    {

        $data1 = request()->validate([
            'article' => 'string|min:10',
            'name' => 'required|string|alpha_num:ascii',
            'status' => 'string',
        ]);
        //dd($data1);
        $array = request()->all();

        foreach ($array as $array_key => $array_value) {
            if ((str_starts_with($array_key, 'data->atr_name')) and (isset($array_value))) {
                $num = substr_replace($array_key, '', 0, 14); //удалить всё, кроме номера атрибута - 1

                $key = $array_value; //color
                $value = request('data->atr_value' . $num); //black
                $data2["$key"] = $value; //добавить color:black в конец массива

            }
        }
        $product->update($data1);
        $product->data = $data2;
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
