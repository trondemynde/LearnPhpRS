
<?php view('partials/header'); ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-body-tertiary rounded-lg shadow-md border border-gray-800">
        <h2 class="text-2xl font-bold text-center">Reset Password</h2>
        <form action="/PasswordReset" method="POST" class="space-y-4">
            <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">New Password</span>
                </label>
                <input type="password" name="password" class="input input-bordered bg-body-tertiary w-full" required>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Confirm New Password</span>
                </label>
                <input type="password" name="password_confirm" class="input input-bordered bg-body-tertiary w-full" required>
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary w-full">Reset Password</button>
            </div>
        </form>
    </div>
</div>

<?php view('partials/footer'); ?>