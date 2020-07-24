@extends('layout')
@section('title', 'PIKC RVT - Kabineti')
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

                $(document).ready(function(){
                   $("#fetch").click(function(){
                      // alert($('#numurs').val());
                        var go = ($('#numurs').val());
                      //  $.post("/public/kabineti/" + go);

                       // $("#lietas").after("<tr><td>TEST</td>");

                       $.ajax({
                           type: "POST",
                           url: "/public/kabineti/" + go,

                           success: function (result) {
                               var ting = result.Daudzums;
                               //alert(ting);
                               $("#lietas").append("<tr><td>"+result.nr+"</td><td>"+result.Nosaukums+"</td><td>"+result.Mērvienība+"</td><td>"+result.Daudzums+"</td><td>"+result.no+"</td><td>"+result.KabinetsNO+"</td><td>"+result.uz+"</td><td>"+result.KabinetsUZ+"</td><td>"+result.SummaEUR+"</td>");
                           },
                           error: function (response) {
                               alert('eror');
                           }
                       });


                   });
                });


    </script>
@stop


@section('content')

<div class="form-style-2-heading"> <h1>Pavadzīmju veidotājs</h1> </div>
@csrf
{{--    <form action="{{'kabinetiController@fetchData'}}" method="post">
        <label for="field2"><span>Ievadiet inventāra nr.<input type="text" class="input-field" name="kods" value="" /></label>
        <br>
        <label><span> </span><input type="submit" id="fetch" value="Ielādēt"></label>
       --}}
Ievadiet inventāra nr.
<input type="text" id="numurs"/>
    <button id="fetch">TEST</button>
        <br><br>

        <head>
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
        </head>
        <body>
        <br>
        <button href="/public/kabineti/generate-pdf">PDF</button>
        <br>
        <table id="lietas">
            <tr>
                <th>Inventara nr.</th>
                <th>Nosaukums</th>
                <th>Mērvienība</th>
                <th>Daudzums</th>
                <th>Adrese no kuras izsniedz preces</th>
                <th>Kabineta nr.</th>
                <th>Adrese, uz kurieni pārvieto preces</th>
                <th>Kabineta nr.</th>
                <th>Summ EUR, ar PVN</th>
            <tr>


        </table>

        </body>
        </html>

    </form>
@stop

@section('asideRight')
@stop

@section('modal')

@stop
