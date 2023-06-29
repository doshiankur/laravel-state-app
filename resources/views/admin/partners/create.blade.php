@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Partners  </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/partners')}}"> Partners  </a></li>
        <li class="active">Create New</li>
    </ol>

    {!! Form::open(['url' => '/webpanel/partners',  'files' => true,'class' => 'form-horizontal','id'=>'partners','enctype'=>'multipart/form-data']) !!}

    @include ('admin.partners.form')

    {!! Form::close() !!}

</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#partners').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strPartnerURL': 'required',
                    'strLanguageCode': 'required',
                    strPartnerLogo:{ 
                        required:true,
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strPartnerURL':'Partners Name is required',
                    'strLanguageCode': 'Language Code is required',
                    strPartnerLogo:
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