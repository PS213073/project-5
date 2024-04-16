<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center justify-center bg-[#3E6553] hover:bg-[#284538] w-full text-center text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
