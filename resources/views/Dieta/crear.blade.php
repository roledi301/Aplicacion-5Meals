@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link rel="stylesheet" src="/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.min.js"></script>

<!--FUNCION DESPLEGABLE-->
<script>
    $(document).ready(function(){
        for(var i=0;i<8; i++){
            $("#desplegable"+i).css({display:'none'});
        }
    });
    function desplegable(d){
        $("#desplegable"+d).slideToggle("slow");
        return false;
    }
</script>

<!--CONTADORES DE KCALS DE ALIMENTOS SELECCIONADOS-->
<script>
    function calculaTotales(nom_tabla, imp_calorias, imp_proteinas, imp_grasas, imp_hidratos){
        var tbody=$('#'+nom_tabla);
        tr = tbody.find("tr");
        var sumCalorias=0;
        var sumProteinas=0;
        var sumGrasas=0;
        var sumHidratos=0;

        for(i=0;i<tr.length;i++){
            if($(tr[i]).find("input[type=checkbox]").is(":checked")){

                var cantidad =$(tr[i]).find("input[name='cantidad[]']").val();
                cantidad=parseFloat(cantidad);

                var calorias = $(tr[i]).find("input[name='calorias']").val();
                calorias = parseFloat(calorias);
                sumCalorias+=calorias*cantidad;
                $('#'+imp_calorias).html(Math.abs(sumCalorias).toFixed(2)+'&nbsp;&nbsp;Kcals');

                var proteinas = $(tr[i]).find("input[name='proteinas']").val();
                proteinas = parseFloat(proteinas);
                sumProteinas+=proteinas*cantidad;
                $('#'+imp_proteinas).html(Math.abs(sumProteinas).toFixed(2)+'&nbsp;&nbsp;proteinas');

                var grasas = $(tr[i]).find("input[name='grasas']").val();
                grasas = parseFloat(grasas);
                sumGrasas+=grasas*cantidad;
                $('#'+imp_grasas).html(Math.abs(sumGrasas).toFixed(2)+'&nbsp;&nbsp;grasas');

                var hidratos = $(tr[i]).find("input[name='hidratos']").val();
                hidratos = parseFloat(hidratos);
                sumHidratos+=hidratos*cantidad;
                $('#'+imp_hidratos).html(Math.abs(sumHidratos).toFixed(2)+'&nbsp;&nbsp;hidratos');

            }
        }
    }
    <!--FUNCION PARA EL CHECKBOX-->
    function cambiarEstado(checkbox,id,id2,id3,id4,id5){
        document.getElementById(id).disabled = !checkbox.checked;
        document.getElementById(id2).disabled = !checkbox.checked;
        document.getElementById(id3).disabled = !checkbox.checked;
        document.getElementById(id4).disabled = !checkbox.checked;
        document.getElementById(id5).disabled = !checkbox.checked;
    }
    <!--FUNCION BUSCADOR -->
    function buscadorFu(string1,string2){
        var input, filter, table, tr, tbody, label, i;
        input = $('#'+string1);
        filter = input.val().toUpperCase();
        tbody=$("#"+string2);
        tr = tbody.find("tr");

        for (i = 0; i < tr.length; i++) {
            label = $(tr[i]).find("label[name='alimentoNombre']")[0];
            if (label) {
                if($(tr[i]).find("input[type=checkbox]").is(":checked")){
                    $(tr[i]).show();
                }
                else if(filter==""){
                    $(tr[i]).hide();
                }
                else if (label.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    $(tr[i]).show();
                } else {
                    $(tr[i]).hide();
                }
            }
        }
    }
</script>

<!--FUNCION CALCULAR LAS FRACCIONES POR COMIDAS-->
<script>
    /*Investigar como paso el id*/
    /*DESAYUNO*/
    $(document).ready(function() {
        var kcalt = 0;
        $("#kcalt").keyup(function(event) {
            kcalt = $("#kcalt").val();
            $("#kcalld").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmd").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmid").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaljd").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalvd").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalsd").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaldd").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            var kcald = kcalt*0.20;
            $("#pld").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmd").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmid").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pjd").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pvd").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#psd").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pdd").html(((kcald*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#gld").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmd").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmid").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gjd").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gvd").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gsd").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gdd").html(((kcald*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#hld").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmd").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmid").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hjd").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hvd").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hsd").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hdd").html(((kcald*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
        });
    });
    /*MEDIA MAÑANA*/
    $(document).ready(function() {
        var kcalt = 0;
        $("#kcalt").keyup(function(event) {
            kcalt = $("#kcalt").val();
            $("#kcallmm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmmm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmimm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaljmm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalvmm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalsmm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaldmm").html((kcalt*0.15).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            var kcalmm = kcalt*0.15;

            $("#plmm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmmm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmimm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pjmm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pvmm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#psmm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pdmm").html(((kcalmm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#glmm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmmm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmimm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gjmm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gvmm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gsmm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gdmm").html(((kcalmm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#hlmm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmmm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmimm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hjmm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hvmm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hsmm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hdmm").html(((kcalmm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
        });
    });
    /*ALMUERZO*/
    $(document).ready(function() {
        var kcalt = 0;
        $("#kcalt").keyup(function(event) {
            kcalt = $("#kcalt").val();
            $("#kcalla").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalma").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmia").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalja").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalva").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalsa").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalda").html((kcalt*0.35).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            var kcala = kcalt*0.35;
            $("#pla").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pma").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmia").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pja").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pva").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#psa").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pda").html(((kcala*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#gla").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gma").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmia").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gja").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gva").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gsa").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gda").html(((kcala*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#hla").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hma").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmia").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hja").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hva").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hsa").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hda").html(((kcala*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
        });
    });
    /*MERIENDA*/
    $(document).ready(function() {
        var kcalt = 0;
        $("#kcalt").keyup(function(event) {
            kcalt = $("#kcalt").val();
            $("#kcallm").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmm").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmim").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaljm").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalvm").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalsm").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaldm").html((kcalt*0.10).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            var kcalm = kcalt*0.10;
            $("#plm").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmm").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmim").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pjm").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pvm").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#psm").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pdm").html(((kcalm*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#glm").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmm").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmim").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gjm").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gvm").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gsm").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gdm").html(((kcalm*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#hlm").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmm").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmim").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hjm").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hvm").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hsm").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hdm").html(((kcalm*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
        });
    });
    /*CENA*/
    $(document).ready(function() {
        var kcalt = 0;
        $("#kcalt").keyup(function(event) {
            kcalt = $("#kcalt").val();
            $("#kcallc").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmc").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalmic").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaljc").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalvc").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcalsc").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            $("#kcaldc").html((kcalt*0.20).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcals');
            var kcalc = kcalt*0.20;
            $("#plc").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmc").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pmic").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pjc").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pvc").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#psc").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#pdc").html(((kcalc*0.15)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;proteinas');
            $("#glc").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmc").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gmic").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gjc").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gvc").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gsc").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#gdc").html(((kcalc*0.30)/9).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;grasas');
            $("#hlc").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmc").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hmic").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hjc").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hvc").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hsc").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
            $("#hdc").html(((kcalc*0.55)/4).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hidratos');
        });
    });
</script>
<style>
    html, body {

        background-image: url("/images/fondos/fruta1.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 20px;
    }
    .container-fluid {
        text-align: -webkit-center;

    }

    .button{
        background-color: transparent;
    }
</style>
@section('content')
    <div class="container-fluid">
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">
            <!--CABECERA-->
            <div class="panel-heading" style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">Nueva Dieta</p>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <form class="form-horizontal" role="form" method="post" action="{{route('pacientes.storeDieta',$paciente_id)}}">
                {{ csrf_field() }}

                <!--INFORMACION DE LA DIETA-->
                    <div name="INFORMACION BÁSICA DIETA">

                        <div class="row">
                            <div class="panel-heading pull-left" style="margin-bottom: 10px;margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; width: 400px">
                                <p  style="margin-bottom: 0px;font-size: 20px"><strong>Información básica de la dieta:</strong></p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="font-size:20px; padding-left:20px">
                                <label>Nombre de la dieta: &nbsp;</label>*
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 text-left">
                                <input class=" form-control"  style="font-size:20px" type="text" name="nombre" placeholder="Dieta de 1500 Kcals" required/>
                                @if($errors->has('nombre'))
                                    <span  style="color: red">{{$errors->first('nombre')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="font-size:20px; padding-left:20px">
                                <label>Descripción:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 text-left ">
                                <input class="form-control" style="margin-top:10px;font-size:20px" type="text" name="descripcion" placeholder="Descripción"/>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="font-size:20px; padding-left:20px">
                                <label >Kcals: &nbsp;</label>*
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 text-left ">
                                <input class="form-control" style="margin-top:10px;font-size:20px" type="double" name="kcal" placeholder="1500" id="kcalt" required>
                                @if($errors->has('kcal'))
                                    <span  style="color: red">{{$errors->first('kcal')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="font-size:20px; padding-left:20px">
                                <label >Duración:&nbsp;</label>*
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 ">
                                <input class="form-control" style="margin-top:10px;font-size:20px"type="int" name="duracion" placeholder="15" required/>
                                @if($errors->has('duracion'))
                                    <span class="text-left" style="color: red">{{$errors->first('duracion')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 text-center">
                                <p style="margin-top:10px;font-size: 20px;margin-left: -100px">días</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="font-size:20px; padding-left:20px">
                                <label >Patologías del paciente:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 text-left">
                                <p  style="margin-top:10px;font-size:20px" type="text" >{{$paciente->patologias}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 text-left" style="font-size:20px; padding-left:20px">
                                * Campos obligatorios
                            </div>
                        </div>
                    </div>

                    <!--LUNES-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>LUNES</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias1" onclick="return desplegable(1)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable1">
                    <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-LUNES-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalld"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcallds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pld"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="plds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gld"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="glds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hld"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hlds"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5 col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3 ">
                                        <input class="form-control" type="text" id="buscador" onkeyup="buscadorFu('buscador','tab_logic')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px; padding-left: 30px" id="tab_logic">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="lunes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic','kcallds','plds','glds','hlds')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>

                                        </td>
                                        <td class="text-center" >
                                            <input type="checkbox" id="checkbox1" value="" style="margin-top: 15px" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic','kcallds','plds','glds','hlds')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-LUNES-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcallmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcallmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="plmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="plmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="glmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="glmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hlmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hlmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px;padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5 col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador1" onkeyup="buscadorFu('buscador1','tab_logic1')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic1">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="lunes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic1','kcallmms','plmms','glmms','hlmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox2" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic1','kcallmms','plmms','glmms','hlmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-LUNES-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalla"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcallas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pla"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="plas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gla"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="glas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hla"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hlas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; paddin-left:30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5 col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="text-center col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador2" onkeyup="buscadorFu('buscador2','tab_logic2')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic2">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="lunes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control"onkeyup="calculaTotales('tab_logic2','kcallas','plas','glas','hlas')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic2','kcallas','plas','glas','hlas')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-LUNES-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcallm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcallms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="plm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="plms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="glm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="glms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hlm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hlms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5 col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3" >
                                        <input class="form-control" type="text" id="buscador3" onkeyup="buscadorFu('buscador3','tab_logic3')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic3">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="lunes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic3','kcallms','plms','glms','hlms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic3','kcallms','plms','glms','hlms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-LUNES-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcallc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcallcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="plc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="plcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="glc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="glcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hlc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hlcs"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5 col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador4" onkeyup="buscadorFu('buscador4','tab_logic4')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic4">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="lunes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control"onkeyup="calculaTotales('tab_logic4','kcallcs','plcs','glcs','hlcs')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic4','kcallcs','plcs','glcs','hlcs')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--MARTES-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>MARTES</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias2" onclick="return desplegable(2)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable2">
                        <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MARTES-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmds"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador5" onkeyup="buscadorFu('buscador5','tab_logic5')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic5">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="martes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic5','kcalmds','pmds','gmds','hmds')"/>
                                            @if($errors->has('cantidad[]'))
                                                <span style="color: red">{{$errors->first('cantidad[]')}}</span>
                                            @endif
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox"  value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic5','kcalmds','pmds','gmds','hmds')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MARTES-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador6" onkeyup="buscadorFu('buscador6','tab_logic6')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic6">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="martes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic6','kcalmmms','pmmms','gmmms','hmmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic6','kcalmmms','pmmms','gmmms','hmmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MARTES-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalma"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pma"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gma"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hma"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador7" onkeyup="buscadorFu('buscador7','tab_logic7')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic7">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="martes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic7','kcalmas','pmas','gmas','hmas')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic7','kcalmas','pmas','gmas','hmas')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MARTES-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador8" onkeyup="buscadorFu('buscador8','tab_logic8')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic8">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="martes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic8','kcalmms','pmms','gmms','hmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic8','kcalmms','pmms','gmms','hmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MARTES-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmcs"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador9" onkeyup="buscadorFu('buscador9','tab_logic9')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic9">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="martes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic9','kcalmcs','pmcs','gmcs','hmcs')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic9','kcalmcs','pmcs','gmcs','hmcs')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--MIÉRCOLES-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>MIÉRCOLES</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias3" onclick="return desplegable(3)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable3">
                        <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MIERCOLES-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmid"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmids"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmid"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmids"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmid"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmids"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmid"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmids"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador10" onkeyup="buscadorFu('buscador10','tab_logic10')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic10">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="miercoles" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic10','kcalmids','pmids','gmids','hmids')"/>
                                            @if($errors->has('cantidad[]'))
                                                <span style="color: red">{{$errors->first('cantidad[]')}}</span>
                                            @endif
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox1" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic10','kcalmids','pmids','gmids','hmids')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MIERCOLES-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmimm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmimms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmimm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmimms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmimm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmimms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmimm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmimms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador11" onkeyup="buscadorFu('buscador11','tab_logic11')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic11">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="miercoles" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic11','kcalmimms','pmimms','gmimms','hmimms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox2" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic11','kcalmimms','pmimms','gmimms','hmimms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MIERCOLES-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmia"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmias"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmia"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmias"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmia"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmias"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmia"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmias"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                        <table class="table  table-hover">
                            <thead style="font-size: 20px; padding-left: 30px">
                            <tr>
                                <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                    Alimento
                                </th>
                                <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                    Raciones
                                </th>
                                <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                    Comentario
                                </th>
                                <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                    Incluir
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-3 col-lg-3 col-sm-3">
                                    <input class="form-control" type="text" id="buscador12" onkeyup="buscadorFu('buscador12','tab_logic12')" placeholder="Buscar alimento" style="font-size: 20px" >
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody style="font-size: 20px" id="tab_logic12">
                            @foreach($alimentos as $a)
                                <?php
                                $i=uniqid();
                                $alimentoid='alimento'.$i;
                                $dia_semanaid='dia_semana'.$i;
                                $momentoid='momento'.$i;
                                $cantidadid='cantidad'.$i;
                                $comentarioid='comentario'.$i;
                                ?>
                                <tr style="font-size: 20px; display: none" >
                                    <td   name="alimentos"  style="display:none;font-size: 20px">
                                        <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                    </td>
                                    <td   name="ocultos"  style="display:none;font-size: 20px">
                                        <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="miercoles" style="font-size: 20px"/>
                                        <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                        <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                        <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                        <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                        <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                    </td>
                                    <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                        <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                        <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                    </td>
                                    <td  name="cantidad"  style="font-size: 20px">
                                        <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic12','kcalmias','pmias','gmias','hmias')"/>
                                    </td>
                                    <td   name="comentario"  style="font-size: 20px">
                                        <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                calculaTotales('tab_logic12','kcalmias','pmias','gmias','hmias')">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MIERCOLES-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmim"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmims"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmim"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmims"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmim"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmims"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmim"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmims"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador13" onkeyup="buscadorFu('buscador13','tab_logic13')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic13">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="miercoles" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic13','kcalmims','pmims','gmims','hmims')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic13','kcalmims','pmims','gmims','hmims')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-MIERCOLES-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalmic"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalmics"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pmic"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pmics"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gmic"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gmics"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hmic"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hmics"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                        <table class="table  table-hover">
                            <thead style="font-size: 20px; padding-left: 30px">
                            <tr>
                                <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                    Alimento
                                </th>
                                <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                    Raciones
                                </th>
                                <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                    Comentario
                                </th>
                                <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                    Incluir
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-3 col-lg-3 col-sm-3">
                                    <input class="form-control" type="text" id="buscador14" onkeyup="buscadorFu('buscador14','tab_logic14')" placeholder="Buscar alimento" style="font-size: 20px" >
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody style="font-size: 20px" id="tab_logic14">
                            @foreach($alimentos as $a)
                                <?php
                                $i=uniqid();
                                $alimentoid='alimento'.$i;
                                $dia_semanaid='dia_semana'.$i;
                                $momentoid='momento'.$i;
                                $cantidadid='cantidad'.$i;
                                $comentarioid='comentario'.$i;
                                ?>
                                <tr style="font-size: 20px; display: none" >
                                    <td   name="alimentos"  style="display:none;font-size: 20px">
                                        <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                    </td>
                                    <td   name="ocultos"  style="display:none;font-size: 20px">
                                        <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="miercoles" style="font-size: 20px"/>
                                        <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                        <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                        <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                        <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                        <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                    </td>
                                    <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                        <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                        <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                    </td>
                                    <td  name="cantidad"  style="font-size: 20px">
                                        <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic14','kcalmics','pmics','gmics','hmics')"/>
                                    </td>
                                    <td   name="comentario"  style="font-size: 20px">
                                        <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                calculaTotales('tab_logic14','kcalmics','pmics','gmics','hmics')"/>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>

                    <!--JUEVES-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>JUEVES</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias4" onclick="return desplegable(4)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable4">
                        <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-JUEVES-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaljd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaljds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pjd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pjds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gjd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gjds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hjd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hjds"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador15" onkeyup="buscadorFu('buscador15','tab_logic15')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic15">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="jueves" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic15','kcaljds','pjds','gjds','hjds')"/>
                                            @if($errors->has('cantidad[]'))
                                                <span style="color: red">{{$errors->first('cantidad[]')}}</span>
                                            @endif
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox1" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic15','kcaljds','pjds','gjds','hjds')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-JUEVES-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaljmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaljmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pjmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pjmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gjmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gjmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hjmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hjmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador16" onkeyup="buscadorFu('buscador16','tab_logic16')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic16">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="jueves" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic16','kcaljmms','pjmms','gjmms','hjmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox2" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic16','kcaljmms','pjmms','gjmms','hjmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-JUEVES-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalja"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaljas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pja"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pjas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gja"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gjas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hja"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hjas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador17" onkeyup="buscadorFu('buscador17','tab_logic17')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic17">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="jueves" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic17','kcaljas','pjas','gjas','hjas')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic17','kcaljas','pjas','gjas','hjas')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-JUEVES-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaljm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaljms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pjm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pjms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gjm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gjms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hjm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hjms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador20" onkeyup="buscadorFu('buscador20','tab_logic20')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic20">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="jueves" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic20','kcaljms','pjms','gjms','hjms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic20','kcaljms','pjms','gjms','hjms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-JUEVES-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaljc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaljcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pjc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pjcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gjc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gjcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hjc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hjcs"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                        <table class="table  table-hover">
                            <thead style="font-size: 20px; padding-left: 30px">
                            <tr>
                                <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                    Alimento
                                </th>
                                <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                    Raciones
                                </th>
                                <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                    Comentario
                                </th>
                                <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                    Incluir
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-3 col-lg-3 col-sm-3">
                                    <input class="form-control" type="text" id="buscador19" onkeyup="buscadorFu('buscador19','tab_logic19')" placeholder="Buscar alimento" style="font-size: 20px" >
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody style="font-size: 20px" id="tab_logic19">
                            @foreach($alimentos as $a)
                                <?php
                                $i=uniqid();
                                $alimentoid='alimento'.$i;
                                $dia_semanaid='dia_semana'.$i;
                                $momentoid='momento'.$i;
                                $cantidadid='cantidad'.$i;
                                $comentarioid='comentario'.$i;
                                ?>
                                <tr style="font-size: 20px; display: none" >
                                    <td   name="alimentos"  style="display:none;font-size: 20px">
                                        <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                    </td>
                                    <td   name="ocultos"  style="display:none;font-size: 20px">
                                        <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="jueves" style="font-size: 20px"/>
                                        <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                        <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                        <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                        <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                        <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                    </td>
                                    <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                        <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                        <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                    </td>
                                    <td  name="cantidad"  style="font-size: 20px">
                                        <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic19','kcaljcs','pjcs','gjcs','hjcs')"/>
                                    </td>
                                    <td   name="comentario"  style="font-size: 20px">
                                        <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                calculaTotales('tab_logic19','kcaljcs','pjcs','gjcs','hjcs')">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>

                    <!--VIERNES-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>VIERNES</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias5" onclick="return desplegable(5)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable5">
                        <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-VIERNES-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalvd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalvds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pvd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pvds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gvd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gvds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hvd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hvds"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador20" onkeyup="buscadorFu('buscador20','tab_logic20')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic20">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="viernes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic20','kcalvds','pvds','gvds','hvds')"/>
                                            @if($errors->has('cantidad[]'))
                                                <span style="color: red">{{$errors->first('cantidad[]')}}</span>
                                            @endif
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox1" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic20','kcalvds','pvds','gvds','hvds')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-VIERNES-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalvmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalvmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pvmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pvmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gvmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gvmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hvmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hvmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador21" onkeyup="buscadorFu('buscador21','tab_logic21')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic21">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="viernes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic21','kcalvmms','pvmms','gvmms','hvmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox2" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic21','kcalvmms','pvmms','gvmms','hvmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-VIERNES-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalva"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalvas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pva"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pvas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gva"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gvas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hva"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hvas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador22" onkeyup="buscadorFu('buscador22','tab_logic22')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic22">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="viernes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic22','kcalvas','pvas','gvas','hvas')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic22','kcalvas','pvas','gvas','hvas')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-VIERNES-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalvm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalvms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pvm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pvms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gvm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gvms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hvm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hvms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador23" onkeyup="buscadorFu('buscador23','tab_logic23')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic23">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="viernes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic23','kcalvms','pvms','gvms','hvms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic23','kcalvms','pvms','gvms','hvms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-VIERNES-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalvc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalvcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pvc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pvcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gvc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gvcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hvc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hvcs"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador24" onkeyup="buscadorFu('buscador24','tab_logic24')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic24">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="viernes" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic24','kcalvcs','pvcs','gvcs','hvcs')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic24','kcalvcs','pvcs','gvcs','hvcs')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--SÁBADO-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>SÁBADO</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias6" onclick="return desplegable(6)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable6">
                        <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-SABADO-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalsd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalsds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="psd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="psds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gsd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gsds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hsd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hsds"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador25" onkeyup="buscadorFu('buscador25','tab_logic25')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic25">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="sabado" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic25','kcalsds','psds','gsds','hsds')"/>
                                            @if($errors->has('cantidad[]'))
                                                <span style="color: red">{{$errors->first('cantidad[]')}}</span>
                                            @endif
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox1" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic25','kcalsds','psds','gsds','hsds')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-SABADO-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalsmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalsmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="psmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="psmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gsmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gsmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hsmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hsmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador26" onkeyup="buscadorFu('buscador26','tab_logic26')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic26">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="sabado" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic26','kcalsmms','psmms','gsmms','hsmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox2" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic26','kcalsmms','psmms','gsmms','hsmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-SABADO-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalsa"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalsas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="psa"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="psas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gsa"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gsas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hsa"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hsas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador27" onkeyup="buscadorFu('buscador27','tab_logic27')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic27">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="sabado" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic27','kcalsas','psas','gsas','hsas')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic27','kcalsas','psas','gsas','hsas')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-SABADO-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalsm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalsms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="psm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="psms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gsm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gsms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hsm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hsms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador28" onkeyup="buscadorFu('buscador28','tab_logic28')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic28">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="sabado" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic28','kcalsms','psms','gsms','hsms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic28','kcalsms','psms','gsms','hsms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-SABADO-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalsc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcalscs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="psc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pscs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gsc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gscs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hsc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hscs"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador29" onkeyup="buscadorFu('buscador29','tab_logic29')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic29">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="sabado" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic29','kcalscs','pscs','gscs','hscs')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic29','kcalscs','pscs','gscs','hscs')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--DOMINGO-->
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                <div class="row">
                                    <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                        <strong>DOMINGO</strong>
                                    </p>
                                    <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias7" onclick="return desplegable(7)"  style="margin-top: 5px">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desplegable7">
                        <!--DESAYUNO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Desayuno</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-DOMINGO-D">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el desayuno (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaldd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaldds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pdd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pdds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gdd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gdds"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hdd"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hdds"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador30" onkeyup="buscadorFu('buscador30','tab_logic30')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic30">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="domingo" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="desayuno" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic30','kcaldds','pdds','gdds','hdds')"/>
                                            @if($errors->has('cantidad[]'))
                                                <span style="color: red">{{$errors->first('cantidad[]')}}</span>
                                            @endif
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox1" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic30','kcaldds','pdds','gdds','hdds')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MEDIAMAÑANA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Media mañana</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-DOMINGO-MM">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la media mañana (15%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaldmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaldmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pdmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pdmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gdmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gdmms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="width:400px">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hdmm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hdmms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador31" onkeyup="buscadorFu('buscador31','tab_logic31')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic31">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="domingo" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="mediaMañana" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic31','kcaldmms','pdmms','gdmms','hdmms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" id="checkbox2" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic31','kcaldmms','pdmms','gdmms','hdmms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--ALMUERZO-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Almuerzo</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-DOMINGO-A">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en el almuerzo (35%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcalda"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaldas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pda"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pdas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gda"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gdas"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hda"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hdas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador32" onkeyup="buscadorFu('buscador32','tab_logic32')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic32">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="domingo" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="almuerzo" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic32','kcaldas','pdas','gdas','hdas')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic32','kcaldas','pdas','gdas','hdas')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--MERIENDA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Merienda</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-DOMINGO-M">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la merienda (10%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaldm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaldms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pdm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pdms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gdm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gdms"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hdm"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hdms"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador33" onkeyup="buscadorFu('buscador33','tab_logic33')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic33">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="domingo" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="merienda" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic33','kcaldms','pdms','gdms','hdms')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic33','kcaldms','pdms','gdms','hdms')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--CENA-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="panel-heading" style="margin-top:10px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                    <p  class="text-center" style="margin-bottom: 0px;font-size: 20px; color:black;">
                                        <strong>Cena</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div name="INFO KCALS-DOMINGO-C">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="text-left " style="font-size: 20px; padding-left: 30px;"><strong>Información de la selección:</strong></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals permitidas en la cena (20%  del total): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="kcaldc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Kcals seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="kcaldcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas permitidas (15% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="pdc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Proteínas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="pdcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas permitidas (30% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="gdc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Grasas seleccionadas: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="gdcs"></p>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top: 10px; padding-left: 30px;">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left " style="font-size: 20px;"><strong>Hidratos permitidos (55% de Kcals permitidas): </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p  class="text-left" style="font-size: 20px; padding-left: 30px" id="hdc"></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px;"><strong>Hidratos seleccionados: </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <p class="text-left" style="font-size: 20px; padding-left: 30px"  id="hdcs"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <p style="font-size: 20px; margin-top: 20px; padding-left: 30px"><strong>Seleccionar alimentos:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table  table-hover">
                                <thead style="font-size: 20px; padding-left: 30px">
                                <tr>
                                    <th class="text-center col-md-3 col-lg-3 col-sm-3">
                                        Alimento
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Raciones
                                    </th>
                                    <th class="text-center col-md-5 col-lg-5- col-sm-5">
                                        Comentario
                                    </th>
                                    <th class="text-center col-md-1 col-lg-1 col-sm-1">
                                        Incluir
                                    </th>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-lg-3 col-sm-3">
                                        <input class="form-control" type="text" id="buscador34" onkeyup="buscadorFu('buscador34','tab_logic34')" placeholder="Buscar alimento" style="font-size: 20px" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody style="font-size: 20px" id="tab_logic34">
                                @foreach($alimentos as $a)
                                    <?php
                                    $i=uniqid();
                                    $alimentoid='alimento'.$i;
                                    $dia_semanaid='dia_semana'.$i;
                                    $momentoid='momento'.$i;
                                    $cantidadid='cantidad'.$i;
                                    $comentarioid='comentario'.$i;
                                    ?>
                                    <tr style="font-size: 20px; display: none" >
                                        <td   name="alimentos"  style="display:none;font-size: 20px">
                                            <input id="{{'alimento'.$i}}" disabled type="hidden" name="alimentos[]" class="form-control"  value="{{$a->id}}" style="font-size: 20px"/>
                                        </td>
                                        <td   name="ocultos"  style="display:none;font-size: 20px">
                                            <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="domingo" style="font-size: 20px"/>
                                            <input id="{{'momento'.$i}}" disabled type="hidden" name="momento[]" class="form-control"  value="cena" style="font-size: 20px"/>
                                            <input  disabled type="hidden" name="calorias" value="{{$a->kcal}}"/>
                                            <input  disabled type="hidden" name="proteinas" value="{{$a->proteinas}}"/>
                                            <input  disabled type="hidden" name="grasas" value="{{$a->grasas}}"/>
                                            <input  disabled type="hidden" name="hidratos" value="{{$a->carbohidratos}}"/>
                                        </td>
                                        <td   name="alimentos"  class="text-center" style="font-size: 20px">
                                            <label name="alimentoNombre" style="font-size: 20px">{{$a->nombre}}</label>
                                            <label name="calorias" >&nbsp;&nbsp;{{$a->kcal.'&nbsp;kcals'}}</label>
                                        </td>
                                        <td  name="cantidad"  style="font-size: 20px">
                                            <input id="{{'cantidad'.$i}}" disabled style="font-size: 20px" type="int" name='cantidad[]' placeholder='Nº de raciones' class="form-control" onkeyup="calculaTotales('tab_logic34','kcaldcs','pdcs','gdcs','hdcs')"/>
                                        </td>
                                        <td   name="comentario"  style="font-size: 20px">
                                            <input id="{{'comentario'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" value="" onclick="cambiarEstado(this,'{{$alimentoid}}','{{$dia_semanaid}}','{{$momentoid}}','{{$cantidadid}}','{{$comentarioid}}');
                                                    calculaTotales('tab_logic34','kcaldcs','pdcs','gdcs','hdcs')">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--BOTONES-->
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5">
                            <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-placement="auto" title="Guardar dieta">
                                <img src="\images\btns\si2.png" style="width: 100px;height: 100px;border: 0px;">
                            </button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <a href="{{route('pacientes.showPacienteObservacion',$paciente_id)}}" data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                <img src="\images\btns\no2.png" style="width: 100px;height: 100px;border: 0px;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection