<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;
use Input;


class articlesController extends Controller
{
    public static function ShowAll(){
        $category = Input::get('category');
        $tag = Input::get('tag');
        if($category) {
                $categoryId = \App\Models\Article_category::where('title',$category)->first()->id;
                $articles = \App\Models\Article::where('lang',Language())->where('category_ids','like',"%\"$categoryId\"%")->orderBy('created_at','desc')->paginate(5);
        } elseif($tag) {
                $articles = \App\Models\Article::where('lang',Language())->where('tags','like',"%\"$tag\"%")->orderBy('created_at','desc')->paginate(5);
        }
        else {
                //$articles = \App\Models\Article::where('lang',Language())->orderBy('created_at','desc')->paginate(5);
                $articles = \App\Models\Article::where('lang',Language())->orderBy('created_at','desc')->paginate(5);
        }

        $articleCategories = \App\Models\Article_category::where('lang',Language())->get();
        $popularArticles = \App\Models\Article::where('lang',Language())->orderBy('views','desc')->limit(5)->get();
        $translationJson = translationJson('articles');
        return view('articles',['articleCategories'=>$articleCategories,'articles'=>$articles,'popularArticles'=>$popularArticles,'translationJson'=>$translationJson,'category'=>$category,'tag'=>$tag]);
    }
    
    
    
    public static function ShowContent($slug) {
        $article = \App\Models\Article::where('lang',Language())->where('slug',$slug)->first();
        $categories = \App\Models\Article_category::whereIn('id',json_decode($article->category_ids,true))->get();
        $featured_articles = \App\Models\Article::where('lang',Language())->where('id','<>',$article->id)->orderBy('views','desc')->limit(3)->get();
        $translationJson = translationJson(null,'Article',$article->id);   
        $article->views++;
        $article->save();
        return view('article',['article'=>$article,'categories'=>$categories,'featured_articles'=>$featured_articles,'translationJson'=>$translationJson]);        
    
        
    }
}
