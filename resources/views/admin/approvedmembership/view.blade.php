@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> Membership Users </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/approvedmembership')}}"> Membership Users </a></li>
        <li class="active">View</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>   

<style type="text/css">
    .form-control{
      background-color: #a33325ba;
    color: white;
    font-weight: bold;
    font-size: 18px;
    display: flex;
    align-items: center;
    border: 2px solid #222d32;
    }
</style>
    <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      
        <!-- /.box-header -->
        <!-- form start -->
        <div class="form-horizontal">
            <div class="box-body">
                <h1 class="form-control">Personal Details</h1>
                   
        <!--   <?php if($memebrsip_getdata->enmApplicationStatus==2 || $memebrsip_getdata->enmApplicationStatus==4){?>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        <a href="{{ url('/webpanel/membership/status/'.$memebrsip_getdata->id)}}" title="Accept Application" class="btn btn-warning"><i class="fa " aria-hidden="true"></i> Accept Application</a>
                    </div>
                </div>
            </div>
          <?php }?>    -->       
                <div class="form-group">
                    {!! Form::label('name', 'MembershipID: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strMembershipID }}</div>
                </div>


                <div class="form-group">
                    {!! Form::label('name', 'Name: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strFirstName }}</div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'Middle Name: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strMiddleName }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Last Name: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strLastName }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Current Address: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strCurrentAddress }}
                    </div>
                </div>

                 <div class="form-group">
                    {!! Form::label('email', 'Permant Address: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strPermantAddress }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Work Address: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strWorkAddress }}
                    </div>
                </div>
                             
                <div class="form-group">
                    {!! Form::label('email', 'Date Of Birth: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ date('d-m-Y',strtotime($memebrsip_getdata->dtiDOB))}}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Phone Number: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->intPhoneNumber }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strEmail }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'ID Proof Type: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strIDProofType }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', "User IDProof: ", ['class' => 'col-sm-2']) !!}
                      <div class="col-sm-8">
                         <a target="_blank" 
                         href="{{ URL::to('/public/upload/membership/').'/'.$memebrsip_getdata->strIDProof}}">
                         {{ $memebrsip_getdata->strIDProof}}</a>
                    </div>
                </div>  

                 <div class="form-group">
                    {!! Form::label('email', 'Issuing Book: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->intIssuingBook }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Application Type: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strApplicationType }}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Guarantor Current Address: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strGuarantorCurrentAddress }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Guarantor Perment Address: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strGuarantorPermentAddress }}
                    </div>
                </div>

                  <div class="form-group">
                    {!! Form::label('email', 'Guarantor Work Address: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strGuarantorWorkAddress }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Guarantied Details: ', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-8">{{ $memebrsip_getdata->strGuarantiedDetails}}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', "User Photo: ", ['class' => 'col-sm-2']) !!}
                      <div class="col-sm-8">
                         <a target="_blank" 
                         href="{{ URL::to('/public/upload/membership/').'/'.$memebrsip_getdata->strPhoto}}">
                         {{ $memebrsip_getdata->strPhoto}}</a>
                     </div>
                </div>  
                <div class="form-group">
                    {!! Form::label('email', "User Signed: ", ['class' => 'col-sm-2']) !!}
                      <div class="col-sm-8">
                         <a target="_blank" 
                         href="{{ URL::to('/public/upload/membership/').'/'.$memebrsip_getdata->strSigned}}">
                         {{ $memebrsip_getdata->strSigned}}</a>
                    </div>
                </div> 


                  <div class="form-group">
                    {!! Form::label('email', "Final Submit Copy: ", ['class' => 'col-sm-2']) !!}
                      <div class="col-sm-8">
                         <a target="_blank" 
                         href="{{ URL::to('/public/upload/membership/').'/'.$memebrsip_getdata->strFinalScan}}">
                         {{ $memebrsip_getdata->strFinalScan}}</a>
                      </div>   
                </div>

                <div class="form-group">
                    {!! Form::label('email', "Final Submit Date: ", ['class' => 'col-sm-2']) !!}
                      <div class="col-sm-8">{{ date('d-m-Y',strtotime($memebrsip_getdata->dtiFinalSubmitDate))}}</div>
                </div>              




         <?php if($memebrsip_getdata->enmApplicationStatus==2 || $memebrsip_getdata->enmApplicationStatus==4){?>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        <a href="{{ url('/webpanel/membership/query/' . $memebrsip_getdata->id)}}" title="Query Application" class="btn btn-warning"><i class="fa " aria-hidden="true"></i>Query</a>
                   
                        <a href="{{ url('/webpanel/membership/verify/'.$memebrsip_getdata->id)}}" title="Verify Application" class="btn btn-success"><i class="fa " aria-hidden="true"></i>Verify</a>
                    </div>
                </div>

            </div>

          <?php }elseif($memebrsip_getdata->enmApplicationStatus==6){?>
               
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">                   
                        <a href="{{ url('/webpanel/membership/status/'.$memebrsip_getdata->id)}}" title="Verify Application" class="btn btn-success"><i class="fa " aria-hidden="true"></i>Approved</a>
                    </div>
                </div>
            </div>
          <?php }?>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 text-right">
                        <a href="{{ url('/webpanel/membership') }}" title="Cancel" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Main List</a>
                    </div>
                </div>
            </div>
          
            </div>
        </div>
    </div>
</div>
</section>
@endsection