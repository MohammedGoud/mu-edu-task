<style>
a{
    font-size:16px;

}
ul{
    list-style :none;
}
</style>

   
            <li id="comment-{{$comment->id}}">
                <h5 class="float-right">
                    {{$comment->getUser->name}} -
                    {{date('Y-M-d H:i:s',strtotime($comment->creation_date))}} 
                </h5>
                <p>{{$comment->comment}}</p>    
            </li>
            <script src="{{ asset('public/js/custom.js') }}"></script>