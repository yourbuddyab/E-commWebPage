<?php

namespace App\Http\Controllers;

use App\BasicDetial;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class BasicDetialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = BasicDetial::where('id', 1)->first();
        return view('backend.basicDetail.index', compact('detail'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.basicDetail.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $basicDetial=BasicDetial::create($this->RequestValidate());
        $this->storeImageUpload($basicDetial);
        return redirect('/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BasicDetial  $basicDetial
     * @return \Illuminate\Http\Response
     */
    public function show(BasicDetial $basicDetial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BasicDetial  $basicDetial
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicDetial $detail)
    {
        return view('backend.basicDetail.edit', compact('detail'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BasicDetial  $basicDetial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicDetial $detail)
    {
        $detail->update($this->RequestValidate());
        $this->storeImageUpload($detail);
        return redirect('/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BasicDetial  $basicDetial
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicDetial $basicDetial)
    {
        //
    }

    public function RequestValidate()
    {
       return Request()->validate([
            'name'  => 'string | required',
            'number'=> 'string | required',
            'email' => 'string | required',
            'footer'=> 'string | required',
            'logo'  => 'mimes:png,jpg,jpeg|required|file|max:10000',
        ]);
    }
    private function storeImageUpload($image)
    {
        if(request()->hasfile('logo')){
            $file = request()->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/basicDetails/".time().'.'.$extension;
            $file->move(public_path("../public/images/basicDetails"), $filename);
            $image->logo = $filename;
            // $image = Image::make(public_path($image->logo))->resize(400,400);   // returns Intervention\Image\Image
            $image->save();
         }
        }
}
