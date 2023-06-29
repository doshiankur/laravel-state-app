@extends('layouts.admin.adminlayout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Partners List </h1>
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
       {{Session::get('flash_message')}}
    </div>
@endif
    <ol class="breadcrumb">
        <li><a href="{{asset('webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active">Partners List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-11"> <h3 class="box-title">Partners List</h3> </div>
                    <div class="float-right">
                        <a href="{{ url('/webpanel/partners/create') }}" class="btn btn-success btn-sm float-right" title="Add  Partners">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Partners URL</th>
                            <th>Partners Logo</th>
                            <th>Language Code</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($partners as $item)
                        <tr>
                            <td> {{ $item->strPartnerURL }} </td>
                            <td>{{ $item->strPartnerLogo }}</td>
                            <td>{{ $item->strLanguageCode }}</td>
                            <td>
                                <a href="{{ url('/webpanel/partners/' . $item->id . '/edit') }}" title="Edit Partners"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  </button></a>
                                {!! Form::open([
                                'method' => 'DELETE',
                                'url' => ['/webpanel/partners', $item->id],
                                'style' => 'display:inline'
                                ]) !!}

                               {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                'type' => 'submit',
                                'title' => 'Delete Partners',
                                'class' => 'btn btn-danger btn-sm',
                               
                                )) !!}
                                {!! Form::close() !!}

                                <div id="status_div_{{ $item->id }}" style="display: inline-block;">
                                    @if($item->enmStatus == 1)
                                    <a id="btnactive_{{ $item->id }}" title="Active Partners" class="btn btn-info btn-sm" 
                                    onclick="javascript:ChangeStatus('<?php echo $item->id;?>',0)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @elseif($item->enmStatus == 0)
                                    <a id="btnactive_{{ $item->id }}" title="Inactive Partners" class="btn btn-info btn-sm" 
                                    onclick="javascript:ChangeStatus('<?php echo $item->id;?>',1)"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    @endif
                               </div>
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
         $('#example').DataTable({
          'columnDefs': [ {
             'targets': [3], // column index (start from 0)
             'orderable': false, // set orderable false for selected columns
           }]
       });
    } );
    function ChangeStatus(id, status) {
       // alert("hello");
        $.ajax({
            url: '{{ asset("/webpanel/changepartnersstatus") }}',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: id, status: status},
            dataType: "json",
            success: function (result) {
                if (result == 1) {
                    var htm = '<a id="btnactive_' + id + '" title="Active Partners" class="btn btn-info btn-sm" onclick="javascript:ChangeStatus(' + id + ',0)"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                } else if (result == 0) {
                    var htm = '<a id="btnactive_' + id + '" title="Inactive Partners" class="btn btn-info btn-sm" onclick="javascript:ChangeStatus(' + id + ',1)"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>';
                }
                $('#status_div_' + id).html(htm);
            }
        });
    }
</script>
@endpush