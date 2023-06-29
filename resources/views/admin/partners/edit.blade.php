@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Partners Desk </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/partners')}}"> Partners Desk</a></li>
        <li class="active">Edit New Partners</li>
    </ol>

    {!! Form::model($partnersDesk, [
    'method' => 'PATCH',
    'url' => ['/webpanel/partners',
    $partnersDesk->id],
    'class' => 'form-horizontal',
    'id'=>'partners',
    'files' => true
    ]) !!}

    @include ('admin.partners.form', ['submitButtonText' => 'Update'])

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

        var ov = '@php echo asset('public/upload/partners'); @endphp' + '/'+ $('#oldImage').val();
        //alert(ov);
        $('#img').attr('src',ov);



        $('#partners').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strPartnerURL': 'required',
                    'strLanguageCode': 'required',
                    strPartnerLogo:{ 
                     
                        extension:'png|jpe?g|gif',
                        filesize: 1048576,
                    }
                },
                messages: {
                    'strPartnerURL':'Partner Name is required',
                    'strLanguageCode': 'Language Code is required',
                    strPartnerLogo:
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
@endpush