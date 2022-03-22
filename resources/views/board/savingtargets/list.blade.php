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
<a href="/boards/{{$board->id}}/savingtargets">
    <button>terug</button>
</a>

<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">
    <form method="post">
        @csrf


        <input type="number" step="0.1" name="value" placeholder="Amount. 10">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="date" name="deadline">
        <select name="color">
            @foreach($colors as $color)
                <option value="{{$color->id}}" style="background: {{$color->code}}">{{$color->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="add">

    </form>
</div>
<br><br>
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; font-weight: bold">
    <div style="width: 100%;">Title:</div>
    <div style="width: 100%;">Description:</div>
    <div style="width: 100%;">Value:</div>
    <div style="width: 50%;">Status:</div>
    <div style="width: 25%;">User:</div>
</div>
@forelse($board->savingtargets as $savingtarget)
    <div style="background: {{$savingtarget->color->code}}; color: white; border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">

        <div style="width: 100%; font-weight: bold; ">{{'€' . $savingtarget->value}},-</div>
        <div style="width: 100%;">{{$savingtarget->name}}</div>
        <div style="width: 100%;">{{floor($total / $savingtarget->value * 100)}}%</div>
        <div style="width: 100%; flex-wrap: wrap; font-weight: lighter">{{$savingtarget->title}}</div>
    </div>
@empty
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
        <p>Geen spaardoelen gevonden.</p>
    </div>
@endforelse



</body>
</html>
