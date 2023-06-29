@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Program Calander </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/programcalender')}}">Program Calender</a></li>
        <li class="active">Edit New Leaders</li>
    </ol>

    {!! Form::model($programcalender, [
    'method' => 'PATCH',
    'url' => ['/webpanel/programcalender',
    $programcalender->id],
    'class' => 'form-horizontal',
    'id'=>'programcalender',
    'files' => true
    ]) !!}

    @include ('admin.programcalender.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
       

        $('#img').css('height','100');
        $('#img').css('width','100');

        var ov = '@php echo asset('public/upload/programcalender'); @endphp' + '/'+ $('#oldImage').val();
        //alert(ov);
        $('#img').attr('src',ov);

        $('#programcalender').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strMonths': 'required',
                    'strTitle': 'required',
                    'strLanguageCode':'required',

                    strLeadersPhoto:{ 
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strMonths': 'Month is required',
                    'strTitle': 'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    
                    strLeadersPhoto:{ 
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