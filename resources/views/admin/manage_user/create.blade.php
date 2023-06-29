@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> User Data </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/manage_user')}}"> Add New User </a></li>
        <li class="active">Create New User</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>
    {!! Form::open(['url' => '/webpanel/manage_user', 'class' => 'form-horizontal']) !!}

    @include ('admin.manage_user.form')

    {!! Form::close() !!}

</section>
@endsection
