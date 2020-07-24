@extends('layout')
@section('title', 'PIKC RVT - Kabineti')



@section('content')

 <h1>Tabulas</h1>
@csrf

 <a href="http://inventars.local/tabulas/darbinieki"><input type="button" value="Darbinieki"class="btn btn-primary"></a>
 <a href="http://inventars.local/tabulas/filiales"><input type="button" value="Filiāles"class="btn btn-primary"></a>
 <a href="http://inventars.local/tabulas/kabineti"> <input type="button"  value="Kabineti"class="btn btn-primary"></a>
 <a href="http://inventars.local/tabulas/mazvertigie_lidzekli"><input type="button" href="darbinieki" value="Mazvērtīgie līdzekļi"class="btn btn-primary"></a>
 <a href="http://inventars.local/tabulas/pamatlidzekli"><input type="button" href="darbinieki" value="Pamatlīdzekļi"class="btn btn-primary"></a>
 <a href="http://inventars.local/tabulas/pavadzime"><input type="button"  value="Pavadzīme"class="btn btn-primary"></a>





@stop

@section('asideRight')
@stop

@section('modal')

@stop
