@extends('master')

@section('content')
<div class="container">
    <div class='col-sm-4'></div>
    <div class='col-sm-4'><center><h3>My Memo</h3></center></div>
    <div class='col-sm-4'></div>
</div>
<div class="container">
    <div class='col-sm-4'></div>
    <div class='col-sm-4'>
        {!!$response!!}
        <br><br>
        <center>{!!$pages!!}</center>
    </div>
    <div class='col-sm-4'></div>
</div>

@endsection
