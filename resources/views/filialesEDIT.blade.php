@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Filiāles</h1>
    <br>
    <a href="http://inventars.local/tabulas/filiales"><input type="button" value="Atpakaļ"class="btn btn-primary"></a>
    <br>
    <input type="text" id="id" placeholder="ID" value="{{$post->id}}" disabled/>
    <input type="text" id="filiale" placeholder="Filiāles nosaukums"value="{{$post->filiales_nosaukums}}"/>
    <input type="text" id="adrese" placeholder="Adrese"value="{{$post->adrese}}"/>


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
                    url: "http://inventars.local/tabulas/filiales/edit",
                    data: {
                            id:$('#id').val(),
                        filiales_nosaukums:$('#filiale').val(),
                        adrese:$('#adrese').val(),


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
