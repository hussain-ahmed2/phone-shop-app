<button {{ $attributes(["type" => "submit", "class" => "w-full bg-teal-500 text-white py-2 border-2 border-transparent hover:bg-teal-600 active:ring-4 ring-teal-500/50 transition duration-300"]) }}>
    {{ $slot }}
</button>
