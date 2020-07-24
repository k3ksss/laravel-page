@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Pamatlīdzekļi</h1>
    <br>
    <a href="http://inventars.local/tabulas/pamatlidzekli"><input type="button" value="Atpakaļ"class="btn btn-primary"></a>
    <br>
    <input type="text" id="id" placeholder="ID" value="{{$post->id}}" disabled/>
    <input type="text" id="nr" placeholder="Numurs"value="{{$post->nr}}"/>
    <input type="text" id="nosaukums" placeholder="Nosaukums"value="{{$post->nosaukums}}"/>



    <button id="pievinot"class="btn btn-primary">Rediģēt</button>

    <br>


    <script>
        {{--alert({{$post}});--}}
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
                    url: "http://inventars.local/tabulas/pamatlidzekli/edit",
                    data: {
                            id:$('#id').val(),
                            nr:$('#nr').val(),
                           nosaukums:$('#nosaukums').val(),



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
