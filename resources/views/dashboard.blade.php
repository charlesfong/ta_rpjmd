@extends('layouts.layout')

@php
    $Misis = App\Visi::first()->Misi->sortByDesc('bobot');
@endphp
@extends('showall')
