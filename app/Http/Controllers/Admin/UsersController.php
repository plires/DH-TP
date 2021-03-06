<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Image;
use App\User;
use App\DocumentType;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('admin.users.create', compact('documentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUserRequest $request)
    {
        $imgUrl = $request->file('img')->store('public');

        $url = Storage::url($imgUrl);

        $image = Image::create([
        'src' => $url
        ]);

        $image->save();

        $user = User::create([
        'name' => request()->name,
        'surname' => request()->surname,
        'email' => request()->email,
        'password' => bcrypt(request()->password),
        'document_id' => request()->documentType,
        'document' => request()->document,
        'src' => $url,
        'phone' => request()->phone,
        'admin' => request()->admin
        ]);

        $user->save();

        return redirect()->action('Admin\UsersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentTypes = DocumentType::all();
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', compact('user', 'documentTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {  
        $user = User::find($id);

        if ($request->img == null) {
            $url = $request->img_id;            
        } else {
            $imgUrl = $request->file('img')->store('public');
            $url = Storage::url($imgUrl);           
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = bcrypt(request()->password);            
        }

        $user->document_id = $request->documentType;
        $user->document = $request->document;
        $user->src = $url;            
        $user->phone = $request->phone;
        $user->admin = $request->admin;

        $user->save();

        return redirect()->action('Admin\UsersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User::find($id)->delete();

        $message = 'El usuario fue borrado.';

        if ($request->ajax()) {
            return $message;
        }
        return redirect()->action('Admin\ProductsController@index');
    }
}
