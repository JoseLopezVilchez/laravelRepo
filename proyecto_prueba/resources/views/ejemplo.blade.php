<?php

?>

@php
    // los proyectos de blade permiten hacer esto. Hay como etiqueticas, o directivas.
    $appName = 'Mi primer proyecto con laravel';
@endphp

{{ $appName }} <!-- esto es como un echo, aunque lo pasa por el filtro de htmlSecialChars. Tenlo en cuenta -->
{!! $appName !!} <!-- esto es como un echo, pero no lo filtra, con lo que permite meterle etiquetas -->

{{-- esto son comentarios en blade, y no aparecen en el resultado final --}}
<!-- esta parte de comentario apareceria en el resultado final {{-- pero esta no (si, blade procesa comentarios) --}} -->
<!-- esta parte de comentario apareceria en el resultado final @{{-- y esta tambien, incluyendo las llaves y barras --}} -->

@if ()
@elseif ()
@else
@endif

@if (@isset($appName)
    {!! $appName !!}
    @endisset)
@else
@endif

@unless ()
    
@endunless

