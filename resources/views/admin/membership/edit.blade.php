@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Membership Desk </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/dashboard')}}"> Membership Desk</a></li>
        <li class="active">Edit New Membership</li>
    </ol>

    {!! Form::model($membership, [
    'method' => 'PATCH',
    'url' => ['/webpanel/membership',
    $membership[0]->id],
    'class' => 'form-horizontal',
    'id'=>'membership',
    'files' => true
    ]) !!}

    @include ('admin.membership.form', ['submitButtonText' => 'Update'])

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

        var ov = '@php echo asset('public/upload/membership'); @endphp' + '/'+ $('#oldImage').val();
        //alert(ov);
        $('#img').attr('src',ov);

        $('#leaders').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strLeadersName': 'required',
                    'strLanguageCode': 'required',
                    'strDesignation':'required',

                    strLeadersPhoto:{ 
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strLeadersName': 'Leaders Name is required',
                    'strLanguageCode': 'Language Code is required',
                    'strDesignation': 'Leaders Messages is required',
                    
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