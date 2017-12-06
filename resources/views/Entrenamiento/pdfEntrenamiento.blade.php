<!DOCTYPE html>
<html>
<style>
</style>
<body style="font-size: 18px">
<?php
$url = asset('/images/logo.png');
?>
<img  src="{{$url}}" width=70 height=70 style="margin-left: 45%">
<h3 align=center style="margin-bottom: 20px">ESTUDIO NUTRICIONAL</h3>
<hr>
<table style="font-size: 18px;   border: none">
    <tr><td>
            <p><strong>&nbsp;&nbsp;Nombre del paciente: &nbsp;</strong><i>{{$paciente->nombre.' '.$paciente->apellidos}}&nbsp;&nbsp;</i></p>
            <p><strong>&nbsp;&nbsp;Fecha del informe: &nbsp;</strong><i>{{$entrenamiento->created_at->format('d-m-Y')}}&nbsp;&nbsp;</i></p>
            <p><strong>&nbsp;&nbsp;Descripción: &nbsp;</strong><i>{{$entrenamiento->descripcion}}&nbsp;&nbsp;</i></p>
        </td></tr>
</table>
<hr>
<h3 align=center style="margin-bottom: -30px">ENTRENAMIENTO</h3>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">L U N E S</h3>

</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
    <tbody >
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'lunes')
            <tr >
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>

            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">M A R T E S</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
    <tbody>
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'martes')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">M I É R C O L E S</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
<tbody>
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'miercoles')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}&nbsp;&nbsp;</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">J U E V E S</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
<tbody>
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'jueves')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}&nbsp;&nbsp;</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">V I E R N E S</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
   <tbody>
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'viernes')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}&nbsp;&nbsp;</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">S Á B A D O</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
   <tbody>
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'sabado')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}&nbsp;&nbsp;</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">D O M I N G O</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px;margin-top: 20px">
    <tbody>
    @foreach($ejercicios as $e)
        @if($e->pivot->dia_semana == 'domingo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$e->nombre.'&nbsp;'.$e->duracion.' minutos'}}</td>
                <td width=20%>Repeticiones:&nbsp;{{$e->pivot->repeticion}}&nbsp;&nbsp;</td>
                <td width=50%>Observación:&nbsp;{{$e->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
</body>
</html>