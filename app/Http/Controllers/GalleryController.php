<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::orderBy('id', 'desc')->get();
        $data = [
            'galleries'=> $galleries
        ];
        return view('gallery', $data);
    }
    public function viewGallery($id){
        $gallery = Gallery::find($id);
        $data = [
            'gallery'=> $gallery
        ];
        return view('view-gallery', $data);
    }
}
