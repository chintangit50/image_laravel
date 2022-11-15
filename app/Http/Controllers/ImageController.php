<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ImageUpload;

class ImageController extends Controller
{

    public function index()
    {
       return view('welcome');
    }

    public function imageUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('welcome')->with('error', $validator->messages()->first());
        }

        $imageUpload = new ImageUpload;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $imageUpload->image = $imageName;
            $request->image->move(public_path('images/uploads'), $imageName);
        }

        if ($imageUpload->save()) {
            return redirect()->route('image_view')->with('success', 'Image uploaded successfully.');
        }
        return redirect()->route('welcome')->with('error', 'Something went wrong.');
    }

    public function imageView()
    {
        $this->data['images'] = ImageUpload::get()->toArray();
        return view('image_view',$this->data);
    }
}
