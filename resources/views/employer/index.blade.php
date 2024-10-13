<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Applications' => '#']" />

    @forelse ($applications as $job)
        <x-card class="mb-4">
            <h2 class="text-lg font-medium">{{ $job->title }}</h2>
            <div class="text-slate-500">Applications:</div>
            <ul>
                @forelse ($job->jobApplications as $application)
                    <li>
                        <div>
                            <strong>Applicant:</strong> {{ $application->user->name }} <br>
                            <strong>Expected Salary:</strong> ${{ number_format($application->expected_salary) }} <br>
                            <strong>CV:</strong> <a href="{{ asset($application->cv_path) }}" target="_blank">View CV</a>
                        </div>
                    </li>
                @empty
                    <li>No applications for this job yet.</li>
                @endforelse
            </ul>
        </x-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs posted yet.
            </div>
        </div>
    @endforelse
</x-layout>