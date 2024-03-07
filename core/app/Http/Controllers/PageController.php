<?php

namespace App\Http\Controllers;

use App\Notices;
use App\Pages;
use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{


    public function privacy()
    {

        $metatag = Seo::first()->metarrp;
        $pt ="Privacy Policy";
        $page = Pages::find(1);
        return view('page', compact('page', 'pt', 'metatag'));
    }

    public function rrp()
    {    $metatag = Seo::first()->metaprivacy;
        $pt ="Refund and Return Policy";
        $page = Pages::find(2);
        return view('page', compact('page', 'pt', 'metatag'));
    }


    public function contact()
    {    $metatag = Seo::first()->metaprivacy;
        $pt ="Contact us";
        $page = Pages::find(2);
        return view('page', compact('page', 'pt', 'metatag'));
    }


    public function terms()
    {  
        $metatag = Seo::first()->metaterms;
        $pt ="Terms & Conditions";
        $page = Pages::find(3);
        return view('page', compact('page', 'pt', 'metatag'));
    }

    

    public function pages()
    {
        $page = Pages::paginate(10);
        return view('admin.page', compact('page'));
    }

    public function pagestore(Request $request)
    {
        $data = ['title' => $request->title,
                  'content' => $request->content];

        if(Pages::create($data)) {
            return redirect()->back()->with('success', 'Page created Successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    public function pageupdate(Request $request, $id)
    {

        $data = ['title' => $request->title,
                'content' => $request->content];
       
        if(Pages::find($id)->update($data)) {
            return redirect()->back()->with('success', 'Page Updated Successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    public function pagedelete($id)
    {

        if(Pages::find($id)->delete()) {
            return redirect()->back()->with('success', 'Page Deleted Successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to delete');
        }
       
    }


    public function sendMail() {
        
        $data = ['content' => '1']; // Replace 'content' with the actual key for your data
        $user['to'] = 'animexdevs@gmail.com';
    
        Mail::send('mail', $data, function($message) use ($user) {
            $message->to($user['to']);
            $message->subject('Test message');
        });
    }
    
    


}
