<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin - Users
        </h2>
    </x-slot>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="px-4 py-2">이름</th>
                    <th class="px-4 py-2">이메일</th>
                    <th class="px-4 py-2">상태</th>
                    <th class="px-4 py-2">관리</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-4 py-2 text-center">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-center">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-center">
                            @if ($user->is_blocked)
                                <span class="text-red-500">차단됨</span>
                            @else
                                <span class="text-green-600">정상</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form method="POST" action="{{ route('admin.users.block', $user) }}">
                                @csrf
                                @method('PATCH')
                                <button class="text-blue-500 hover:underline text-sm" type="submit">
                                    {{ $user->is_blocked ? '차단 해제' : '차단' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
