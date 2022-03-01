<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
You're logged in! <br> <p style="font-weight: bold"> Welcome, {{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
<table>
    <tr style="flex-direction: column; display: flex">
        <td>Your unique user id: {{Auth::user()->id}}</td>
        <td>First Name: {{Auth::user()->name}}</td>
        <td>Surname: {{Auth::user()->surname}}</td>
        <td>Email: {{Auth::user()->email}}</td>
        <td>Role id: {{Auth::user()->role_id}}</td>
    </tr>
</table>
@if(isset(Auth::user()->preference))
    Lang:
{{Auth::user()->preference->lang}}
    Valuta:
{{Auth::user()->preference->valuta}}
@endif
</body>
</html>

