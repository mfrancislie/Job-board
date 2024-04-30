<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Board</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body class="from-10% via-30% to-90%
 mx-auto mt-10 max-w-3xl bg-gradient-to-r 
 from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">

 {{-- 

  if the not yet login gues will display 
  {{ auth()->user()->name ?? 'Guest' }}

  --}}

  <nav class="mb-8 flex justify-between text-lg font-medium">
    <ul class="flex space-x-2">
      <li>
        <a href="{{ route('jobs.index') }}">Home</a>
      </li>
    </ul>

    <ul class="flex space-x-2">
      @auth
        <li>
          <a href="{{ route('my-job-applications.index') }}">
            {{ auth()->user()->name ?? 'Anynomus' }}: Applications
          </a>
        </li>
        <li>
          <a href="{{ route('my-jobs.index') }}">
           My Jobs
          </a>
        </li>
        <li>
          <form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Logout</button>
          </form>
        </li>
      @else
        <li>
          <a href="{{ route('auth.create') }}">Sign in</a>
        </li>
      @endauth
    </ul>
  </nav>

  @if (session('success'))
    <div role="alert"
      class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
      <p class="font-bold">Success!</p>
      <p>{{ session('success') }}</p>
    </div>
  @endif
 
   {{$slot}}
</body>
</html>