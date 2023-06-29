@extends('layouts.admin.adminlayout')
@section('title', 'dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Dashboard </h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua hide">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <!-- /.row -->
</section>
@endsection