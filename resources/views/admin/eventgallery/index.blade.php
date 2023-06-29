@extends('layouts.admin.adminlayout')
@section('content')
<style>
    .w3-display-topright {
        position: absolute;
        right: 0;
        top: 0;
    }
    .w3-btn, .w3-button {
        cursor: pointer;
    }
    .w3-xxlarge {
        font-size: 36px !important;
        top: -12px;
        right: 7px;
        left: 193px;
    }
    .w3-transparent, .w3-hover-none:hover {
        background-color: transparent !important;
    }
    .w3-text-white, .w3-hover-text-white:hover {
        color: grey !important;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Event Gallery</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('webpanel/event') }}"> Event </a></li>
        <li class="active">Event Gallery</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    {!! Form::open(['url' => '/webpanel/eventgallery/'.$eventgalleryid, 'class' => 'form-horizontal', 'id' => 'eventgalleryform', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('StrEventImg', 'Event Image: ', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-5">
                                <input type="file" name="StrEventImg[]" class="form-control required" id="fileuploadid" multiple="">
                            </div>
                            <div class="col-sm-4">
                                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! $errors->first('StrEventImg', '<p class="help-block">:message</p>') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-xs-12">
             <div class="box">
                @if(!empty($eventgallery))
                    @foreach($eventgallery as $gallery)
                    <div id="Gallery_{{$gallery->id}}" style="width: 23%; padding: 10px; float:left; margin:10px;position: relative">
                       <img src="{{ asset('/public/upload/EventGallery/thumbnail/'.$gallery->StrEventImg) }}" height="200px" width="200px">
                        <span onclick="javascript:deleteimagegallery({{ $gallery->id }}, {{$eventgalleryid}})" class="w3-display-topright w3-button w3-transparent w3-text-white w3-xxlarge"><i class="fa fa-times-circle"></i></span>
                    </div>
                    @endforeach
                @else
                    <div>No Image For this Event...</div>
                @endif
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#eventgalleryform').validate({
            debug: false,
            errorClass: "help-block",
            errorElement: "p",
            rules: {
                'StrEventImg[]':{
                 required:true,
                 extension:'png|jpe?g|gif',
                        filesize: 1048576
             }
            },
            messages: {
                'StrEventImg[]': { 
                        required:'Event Gallery Image is required',
                        extension:'File must be JPG, GIF or PNG, less than 1MB'
                    }
            },
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    function deleteimagegallery(id, eventid) {
        if(confirm("Are you sure you want to delete this?")){
            var getUrl = window.location;
        var baseurl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";

        $.ajax({
            url: '{{ asset("/webpanel/eventgallery/deleteeventgallery") }}',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: id, eventid: eventid},
            dataType: "html",
            success: function (result) {
                if(result === '1'){
                    $('#Gallery_'+id).hide();
                }
            }
        });
        }
       else{
          return false;
        }
    }
</script>
@endpush