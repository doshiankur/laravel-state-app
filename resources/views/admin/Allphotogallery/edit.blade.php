@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Users </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('webpanel/event') }}"> Event </a></li>
        <li><a href="#"> Event Gallery </a></li>
        <li class="active">Edit New Event Gallery</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>

    {!! Form::model($eventgallery, [
    'method' => 'PATCH',
    'url' => ['/webpanel/eventgallery/update', $eventgallery->id],
    'class' => 'form-horizontal',
    'id'  => 'eventgalleryform',
    'files' => true
    ]) !!}

    @include ('admin.eventgallery.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $( function() {
        $( "#datepicker" ).datepicker();
    } );

    $("#fileuploadid").change(function(){
        var file = this.value;
        var filename = file.substr(0, file.lastIndexOf('.'));
        filename = filename.replace(/C:\\fakepath\\/i, '');
        $('#txtAltTag').val(filename);
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('editor1');
        $('#eventgalleryform').validate({
            debug: false,
            errorClass: "help-block",
            errorElement: "p",
            rules: {
                'strTitle': 'required',
                'txtDetail': 'required',
            },
            messages: {
                'strTitle': 'This field is required',
                'txtDetail': 'This field is required',
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
