@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Student reading room </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/studentreadingroom')}}"> Student reading room </a></li>
        <li class="active">Edit Student reading room</li>
    </ol>

    

    {!! Form::model($studentreadingroom, [
    'method' => 'PATCH',
    'url' => ['/webpanel/studentreadingroom', $studentreadingroom->id],
    'class' => 'form-horizontal','id'=>'studentreadingroom'
    ]) !!}

    @include ('admin.studentreadingroom.form', ['submitButtonText' => 'Update'])

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
