@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Sale old magazine data</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/saleofoldmagazines')}}">Sale Old Magazine Data </a></li>
        <li class="active">Create New</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>
    {!! Form::open(['url' => '/webpanel/saleofoldmagazines',
         'class' => 'form-horizontal',
         'id'=>'saleofoldmagazines']) !!}

    @include ('admin.SalesOfOldMagazin.form')

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
                    //'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strSaleofOldMagazines':'required',
                    'strPageName':'required'
                    
                },
                messages: {
                    //'strTitle': 'Title is required',
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