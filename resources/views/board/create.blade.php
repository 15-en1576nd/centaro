<form action="{{ route('board.store') }}" method="post" >
@csrf
    <input type="text" name="name" placeholder="name">
    <select name="type">
        <option value="team">team</option>
        <option value="personal">personal</option>
    </select>
    <input type="submit" value="create">
</form>

