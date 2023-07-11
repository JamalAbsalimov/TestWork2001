@php
    $class = $value ? 'success' : 'error';
@endphp

<span class="badge-{{$class}} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100
      text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900">
    {{$text}}
</span>
