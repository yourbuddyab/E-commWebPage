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
        $storeData=Produect::create($this->validateRequest());
        // dd($storeData);
        $this->storeImageUpload($storeData);

        return redirect('/product');
    }

    public function statusChange(Request $request, Produect $product)
    {
        $change = Produect::find($product->id);
        if($request->check == 1){
            $change->status = 0;
            $change->save();
            $message = "Your Product Visiblity off";
        }else{
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
        if(request()->hasfile('pic1')){
            $file = request()->file('pic1');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/StudentImage/1".time().'.'.$extension;
            $file->move(public_path("../public/images/StudentImage"), $filename);
            $image->pic1 = $filename;
            $image = Image::make(public_path($image->pic1))->resize(400,400);   // returns Intervention\Image\Image
            $image->save();
         }
        // if(request()->hasfile('pic2')){
        //     $file = request()->file('pic2');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = "/images/StudentImage/2".time().'.'.$extension;
        //     $file->move(public_path("../public/images/StudentImage"), $filename);
        //     $image->pic2 = $filename;
        //     $image = Image::make(public_path($image->pic2))->resize(400,400);   // returns Intervention\Image\Image
        //     $image->save();
        // }
        // if(request()->hasfile('pic3')){
        //     $file = request()->file('pic3');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = "/images/StudentImage/3".time().'.'.$extension;
        //     $file->move(public_path("../public/images/StudentImage"), $filename);
        //     $image->pic3 = $filename;
        //     $image = Image::make(public_path($image->pic3))->resize(400,400);   // returns Intervention\Image\Image
        //     $image->save();
        // }
        // if(request()->hasfile('pic4')){
        //     $file = request()->file('pic4');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = "/images/StudentImage/4".time().'.'.$extension;
        //     $file->move(public_path("../public/images/StudentImage"), $filename);
        //     $image->pic4 = $filename;
        //     $image = Image::make(public_path($image->pic4))->resize(400,400);   // returns Intervention\Image\Image
        //     $image->save();
        // }
    }
}
