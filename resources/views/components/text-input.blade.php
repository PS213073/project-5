@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'bg-white border-[#527b68]
focus:border-[#3E6553] focus:ring-[#527b68] rounded-md shadow-lg',
]) !!}>
