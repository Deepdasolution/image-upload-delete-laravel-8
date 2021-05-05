<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $medias =  Media::get();
        return view('media.index', compact('medias'));
    }

    //Store Function
    public function store(Request $request)
    {
        // First check if file is present or not

        if ($request->hasFile('image')) {
            //Rename the file uniquely so that no conflict will be arised
            $file = 'Media ' . date('YmdHis') . '.' . $request->image->extension();
            // Store file in disk
            $path = $request->image->move('media', $file);
            $media = new Media();
            $media->image = $path;
            $media->save();
            return back()->with('success', "Image uploaded successfully");
        }
    }

    public function delete(Request $request)
    {
        $media = Media::find($request->id);
        $media->destroy($request->id);
        return response()->json('success', 200);
    }
}
