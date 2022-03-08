<form method="post" action="{{route('boards.store')}}">
    @csrf
    <input type="text" name="name" placeholder="name">
    <select name="type">
        <option value="team">team</option>
        <option value="personal">personal</option>
    </select>
    <input type="submit" value="create">
</form>

