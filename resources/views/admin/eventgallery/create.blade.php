@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1>Event Gallery </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('webpanel/event') }}"> Event </a></li>
        <li><a href="{{ asset('webpanel/eventgallery') }}"> Event Gallery</a></li>
        <li class="active">Create New Event Gallery</li>
    </ol>

    <br><br>
    {!! Form::open(['url' => '/webpanel/eventgallery/create/'.$eventgalleryid, 'class' => 'form-horizontal','files' => true, 'id' => 'eventgalleryform']) !!}

    @include ('admin.eventgallery.form')

    {!! Form::close() !!}

</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

    /*$("#fileuploadid").change(function(){
        var file = this.value;
        var filename = file.substr(0, file.lastIndexOf('.'));
        filename = filename.replace(/C:\\fakepath\\/i, '');
        $('#txtAltTag').val(filename);
    });*/
</script>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('editor1');
        $('#eventgalleryform').validate({
            debug: false,
            errorClass: "help-block",
            errorElement: "p",
            rules: {
                'strCategory': 'required',
                'txtDescription': 'required',
            },
            messages: {
                'strCategory': 'This field is required',
                'txtDescription': 'This field is required',
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

@endpush
