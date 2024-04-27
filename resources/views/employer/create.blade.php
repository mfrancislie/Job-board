<x-layout>
  <x-card>
    <form action="{{ route('employer.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="company_name" :required="true">Company Name</label>
        <x-text-input name="company_name" />
        @if($errors->has('company_name'))
          <span class="text-red-500 text-sm">{{ $errors->first('company_name') }}</span>
        @endif
      </div>

      <x-button class="w-full">Create</x-button>
    </form>
  </x-card>
</x-layout>