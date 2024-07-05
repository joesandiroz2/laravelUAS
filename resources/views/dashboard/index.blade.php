<x-dashboard.layout>
    <div class="min-h-full flex flex-col items-center justify-center">
        <p class="text-4xl text-center font-bold">Welcome to the Dashboard</p>
        <p class="text-2xl text-center">Hello, {{ auth()->user()->nama }}</p>
    </div>
</x-dashboard.layout>
