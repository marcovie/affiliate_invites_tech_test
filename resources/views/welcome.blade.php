<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Affiliate List</title>

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Affiliate id</th>
                <th scope="col">Name</th>
                <th scope="col">Distance Away</th>
                <th scope="col">latitude/longitude</th>
                <th scope="col">Google link</th>
            </tr>
            </thead>
            <tbody>
                @if (count($affiliateList))
                @foreach ($affiliateList as $affiliate)
                    <tr>
                        <td>{{ $affiliate->affiliate_id ?? 'N\A' }}</td>
                        <td>{{ $affiliate->name ?? 'N\A' }}</td>
                        <td>{{ $affiliate->distance ?? 'N\A' }} km</td>
                        <td>{{ $affiliate->latitude ?? 'N\A' }}, {{ $affiliate->longitude ?? 'N\A' }}</td>
                        @if (isset($affiliate->latitude, $affiliate->longitude))
                            <td><a href="https://www.google.com/maps/search/?api=1&query={{ $affiliate->latitude }}, {{ $affiliate->longitude }}" target="_blank" >{{ $affiliate->latitude }}, {{ $affiliate->longitude }}</a></td>
                        @else
                            <td>N\A</td>
                        @endif
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </body>
</html>
