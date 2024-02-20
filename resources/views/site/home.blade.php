@extends('site/template/master')

@section('content')
<h1>Hoje é: {{now()->format('d-m')}}</h1>

<table class="table container-fluid mx-5">
    <tr class="row ">
    <th scope="col" class="col-1 text-center">Domingo</th>
    <th scope="col" class="col-1 text-center">Segunda</th>
    <th scope="col" class="col-1 text-center">Terça</th>
    <th scope="col" class="col-1 text-center">Quarta</th>
    <th scope="col" class="col-1 text-center">Quinta</th>
    <th scope="col" class="col-1 text-center">Sexta</th>
    <th scope="col" class="col-1 text-center">Sábado</th>
    </tr>
    @for($line = 0; $line < 4; $line++)
        <tr class="row">
            @for($column = 0; $column < 7; $column++)
            <td class="col-1">
                <img src="img/quadrado.png" class="img-fluid rounded bg-secondary">
                <!-- <small>{{now()->addDay(($line * 7 + $column))->format('d-m')}}</small> -->
            </td>
            @endfor
        </tr>
    @endfor
</table>
@endsection