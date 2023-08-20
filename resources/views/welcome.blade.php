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
        <style>
                
            table {
                width:100%;
                height:100%;
                border:1px solid #b3adad;
                border-collapse:collapse;
                padding:5px;
            }
            table th {
                border:1px solid #b3adad;
                padding:5px;
                background: #f0f0f0;
                color: #313030;
            }
            table td {
                border:1px solid #b3adad;
                text-align:center;
                padding:5px;
                background: #ffffff;
                color: #313030;
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            
            <table>
                <thead>
                    <tr>
                        <th>Prioridade</th>
                        <th>Demanda</th>
                        <th>Módulo</th>
                        <th>Cadastrado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demandas as $demanda)
                    <tr>
                        <td>{{$demanda->nu_prioridade}}</td>
                        <td>{{$demanda->st_demanda}}</td>
                        <td>{{$demanda->st_modulo}}</td>
                        <td>{{$demanda->dt_cadastro}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
