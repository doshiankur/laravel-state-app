@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Technical Department  </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/technicaldepartment')}}"> Technical Department  </a></li>
        <li class="active">Create New</li>
    </ol>

    {!! Form::open(['url' => '/webpanel/technicaldepartment',
                    'class' => 'form-horizontal',
                    'id'=>'technicaldepartment']) !!}

    @include ('admin.technicaldepartment.form')

    {!! Form::close() !!}
   

</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#technicaldepartment').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strTechnical': 'required',
                    'strLanguageCode': 'required',
                    'strPageName':'required'
                },
                messages: {
                    'strTechnical': 'Technical Department is required',
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