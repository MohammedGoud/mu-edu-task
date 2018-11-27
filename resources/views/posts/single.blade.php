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
                    
                    <a herf="#" color="red"         class="del"      data-post="{{$post->id}}" >Delete</i></a> - 
                    <a herf="#" class="float-right" class="edit"     data-post="{{$post->id}}">Edit</i></a> - 
                    <a herf="#" class="float-right" class="comment" data-post="{{$post->id}}">Comment</i></a>
				</li>
              
				
                <script src="{{ asset('public/js/custom.js') }}"></script>