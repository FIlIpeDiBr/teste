@extends('site/template/master')

@section('content')

<table class=" tabela text-center">
    <tr>
    <th scope="col" class="mx-1">Domingo</th>
    <th scope="col" class="mx-1">Segunda</th>
    <th scope="col" class="mx-1">Terça</th>
    <th scope="col" class="mx-1">Quarta</th>
    <th scope="col" class="mx-1">Quinta</th>
    <th scope="col" class="mx-1">Sexta</th>
    <th scope="col" class="mx-1">Sábado</th>
    </tr>
    @for($line = 0; $line < $rows; $line++)
        <tr>
            @for($column = 0; $column < 7; $column++)
            <td class="pb-1 celula_tabela">
                <div class="border border-black bg-white h-100">
                @if($day_sequence->addDay()->format('w') == '0')
                    <p class="bg-secondary h-30">{{$day_sequence->format('d/m/Y')}}</p>
                    <p class="cortar_texto">Domingo</p>
                @elseif($restricted_day[$index]["day"] == $day_sequence)
                    <p class="bg-secondary h-30">{{$day_sequence->format('d/m/Y')}}</p>
                    <p>{{$restricted_day[$index]["reason"]}}</p>
                    <p hidden>"{{$index++}}"</p>
                @elseif($today > $day_sequence->format('Y-m-d'))
                    <p class="bg-secondary h-30" id="{{$day_sequence->format('d-m-y')}}">{{$day_sequence->format('d/m/Y')}}</p>
                @else
                    <p class="bg-success h-30" id="{{$day_sequence->format('d-m-y')}}"><a class="text-decoration-none text-white pb-0" 
                    href="{{route('appointment.create',['day'=>$day_sequence->format('Y-m-d')])}}">{{$day_sequence->format('d/m/Y')}}</a></p>
                    <a href="{{route('appointment.create',['day'=>$day_sequence->format('Y-m-d')])}}" class="pb-2 px-5 btn btn-outline-success text-black">Disponível</a>
                @endif
                </div>
            </td>
            @endfor
        </tr>
    @endfor
</table>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function () {
    $("#{{now()->format('d-m-y')}}").removeClass('bg-success');
    $("#{{now()->format('d-m-y')}}").addClass('bg-primary');
});
</script>