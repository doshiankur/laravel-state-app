@extends('layouts.admin.adminlayout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Membership List </h1>
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
       {{Session::get('flash_message')}}
    </div>
@endif
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active">Membership List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-11"> 
                        <h3 class="box-title">Membership List</h3> | 
                         <h3 class="box-title">
                            <a href="{{ url('/webpanel/approverdmembership')}}/">Approved Membership List</a>
                        </h3> 
                    </div>
                </div>
                <!-- /.box-header -->
                <?php //echo "<pre>";print_r($member_data);exit;?>
                <div class="box-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr><th>Sr.No</th>
                            <th>File Number</th>
                            <th>Members Name</th>
                            <th>Mobile Number</th>
                            <!-- <th>Email ID</th>    -->                        
                            <th>Application Status</th>
                            <!--   <td>Status Code</td> -->
                             <th>Application Type</th>
                             <th>Submited Date</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                       @foreach($member_data as $item)
                     
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td>{{ $item->strMembershipID}}</td>
                            <td>{{ $item->strFirstName." ".$item->strLastName }}</td>
                            <td>{{ $item->intPhoneNumber }}</td>
                            <!-- <td>{{ $item->strEmail}}</td> -->
                          
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
                                        $application_status='Payment Success';        
                                   }
                                   else if($item->enmApplicationStatus=='8'){
                                        $application_status='Final attachment is yet to be uploaded';        
                                   }
                                ?>

                                {{ $application_status }}</td>
                                <!-- <td>{{$item->enmApplicationStatus}}</td> -->

                            <td>{{$item->strApplicationType}}</td>  
                            <td>{{date('d-m-Y',strtotime($item->dtiFinalSubmitDate))}}</td>  
                            <td>
                               <a href="{{ url('/webpanel/membership/view/' . $item->id) }}">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> View </button>
                                </a>  
                                 <!--  <?php 
                                if($item->applicationType==2 || $item->applicationType==4){?>
                                <a href="{{ url('/webpanel/membership/query/' . $item->id)}}" title="Query Membership"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Query </button></a>
                                <?php }?>                           
                                 -->
                             
                                {!! Form::close() !!}
                            </td>
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
<script type="text/javascript">
    $(document).ready(function() {
       $('#example').dataTable({
          'columnDefs': [ {
             'targets': [1,7], // column index (start from 0)
             'orderable': false, // set orderable false for selected columns
           }]
       });
    });
</script>
@endpush
