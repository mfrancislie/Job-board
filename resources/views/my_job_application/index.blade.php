<x-layout>
  <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

  @forelse ($applications as $application)
    <x-job-card :job="$application->job" >
      <div class="flex items-center justify-between text-xs text-slate-500">
        <div class="flex flex-col space-y-2 border border-gray-200 rounded-md p-4">
          <div class="text-gray-500">Applied {{ $application->created_at->diffForHumans() }}</div>
          <div class="flex items-center">
            <span class="text-gray-500 ">Other applicants: </span>
            <span class="font-bold text-gray-800 ml-1">{{ Str::plural('applicant', $application->job->job_applications_count - 1) }}</span>
            <span class="text-gray-500">({{ $application->job->job_applications_count - 1 }})</span>
          </div>
          <div class="flex items-center">
            <span class="text-gray-500">Your asking salary: </span>
            <span class="font-bold text-gray-800 ml-1">${{ number_format($application->expected_salary) }}</span>
          </div>
          <div class="flex items-center">
            <span class="text-gray-500">Average asking salary: </span>
            <span class="font-bold text-gray-800 ml-1">${{ number_format($application->job->job_applications_avg_expected_salary) }}</span>
          </div>
        </div>
        {{-- cancel btn for the application --}}
        <div>
          <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>Cancel</x-button>
          </form>
        </div>
      </div>
    </x-job-card>
  @empty
  <div class="rounded-md border border-dashed border-slate-300 p-8">
    <div class="text-center font-medium">
      No job application yet
    </div>
    <div class="text-center">
      Go find some jobs <a class="text-indigo-500 hover:underline"
        href="{{ route('jobs.index') }}">here!</a>
    </div>
  </div>
  @endforelse
</x-layout>
