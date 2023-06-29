@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1>Knowledge Category</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/knowledgecategory')}}">Knowledge Category </a></li>
        <li class="active">Edit New Knowledge Category</li>
    </ol>

    

    {!! Form::model($knowledgecategory, [
    'method' => 'PATCH',
    'url' => ['/webpanel/knowledgecategory', $knowledgecategory->id],
    'class' => 'form-horizontal','id'=>'knowledgecategory'
    ]) !!}

    @include ('admin.knowledgecategory.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection


@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#knowledgecategory').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strDetail':'required',
                    'strCategory':'required'
                },
                messages: {
                    //'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strDetail': 'Knowledge Category Detail is required',
                    'strCategory':'Knowledge  Category is required'
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