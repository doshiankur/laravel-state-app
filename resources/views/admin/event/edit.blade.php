@extends('layouts.admin.adminlayout')
@push('style')
{{--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">--}}
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
    <h1> Event </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{ asset('webpanel/event') }}"> Event </a></li>
    </ol>
   

    {!! Form::model($event, [
    'method' => 'PATCH',
    'url' => ['/webpanel/event', $event->id],
    'class' => 'form-horizontal',
    'id' => 'eventform',
    'files' => true,
    ]) !!}

    @include ('admin.event.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script src="{{ URL::to('public/js/bootstrap-datetimepicker.js') }}"></script>
<link href="{{ URL::to('public/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<script src="{{ URL::to('public/plugings/cropper/components/imgareaselect/scripts/jquery.imgareaselect.js') }}"></script>
<script src="{{ URL::to('public/plugings/cropper/build/jquery.awesome-cropper.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    var dateToday = new Date();
    var days = 1;
    var newDate = new Date(Date.now()+days*24*60*60*1000);

      
    $( function() {

        $( "#datepicker" ).datetimepicker({ format: 'DD-MM-YYYY hh:mm A',maxDate: dateToday });
        $( "#datepicker2" ).datetimepicker({ format: 'DD-MM-YYYY hh:mm A',maxDate: dateToday,date: new Date(Editupcomingdate), });
        /*$( "#datepicker2" ).datetimepicker({
            minDate: newDate,
            date: new Date(Editupcomingdate),
            format: 'DD-MM-YYYY hh:mm A',
        });*/         
     
 
    } );
</script>

<script type="text/javascript">
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function() {
        var check = $("input[name='enmEventfor']:checked").val();
        if(check == 1){
            $('#eventdate').show();
            $('#upcoming').hide();
        }else{
            $('#eventdate').hide();
            $('#upcoming').show();
        }

        CKEDITOR.replace('editor1');

        $('#sample_input').awesomeCropper(
            {
                width: 390,
                height: 400,
                debug: true,

            }
        );

        $('#img').css('height','100');
        $('#img').css('width','100');

        var ov = '@php echo asset('public/upload/event'); @endphp' + '/'+ $('#oldImage').val();
        $('#img').attr('src',ov);

        // $("#eventform").validate({
        //     debug: false,
        //     errorClass: "help-block",
        //     errorElement: "p",
        //     rules: {
        //         'strName': 'required',
        //         'txtVenue': 'required',
        //     },
        //     messages: {
        //         'strName': 'Title is required',
        //         'txtVenue': 'Venue is required',
        //                 },
        //     highlight: function(element, errorClass) {
        //         $(element).removeClass(errorClass);
        //     },
        //     submitHandler: function(form) {
        //         form.submit();
        //     }
        // });

    });
</script>



<script type="text/javascript">
    $(document).ready(function(){


        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');
      
        CKEDITOR.replace('editor1');
         $('#img').css('height','100');
        $('#img').css('width','100');

        var ov = '@php echo asset('public/upload/Event'); @endphp' + '/'+ $('#oldImage').val();
        //alert(ov);
        $('#img').attr('src',ov);

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
                       
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strName': 'Name  is required',
                    'txtVenue': 'venue is required',
                    
                    strImg:
                    { 
                        extension:'File must be JPG, GIF or PNG, less than 1MB',
                        filesize: 'File must be  less than 1MB'
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


<script>
    $("input[name='enmEventfor']").click(function () {
        var check = $("input[name='enmEventfor']:checked").val();
        if(check == 1){
            $('#eventdate').show();
            $('#upcoming').hide();
        }else{
            $('#eventdate').hide();
            $('#upcoming').show();
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('.modal-body .col-md-3').find('canvas').hide();
        // $('.modal-dialog').css('width','100% !important');
        $('.col-md-9').css('text-align', 'center !important');
        $('.modal-footer').css('text-align', 'center !important')
    });
    
</script>
@endpush
