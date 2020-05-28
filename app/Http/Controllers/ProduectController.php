<?php

namespace App\Http\Controllers;

use App\Produect;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProduectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produect = Produect::all();
        return view('backend.product.index', compact('produect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeImageUpload(Produect::create($this->validateRequest()));

        return redirect('/product');
    }

    public function statusChange(Request $request, Produect $product)
    {
        $change = Produect::find($product->id);
        if ($request->check == 1) {
            $change->status = 0;
            $change->save();
            $message = "Your Product Visiblity off";
        } else {
            $change->status = 1;
            $change->save();
            $message = "Your Product Visiblity on";
        }
        return redirect('/product')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produect  $produect
     * @return \Illuminate\Http\Response
     */
    public function show(Produect $produect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produect  $produect
     * @return \Illuminate\Http\Response
     */
    public function edit(Produect $product)
    {
        return view('backend.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produect  $produect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produect $product)
    {
        $product->update($this->validateRequest());
        $this->storeImageUpload($product);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produect  $produect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produect $product)
    {
        $product->delete();
        return redirect('/product')->with('message', 'Product Delete');
    }

    private function validateRequest()
    {
        return Request()->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
            'description' => 'required|string',
            'pic1' => 'mimes:png,jpg,jpeg|required|file|max:10000',
            'pic2' => 'mimes:png,jpg,jpeg|required|file|max:10000',
            'pic3' => 'mimes:png,jpg,jpeg|required|file|max:10000',
            'pic4' => 'mimes:png,jpg,jpeg|required|file|max:10000',
        ]);
    }
    private function storeImageUpload($image)
    {
        for ($i = 1; $i < 5; $i++) {
            $path   = request()->file("pic{$i}");
            $resize = Image::make($path)->resize(1500, 850);
            $hash = md5(time());
            $path = "images/productimage/{$hash}.{$path->getClientOriginalExtension()}";
            $resize->save(public_path($path), 100);
            $url = "/" . $path;
            $image->update([
                "pic{$i}" => $path,
            ]);
        }
    }
}
