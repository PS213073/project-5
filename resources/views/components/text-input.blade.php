@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'bg-white border-[#527b68]
focus:border-[#3E6553] focus:ring-[#527b68] rounded-md shadow-lg block w-full px-4 py-2 text-sm font-normal leading-5 text-gray-600 bg-white border  rounded-md appearance-none focus:outline-none focus:ring transition duration-150 ease-in-out',
]) !!}>
