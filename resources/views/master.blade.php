<!doctype html>
<html>
<head>
    <script type='text/javascript' src="jquery-3.3.1.js"></script>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    function Save()
    {
        var name = $("#name").val();
        var surname = $("#surname").val();
        var mail = $("#mail").val();
        var telephone = $("#phone").val();

        $.ajax({
            url: "/insert",
            method: 'post',
            data: {
                name: $('#name').val(),
                surname: $('#surname').val(),
                mail: $('#mail').val(),
                telephone: $("#phone").val()
            },
            success: function(result){
                $("#response").html(result);
                $("#name").val("");
                $("#surname").val("");
                $("#mail").val("");
                $("#phone").val("");
                setTimeout(function(){$("#response").html("");},5000);

            }});
    }

    function DeleteEntry(x)
    {
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

        $.ajax({
            url: "/delete",
            method: 'post',
            data:
            {
                id:x
            },
            success: function()
            {
                location.href = "/manage/1";
            }});
    }
    </script>
</head>
<body>
<header>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Memo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar" >
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ Request::path() == 'newEntry' ? 'active' : '' }}"><a href="/newEntry">New Entry</a></li>
                <li class="{{ Request::path() == 'manage/1' ? 'active' : '' }}"><a href="/manage/1">Manage Entries</a></li>
            </ul>
            </div>
        </div>
        </nav>
</header>
<div class="container">
    @yield('content')
</div>
<footer class="navbar-fixed-bottom" style="background-color:grey;color:white;">
        <div class="footer-copyright text-center py-3">© 2019 Copyright: Memo</div>
</footer>
</body>
</html>
