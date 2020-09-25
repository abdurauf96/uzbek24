<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use App\Category;
use App\Tag;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if(\App::getLocale()=='o`z'){

            $latest_posts=Post::withTranslation(\App::getLocale())
            ->latest()
            ->whereTranslation('title', '!=', '', [\App::getLocale()])
            ->paginate(8);

            $anons=Post::where('anons', 1)
            ->withTranslation(\App::getLocale())
            ->whereTranslation('title', '!=', '', [\App::getLocale()])
            ->latest()
            ->first();

        }else{

            $latest_posts=Post::withTranslation(\App::getLocale())
            ->latest()
            ->whereTranslation('title', '!=', '', [\App::getLocale()], false)
            ->paginate(8);

            $anons=Post::whereAnons(1)
            ->withTranslation(\App::getLocale())
            ->whereTranslation('title', '!=', '', [\App::getLocale()], false)
            ->latest()
            ->first();
        }

        $ad=\App\Advert::whereType('page')->first();
        return view('welcome', compact( 'latest_posts', 'ad', 'anons'));
    }

    public function loadLatestPosts(Request $request)
    {

        if(\App::getLocale()=='o`z'){

            $latest_posts=Post::withTranslation(\App::getLocale())
            ->whereFeatured(1)
            ->latest()
            ->whereTranslation('title', '!=', '', [\App::getLocale()])
            ->paginate(10);

        }else{

            $latest_posts=Post::withTranslation(\App::getLocale())
            ->whereFeatured(1)
            ->latest()
            ->whereTranslation('title', '!=', '', [\App::getLocale()], false)
            ->paginate(10);
        }
        $res=view('ajax.latest-posts', compact('latest_posts'));
        return $res;

        return view('posts', compact('posts', 'ad'));
    }

    public function loadTopPosts()
    {
        $date = \Carbon\Carbon::today()->subDays(15);
            if(\App::getLocale()=='o`z'){
                $top_posts=\App\Post::withTranslation(\App::getLocale())
                ->where('created_at', '>=', $date)
                ->whereFeatured(1)
                ->orderBy('view', 'desc')
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()])
                ->get();
            }else{
                $top_posts=\App\Post::withTranslation(\App::getLocale())
                ->where('created_at', '>=', $date)
                ->whereFeatured(1)
                ->orderBy('view', 'desc')
                ->limit(6)
                ->whereTranslation('title', '!=', '', [\App::getLocale()],false)
                ->get();
            }
            $res=view('ajax.top-posts', compact('top_posts'));
            return $res;
    }


    public function loadAnons()
    {
        if(\App::getLocale()=='o`z'){

            $anons=Post::where('anons', 1)
            ->whereFeatured(1)
            ->withTranslation(\App::getLocale())
            ->whereTranslation('title', '!=', '', [\App::getLocale()])
            ->latest()
            ->first();

        }else{

            $anons=Post::whereAnons(1)
            ->whereFeatured(1)
            ->withTranslation(\App::getLocale())
            ->whereTranslation('title', '!=', '', [\App::getLocale()], false)
            ->latest()
            ->first();
        }
        $res=view('ajax.anons', compact('anons'));
        
        return $res;
    }

    public function loadSidebarPosts()
    {
        if(\App::getLocale()=='o`z'){
            $posts=\App\Post::withTranslation(\App::getLocale())
            ->latest()
            ->whereFeatured(1)
            ->limit(6)
            ->whereTranslation('title', '!=', '', [\App::getLocale()])
            ->get();
        }else{
            $posts=\App\Post::withTranslation(\App::getLocale())
            ->latest()
            ->whereFeatured(1)
            ->limit(6)
            ->whereTranslation('title', '!=', '', [\App::getLocale()],false)
            ->get();
        }
        $res=view('ajax.sidebar-posts', compact('posts'));
        return $res;
    }

    public function posts($slug)
    { 
        $category=Category::whereSlug($slug)->withTranslation(\App::getLocale())->first();
        $ad=$category->ad;
        if(\App::getLocale()=='o`z'){
            
            $posts=Post::where('category_id', $category->id)
            ->withTranslation(\App::getLocale())
            ->whereTranslation('title', '!=', '', [\App::getLocale()])
            ->paginate(10);

        }else{
            $posts=Post::where('category_id', $category->id)
            ->withTranslation(\App::getLocale())
            ->whereTranslation('title', '!=', '', [\App::getLocale()],false)
            ->paginate(10);
        }
        
        return view('posts', compact('category', 'posts', 'ad'));
    } 

    public function viewPost($id)
    {
        $post=Post::withTranslation(\App::getLocale())->with('tags')->findOrFail($id);
        $post->view=$post->view+1;
        $post->save();

        $related = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name')); 
        })
        ->where('id', '!=', $post->id)
        ->get();
        $ad=$post->category->ad;
        return view('view_post', compact('post', 'related', 'ad'));
    }

    public function contact()
    {
        $ad=\App\Advert::whereType('page')->first();
        return view('contact', compact('ad'));
    }

    public function page($slug)
    {
        $page=\App\Page::whereSlug($slug)->withTranslation(\App::getLocale())->first();
        $ad=\App\Advert::whereType('page')->first();
        return view('page', compact('page', 'ad'));
    }

    public function search(Request $request)
    {
        $posts=Post::withTranslation(\App::getLocale())
        ->where('title', 'LIKE', '%'.$request->q.'%')
        ->orWhere('excerpt', 'LIKE', '%'.$request->q.'%')
        ->orWhere('body', 'LIKE', '%'.$request->q.'%')
        ->get();
        $ad=\App\Advert::whereType('page')->first();
        return view('search', compact('posts', 'ad'));
    }

    public function storeMessage(Request $request)
    {
        
        if($request->kod!=$request->input_kod){
            return back()->with('error_msg', 'Kod xato');
        }else{

            $message=new Message();
            $message->name=$request->name;
            $message->phone=$request->phone;
            $message->email=$request->email;
            $message->thema=$request->theme;
            $message->message=$request->text;
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = str_slug('file_'.$request->name).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('storage/'), $name);
                $message->file = $name;
                  }
            $message->save();
            
            $apiToken = "768420781:AAEzzh0nDnr3o067TNOBnafxm1QTe4fbilo";
        $message=<<<TEXT
        Yangi murojat:
        Phone: {$request->phone},
        Name: {$request->name},
        Email: {$request->email},
        Mavzu: {$request->theme},
        Murojat matni: {$request->text},
TEXT;

        $data = [
            'chat_id' => '-1001464388075',
            'text' => $message
        ];

        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

            return back()->with('flash', 'Murojatingiz yetkazildi!');
        }
    }
}
