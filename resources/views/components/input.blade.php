@props(['type' => 'text', 'label', 'name', 'id', 'class'])

<div class="relative z-0 mb-6 group w-full">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        class=" w-full block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        placeholder=" " {{ $attributes }}>
    <label for="{{ $id }}"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ $label }}</label>
    @error($name)
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>
