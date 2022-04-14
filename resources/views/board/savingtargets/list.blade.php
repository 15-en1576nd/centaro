@extends('parts.board')
@section('title', 'Boards')
@section('content')
    <div class="flex p-3 rounded-md justify-between bg-zinc-900 w-full text-center">
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets">Back</a>
        <div class="text-3xl text-white w-full justify-center flex flex-nowrap space-x-4">
            Savingtargets</div>
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets/create">Create</a>
        </div>
    </div>
{{--    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">--}}
{{--        <form method="post">--}}
{{--            @csrf--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="number" step="0.1" name="value"--}}
{{--                   placeholder="Amount. 10">--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="text" name="title" placeholder="Title">--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="text" name="description" placeholder="Description">--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="date" name="deadline">--}}
{{--            <select class="text-gray-900 placeholder-gray-600" name="color">--}}
{{--                @foreach($colors as $color)--}}
{{--                    <option value="{{$color->id}}" style="background: {{$color->code}}">{{$color->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <input type="submit" value="add">--}}

{{--        </form>--}}
{{--    </div>--}}
    <br><br>
    <div class="flex flex-wrap flex-row justify-center">
        @forelse($board->savingtargets as $savingtarget)
            <div
                class="w-1/4 flex-wrap m-3 p-4 text-white bg-zinc-900 border-l-4 border-emerald-700 rounded-lg">
                <div class="flex items-center">
                    <div class="icon w-14 p-3.5 bg-emerald-700 text-white rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="2">
                           {!! $savingtarget->icon->svg !!}
                            </svg>
                    </div>
                    <div class="flex flex-col justify-center w-full">
                        <div class="text-lg justify-between flex flex-row">
                            <a class="hover:underline cursor-pointer" href="{{ route('boards.savingtargets.show', ['board' => $board, 'boardsavingtarget' => $savingtarget->id])}}">{{$savingtarget->name}}</a>
                           <div class="flex flex-row space-x-1">
                            <a href="/boards/{{$board->id}}/savingtargets/{{$savingtarget->id}}/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex justify-end hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            </a>
                            <a href="" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                               <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                   <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                       <!-- Modal content -->
                                       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                           <!-- Modal header -->
                                           <div class="flex justify-end p-2">
                                               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                                   <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                               </button>
                                           </div>
                                           <!-- Modal body -->
                                           <div class="p-6 pt-0 text-center">
                                               <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                               <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Do you want to delete this savingtarget?</h3>
                                               <div class="justify-center flex flex-row">
                                               <form method="post" action="{{ route('boards.savingtargets.destroy', ['board' => $board, 'boardsavingtarget' => $savingtarget]) }}">
                                               @csrf
                                                   @method('DELETE')
                                                   <button type="submit" data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                   Yes, I'm sure
                                               </button>
                                                   </form>
                                               <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                           </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                           </div>
                        </div>
                        <div class="text-sm text-emerald-500">Goal: €{{$savingtarget->value}}</div>
                        <div class="text-sm text-red-500">To go: @if($savingtarget->value > $total)
                                €{{$savingtarget->value - $total}}
                            @else
                                €0

                            @endif </div>

                        <div
                            class="text-sm text-gray-500">@if((new DateTime()) < (new DateTime($savingtarget->deadline)))
                                Finishes
                                over: {{$daycount = (new DateTime())->diff(new DateTime($savingtarget->deadline))->days}} @if($daycount > 1 )
                                    days @else day @endif
                            @elseif((new DateTime())->diff(new DateTime($savingtarget->deadline))->days = 0 )
                                Passed today!
                            @else


                                Passed {{$daycount = (new DateTime())->diff(new DateTime($savingtarget->deadline))->days}} @if($daycount > 1 )
                                    days @else day @endif ago!
                            @endif
                        </div>
                        <div class="relative flex bottom w-full bg-gray-900 rounded-full dark:bg-gray-200">
                            <div
                                style="width: @if($total < $savingtarget->value){{$progress = floor($total / $savingtarget->value * 100)}}@else{{$progress = 100}}@endif%"
                                class="absolute bg-blue-600 text-xs font-medium text-blue-100 text-center p-3 leading-none rounded-full"
                            >
                            </div>
                            <div class="z-10 relative w-full outline-none text-center">{{$progress}}%</div>
                        </div>
                    </div>

                </div>

            </div>
        @empty
            <div
                style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
                <p>No savingtargets found!</p>

            </div>
        @endforelse
    </div>
@endsection
