@extends('layouts.admin.adminlayout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Approved Membership List </h1>
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
       {{Session::get('flash_message')}}
    </div>
@endif
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active">Approved Membership List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                     <div class="box" style="border-top:none">
                        <div class="box-header with-border">
                          <div class="col-xs-11"> 
                            <h3 class="box-title"><a href="{{ url('/webpanel/membership')}}">Membership List</a></h3> | <h3 class="box-title">Approved Membership List</h3> 
                              <h4>FILTER BY DATE</h4>
                                 {!! Form::open(['url' => '/webpanel/approverdmembership/exportcsv',
                                 'id'=>'exportcsv', 'class' => 'form-horizontal']) !!}
                              <div class="">
                                {!! Form::label('dtiCreated', 'From: ', ['class' => '', 'style' => 'float:left']) !!}
                                <div class="col-sm-3">
                                    <input type="text" value="" autocomplete="off" name="from" class="form-control required" id="from" data-date-format="dd/mm/yyyy">
                                </div>
                                {!! Form::label('dtiCreated', 'To: ', ['class' => '', 'style' => 'float:left']) !!}
                                <div class="col-sm-3">
                                    <input type="text" value="" name="to" autocomplete="off" class="form-control required" id="to" data-date-format="dd/mm/yyyy">
                                </div>
                              </div>
                              <div class="" style="margin:15px">
                                <input type="submit" value="Export Xlsx" name="export" id="export" class="btn btn-success btn-sm float-right" title="Export Data">                            
                              </div>

                             {!! $errors->first('dtBirth', '<p class="help-block">:message</p>') !!}
                            {!! Form::close() !!}
                         </div>
                       </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>File Number</th>
                            <th>Members Name</th>
                            <th>Mobile Number</th>
                            <!--<th>Email ID</th>                          
                            <th>Application Status</th> 
                            <td>Status Code</td> -->
                             <th>Application Type</th>
                             <th>Total Amount</th>
                             <th>Submited Date</th>
                             <th>Approved Date</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($member_data as $item)
                        <tr>
                            <td>{{ $item->strMembershipID }}</td>
                            <td>{{ $item->strFirstName." ".$item->strLastName }}</td>
                            <td>{{ $item->intPhoneNumber }}</td>
                            <!-- <td>{{ $item->strEmail}}</td> -->
                          <!-- 
                            <td>
                                <?php 
                                   if($item->enmApplicationStatus=='2'){
                                        $application_status='Your file inProcess';        
                                   }
                                   else if($item->enmApplicationStatus=='3'){
                                        $application_status='Query';        
                                   }
                                   else if($item->enmApplicationStatus=='4'){
                                        $application_status='Query Replied';        
                                   }else if($item->enmApplicationStatus=='5'){
                                        $application_status='Verify';        
                                   }
                                   else if($item->enmApplicationStatus=='6'){
                                        $application_status='Payment Due';        
                                   }
                                ?>

                                {{ $application_status ?? ''}}</td>  -->
                                <!-- <td>{{$item->enmApplicationStatus}}</td> -->

                            <td>{{$item->strApplicationType}}</td> 
                            <td>{{$item->strDepositAmount+$item->strSmartCardFees}}</td> 
                            <td>{{date('d-m-Y',strtotime($item->dtiFinalSubmitDate))}}</td> 
                            <td>{{date('d-m-Y',strtotime($item->dtiApprovalDate))}}</td>                            
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
  </section>
    <!-- /.content -->
@endsection
@push('scripts')

<script type="text/javascript" src="{{ URL::to('public/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
  $.validator.addMethod("greaterThan", 
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) > Number($(params).val())); 
},'Must be greater than Form Date.');


$(function() {
   $('#to','#from').keypress(function(event) {
       event.preventDefault();
       return false;
   });
}); 

    $(document).ready(function() {
        $('#example').DataTable();
        //$('#exportcsv').validate();
        $("#exportcsv").validate({
         rules: {
             to: { 
              greaterThan: "#from"
             }
         }
    });

     var date = new Date();
     date.setDate(date.getDate());
     $('#from').datepicker({
          //startDate: date,
          locale: {
            format: 'DD-MM-YYYY'
          },
     });

   var selected='';
   $("#from").on("change",function(){
       selected = $("#from").val();
       $("#to").val('');
       $("#to").datepicker({
       // startDate:selected,
            locale: {
                 format: 'DD-MM-YYYY'
            }
        });           
    });
});
</script>
@endpush