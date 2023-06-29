@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Leaders Desk </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/leaders')}}"> Leaders Desk</a></li>
        <li class="active">Edit New Leaders</li>
    </ol>

    {!! Form::model($leadersDesk, [
    'method' => 'PATCH',
    'url' => ['/webpanel/leaders',
    $leadersDesk->id],
    'class' => 'form-horizontal',
    'id'=>'leaders',
    'files' => true
    ]) !!}

    @include ('admin.leaders.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');
      
        CKEDITOR.replace('editor1');
         $('#img').css('height','100');
        $('#img').css('width','100');

        var ov = '@php echo asset('public/upload/leaders'); @endphp' + '/'+ $('#oldImage').val();
        //alert(ov);
        $('#img').attr('src',ov);



        $('#leaders').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules:{
                    'strLeadersName': 'required',
                    'strLanguageCode': 'required',
                    'strDesignation':'required',
                    'strPlace':'required', 
                    'strPageName':'required',
                    'intDisplay':'required',
                    strLeadersPhoto:{ 
                       // required:true,
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strLeadersName':'Leaders Name is required',
                    'strLanguageCode': 'Language Code is required',
                    'strDesignation': 'Leaders Messages is required',
                    'strPlace':'Leaders Place is required',
                    'strPageName':'Page Name is required',
                    'intDisplay':'Leaders Order is required',
                    strLeadersPhoto:
                    { 
                        //required:'Photo Image is required',
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
@endpush