@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Activities </h1>
    <ol class="breadcrumb">
        <li><a href="{{ asset('/webpanel/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('/webpanel/activities') }}"> Activities</a></li>
        <li class="active">Edit New Activities</li>
    </ol>

    {!! Form::model($activities, [
    'method' => 'PATCH',
    'url' => ['/webpanel/activities',
    $activities->id],
    'class' => 'form-horizontal',
    'id'=>'activities'
    ]) !!}

    @include ('admin.activities.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#activities').validate({
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