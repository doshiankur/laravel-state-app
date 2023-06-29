@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Upcoming Events </h1>
    <ol class="breadcrumb">
        <li><a href="/laravel-state-app/webpanel/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/laravel-state-app/webpanel/upcoming_event"> Upcoming Events </a></li>
        <li class="active">Edit Events</li>
    </ol>

  
    {!! Form::model($upcoming_events, [
    'method' => 'PATCH',
    'url' => ['/webpanel/upcoming_event', $upcoming_events->id],
    'class' => 'form-horizontal', 'id'=>'upcoming_event'
    ]) !!}

    @include ('admin.upcomingevents.form', ['submitButtonText' => 'Update'])

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

      $('#upcoming_event').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strEventTitile': 'required',
                    'strLanguageCode': 'required',
                    'strEventDescription':'required',
                    'dtiEventDate':'required'

                   
                },
                messages: {
                    'strEventTitile': 'Events Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strEventDescription': 'Events Description is required',
                    'dtiEventDate' : 'Events Date is required.'
                   
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

