@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Knowledge Center </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/knowledgecenter')}}">Knowledge Center</a></li>
        <li class="active">Create New</li>
    </ol>

   
    {!! Form::open(['url' => '/webpanel/knowledgecenter', 
                    'class' => 'form-horizontal',
                    'id'=>'knowledgecenter']) !!}

    @include ('admin.knowledgecenter.form')

    {!! Form::close() !!}

</section>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#knowledgecenter').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strTitle':'required',
                    'strCategory':'required'
                },
                messages: {
                    //'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strTitle':'Title is required',
                    'strCategory':'Category Code is required'
                    
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