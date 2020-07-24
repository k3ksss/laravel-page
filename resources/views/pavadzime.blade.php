@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Pavadzīmes</h1>
    <br>

    <input type="text" id="id" placeholder="ID"/>
    <input type="text" id="nr" placeholder="Numurs"/>
    <input type="text" id="nosaukums" placeholder="Nosaukums"/>



    <button id="pievinot">Pievienot</button>

    <br>


    <table id="tabula">
        <tr>
            <th>ID</th>
            <th>Tipa numurs</th>
            <th>Nosaukums</th>
            <th></th>
            <th></th>


        </tr>

    </table>




    <script>

        var masiivsIN = ("{{$post}}".replace(/&quot/g,"\"").replace(/;/g,""));
        var masiivs = jQuery.parseJSON(masiivsIN);
        //alert(masiivsIN);

        function JanaNumurs(item){
            document.getElementById("tabula").innerHTML+= "<tr>"
                +"<td>"+ item.id + "</td>"
                +"<td>"+ item.nr + "</td>"
                +"<td>"+ item.nosaukums + "</td>"
                +"<td>"+ "<a href=\"http://inventars.local/tabulas/pamatlidzekli/edit/" + item.id + "\"><button>Rediģēt</button></a>" + "</td>"
                +"<td>"+"<button class=\"delete\" id=\"" + item.id + "\">Dzēst</button>" + "</td>"
                + "</tr>";
        }
        {{--var array = {{$post}};--}}
        masiivs.forEach(JanaNumurs, 1);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){

            $("#pievinot").click(function(){


                $.ajax({
                    type: "POST",
                    url: "http://inventars.local/tabulas/pamatlidzekli",
                    data: {
                        id:$('#id').val(),
                        nr:$('#nr').val(),
                        nosaukums:$('#nosaukums').val(),

                    },
                    success: function (result) {
                        alert("Ieraksts pievienots");
                    },
                    error: function (response) {
                        var kautkas = JSON.stringify(response);
                        alert(kautkas);
                        alert('eror');

                    }
                });


            });

            $(".delete").click(function(){
                // alert(this.id);

                $.ajax({
                    type: "POST",
                    url: "http://inventars.local/tabulas/pamatlidzekli/delete",
                    data: {
                        id:this.id
                    },
                    success: function (result) {
                        alert("Ieraksts dzēsts");
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
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@stop

@section('asideRight')
@stop

@section('modal')

@stop
