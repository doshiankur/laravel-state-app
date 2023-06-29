@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Reading Corner </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/readingcorner')}}"> Reading Corner </a></li>
        <li class="active">Edit New Content</li>
    </ol>

   
    

    {!! Form::model($readingcorner, [
    'method' => 'PATCH',
    'url' => ['/webpanel/readingcorner', $readingcorner->id],
    'class' => 'form-horizontal', 'id'=>'readingcorner'
    ]) !!}

    @include ('admin.ReadingCorner.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection



@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#readingcorner').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strReadingCorner':'required',
                    'strPageName':'required'
                },
                messages: {
                    //'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strReadingCorner':'Reading Corner is required',
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

