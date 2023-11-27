<div
    class="w-128 scale-100  mx-auto  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none ">
    <input type="search" placeholder="Search place..." class="pka-input w-128" id="placekit" />
    <div class=" current-weather text-white flex items-center justify-between px-4 py-6">
        <div class="flex items-center">
            <div>
                <div class="font-semibold text-5xl">
                    {{ $current->temp_c }}°C
                </div>
                <div class="text-gray-400">Feels Like 5°C</div>
            </div>
            <div class="ml-5">
                <div class="font-semibold">
                    {{ $current->condition->text }}
                </div>
                <div class="text-gray-400">{{ $location->name . ' , ' . $location->region }}</div>
            </div>
        </div>
        <div>
            <img src="{{ $current->condition->icon }}" alt="">
        </div>
    </div>
    <ul
        class="future-weather dark:bg-gray-500/30 dark:bg-gradient-to-bl from-gray-800/30 px-4 py-6 text-white space-y-8">

        @foreach ($future as $item)
            @if ($loop->index != 0)
                <li class="grid grid-cols-weather items-center">
                    <div class="text-gray-400">
                        {{ \Carbon\Carbon::parse($item->date)->format('D') }}
                    </div>
                    <div class="flex items-center">
                        <div><img src="{{ $item->day->condition->icon }}" alt=""></div>
                        <div>{{ $item->day->condition->text }}</div>
                    </div>
                    <div class="text-right text-sm">
                        <div>{{ $item->day->mintemp_c }}°C</div>
                        <div>{{ $item->day->maxtemp_c }}°C</div>
                    </div>
                </li>
            @endif
        @endforeach

    </ul>
    <!-- end current weather-->

</div>
