@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Aboutus </h1>
    <ol class="breadcrumb">
        <li><a href="{{ asset('/webpanel/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('/webpanel/aboutus') }}">Aboutus</a></li>
        <li class="active">Edit New Aboutus</li>
    </ol>

    {!! Form::model($aboutus, [
    'method' => 'PATCH',
    'url' => ['/webpanel/aboutus',
    $aboutus->id],
    'class' => 'form-horizontal',
    'id'=>'aboutus'
    ]) !!}

    @include ('admin.aboutus.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#aboutus').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strDescription':'required',
                    'strPageName':'required'
                },
                messages: {
                    'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strDescription': 'Description is required',
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