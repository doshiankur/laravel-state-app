@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Functions </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/functions')}}"> Functions</a></li>
        <li class="active">Edit New Functions</li>
    </ol>

    {!! Form::model($functions, [
    'method' => 'PATCH',
    'url' => ['/webpanel/functions',
    $functions->id],
    'class' => 'form-horizontal',
    'id'=>'functions'
    ]) !!}

    @include ('admin.functions.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#functions').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strFunction': 'required',
                    'strLanguageCode': 'required',
                    'strPageName':'required'
                },
                messages: {
                    'strFunction': 'Title is required',
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