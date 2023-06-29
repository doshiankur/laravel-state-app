@extends('layouts.app')
@section('forbiden')
<main class="py-4">
    <div class="notFound">
        <a href="/statelibrary" class="logo"><img src="{{ URL::to('public/images/logo.png')}}" alt=""></a>
        <div class="foundMsg">
            <span>404</span>
            Page not found
        </div>
        <a href="/statelibrary" class="btnCss">Go Home</a>
    </div>
</main>

<style>
    /* Page Not found */
    .notFound {padding:50px 20px 20px; text-align: center;}
    .notFound .logo {margin-bottom: 40px;}

    .foundMsg {font-size: 20px; line-height: 66px; padding-bottom: 20px;}
    .foundMsg span {font-size: 100px; display: block;  color: #21a357; }

    .btnCss {
        color: #21a357 !important;  font-size: 18px; font-family: 'montserratmedium', sans-serif; font-weight: 400; border: 0 !important; line-height: normal; background-color: #ffffff; padding: 15px 32px; display: inline-block;
        -webkit-border-radius: 28px !important; -moz-border-radius: 28px !important; border-radius: 28px !important;
        -webkit-box-shadow: 0 2px 4px 0 #979797; -moz-box-shadow: 0 2px 4px 0 #979797; box-shadow: 0 2px 4px 0 #979797;}
    .btnCss:hover {background-color: #21a357 !important; color: #fff !important;}

</style>
@endsection