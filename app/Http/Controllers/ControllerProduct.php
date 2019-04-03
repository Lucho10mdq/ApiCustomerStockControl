<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ControllerProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with( 'Category' )
                            ->get();
        return response()->json( [ 'Category' => $products ], 200 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->codigo = $request->codigo;
        $product->description = $request->description;
        $product->save();


       /* $products = Product::where( 'id', $product->id )
        ->with( 'Category' )
        ->get();*/
        
        $products = Product::where( 'id', $product->id )
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.id','products.category_id','products.codigo','products.description','categories.description as nombre_categoria','products.price','products.stock')
            ->orderBy('products.category_id', 'asc');
        return response()->json( [ 'Category' => $products ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where( 'id', $id )
        ->with( 'Category' )
        ->get();

        return response()->json( [ 'Category' => $product ], 200 );
    }

    public function searchCode(Request $request)
    {
        $product = Product::where( 'codigo', $request->codigo )
        ->with( 'Category' )
        ->get();

        return response()->json( [ 'Category' => $product ], 200 );
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete(); 
        return response()->json(['message'=>'delete with removed'],200);
    }
}
