@foreach($board->manual_record as $record)
   Naam: {{$record->name}} {{$record->type . $record->value}}
@endforeach
