@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Kabineti</h1>
    <br>
    <div>
        <input type="text" id="id" placeholder="ID"/>
        <input type="text" id="kabineta_nr" placeholder="Kabineta numurs"/>
{{--        <input type="text" id="fliale" placeholder="Filiāles nosaukums"/>--}}
            <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filiāle
            </button>
            <div class="dropdown-menu">
                @foreach($filiales as $filiale)
                    <li class="dropdown-item" id = "filiale" value="{{$filiale->id}}">{{$filiale->filiales_nosaukums}}</li>
                @endforeach
            </div>

        <button id="pievinot"class="btn btn-success">Pievienot</button>
    </div>


    <br>
    <br>

    <table id="tabula">
        <tr>
            <th>ID</th>
            <th>Kabineta numurs</th>
            <th>Filiāles nosaukums</th>
            <th></th>
            <th></th>


        </tr>

    </table>




    <script>

        var masiivsIN = ("{{$post}}".replace(/&quot/g,"\"").replace(/;/g,""));

        var masiivs = jQuery.parseJSON(masiivsIN);
        function JanaNumurs(item){
            document.getElementById("tabula").innerHTML+= "<tr>"
                +"<td>"+ item.id + "</td>"
                +"<td>"+ item.kabineta_nr + "</td>"
                +"<td>"+ item.filiales_nosaukums + "</td>"
                +"<td>"+ "<a href=\"http://inventars.local/tabulas/kabineti/edit/" + item.id + "\"><button class=\"btn btn-warning\">Rediģēt</button></a>" + "</td>"
                +"<td>"+"<button class=\"btn btn-danger\" id=\"" + item.id + "\" onClick=\"deleteFunction(" + item.id + ")\">Dzēst</button>" + "</td>"
                + "</tr>";
        }
        var skaits = masiivs.length;


        var lppSkaits;
        var x=0;

        if(skaits>10){
            for(x;x<10;x++){
                JanaNumurs(masiivs[x]);
            }
            if(skaits%10!==0){
                lppSkaits = ((skaits-(skaits%10))/10)+1;
            }else {
                lppSkaits = ((skaits-(skaits%10))/10);
            }
            // document.getElementById("tabula").innerHTML+="<button id=\"previous\" class=\"btn btn-info\">Iepriekšējā lapa</button>"
            document.getElementById("tabula").innerHTML+="<button id=\"next\" class=\"btn btn-info\"onClick=\"nextFunction()\">Nākamā lapa</button>"

        }else{
            lppSkaits=1;
            for(x;x<skaits;x++){
                JanaNumurs(masiivs[x]);
            }
        }
        var siLapa = 1;







        // $("#next").click(function(){
        function nextFunction(){

            siLapa++;
            // alert(siLapa);

            document.getElementById("tabula").innerHTML="            <th>ID</th>\n" +
                "            <th>Kabineta numurs</th>\n" +
                "            <th>Filiāles nosaukums</th>\n" +
                "            <th></th>\n" +
                "            <th></th>";


            var x2 = (siLapa * 10)-10;



            if(siLapa===lppSkaits){
                for(x2;x2<skaits;x2++){
                    JanaNumurs(masiivs[x2]);
                }
            }else{
                for (x2; x2 < (siLapa * 10); x2++) {
                    JanaNumurs(masiivs[x2]);
                }
            }

            document.getElementById("tabula").innerHTML+="<button id=\"previous\" class=\"btn btn-info\" onClick=\"previousFunction()\">Iepriekšējā lapa</button>"
            if (siLapa !== lppSkaits) {
                document.getElementById("tabula").innerHTML+="<button id=\"next\" class=\"btn btn-info\"onClick=\"nextFunction()\">Nākamā lapa</button>"
            }
            // });
        }
        // $("#previous").click(function(){
        function previousFunction() {
            siLapa--;
            // alert(siLapa);

            // alert("ko");
            document.getElementById("tabula").innerHTML="            <th>ID</th>\n" +
                "            <th>Kabineta numurs</th>\n" +
                "            <th>Filiāles nosaukums</th>\n" +
                "            <th></th>\n" +
                "            <th></th>";


            var x1 = (siLapa * 10)-10;
            for (x1; x1 < (siLapa * 10); x1++) {
                JanaNumurs(masiivs[x1]);
            }

            if (siLapa !== 1) {
                document.getElementById("tabula").innerHTML+="<button id=\"previous\" class=\"btn btn-info\" onClick=\"previousFunction()\">Iepriekšējā lapa</button>"
            }


            document.getElementById("tabula").innerHTML+="<button id=\"next\" class=\"btn btn-info\"onClick=\"nextFunction()\">Nākamā lapa</button>"
            // });
        }
        function deleteFunction(idIN) {
            // alert(idIN);

            $.ajax({
                type: "POST",
                url: "http://inventars.local/tabulas/kabineti/delete",
                data: {
                    id: idIN
                },
                success: function (result) {
                    location.reload();
                    alert("Ieraksts dzēsts");
                },
                error: function (response) {
                    var kautkas = JSON.stringify(response);
                    alert(kautkas);
                    alert('eror');

                }
            });

        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            var filiales_id;
            $(".dropdown-item").click(function(event) {
                filiales_id = event.target.value;
            });

                $("#pievinot").click(function(){


                $.ajax({
                    type: "POST",
                    url: "http://inventars.local/tabulas/kabineti",
                    data: {
                        id:$('#id').val(),
                        kabineta_nr:$('#kabineta_nr').val(),
                        filiales_id:filiales_id,

                    },
                    success: function (result) {
                        location.reload();
                        alert("Ieraksts pievienots");
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
