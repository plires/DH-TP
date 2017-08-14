<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\DocumentType;



class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('user.profile.index', compact('user'));
    }

    public function edit($id)
    {

        $documentTypes = DocumentType::all();
        $user = User::where('id', $id)->first();
        return view('user.profile.edit', compact('user', 'documentTypes'));
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
    	/*
        
        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image_id = $image;
        $product->category_id = $request->category_id;
        $product->available = $request->available;
        $product->save();

        return redirect()->action('User\ProfileController@index');
        */
    }
}
