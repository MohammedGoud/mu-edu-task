@extends('layouts.app')
<style>
a{
    font-size:16px;

}
ul{
    list-style :none;
}
hr { 
   color:red
}
</style>
@section('content')
<div class="container">
<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4>Our Posts</h4>
            <form class="form-horizontal" id="form-add" method="POST" action="{{ route('add') }}">
                        {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-md-10">
                        <input  type="text" class="form-control" name="title" value="" placeholder="write a title" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <textarea  type="text" class="form-control" name="body" placeholder="write a body"  /></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-10">
                        <button type="button" id="post" class="btn btn-primary">
                            Post
                        </button>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="form-update" method="POST" action="{{ route('update') }}" hidden>
                        {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-md-10">
                        <input id="title" type="text" class="form-control" name="title" value="" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <textarea id="body" type="text" class="form-control" name="body" placeholder="write a body" /></textarea>
                    </div>
                </div>
                
                <input type="hidden" name="post_id"  id="post_id"  value="" >
                <div class="form-group">
                    <div class="col-md-10">
                        <button type="button" id="update" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
          
			<ul class="timeline" id="posts" >
      
				

                @foreach($posts as $post)
                
                    <li id="post-{{$post->id}}">
                        <h3>{{$post->getUser->name}}</h3>
                        <h4 class="float-right">{{$post->title}}</h4>
                        <h5 class="float-right">{{date('Y-M-d H:i:s',strtotime($post->creation_date))}}</h5>
                        <p>{{$post->body}}</p>
                        
                        <h4 class="float-right">Comments</h4>
                            <ul class="timeline" id="comments-{{$post->id}}" >
                            @if(count($post->getComment)>0)
                                @foreach($post->getComment as $comment)
                                
                                    <li id="comment-{{$comment->id}}">
                                        <h5 class="float-right">
                                            {{$comment->getUser->name}} ,
                                            {{date('Y-M-d H:i:s',strtotime($comment->creation_date))}} 
                                        </h5>
                                        <p>{{$comment->comment}}</p>    
                                    </li>
                                    
                                @endforeach
                            @endif
                        
                            </ul>
                            
                            <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="comment" type="text" class="comment form-control" name="comment" data-post="{{$post->id}}" placeholder="write a comment .." value="" >
                                    </div>
                            </div>
                            <hr>
                        
                        <br>
                        <a herf="#" color="red"         class="del"      data-post="{{$post->id}}" >Delete</i></a> - 
                        <a herf="#" class="edit float-right" class="edit"     data-post="{{$post->id}}">Edit</i></a> 
                    </li>
                    <hr> 
                @endforeach
			</ul>
		</div>
	</div>
</div>
@endsection




