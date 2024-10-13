<x-layout>
    <x-card>
        <form action="{{ route('my-jobs.store') }}" method="post">
            @csrf

            <div>
                <label for="title">Job Title</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div>
                <label for="description">Job Description</label>
                <textarea name="description" id="description" required></textarea>
            </div>

            <div>
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" required>
            </div>

            <div>
                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>
            </div>

            <div>
                <label for="category">Category</label>
                <select name="category" id="category" required>
                    <option value="">Select a category</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                    <option value="Sales">Sales</option>
                    <option value="Marketing">Marketing</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>

            <div>
                <label for="experience">Experience Level</label>
                <select name="experience" id="experience" required>
                    <option value="entry">Entry</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="senior">Senior</option>
                </select>
            </div>

            <button type="submit">Create Job</button>
        </form>
    </x-card>
</x-layout>