<?php view('partials/header'); ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-body-tertiary rounded-lg shadow-md border border-gray-800">
        <h2 class="text-2xl font-bold text-center">Profile</h2>
        <form action="/profile" method="POST" class="space-y-4">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered bg-body-tertiary w-full" value="<?= $user->email ?>" disabled>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Current Password (required to change password)</span>
                </label>
                <input type="password" name="current_password" class="input input-bordered bg-body-tertiary w-full">
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">New Password (leave blank to keep current password)</span>
                </label>
                <input type="password" name="password" class="input input-bordered bg-body-tertiary w-full">
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary w-full">Update Profile</button>
            </div>
        </form>
    </div>
</div>

<?php view('partials/footer'); ?>