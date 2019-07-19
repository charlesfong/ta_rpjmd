@extends('layouts.layout')

 @php
	 $Misis = App\Visi::first();
 @endphp
 @if(sizeof($Misis) > 0)
	 @php
		 $Misis = $Misis->Misi->sortByDesc('bobot');
	 @endphp
 @endif
@extends('showall')
