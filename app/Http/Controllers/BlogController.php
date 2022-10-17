<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /* user added code */

    protected $limit = 9;

    public function index(){

        /* $categories = Category::with('posts')->orderBy('title', 'asc')->get(); */ /* recently added code */

        $posts = Post::with('author')
                       ->latestFirst()
                       ->published()
                       ->simplePaginate(6);



    return view('blog.index', compact('posts' /* , 'categories' */));

    }

    public function show(Post $post){

    return view("blog.show", compact('post'));
    }

    /*  user added code  */
    public function category(Category $category){
        $categoryName = $category->title;


        $posts = $category->posts()
                            ->with('author')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit)  ;

        return view('blog.index', compact('posts', 'categoryName'))  ;

    }

}
