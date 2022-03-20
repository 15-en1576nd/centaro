<a href="/boards/{{$board->id}}">
    <button>terug</button>
</a>

<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">
    <form method="post">
        @csrf
        <select name="type">
            <option value="-">-</option>
            <option value="+">+</option>
        </select>
        <select name="category">
            @foreach($board->categories as $category)
                <option value="{{$category->id}}" style="background: {{$category->color->hexcode}}">{{$category->name}}</option>
            @endforeach
            <option onclick="location.href=('/boards/{{$board->id}}/category')">Create</option>
        </select>
        <input type="number" step="0.1" name="value" placeholder="Amount. 10">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="file" placeholder="pdf, docx, png, jpeg" name="attachment">
        <input type="submit" value="add">

    </form>
</div>
<br><br>
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; font-weight: bold">
<div style="width: 100%;">Bedrag</div>
<div style="width: 100%;">Categorie</div>
<div style="width: 100%;">Omschrijving</div>
<div style="width: 50%;">Datum</div>
<div style="width: 25%;">Gebruiker:</div>
</div>
@forelse($board->records->sortByDesc('created_at') as $record)
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">

        <div style="width: 100%; font-weight: bold; color: @if($record->type == "-")indianred @elseif($record->type == "+") limegreen @endif;">{{$record->type . '€' . $record->value}},-</div>
        <div style="width: 100%; color: {{$record->category->color->code}}">{{$record->category->name}}</div>
        <div style="width: 100%; flex-wrap: wrap; font-weight: lighter">{{$record->title}}</div>
        <div style="width: 50%">{{$record->created_at->format('d/m/Y')}}</div>
        <div style="width: 25%">{{$record->user->name}}</div>
    </div>
@empty
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
        <p>Geen uitgaven/inkomsten gevonden.</p>
    </div>
@endforelse

