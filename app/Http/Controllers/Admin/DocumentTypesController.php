<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentTypeCreateRequest;
use App\DocumentType;
use App\User;

class documentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = DocumentType::all();
        return view('admin.documents.index', compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('admin.documents.create', compact('documentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentTypeCreateRequest $request)
    {
        $name = $request->input('document');

        DocumentType::create([
            'name' => $name
        ]);
        return redirect()->route('document_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('document_id', $id)->paginate(10);
        $documentType = DocumentType::where('id', $id)->first();
        return view('admin.documents.show', compact('users', 'documentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ducumentType = DocumentType::where('id', $id)->first();
        return view('admin.documents.edit', compact('ducumentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentTypeCreateRequest $request, $id)
    {
        $documentType = DocumentType::find($id);
        $documentType->name = $request->document;
        $documentType->save();

        return redirect()->route('document_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        DocumentType::find($id)->delete();

        $message = 'El tipo de documento fue eliminado.';

        if ($request->ajax()) {
            return $message;
        }
    }
}
