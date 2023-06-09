{{-- define the props we will use in the component and give them default value --}}
@props([
    'name' => 'success' ,
    'class' => 'success'    
])

@if(Session::has($name))
<div class="alert alert-{{$class}} alert-dismissible fade show" role="alert">
    {{Session::get($name)}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@section('script')
<script>
    window.setTimeout(function() {
        $('.alert').alert('close')
    }, 5000)
</script>
@endSection