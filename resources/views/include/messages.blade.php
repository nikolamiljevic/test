@if(Session::has('message'))
<p class="alert alert-success message">{{ Session::get('message') }}</p>
@endif 

@if ($errors->any())
    <div class="alert alert-danger message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<script>
setTimeout(function(){
    $('.message').hide()
}, 3000);
</script>