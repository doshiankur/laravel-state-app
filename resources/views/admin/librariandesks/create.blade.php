@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Librarian  </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/librarian_desk')}}"> Librarian  </a></li>
        <li class="active">Create New</li>
    </ol>

  
    {!! Form::open(['url' => '/webpanel/librarian_desk', 
         'files' => true,'class' => 'form-horizontal',
         'id'=>'librarindesk',
         'enctype'=>'multipart/form-data']) !!}

    @include ('admin.librariandesks.form')

    {!! Form::close() !!}

</section>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace('editor1');
        $('#librarindesk').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strLibrarianFrom': 'required',
                    'strLanguageCode': 'required',
                    'strLibraryMessage':'required',

                    strPhoto:{ 
                        required:true,
                        extension:'png|jpe?g|gif',
                        //filesize: 1048576
                        filesize:2097152
                    }
                },
                messages: {
                    'strLibrarianFrom': 'Librarian From is required',
                    'strLanguageCode': 'Language Code is required',
                    'strLibraryMessage': 'Librarian Messages is required',
                    strPhoto:
                    { 
                        required:'Photo Image is required',
                        extension:'File must be JPG, GIF or PNG, less than 2MB'
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