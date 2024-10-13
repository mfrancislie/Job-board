<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Jobs' => route('my-jobs.index')]" />

    <!-- Button to redirect to the job creation page -->
    <div class="mb-4">
        <x-link-button :href="route('my-jobs.create')" >
            Create Job
        </x-link-button>
    </div>

    @forelse ($jobs as $job)
    <x-job-card class="mb-4" :$job>
      <div class="mt-4">
        <x-link-button :href="route('jobs.show', $job)" >
              View
            </x-link-button>
        </div>
    </x-job-card>
    @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
        <div class="text-center font-medium">
          Empty!
        </div>
        
        </div>
      </div>
    @endforelse
</x-layout>