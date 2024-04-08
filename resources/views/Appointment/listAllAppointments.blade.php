@extends('site/template/master')

@section('content')
<div class="container">
    @foreach($timetable as $laboratory_key=>$laboratory)
    <div class="col border border-dark px-3 py-2 pb-0">
        <a class="h4" href="{{route('appointment.create',['laboratory'=>$laboratory_key, 'day'=>now()->format('Y-m-d')])}}">Lab {{$laboratory_key}}</a>
        <div class="row rounded px-1 py-1 mt-3">
            @foreach($laboratory as $day_key=>$day)
            <a class="h5" href="{{route('appointment.create',['laboratory'=>$laboratory_key,'day'=>$day_key])}}">{{$day["week_day"].": ".$day_key}}</a>
            <span class="btn-group d-flex flex-wrap pb-3" role="group" aria-label="Bloco de salas" name="hour_block">
                @for($hour=8; $hour<=21; $hour++)
                    @if(isset($day[$hour]))
                    <span class="rounded border border-black bg-secondary text-center px-2 py-0">
                        <label class="text-white">{{$hour}}h</label><br>
                        <label>
                            {{$day[$hour]['responsible']}}<br>
                            {{$day[$hour]['event']}}
                        </label>
                    </span>
                    @else
                        <span>
                            <a class="btn border-dark btn-primary" href="{{route('appointment.create',['laboratory'=>$laboratory_key,'day'=>$day_key, 'checked'=>$hour])}}">
                                {{$hour}}h <br> <span class="text-black">Disponível <br>‎</span></a>
                        </span>
                    @endif
                @endfor
            </span>
            @endforeach
        </div>
    </div>  <br>
    @endforeach
</div>
@endsection