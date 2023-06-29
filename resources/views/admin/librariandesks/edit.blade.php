@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Librarian Desk </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/librarian_desk')}}"> Librarian Desk</a></li>
        <li class="active">Edit New Librarian</li>
    </ol>

    {!! Form::model($librarianDesk, [
    'method' => 'PATCH',
    'url' => ['/webpanel/librarian_desk',
    $librarianDesk->id],
    'class' => 'form-horizontal',
    'id'=>'librarindesk',
    'files' => true
    ]) !!}

    @include ('admin.librariandesks.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection


@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');
      
        CKEDITOR.replace('editor1');
         $('#img').css('height','100');
        $('#img').css('width','100');

        var ov = '@php echo asset('public/upload/librarian'); @endphp' + '/'+ $('#oldImage').val();
        //alert(ov);
        $('#img').attr('src',ov);



        $('#librarindesk').validate({
                 debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strLibrarianFrom': 'required',
                    'strLanguageCode': 'required',
                    'strLibraryMessage': 'required',
                    'strPhoto':{ 
                        extension:'png|jpe?g|gif',
                        //filesize: 1048576,
                        filesize:2097152
                    }
                },
                messages: {
                   'strLibrarianFrom': 'Librarian From is required',
                    'strLanguageCode': 'Language Code is required',
                    'strLibraryMessage': 'Librarian Messages is required',
                     'strPhoto':
                    { 
                        //required:'Photo Image is required',
                        extension:'File must be JPG, GIF or PNG, less than 2MB',
                        filesize: 'File must be  less than 1MB',
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
</script>
@endpush