@extends("master")

@section("content")
<div class="container">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <center><h3>New entry Form</h3></center>
        <table class="table">
            <tr><td>Name:</td><td><input type="text" class="form-control" id="name" placeholder="insert name here..."></td></tr>
            <tr><td>Surname:</td><td><input type="text" class="form-control" id="surname" placeholder="insert surname here..."></td></tr>
            <tr><td>Email:</td><td><input type="text" class="form-control" id="mail" placeholder="insert mail here..."></td></tr>
            <tr><td>Telephone:</td><td><input type="text" class="form-control" id="phone" placeholder="insert phone here..."></td></tr>
        </table>
        <div>
        <center><button class="btn btn-success" onclick="Save()">Save</button></center>
        </div>
        <div style="text-align:center;" id="response">
        </div>
    <div class="col-sm-3"></div>
</div>
@endsection
