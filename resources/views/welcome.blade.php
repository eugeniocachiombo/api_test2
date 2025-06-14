<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.2/css/bootstrap.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <title>Consumo de API</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">The Cat API - Consumo de API</h2>
        </div>

        <div class="form-section mb-5">
            <form action="{{ route('seach') }}" method="GET" class="row g-3 align-items-end">
                @csrf
                <div class="col-md-4">
                    <label for="limit" class="form-label">Limite (1-100)</label>
                    <input type="number" class="form-control" name="limit" id="limit" placeholder="Ex: 10">
                </div>
                <div class="col-md-4">
                    <label for="breed_ids" class="form-label">IDs de Raça</label>
                    <input type="text" class="form-control" name="breed_ids" id="breed_ids"
                        placeholder="Ex: beng,abys">
                </div>
                <div class="col-md-4 d-grid">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>

        <div class="row mb-4">
            <div class="col">
                @if ($status && $message && count($data) == 0 )
                    <div class="alert alert-danger }}">
                        <i
                            class="bi bi-exclamation-triangle-fill fs-4"></i>
                        <div class="fw-bold">
                            404<br>
                            Nenhuma informação encontrada
                        </div>
                    </div>
                @else
                    <div class="alert alert-{{ $status == 200 ? 'success' : 'danger' }}">
                        <i
                            class="bi {{ $status == 200 ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' }} fs-4"></i>
                        <div class="fw-bold">
                            {{ $status }}<br>
                            {{ $message }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-4">
            @foreach ($data as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-header bg-light">
                            <strong>ID:</strong> {{ $item['id'] }}
                        </div>
                        <div class="card-body">
                            <div class="img-container mb-3">
                                <img src="{{ $item['url'] }}" class="img-fluid rounded" alt="{{ $item['id'] }}">
                            </div>

                            @if (!empty($item['breeds']))
                                @foreach ($item['breeds'] as $breed)
                                    <div class="mb-3">
                                        <p><strong>Nome:</strong> {{ $breed['name'] ?? 'n/d' }}</p>
                                        <p><strong>Temperamento:</strong> {{ $breed['temperament'] ?? 'n/d' }}</p>
                                        <p><strong>Origem:</strong> {{ $breed['origin'] ?? 'n/d' }}</p>
                                        <p><strong>Tempo de vida:</strong> {{ $breed['life_span'] ?? 'n/d' }} anos</p>
                                        <p><strong>Peso:</strong> {{ $breed['weight']['imperial'] ?? 'n/d' }}
                                            (Imperial), {{ $breed['weight']['metric'] ?? 'n/d' }} (Métrico)</p>
                                        <p><strong>Wikipedia:</strong>
                                            <a href="{{ $breed['wikipedia_url'] ?? '#' }}" class="link-primary"
                                                target="_blank">Visualizar</a>
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted">Nenhuma informação de raça disponível.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap-5.0.2/js/bootstrap.js') }}"></script>
</body>

</html>
