<?php view('partials/header'); ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-body-tertiary rounded-lg shadow-md border border-gray-800">
        <h2 class="text-2xl font-bold text-center">Reset Password</h2>
        <form action="/PasswordResetRequest" method="POST" class="space-y-4">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered bg-body-tertiary w-full" required>
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary w-full">Send Password Reset Link</button>
            </div>
        </form>
        <?php if (isset($_SESSION['reset_link'])): ?>
            <div class="mt-4 p-4 border border-gray-300 rounded text-center">
                <h3 class="text-lg font-semibold">Password reset link (for testing):</h3>
                <p class="mt-2">
                    <a href="<?= $_SESSION['reset_link'] ?>" class="btn px-6 mt-7 btn-secondary w-full" title="<?= $_SESSION['reset_link'] ?>">
                        <?= substr($_SESSION['reset_link'], 0, 40) . '...' ?>
                    </a>
                </p>
            </div>
            <?php unset($_SESSION['reset_link']); ?>
        <?php endif; ?>
    </div>
</div>

<?php view('partials/footer'); ?>