<a href="/board/{{Session::get('currentboardid')}}">
    <button>terug</button>
</a>
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">
    <form action="/board/{{Session::get('currentboardid')}}/records" method="post">
        @csrf
        <select name="type">
            <option value="-">-</option>
            <option value="+">+</option>
        </select>
        <input type="number" name="value" placeholder="Amount. 10">
        <input type="text" name="title" placeholder="Title">
        <textarea name="discription" placeholder="Discription"></textarea>
        <input type="file" placeholder="pdf, docx, png, jpeg" name="attachment">
        <input type="submit" value="add">

    </form>
</div>
<br><br>
@foreach($board->manual_record->sortByDesc('created_at') as $record)
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">

        <div style="width: 100%">{{$record->type . '€' . $record->value}},-</div>
        <div style="width: 100%">{{$record->title}}</div>
        <div style="width: 100%; flex-wrap: wrap; font-weight: lighter">{{$record->discription}}</div>
        <div style="width: 50%">{{$record->created_at->format('m/d/Y')}}</div>
    </div>

@endforeach
