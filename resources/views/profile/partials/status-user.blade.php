<div>
    <h1 class="mb-4 text-lg font-medium text-gray-900 dark:text-gray-100">Account information</h1>

    <div class="mb-4">
        <h2 class="text-sm font-medium text-gray-900 dark:text-gray-100">Account Status</h2>
    <p class="text-sm {{ $user->is_active ? 'text-green-600 ' : 'text-red-600'}}">{{ $user->is_active ? 'Active' : 'Inactive' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-sm font-medium text-gray-900 dark:text-gray-100">Account Created At</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ $user->created_at->format('d M Y H:i') }}
        </p>
    </div>

    <div class="mb-4">
        <h2 class="text-sm font-medium text-gray-900 dark:text-gray-100">Last Login</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ $user->last_login_at ? $user->last_login_at->format('d M Y H:i') : 'No record' }}
        </p>
    </div>
</div>
