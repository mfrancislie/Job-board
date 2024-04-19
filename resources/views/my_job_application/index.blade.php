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
        
        <div>Right</div>
      </div>
    </x-job-card>
  @empty
    <p>No job applications found.</p>
  @endforelse
</x-layout>
