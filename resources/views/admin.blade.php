@extends('index')
@section('admin')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    @include('include.messages')

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
     
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