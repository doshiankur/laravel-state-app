@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> TV Rooms </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/tvroom')}}"> TV Rooms </a></li>
        <li class="active">Edit TV Rooms</li>
    </ol>

 

    {!! Form::model($tvroom, [
    'method' => 'PATCH',
    'url' => ['/webpanel/tvroom', $tvroom->id],
    'class' => 'form-horizontal','id'=>'tvroom'
    ]) !!}

    @include ('admin.tvroom.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tvroom').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strTVRoom': 'required',
                    'strLanguageCode': 'required',
                    'strPageName':'required'
                },
                messages: {
                    'strTVRoom': 'TV Room is required',
                    'strLanguageCode': 'Language Code is required',
                    'strPageName':'Page Name is required'
                },
            highlight: function(element, errorClass,errorElement) {
                $(element).removeClass(errorClass);
            },
            submitHandler: function(form) {
                form.submit();
            }
         });
    });

</script>
@endpush

