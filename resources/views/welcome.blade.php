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

        <div class="row">
            <div class="alert alert-{{ $status == 200 ? 'success' : 'danger' }}">
                <b>{{ $status ?? '500' }}</b>
                <h3><b>{{ $message }}</b></h3>
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

                                @for ($i = 0; $i < count($breeds); $i++)
                                    <div class="col-12">
                                        <b>Id: {{ $breeds[$i]['id'] ?? 'n/d' }}</b> <br>
                                        <b>Nome: {{ $breeds[$i]['origin'] ?? 'n/d' }}</b> <br>
                                        <b>Temperamento: {{ $breeds[$i]['temperament'] ?? 'n/d' }}</b> <br>
                                        <b>Origem: {{ $breeds[$i]['origin'] ?? 'n/d' }}</b> <br>
                                        <b>Tempo de vida: {{ $breeds[$i]['life_span'] ?? 'n/d' }}</b> <br>
                                        <b>Wikipedia:</b> <a href="{{ $breeds[$i]['wikipedia_url'] ?? '#' }}">Visualizar</a> <br>
                                    </div>
                                @endfor
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
