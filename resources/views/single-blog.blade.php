@extends('index')
@section('single-blog')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <a href="{{route('blogs')}}">
        <button>Back to home page</button>
    </a>
    
    @include('include.messages')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-4">
            <div class="p-6">
                <h6><b>{{$blog->title}}</b></h6>
                <p>{{$blog->body}}</p>
                <small>{{$blog->created_at->diffForHumans()}}</small>
                <small class="float-right"><b>Author:</b> {{$blog->user->name}}</small>
            </div>
        </div>
        <hr>
{{-- add comment --}}

        <form action="{{route('comment.create')}}" method="post">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            
            <textarea class="col-sm-10 border mb-2 ml-2" type="text" name="body" placeholder="Type something...">
            </textarea>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="blog_id" value="{{$blog->id}}">
            <button type="submit" class="btn btn-primary btn-sm mb-5 ml-1" >Comment</button>
        </form>
<hr>
        
            @foreach($blog->comments as $comment)
            <div class="p-6">
                <small class="badge badge-info">{{$comment->user->name}}</small>
                <h6>{{$comment->body}}</h6>
                <small class="float-right">{{$comment->created_at->diffForHumans()}}</small>
    {{-- delete comment --}}
                @if(Auth::user()->id == $comment->user_id || Auth::user()->id == $blog->user_id)
                    <form action="{{route('comment.delete',$comment->id)}}" method="post">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <button type="submit" class="btn btn-danger btn-sm offset-5 " >Delete</button>
                    </form>
                
                @endif
            </div>
            <hr>
            @endforeach
 
    </div>
</div>
@endsection