<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            padding: 1em;
        }
    </style>
</head>
<body>
<main role="main">
    <div class="row">
        <div class="container col-md-8 offset-md-2">
            <div class="card border">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Clientes</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="tableClientes">
                        <thead>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Idade</th>
                            <th>E-Mail</th>
                        </thead>
                        <tbody>
                            @foreach($cliente as $lista)
                                @if($lista == null)
                                    <h2>Não há produtos</h2>
                                @else
                                <tr>
                                    <td>{{$lista->id}}</td>
                                    <td>{{$lista->nome}}</td>
                                    <td>{{$lista->endereco}}</td>
                                    <td>{{$lista->idade}}</td>
                                    <td>{{$lista->email}}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/novo" class="btn btn-sm btn-primary">Novo</a>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</footer>
</body>
</html>
