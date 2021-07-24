@extends('index')
@section('admin')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    @include('include.messages')

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <h1 class="text-center">Create blog</h1>
      
        <form action="{{route('blog.create')}}" method="post" class="ml-12 mt-3 mb-2" >
            @csrf
           
            <p>Title</p>
            <input type="text" name="title"  class="form-control col-sm-10 mb-5">
            <p>Body</p>
            <textarea class="col-sm-10 border mb-2 ml-2" type="text" name="body"  rows="10" cols="100">
            </textarea>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <br>
            <input type="submit" class="btn btn-success " value="Create"/>   
        </form>
     
        <hr>
        <div class="grid grid-cols-1 md:grid-cols-2">
            @foreach ($blogs as $blog)
            <div class="p-6">
                <h6><b>{{$blog->title}}</b></h6>
                <p>{{$blog->body}}</p>
                <small>{{$blog->created_at->diffForHumans()}}</small>
                <small class="float-right"><b>Author:</b> {{$blog->user->name}}</small>
                <br>
                <a href="{{route('blog.edit',$blog->id)}}">
                    <button class="btn btn-primary btn-sm">  Edit </button>    
                </a>
                <form action="{{route('blog.delete',$blog->id)}}" method="post"  class="mt-1">
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection