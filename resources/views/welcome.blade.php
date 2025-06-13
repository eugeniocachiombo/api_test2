<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.2/css/bootstrap.css') }}">
    <title>Consumo de API</title>
</head>

<body>
    <div class="container py-4">
      
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar..."
                        aria-label="Campo de pesquisa">
                    <button class="btn btn-outline-primary" type="button">Buscar</button>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-bordered align-middle mb-0">
                        <thead class="table-light text-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap-5.0.2/js/bootstrap.js') }}"></script>
</body>

</html>
