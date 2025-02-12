<?php view('partials/header'); ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-body-tertiary rounded-lg shadow-md border border-gray-800">
        <h2 class="text-2xl font-bold text-center">Register</h2>
        <form action="/register" method="POST" class="space-y-4">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered bg-body-tertiary w-full" id="email" required>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" class="input input-bordered bg-body-tertiary w-full" id="password" required>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password Confirm</span>
                </label>
                <input type="password" name="password_confirm" class="input input-bordered bg-body-tertiary w-full" id="password_confirm" required>
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary w-full" value="Register">Register</button>
            </div>
        </form>
        <p class="text-center">
            <a href="/login" class="link">Already have an account? Login</a>
        </p>
    </div>
</div>


<?php view('partials/footer'); ?>