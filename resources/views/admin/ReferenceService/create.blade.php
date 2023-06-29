@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Reference Service</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/referenceservice')}}">Reference Service</a></li>
        <li class="active">Create New</li>
    </ol>

    
    <br><br>
    {!! Form::open(['url' => '/webpanel/referenceservice',
                             'class' => 'form-horizontal',
                             'id'=>'referenceservice']) !!}

    @include ('admin.ReferenceService.form')

    {!! Form::close() !!}

</section>
@endsection


@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#referenceservice').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strReferenceService':'required',
                    'strPageName':'required'
                    
                },
                messages: {
                    //'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strReferenceService':'Content is required',
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