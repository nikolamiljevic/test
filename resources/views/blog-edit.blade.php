@extends('index')
@section('single-blog')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <a href="{{route('blogs')}}">
        <button>Back to home page</button>
    </a>
    
    @include('include.messages')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-10 md:grid-cols-12">
            <div class="p-6">
                <form action="{{route('blog.update',$blog->id)}}" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/> 
                    <p>Title</p>
                    <input type="text" name="title" value="{{$blog->title}}" class="form-control mb-5">

                    <p>Body</p>
                    <textarea class="col-sm-10 border mb-2 ml-2" type="text" name="body"  rows="14" cols="90">
                        {{$blog->body}}
                    </textarea>

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    <br>
                    <button class="btn btn-primary ">
                        Update
                    </button>    
                </form>
            </div>
        </div>
        <hr>
    </div>
</div>
@endsection