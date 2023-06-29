@extends('layouts.admin.adminlayout')
@push('style')
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
    <link href="{{ URL::to('public/plugings/cropper/components/imgareaselect/css/imgareaselect-default.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::to('public/plugings/cropper/css/jquery.awesome-cropper.css') }}">
    <style type="text/css">
        .modal-dialog .modal-content .modal-body{
            width: 100%;
            text-align: center;
        }
        .modal-dialog .modal-content .modal-body img{
            max-width: 100%;
        }
        .modal-footer{
            text-align: center !important;
        }
    </style>
@endpush
@section('content')
<section class="content-header">
    <h1> Event</h1>
    <ol class="breadcrumb">
        <li><a href="{{ asset('/webpanel/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('/webpanel/event') }}"> Event </a></li>
        <li class="active">Create New Page</li>
    </ol>
    <br><br>
    {!! Form::open(['url' => '/webpanel/event',
         'class' => 'form-horizontal', 
         'id' => 'eventform', 
         'files' => true]) !!}

    @include ('admin.event.form')

    {!! Form::close() !!}

</section>
@endsection
@push('scripts')


<script src="{{ URL::to('public/plugings/cropper/build/jquery.awesome-cropper.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>


<script>
    $(document).ready(function () {
        $('.modal-body .col-md-3').find('canvas').hide();
        // $('.modal-dialog').css('width','100% !important');
        $('.col-md-9').css('text-align','center !important');
        $('.modal-footer').css('text-align','center !important')
    });
</script>


@endpush
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#eventform').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strName': 'required',
                    'txtVenue': 'required',
                    'strImg':'required',
                    strImg:{ 
                        required:true,
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strName': 'Name  is required',
                    'txtVenue': 'venue is required',
                    
                    strImg:
                    { 
                        required:'Photo Image is required',
                        extension:'File must be JPG, GIF or PNG, less than 1MB'
                    }
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