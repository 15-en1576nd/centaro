<a href="/board/{{$board->id}}">
    <button>terug</button>
</a>
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">
    <form action="/board/{{$board->id}}/category" method="post">
        @csrf

        <input type="text" name="name" placeholder="Name">
        <input type="color" name="color" placeholder="#000000">
        <input type="submit" value="add">

    </form>
</div>
<br><br>
<div style="width: 80%; flex-direction: row; display: flex">
@foreach($board->category->sortByDesc('created_at') as $category)
    <div style="display: flex;margin-inline: 4%; width: max-content; font-weight: bold; border-radius: 8%; border: 0.5px black solid; padding: 4px; display: flex; background: {{$category->color}}">

       {{$category->name}}
    </div>

@endforeach
</div>
