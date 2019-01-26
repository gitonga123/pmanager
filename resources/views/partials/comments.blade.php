<div class="row"> 
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-comment"></span>
                Recent Comments
            </h3>
        </div>
        <div class="panel-body">
            <ul class="media-list">
                @foreach($comments as $comment)
                    <li class="media">
                        <div class="media-left">
                            <img src="http://i.pravatar.cc/60X60" class="img-circle">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="user/{{ $comment->user->id }}">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a>
                                <br />

                                <small>
                                    Commented on {{ $comment->created_at }}
                                </small>
                            </h4>
                            <p>
                                {{ $comment->body }}
                            </p>
                            <a href="{{ $comment->url }}" target="__blank">View Link</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="btn btn-default btn-block">More Comments</a>
        </div>
    </div>
</div>