@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Program Calender  </h1>
    <ol class="breadcrumb">
        <li><a href="/laravel-state-app/webpanel/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="/laravel-state-app/webpanel/programcalender"> Program Calender  </a></li>
        <li class="active">Create New</li>
    </ol>

    {!! Form::open(['url' => '/webpanel/programcalender',
                    'class' => 'form-horizontal',
                    'id'=>'progamcalender']) !!}

    @include ('admin.programcalender.form')

    {!! Form::close() !!}
   

</section>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js')}}"></script>
<script type="text/javascript">
// $(function() {
//    $('#datepicker').keypress(function(event) {
//        event.preventDefault();
//        return false;
//    });
// });

// $(document).ready(function(){
//      var date = new Date();
//       date.setDate(date.getDate());
//       $('#datepicker').datepicker({
//                         startDate: date,
//                         locale: {
//                             format: 'DD-MM-YYYY'
//                         }
//       });

      $('#progamcalender').validate({
                debug: false,
                errorClass: "help-block",                
                ignore: 'input:hidden:not(input:hidden.required)',
                errorElement: "p",
                rules: {
                    'strTitle': 'required',
                    'strLanguageCode': 'required',
                    'strMonths':'required',
                    'dtiEventDate':'required'

                   
                },
                messages: {
                    'strTitle': 'Events Title is required',
                    'strLanguageCode': 'Language Code is required',
                    'strMonths': 'Events Description is required',
                    'dtiEventDate' : 'Events Date is required.'
                   
                },
            highlight: function(element, errorClass,errorElement) {
                $(element).removeClass(errorClass);
            },
            submitHandler: function(form) {
                form.submit();
            }
         });
    //});
</script>
@endpush