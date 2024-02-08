@extends('site/template/master')

@section('content')
<div class="container">
    @foreach($timetable as $laboratory_key=>$laboratory)
    <div class="col">
        <h4>Lab {{$laboratory_key}}</h4>
        <div class="row">
            @foreach($laboratory as $day_key=>$day)
            <h5>{{$day_key}}:</h5>
            <span class="btn-group p-0" role="group" aria-label="Bloco de salas" name="hour_block">
                @for($hour=8; $hour<=21; $hour++)
                    @if(isset($day[$hour]))
                        <label class="btn btn-outline-dark">{{$day[$hour]}}</label>
                    @else
                        <label class="btn btn-primary">{{$hour}}h</label>
                    @endif
                @endfor
            </span> <br><br>
            @endforeach
        </div>
    </div>  <br>
    @endforeach
</div>
@endsection