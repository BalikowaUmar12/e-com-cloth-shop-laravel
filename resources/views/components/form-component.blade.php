
<form action="{{$action}}" class="form" method="{{$method}}" enctype="multipart/form-data" id="{{$formId}}">
    @csrf 

    @if($method == 'PUT') @method='PUT' @endif
    
    {{$slot}}
    <button class="btn btn-primary formBtn" type="submit">
        {{$buttonText}}
    </button>
</form>
<script>
    // document.addEventListener('DOMContentLoaded', () => {
    //       document.getElementById('addAdmin').addEventListener('click', function(){
    //         console.log(document.getElementById('form'));
    //         document.getElementById('adminForm').reset();
    //         document.getElementById('adminId').value = '';
    //     });

    // });
</script>