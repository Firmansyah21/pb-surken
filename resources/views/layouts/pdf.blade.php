<!DOCTYPE html>
<html>
<head>
<style>
#pdf {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#pdf td, #pdf th {
  border: 1px solid #ddd;
  padding: 8px;
}

#pdf tr:nth-child(even){background-color: #f2f2f2;}

#pdf tr:hover {background-color: #ddd;}

#pdf th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #092635;
  color: white;
}
.title{
    text-align: center;
    font-family: 'Poppins', sans-serif;
}
</style>
</head>
<body>

<h2 class="title">@yield('title')</h2>

<table id="pdf">

    @yield('pdf')

</table>

</body>
</html>
