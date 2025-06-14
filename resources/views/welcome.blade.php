<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.2/css/bootstrap.css') }}">
    <script src="{{ asset('assets/swalert/alert.js') }}"></script>
    <title>Consumo de API</title>
</head>

<body>
    <div class="container py-4">

        <div class="row mb-4">
            <div class="col-md-6">
                <form action="" class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar..."
                        aria-label="Campo de pesquisa">
                    <button class="btn btn-outline-primary" type="button">Buscar</button>
                </form>
            </div>
        </div>


        <div class="row g-3">
            @for ($i = 0; $i < count($data); $i++)
                <div class="col-6">
                    <div class="card" style="">
                        <div class="card-header">
                            Id: {{ $data[$i]['id'] }}
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <img class="img-fluid" src="{{ $data[$i]['url'] }}" width="{{ $data[$i]['width'] }}"
                                    height="{{ $data[$i]['height'] }}" alt="{{ $data[$i]['id'] }} não encontrado">
                            </div>
                            @if (!empty($data[$i]['breeds']))
                                @php
                                    $breeds = $data[$i]['breeds'];
                                @endphp
                                <div class="col-12">
                                    <h1>{{ $breeds["origin"] ?? 'n/d' }}</h1>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            @endfor
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap-5.0.2/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/swalert/execute_alert.js') }}"></script>
</body>

</html>
