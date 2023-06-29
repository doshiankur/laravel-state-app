@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Administrativeoffices List </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/administrativeoffices')}}"> Administrativeoffices List</a></li>
        <li class="active">Edit New Administrativeoffices</li>
    </ol>

    {!! Form::model($administrativs, [
    'method' => 'PATCH',
    'url' => ['/webpanel/administrativeoffices',
    $administrativs->id],
    'class' => 'form-horizontal',
    'id'=>'administrativs'
    ]) !!}

    @include ('admin.administrativeoffices.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#administrativs').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strPageName':'required'
                },
                messages: {
                    'strTitle': 'Title is required',
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