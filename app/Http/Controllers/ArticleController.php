<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Setting;
use Auth;


class ArticleController extends Controller
{
    public function display(){
        $articles = Article::latest()->paginate(5);
        return view('writer.article',compact('articles'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
     }   
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $articles = Article::latest()->paginate(5);
        
            return view('admin.articles.index',compact('articles'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
       
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function Create()
        {
            $data =Auth::user();
            $settings = Setting::get();
            return view('writer.articles.create',compact('data','settings'));
        }
        
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function save(Request $request)
        {
            $request->validate([
                'userid' => 'required',
                'username' => 'required',
                'title' => 'required',
                'article' => 'required',
                
            ]);
      
            $input = $request->all();
      
            if ($image = $request->file('image')) {
                $destinationPath = 'assets/img/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }
        
            Article::create($input);
         
            return redirect()->route('writer.articles')
                            ->with('success','Your Article created successfully.');
        }
         
        /**
         * Display the specified resource.
         *
         * @param  \App\article  $article
         * @return \Illuminate\Http\Response
         */
        public function show(Article $article)
        {
            return view('admin.articles.show',compact('article'));
        }
         
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\article  $article
         * @return \Illuminate\Http\Response
         */
        public function Edit(Article $article)
        {
            $data =Auth::user();
            return view('writer.articles.edit',compact('article','data'));
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\article  $article
         * @return \Illuminate\Http\Response
         */
        public function Update(Request $request, Article $article)
        {
            $request->validate([
                'userid' => 'required',
                'username' => 'required',
                'title' => 'required',
                'article' => 'required',
            ]);
      
            $input = $request->all();
      
            if ($image = $request->file('image')) {
                $destinationPath = 'assets/img/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }else{
                unset($input['image']);
            }
              
            $article->update($input);
        
            return redirect()->route('writer.articles')
                            ->with('success','Your Article updated successfully');
        }
      
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\article  $article
         * @return \Illuminate\Http\Response
         */
        public function destroy(Article $article)
        {
            $article->delete();
         
            return redirect()->route('articles.index')
                            ->with('success','Article deleted successfully');
        }

        public function WriterArticle(){
            $articles = Article::all()->where('userid',auth()->user()->id);
            return view('writer.articles.index',compact('articles'));
        }

        public function delete(Article $article)
        {
            $article->delete();
         
            return redirect()->route('writer.articles')
                            ->with('success','Your Article deleted successfully');
        }

       
}
