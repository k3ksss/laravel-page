@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Darbinieki</h1>
    <br>
    <a href="http://inventars.local/tabulas/darbinieki"><input type="button" class="btn btn-primary" value="Atpakaļ"></a>
    <br>
    <input type="text" id="id" placeholder="ID" value="{{$post->id}}" disabled/>
    <input type="text" id="vards" placeholder="Vārds"value="{{$post->vards}}"/>
    <input type="text" id="uzvards" placeholder="Uzvārds"value="{{$post->uzvards}}"/>
    <input type="text" id="amats" placeholder="Amats"value="{{$post->amats}}"/>
    <input type="text" id="epasts" placeholder="e-pasts"value="{{$post->epasts}}"/>
    <input type="text" id="numurs" placeholder="Telefona numurs"value="{{$post->telefona_numurs}}"/>

    <button id="pievinot" class="btn btn-primary">Rediģēt</button>

    <br>


    <script>
        {{--var masiivsIN = ("{{$post}}".replace(/&quot/g,"\"").replace(/;/g,""));--}}
        {{--var masiivs = jQuery.parseJSON(masiivsIN);--}}
        {{--alert(masiivsIN);--}}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){

            $("#pievinot").click(function(){


                $.ajax({
                    type: "POST",
                    url: "http://inventars.local/tabulas/darbinieki/edit",
                    data: {
                            id:$('#id').val(),
                            vards:$('#vards').val(),
                            uzvards:$('#uzvards').val(),
                        amats:$('#amats').val(),
                        epasts:$('#epasts').val(),
                            telefona_numurs:$('#numurs').val(),

                    },
                    success: function (result) {
                        alert("Ieraksts rediģēts");
                    },
                    error: function (response) {
                        var kautkas = JSON.stringify(response);
                        alert(kautkas);
                        alert('eror');

                    }
                });


            });


        });
    </script>

@stop

@section('asideRight')
@stop

@section('modal')

@stop
