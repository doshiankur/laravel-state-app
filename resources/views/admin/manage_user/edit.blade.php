@extends('layouts.admin.adminlayout')
@section('content')
<section class="content-header">
    <h1> User Data </h1>
    <ol class="breadcrumb">
        <li><a href="{{asset('/webpanel/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="{{asset('/webpanel/manage_user')}}"> Manage User </a></li>
        <li class="active">Edit New User Informatrion</li>
    </ol>

    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br><br>

    {!! Form::model($getuser, [
    'method' => 'PATCH',
    'url' => ['/webpanel/manage_user', $getuser->id],
    'class' => 'form-horizontal'
    ]) !!}

    @include ('admin.manage_user.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

</section>

@endsection
