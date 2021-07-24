<?php

namespace App\Http\Controllers;

use App\Models\r;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $blogs =  Blog::with('user')->get();

       return view('blogs',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $data = $request->validate([
            'body'=>'required',
            'title'=>'required',
            'user_id'=>'required'
        ]);
        
        Blog::insert($data);
        return redirect('profile')->with('message','Blog created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog =  Blog::with('user','comments')->where('id',$id)->first();
        return view('single-blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog =  Blog::with('user')->where('id',$id)->first();
 
        return view('blog-edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $data = $request->validate([
            'body'=>'required',
            'title'=>'required',
        ]);
        
        Blog::where('id',$request['blog_id'])->update($data);
     
        return redirect('profile')->with('message','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Blog::find($id)->delete()){
            return redirect()->back()->with('message','Blog deleted');
         }
    }
}
