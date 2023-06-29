@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Leaders  </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/leaders')}}"> Leaders  </a></li>
        <li class="active">Create New</li>
    </ol>

    {!! Form::open(['url' => '/webpanel/leaders', 
         'files' => true,'class' => 'form-horizontal',
         'id'=>'leaders','enctype'=>'multipart/form-data']) !!}

    @include ('admin.leaders.form')

    {!! Form::close() !!}



</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#leaders').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules:{
                    'strLeadersName': 'required',
                    'strLanguageCode': 'required',
                    'strDesignation':'required',
                    'strPlace':'required', 
                    'strPageName':'required',
                    'intDisplay':'required',
                    strLeadersPhoto:{ 
                        required:true,
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strLeadersName':'Leaders Name is required',
                    'strLanguageCode': 'Language Code is required',
                    'strDesignation': 'Leaders Messages is required',
                    'strPlace':'Leaders Place is required',
                    'strPageName':'Page Name is required',
                    'intDisplay':'Leaders Order is required',
                    strLeadersPhoto:
                    { 
                        required:'Photo Image is required',
                        extension:'File must be JPG, GIF or PNG, less than 1MB'
                    }
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