<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\NormalProblem;
use App\Models\Resource;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function uploadPictureToImgur($file){
        $file_path = $file->getPathName();
        $client = new Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'Authorization' => "Client-ID ".ENV('IMGUR_CLIENT_ID'),
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($file->path($file_path)))
            ],
        ]);
        return data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
    }
    public function index(){

        $pending_contacts = Contact::where('status', false)->count();
        $user_count = User::count();
        $gallery_count = Gallery::count();
        $blog_count = Blog::count();
        $article_count = Article::count();
        $problem_count = NormalProblem::count();

        $data = [
            'pending_contacts' => $pending_contacts,
            'user_count' => $user_count,
            'gallery_count' => $gallery_count,
            'blog_count' => $blog_count,
            'article_count' => $article_count,
            'problem_count' => $problem_count
        ];
        return view('Admin.dashboard', $data);
    }
    public function contact(){
        $contacts = Contact::where('status', false)->orderBy('id', 'desc')->paginate(10);
        $pending_contacts = Contact::where('status', false)->count();

        $data = [
            'contacts' => $contacts,
            'pending_contacts' => $pending_contacts
        ];
        return view('Admin.contact', $data);
    }
    public function allContact(){
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        $pending_contacts = Contact::where('status', false)->count();

        $data = [
            'contacts' => $contacts,
            'pending_contacts' => $pending_contacts
        ];
        return view('Admin.contact', $data);
    }
    public function markAsRead($id, $type){
        $current_message = Contact::find($id);
        $current_message->status = $type;
        $current_message->save();

        return redirect()->route('admin.contact')->with('success', 'Successfully marked massage as read');
    }
    public function gallery(){
        $pending_contacts = Contact::where('status', false)->count();
        $galleries = Gallery::orderBy('id','desc')->get();
        $data = [
            'galleries' => $galleries,
            'pending_contacts' => $pending_contacts
        ];
        return view('Admin.gallery', $data);
    }
    public function about(){
        $pending_contacts = Contact::where('status', false)->count();
        $about = About::find(1);
        $data = [
            'pending_contacts' => $pending_contacts,
            'about' => $about
        ];
        return view('Admin.about', $data);
    }
    public function updateAbout(Request $req){
        $about = About::find(1);
        $about->about = $req->about;
        $about->save();
        return redirect()->route('admin.about')->with('success', 'Successfully updated about us');
    }
    public function resources(){
        $pending_contacts = Contact::where('status', false)->count();
        $resources = Resource::find(1);
        $data = [
            'pending_contacts' => $pending_contacts,
            'resources' => $resources
        ];
        return view('Admin.resources', $data);
    }
    public function updateResources(Request $req){
        $resources = Resource::find(1);
        $resources -> resources = $req->resources;
        $resources -> save();

        return redirect()->route('admin.resources')->with('success', 'Successfully updated Resources');
    }
    public function faq(){
        $pending_contacts = Contact::where('status', false)->count();
        $faq = Faq::find(1);
        $data = [
            'pending_contacts' => $pending_contacts,
            'faq' => $faq
        ];
        return view('Admin.faq', $data);
    }
    public function updateFaq(Request $req){
        $faq = Faq::find(1);
        $faq->faq = $req->faq;
        $faq->save();

        return redirect()->route('admin.faq')->with('success', 'Successfully updated faq');
    }

    public function newGallery(){
        $pending_contacts = Contact::where('status', false)->count();

        $data = [

            'pending_contacts' => $pending_contacts
        ];
        return view('Admin.new-gallery', $data);
    }
    public function addNewGallery(Request $req){
        $new_gallery = new Gallery;

        $new_gallery->cover_pic = $this->uploadPictureToImgur($req->file('cover_pic'));
        $new_gallery->title = $req->title;
        $new_gallery->short_description = $req->short_description;

        $new_gallery->save();

        return redirect()->route('admin.gallery')->with('success', 'Successfully marked massage as read');
    }
    public function viewGallery($id){
        $pending_contacts = Contact::where('status', false)->count();
        $current_gallery = Gallery::find($id);
        $data = [

            'pending_contacts' => $pending_contacts,
            'gallery' => $current_gallery
        ];
        return view('Admin.view-gallery', $data);
    }
    public function addGalleryImage(Request  $req){
        $gallery_image = new GalleryImage;

        $gallery_image->title = $req->title;
        $gallery_image->image_link = $this->uploadPictureToImgur($req->file('image'));
        $gallery_image->gallery_id = $req->id;

        $gallery_image->save();

        return redirect()->route('admin.view.gallery', ['id'=>$req->id])->with('success', 'Successfully added image');
    }
    public function deleteGallery($id){
        $current_gallery = Gallery::find($id);
        $current_gallery->delete();

        return redirect()->route('admin.gallery', ['id'=>$id])->with('success', 'Successfully Delete Gallery');
    }
    public function deleteGalleryImage($id, $gallery_id){
        $current_gallery = GalleryImage::find($id);
        $current_gallery->delete();
        return redirect()->route('admin.view.gallery', ['id'=>$gallery_id])->with('success', 'Successfully deleted the image');
    }
    public function allUsers(){
        $pending_contacts = Contact::where('status', false)->count();
        $users = User::orderBy('id', 'desc')->paginate(30);
        $data = [
            'users' => $users,
            'pending_contacts' => $pending_contacts
        ];
        return view('Admin.all-users', $data);
    }
    public function allAuthors(){
        $pending_contacts = Contact::where('status', false)->count();
        $users = User::whereHas('roles', function($q) {
            $q->where('name', 'author');
        })->orWhereHas('roles', function($q){
            $q->where('name', 'admin');
        })->paginate(30);
        $data = [
            'users' => $users,
            'pending_contacts' => $pending_contacts
        ];
        return view('Admin.all-authors', $data);
    }
    public function addAuthor($id, $type){
        if($type == 1){
            $user = User::whereDoesntHave('roles', function($q){
                $q->where('name', 'author');
            })->find($id);
            if($user){
                $user->roles()->attach(1);
            }
        }else{
            $user = User::whereHas('roles', function($q){
                $q->where('name', 'author');
            })->find($id);
            if($user){
                $user->roles()->detach(1);
            }
        }
        return redirect()->route('admin.all.authors');
    }   
}
