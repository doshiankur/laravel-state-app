@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> BookExchange </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/bookexchanges')}}"> BookExchange Desk</a></li>
        <li class="active">Edit New BookExchange</li>
    </ol>

    {!! Form::model($bookexchange, [
    'method' => 'PATCH',
    'url' => ['/webpanel/bookexchanges',
    $bookexchange->id],
    'class' => 'form-horizontal','id'=>'bookexchange'
    
    ]) !!}

    @include ('admin.bookexchanges.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

    

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bookexchange').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strBookExchange': 'required',
                    'strLanguageCode': 'required',
                    'strPageName':'required'
                },
                messages: {
                    'strBookExchange': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strPageName':'Page Name is requried' 
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