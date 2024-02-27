@extends('site/template/master')

@section('content')
    <form action="{{route('appointment.store')}}" method="POST" class="container">
        @csrf

        <label for="laboratory">Laboratório:</label>   <br>
        <input type="text" id="laboratory"name="laboratory" value="{{$laboratory}}" required>
        <br><br>

        <label for="responsible">Responsável:</label>   <br>
        <input type="text" id="responsible" name="responsible" placeholder="Siape" required>
        <br><br>

        <label for="day">Dia:</label>      <br>
        <input type="date" id="day" name="day" value="{{$day}}" required>
        <br><br>

        <label>Hora:</label>     <br>
        <span class="btn-group p-0" role="group" aria-label="Bloco de salas" name="hour_block">
            @for($time = 8; $time < 22; $time++)
                <input type="checkbox" class="btn-check" name="{{$time}}" id="{{$time}}">
                <label class="btn btn-outline-danger" for="{{$time}}" id="label-{{$time}}">{{$time}}</label>
            @endfor
        </span>
        <br><br>

        <label for="event">Evento:</label>   <br>
        <input type="text" id="event" name="event" placeholder="Evento" required>
        <br><br>

        <button type="submit">Reservar</button>
    </form>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function () {
        
        $('#day').change(function () {
            var url = "{{route('get.day', [':laboratory',':day'])}}";
            url = url.replace(':laboratory', $('#laboratory').val()).replace(':day', $(this).val());    console.log(url);
            
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {          console.log(response.timeslot);
                    var hour, label;
                    for(hour=8; hour<=21; hour++){
                        label = '#label-'+hour;
                        
                        $(label).removeClass("btn-outline-danger");
                        $(label).addClass("btn-primary");

                        $('#'+hour).prop('disabled',false);
                    }
                    if(response.timeslot == null)   return;
                    for(hour=0; hour < response.timeslot.length; hour++){
                        
                        label = '#label-'+response.timeslot[hour];

                        $(label).removeClass("btn-primary");
                        $(label).addClass("btn-outline-danger");

                        $('#'+response.timeslot[hour]).prop('disabled',true);
                        $('#'+response.timeslot[hour]).prop('checked',false);
                    }
                },
                error: function (error) {
                    console.error("error");
                }
            });
        });
        $('#laboratory').change(function() {
            $('#day').trigger('change');
        });
        
        $('#day').trigger('change');
        $('#{{$checked}}').prop('checked', true);
    });
</script>
