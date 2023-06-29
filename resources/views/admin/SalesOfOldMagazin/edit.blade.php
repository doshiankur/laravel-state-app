@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Sales of Old Magazine </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/SalesOfOldMagazin')}}"> Sales of Old Magazine </a></li>
        <li class="active">Edit New Content</li>
    </ol>

    

    {!! Form::model($saleofoldmagazines, [
    'method' => 'PATCH',
    'url' => ['/webpanel/saleofoldmagazines', $saleofoldmagazines->id],
    'class' => 'form-horizontal','id'=>'saleofoldmagazines'
    ]) !!}

    @include ('admin.SalesOfOldMagazin.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection


@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#saleofoldmagazines').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strLanguageCode': 'required',
                    'strSaleofOldMagazines':'required',
                    'strPageName':'required'
                    
                },
                messages: {
                    'strLanguageCode': 'Language Code is required',
                    'strSaleofOldMagazines':'Sale Old Magazine Content is required',
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