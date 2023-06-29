@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Management of Villagelibraries </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/managementofvillagelibraries')}}"> Management of Villagelibraries  </a></li>
        <li class="active">Create New</li>
    </ol>

    {!! Form::open(['url' => '/webpanel/managementofvillagelibraries',  'files' => true,'class' => 'form-horizontal','id'=>'managementofvillagelibraries']) !!}

    @include ('admin.managementofvillagelibraries.form')

    {!! Form::close() !!}

</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#managementofvillagelibraries').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strManagementVillagelibraries':'required',
                    'strLanguageCode':'required',
                    'strPageName':'required'
                },
                messages: {
                    'strManagementVillagelibraries':'Management Villagelibraries is required',
                    'strLanguageCode': 'Language Code is required',
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