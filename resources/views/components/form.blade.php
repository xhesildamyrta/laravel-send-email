<form action="{{ route('sendEmail') }}" method="POST">
    @csrf
    <div class="flex flex-col justify-center mx-auto max-w-md min-h-screen px-4 ">
        @if (session('success'))
            <div class="font-bold text-green-500">{{ session('success') }}</div>
        @endif
        <div class="mb-6 text-xl text-blue-700 font-bold">Send Email Form</div>
        <x-input label="Email Address" name="email" id="email" type="email"
            class="@error('email') is-invalid @enderror" />
        <x-input label="Text" name="text" id="text" type="text" />
        <x-input label="Datetime" name="datetime" id="datetime" type="datetime-local" />

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>
