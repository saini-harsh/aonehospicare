<x-mail::message>
    # Welcome to A One Hospicare, {{ $user->name }}!

    Your account has been created successfully. We are excited to have you as part of our professional medical equipment
    community.

    With your new account, you can:
    * Track your medical equipment orders
    * Manage your professional profile
    * Access exclusive clinical furniture collections
    * Get quick quotes for institutional orders

    <x-mail::button :url="config('app.url') . '/profile'">
        View My Profile
    </x-mail::button>

    If you have any questions or need specialized assistance, feel free to contact our support team.

    Best Regards,<br>
    A One Hospicare
</x-mail::message>