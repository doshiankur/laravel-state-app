@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Student reading room </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/member_application_type')}}">Member Application Type </a></li>
        <li class="active">Edit Member Application Type</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>

    {!! Form::model($memberapplicationtype, [
    'method' => 'PATCH',
    'url' => ['/webpanel/member_application_type', $memberapplicationtype->id],
    'class' => 'form-horizontal', 'id'=>'memberapplicationtype'
    ]) !!}

    @include ('admin.memberapplicationtype.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#memberapplicationtype').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strApplicationType': 'required',
                    
                   
                   
                },
                messages: {
                    'strApplicationType': 'Application Type is required',
                   
                   
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