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
        <div class="col-12">
            The Cate Api - (Desafio de consumo)
        </div>
        <div class="col-md-12">
            <form action="{{ route('seach') }}" method="GET" class="row g-3">

                @csrf
                <div class="col-md-4">
                    <input type="number" class="form-control" name="limit" placeholder="Limite (1-100)">
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" name="breed_ids"
                        placeholder="IDs de raça (ex: beng,abys)">
                </div>

                <div class="col-md-4 ">
                    <button class="btn btn-outline-primary w-100" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <div class="row mt-4">
            <div class="alert alert-{{ $status == 200 ? 'success' : 'danger' }}">
                <b>{{ $status ?? '500' }}</b>
                <h3><b>{{ $message }}</b></h3>
            </div>
        </div>

        <div class="row g-3">
            @foreach ($data as $item)
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Id: {{ $item['id'] }}
                        </div>

                        <div class="card-body">
                            <div class="col-12">
                                <img class="img-fluid" src="{{ $item['url'] }}" width="{{ $item['width'] }}"
                                    height="{{ $item['height'] }}" alt="{{ $item['id'] }} não encontrado">
                            </div>

                            @if (!empty($item['breeds']))
                                @foreach ($item['breeds'] as $breed)
                                    <div class="col-12 mt-3">
                                        <b>Id:</b> {{ $breed['id'] ?? 'n/d' }} <br>
                                        <b>Nome:</b> {{ $breed['name'] ?? 'n/d' }} <br>
                                        <b>Temperamento:</b> {{ $breed['temperament'] ?? 'n/d' }} <br>
                                        <b>Origem:</b> {{ $breed['origin'] ?? 'n/d' }} <br>
                                        <b>Tempo de vida:</b> {{ $breed['life_span'] ?? 'n/d' }} <br>
                                        <b>Peso:</b>
                                        Imperial: {{ $breed['weight']['imperial'] ?? 'n/d' }},
                                        Métrico: {{ $breed['weight']['metric'] ?? 'n/d' }} <br>
                                        <b>Wikipedia:</b>
                                        <a href="{{ $breed['wikipedia_url'] ?? '#' }}" target="_blank">Visualizar</a>
                                        <br>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap-5.0.2/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/swalert/execute_alert.js') }}"></script>
</body>

</html>
