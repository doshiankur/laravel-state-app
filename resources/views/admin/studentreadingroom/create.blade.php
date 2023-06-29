@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Student Reading Room  </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/studentreadingroom')}}"> Student Reading Room  </a></li>
        <li class="active">Create New</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    {!! Form::open(['url' => '/webpanel/studentreadingroom',
                    'class' => 'form-horizontal',
                    'id'=>'studentreadingroom']) !!}

    @include ('admin.studentreadingroom.form')

    {!! Form::close() !!}
   

</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#studentreadingroom').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strStudentreadingroom': 'required',
                    'strLanguageCode': 'required',
                    'strPageName':'required'                   
                },
                messages: {
                    'strStudentreadingroom': 'Student Reading Room is required',
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