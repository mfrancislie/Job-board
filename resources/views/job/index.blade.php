<x-layout>
    @foreach ($jobs as $job)
    <x-card>
        {{$job->title}}
    </x-card>
    @endforeach
</x-layout>