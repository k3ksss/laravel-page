@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

    <h1>Mazvērtigie līdzekļi</h1>
    <br>

    <input type="text" id="id" placeholder="ID"/>
    <input type="text" id="tipa_nr" placeholder="Tipa numurs"/>
    <input type="text" id="nosaukums" placeholder="Nosaukums"/>



    <button id="pievinot" class="btn btn-success">Pievienot</button>

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
                +"<td>"+ item.tipa_nr + "</td>"
                +"<td>"+ item.nosaukums + "</td>"
                +"<td>"+ "<a href=\"http://inventars.local/tabulas/mazvertigie/edit/" + item.id + "\"><button class=\"btn btn-warning\">Rediģēt</button></a>" + "</td>"
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
                "            <th>Tipa numurs</th>\n" +
                "            <th>Nosaukums</th>\n" +
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
                "            <th>Tipa numurs</th>\n" +
                "            <th>Nosaukums</th>\n" +
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
                url: "http://inventars.local/tabulas/mazvertigie/delete",
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

            $("#pievinot").click(function(){


                $.ajax({
                    type: "POST",
                    url: "http://inventars.local/tabulas/mazvertigie",
                    data: {
                        id:$('#id').val(),
                        tipa_nr:$('#tipa_nr').val(),
                        nosaukums:$('#nosaukums').val(),

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
