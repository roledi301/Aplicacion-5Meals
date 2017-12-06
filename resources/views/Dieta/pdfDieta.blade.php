<!DOCTYPE html>
<html>

<body style="font-size: 18px">
<?php
$url = asset('/images/logo.png');
?>
<img  src="{{$url}}" width=70 height=70 style="margin-left: 45%">
<h3 align=center style="margin-bottom: 20px">ESTUDIO NUTRICIONAL</h3>
<hr>
<table style="font-size: 18px;   border:none; ">
    <tr><td>
            <p><strong>&nbsp;&nbsp;Nombre del paciente: &nbsp;</strong><i>{{$paciente->nombre.' '.$paciente->apellidos}}&nbsp;&nbsp;</i></p>
            <p><strong>&nbsp;&nbsp;Fecha del informe: &nbsp;</strong><i>{{$dieta->created_at->format('d-m-Y')}}&nbsp;&nbsp;</i></p>
            <p><strong>&nbsp;&nbsp;Calorias totales: &nbsp;</strong><i>{{$dieta->kcal}}&nbsp;&nbsp;</i></p>
            <p><strong>&nbsp;&nbsp;Duración: &nbsp;</strong><i>{{$dieta->duracion.' días'}}&nbsp;&nbsp;</i></p>
            <p><strong>&nbsp;&nbsp;Descripción: &nbsp;</strong><i>{{$dieta->descripcion}}&nbsp;&nbsp;</i></p>
        </td></tr>
</table>
<hr>
<h3 align=center style="margin-bottom: -30px">DIETA</h3>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">L U N E S</h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50% >{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
       @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">M A R T E S</h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">M I É R C O L E S</h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">J U E V E S</h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">V I E R N E S </h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">S Á B A D O</h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(111, 225, 224, 0.23);">
    <h3 class="panel-title" style=" margin-bottom: -5px" align="center">D O M I N G O</h3>

</div>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">D e s a y u n o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='desayuno')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e d i a &nbsp;&nbsp;&nbsp; M a ñ a n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='mediaMañana')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">A l m u e r z o</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='almuerzo')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">M e r i e n d a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='merienda')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);">
    <h3 class="panel-title" align="center">C e n a</h3>
</div>
<table style="font-size: 18px; border-spacing: 5px">
    <tbody>
    @foreach($alimentos as $a)
        @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='cena')
            <tr>
                <td width=30%>&bull;&nbsp;&nbsp;{{$a->nombre}}</td>
                <td width=20%>{{'&nbsp;Raciones: '.$a->pivot->cantidad}}</td>
                <td width=50%>{{$a->pivot->comentario}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
</body>
</html>