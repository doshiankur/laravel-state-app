@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> CopyRight </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/copyrights')}}"> CopyRight</a></li>
        <li class="active">Edit New CopyRight</li>
    </ol>

    {!! Form::model($copyright, [
    'method' => 'PATCH',
    'url' => ['/webpanel/copyrights',
    $copyright->id],
    'class' => 'form-horizontal',
    'id'=>'copyrights'
    ]) !!}

    @include ('admin.copyrights.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#copyrights').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strLanguageCode': 'required',
                    'strCopyright':'required',
                    'strPageName':'required'
                },
                messages: {
                    'strLanguageCode': 'Language Code is required',
                    'strCopyright': 'Description is required',
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