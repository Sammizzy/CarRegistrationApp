<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold">Users</h1>
        <div class="space-x-2">
            <a href="{{ route('admin.users.export') }}" class="bg-emerald-600 text-white px-3 py-2 rounded">Export Excel</a>
            <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 text-white px-3 py-2 rounded">New User</a>
        </div>
    </div>

    <table class="w-full border-collapse">
        <thead>
        <tr class="text-left border-b">
            <th class="py-2">Name</th>
            <th class="py-2">Car Registration</th>
            <th class="py-2">Email</th>
            <th class="py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $u)
            <tr class="border-b">
                <td class="py-2">{{ $u->first_name }} {{ $u->last_name }}</td>
                <td class="py-2">{{ $u->car_registration }}</td>
                <td class="py-2">{{ $u->email }}</td>
                <td class="py-2">
                    <a href="{{ route('admin.users.edit', $u) }}" class="underline">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $users->links() }}</div>
</x-app-layout>
