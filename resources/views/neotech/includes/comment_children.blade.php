@if ($comment->id !== $comment->parent_id && $comment->parent_id !== null)
    <ul class="children">
        <li class="comment">
            <div class="comment-body">
    
                <div class="comment-avatar">
                    <img alt="" src="{{ asset(env('THEME')) }}/img/blog/comment_1.png">
                </div>
    
                <div class="comment-text">
                    <h6 class="comment-author">{{ $comment->name }} {{ $comment->id }} include</h6>
                    <div class="comment-metadata">
                        <span class="comment-date">{{ $comment->created_at->format("F j, Y a g:i") }}</span>  
                    </div>                      
                    <p>{{ $comment->text }}</p>
                    <a href="{{ $comment->id }}" class="comment-reply">{{ $comment->id }} Ответить</a>
                </div>
    
            </div>
        </li>
        
        <!-- end reply comment -->
        {{-- @include(env('THEME') . '.includes.comment_children') --}}
    </ul>
    {{-- @continue --}}
@endif