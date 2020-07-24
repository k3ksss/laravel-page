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

 <h1>Inventāra reģistrs</h1>
<br>

 <input type="text" id="numurs" placeholder="numurs"/>
 <input type="text" id="nosaukums" placeholder="nosaukums"/>
 <input type="text" id="mervieniba" placeholder="mervieniba"/>
 <input type="text" id="daudzums" placeholder="daudzums"/>
 <input type="text" id="adreseNO" placeholder="adreseNO"/>
 <input type="text" id="kabinetsNO" placeholder="kabinetsNO"/>
 <input type="text" id="adreseUZ" placeholder="adreseUZ"/>
 <input type="text" id="kabinetsUZ" placeholder="kabinetsUZ"/>
 <input type="text" id="summaEUR" placeholder="summaEUR"/>



 <button id="fetch">Pievienot</button>


@csrf
{{--    <form action="{{'kabinetiController@fetchData'}}" method="post">
        <label for="field2"><span>Ievadiet inventāra nr.<input type="text" class="input-field" name="kods" value="" /></label>
        <br>
        <label><span> </span><input type="submit" id="fetch" value="Ielādēt"></label>
       --}}




@stop

@section('asideRight')
@stop

@section('modal')

@stop
