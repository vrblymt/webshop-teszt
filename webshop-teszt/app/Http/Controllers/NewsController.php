<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        //$data = News::where('title','Első hír')->get();
        $data = News::all();
        return view('News')->with('adat', $data);
    }
    public function addNews(){
        News::create($this->validateRequest());
        return redirect()->back();
    }
    public function removeNews(News $new){
        $new->delete();

        return redirect()->back();
    }
    public function updateNews(Request $request){
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();

        return redirect()->back();
    }
    private function validateRequest(){
        return request()->validate([
            "title" => "required|unique:news",
            "text" => "required"
        ], [
            "title.required" => "A cím nem lehet üres!"
        ]);
    }
}
