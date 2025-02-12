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
        <div class="form-control mt-4">
            <button type="button" class="btn btn-danger w-full" onclick="openDeleteModal()">Delete Account</button>
        </div>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md border border-gray-800">
        <h3 class="text-lg font-bold text-secondary mb-4">Are you sure you want to delete your account?</h3>
        <form action="/delete-account" method="POST">
            <div class="flex justify-end space-x-4">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>

        </form>
    </div>
</div>

<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<?php view('partials/footer'); ?>