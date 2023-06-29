@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> MissionVisions</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('webpanel/missionvisions')}}"> MissionVisions Desk</a></li>
        <li class="active">Edit New MissionVisionsers</li>
    </ol>

    {!! Form::model($mission, [
    'method' => 'PATCH',
    'url' => ['/webpanel/missionvisions',
    $mission->id],
    'class' => 'form-horizontal',
    'id'=>'missionvisions',
    'files' => true
    ]) !!}

    @include ('admin.missionvission.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/additional-methods.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#missionvisions').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strMissionVission':'required',
                    'strPageName':'required',
                    strLeadersPhoto:{ 
                        required:true,
                        extension:'png|jpe?g|gif',
                        filesize: 1048576
                    }
                },
                messages: {
                    'strTitle':'Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strMissionVission': 'Description is required',
                    'strPageName':'Page Name is required'
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