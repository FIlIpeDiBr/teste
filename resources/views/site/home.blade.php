@extends('site/template/master')

@section('content')
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
    @for($line = 0; $line < $rows; $line++)
        <tr class="row">
            @for($column = 0; $column < 7; $column++)
            @if($today->addDay()->format('w') == '0')
                <td class="col-1 d-flex justify-content-center">
                    <a class="btn disabled btn-dark" href="#">{{$today->format('y-d-m')}}</a>
                </td>
            @elseif($restricted_day[$index] == $today)
                <td class="col-1 d-flex justify-content-center">
                    <a class="btn disabled btn-dark" href="#{{$index++}}">{{$today->format('y-d-m')}}</a>
                </td>
            @else
                <td class="col-1 d-flex justify-content-center">
                    <a class="btn btn-primary" href="{{route('appointment.create',['day'=>$today->format('Y-m-d')])}}">{{$today->format('y-d-m')}}</a>
                </td>
            @endif
            @endfor
        </tr>
    @endfor
</table>
@endsection