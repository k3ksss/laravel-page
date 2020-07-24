@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Kabineti</h1>
    <br>
    <a href="http://inventars.local/tabulas/kabineti"><input type="button" value="Atpakaļ"class="btn btn-primary"></a>
    <br>
    <input type="text" id="id" placeholder="ID" value="{{$post->id}}" disabled/>
    <input type="text" id="kabineta_nr" placeholder="Kabineta numurs"value="{{$post->kabineta_nr}}"/>
{{--    <input type="text" id="filiale" placeholder="Filiāles nosaukums"value="{{$post->filiales_nosaukums}}"/>--}}
    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{$post->filiales_nosaukums}}
    </button>
    <div class="dropdown-menu">
        @foreach($filiales as $filiale)
            <li class="dropdown-item" id = "filiale" value="{{$filiale->id}}">{{$filiale->filiales_nosaukums}}</li>
        @endforeach
    </div>

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
            var filiales_id = "{{$post->filiales_nosaukums}}";
            $(".dropdown-item").click(function(event) {
                filiales_id = event.target.value;
            });
            $("#pievinot").click(function(){

                $.ajax({
                    type: "POST",
                    url: "http://inventars.local/tabulas/kabineti/edit",
                    data: {
                            id:$('#id').val(),
                        kabineta_nr:$('#kabineta_nr').val(),
                        filiales_id:filiales_id,


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
