@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1>Announcement List</h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/announcement')}}"> Announcement List </a></li>
        <li class="active">Edit New Announcement List</li>
    </ol>

    

    {!! Form::model($announcement, [
    'method' => 'PATCH',
    'url' => ['/webpanel/announcement', $announcement->id],
    'class' => 'form-horizontal','id'=>'announcement'
    ]) !!}

    @include ('admin.Announcement.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js')}}"></script>
<script type="text/javascript">
    $(function() {
   $('#datepicker').keypress(function(event) {
       event.preventDefault();
       return false;
   });
});
    $(document).ready(function(){
      var date = new Date();
      date.setDate(date.getDate());
      $('#datepicker').datepicker({
                        startDate: date,
                        autoclose: true,
                        locale: {
                            format: 'DD/MM/YYYY'
                        }
      });
    });
</script>
@endpush

@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#announcement').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strLanguageCode': 'required',
                    'str_content':'required',
                    'dtiEventDate':'required'
                    
                },
                messages: {
                    'strLanguageCode': 'Language Code is required',
                    'str_content':'Content is required',
                    'dtiEventDate':'Event Date is required'
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