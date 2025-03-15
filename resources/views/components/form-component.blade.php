
<form action="{{$action}}" class="form" method="{{$method}}" enctype="multipart/form-data">
    @csrf 

    @if($method == 'PUT') @method='PUT' @endif
    
    {{$slot}}
    <button class="btn btn-primary" type="submit">
        {{$buttonText}}
    </button>
</form>