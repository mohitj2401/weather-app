<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class=" min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">



    <div class="mt-8">

        {{-- {{ dd($location) }} --}}

        <x-weather-widget :location="$location" :current="$current" :future="$forecast"></x-weather-widget>

    </div>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@placekit/autocomplete-js@2.1.1/dist/placekit-autocomplete.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@placekit/autocomplete-js@2.1.1"></script>
    <script>
        const pka = placekitAutocomplete("{{ config('services.placekit.key') }}", {
            target: '#placekit',
            // other options...
        })
        try {
            pka.requestGeolocation({
                timeout: 10000
            }).then((pos) => console.log(pos.coords)).err((res) => console.log(res));

        } catch (err) {
            console.log("Location Permission is not given");
        }

        pka.
        on('pick', (value, item, index) => {
            // console.log(value);
            window.location = "/?coords=" + item.coordinates;
        });
    </script>

</body>

</html>
