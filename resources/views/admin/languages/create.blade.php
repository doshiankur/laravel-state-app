@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Languages </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/languages')}}"> Languages </a></li>
        <li class="active">Create New</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>
    {!! Form::open(['url' => '/webpanel/languages',
                             'class' => 'form-horizontal',
                             'id'=>'languages']) !!}

    @include ('admin.languages.form')

    {!! Form::close() !!}

</section>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#languages').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strLanguage':'required'
                },
                messages: {
                    //'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strLanguage': 'Description is required'
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
