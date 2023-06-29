@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1>Knowledge Center</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/knowledgecenter')}}">Knowledge Center </a></li>
        <li class="active">Edit New Knowledge Center</li>
    </ol>

    

    {!! Form::model($knowledgecenter, [
    'method' => 'PATCH',
    'url' => ['/webpanel/knowledgecenter', $knowledgecenter->id],
    'class' => 'form-horizontal','id'=>'knowledgecenter'
    ]) !!}

    @include ('admin.knowledgecenter.form', ['submitButtonText' => 'Update'])

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
                    'strLanguageCode': 'required',
                    'strTitle':'required',
                    'strCategory':'required'
                },
                messages: {
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
