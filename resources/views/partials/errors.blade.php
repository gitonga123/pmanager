@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-dismissable alert-error">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            @foreach($errors as $error)
                <li class="alert alert-danger"><strong>{!! $error !!}</strong></li>
             @endforeach
        </strong>
    </div>
@endif