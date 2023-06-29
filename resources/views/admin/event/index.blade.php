@extends('layouts.admin.adminlayout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Event </h1>

    @if(Session::has('flash_message'))
    <div class="alert alert-success">
       {{Session::get('flash_message')}}
    </div>
    @endif

    <ol class="breadcrumb">
        <li><a href="{{ asset('/webpanel/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class="active">Event</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-11"> <h3 class="box-title">Event List</h3> </div>
                    <div class="float-right">
                        <a href="{{ url('/webpanel/event/create') }}" class="btn btn-success btn-sm float-right" title="Add Event">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>

                </div>
                <div class="box-body">
                    <table id="Event" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                          
                            <th>Venue</th>
                            
                            <th>Image</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($event))
                        @foreach($event as $item)
                        <tr id="tablerow_{{ $item->id }}">
                            <td> {{ $item->strName }} </td>
                           
                            <td>{{ $item->txtVenue }}</td>
                            @php
                                if($item->strCategory == '1'){
                                    $category = 'Celebration';
                                }elseif($item->strCategory == '2'){
                                    $category = 'Competition';
                                }elseif($item->strCategory == '3'){
                                    $category = 'Awards Ceremony';
                                }elseif($item->strCategory == '4'){
                                    $category = 'Ceremony';
                                }elseif($item->strCategory == '5'){
                                    $category = 'Seminar';
                                }
                            @endphp
                          
                            <td>
                                @if(isset($event))
                                <img src="{{URL::asset('public/upload/Event/'.$item->strImg) }}" width="50px" height="50px">
                               
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/webpanel/event/' . $item->id . '/edit') }}" title="Edit Event"> <button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                {!! Form::open([
                                'method' => 'DELETE',
                                'id'=>'deleteEvent',
                                'url' => ['/webpanel/event', $item->id],
                                'style' => 'display:inline'
                                ]) !!}

                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                'type' => 'submit',
                                'title' => 'Delete Event',
                                'class' => 'btn btn-danger btn-sm',
                                    
                                )) !!}
                                {!! Form::close() !!}
                                <div id="status_div_{{ $item->id }}" style="display: inline-block;">
                                    @if($item->enmStatus == 1)
                                    <a id="btnactive_{{ $item->id }}" title="Active Event" class="btn btn-info btn-sm" onclick="javascript:ChangeStatus('<?php echo $item->id;?>',0)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @elseif($item->enmStatus == 0)
                                    <a id="btnactive_{{ $item->id }}" title="Inactive Event" class="btn btn-info btn-sm" onclick="javascript:ChangeStatus('<?php echo $item->id;?>',1)"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    @endif
                                </div>
                                @php $url = '/webpanel/eventgallery/' . $item->id; $title = 'Add Event Gallery'; @endphp
                                <a href="{{ url($url) }}" title="{{ $title }}"> <button class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"> Add Event Gallery</i></button></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
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
        $('#Event').DataTable({
          'columnDefs': [ {
             'targets': [3], // column index (start from 0)
             'orderable': false, // set orderable false for selected columns
           }]
       });
    } );
    function ChangeStatus(id, status) {
        $.ajax({
            url: '{{ asset("/webpanel/changeeventstatus") }}',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: id, status: status},
            dataType: "json",
            success: function (result) {
                if (result == 1) {
                    var htm = '<a id="btnactive_' + id + '" title="Active Event" class="btn btn-info btn-sm" onclick="javascript:ChangeStatus(' + id + ',0)"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                } else if (result == 0) {
                    var htm = '<a id="btnactive_' + id + '" title="Inactive Event" class="btn btn-info btn-sm" onclick="javascript:ChangeStatus(' + id + ',1)"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>';
                }
                $('#status_div_' + id).html(htm);
            }
        });
    }
</script>
@endpush
