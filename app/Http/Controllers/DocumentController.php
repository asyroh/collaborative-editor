<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentVersion;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function show(int $id)
    {
        $document = Document::findOrFail($id);

        return view('editor', compact('document'));
    }

    public function update(Request $request, int $id)
    {
        $document = Document::findOrFail($id);

       $document->content = $request->input('content');
        $document->save();

        DocumentVersion::create([
            'document_id' => $document->id,
           'user_id' => Auth::id(),
            'content' => $request->input('content')
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}