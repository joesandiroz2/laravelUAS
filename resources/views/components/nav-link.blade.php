@props(['active' => false])

<a class="inline-flex font-medium {{ $active ? 'text-blue-500' : 'text-neutral-400 hover:text-neutral-500' }}" aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>{{ $slot }}</a>
