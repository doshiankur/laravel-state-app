@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Library Time </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/libraryTime')}}"> Library Time </a></li>
        <li class="active">Create New</li>
    </ol>

  
    {!! Form::open(['url' => '/webpanel/libraryTime',
                     'class' => 'form-horizontal',
                     'id'=>'libraryTime']) !!}

    @include ('admin.libraryTime.form')

    {!! Form::close() !!}

</section>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#libraryTime').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'str_content':'required'
                },
                messages: {
                    //'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'str_content': 'Description is required'
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
