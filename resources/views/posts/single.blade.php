<style>
a{
    font-size:16px;

}
ul{
    list-style :none;
}
</style>

   
				<li id="post-{{$post->id}}">
                 	<h3>{{$post->getUser->name}}</h3>
					<h4 class="float-right">{{$post->title}}</h4>
                    <h5 class="float-right">{{date('Y-M-d H:i:s',strtotime($post->creation_date))}}</h5>
					<p>{{$post->body}}</p>
                    <h4 class="float-right">Comments</h4>

                        <ul class="timeline" id="comments-{{$post->id}}" >
                            
                        </ul>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="comment" type="text" class="comment form-control" name="comment" data-post="{{$post->id}}" placeholder="write a comment .." value="" >
                        </div>
                   </div>
                    <a herf="#" color="red"         class="del"      data-post="{{$post->id}}" >Delete</i></a> - 
                    <a herf="#" class="float-right" class="edit"     data-post="{{$post->id}}">Edit</i></a>
				</li>
                <script src="{{ asset('public/js/custom.js') }}"></script>