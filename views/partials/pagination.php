<div class="flex justify-center mt-4">
    <div class="join">
        <?php if (isset($currentPage) && $currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>" class="pagination-link join-item btn btn-md border border-gray-600 btn-outline" data-page="<?= $currentPage - 1 ?>"><<</a>
        <?php endif; ?>
        <?php if (isset($totalPages)): ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="pagination-link join-item btn btn-md border border-gray-600 btn-outline <?= $i == $currentPage ? 'join-item btn-active btn-md border border-gray-600 btn-outline' : '' ?>" data-page="<?= $i ?>"><?= $i ?></a>
            <?php endfor; ?>
        <?php endif; ?>
        <?php if (isset($currentPage) && $currentPage < $totalPages): ?>
            <a href="?page=<?= $currentPage + 1 ?>" class="pagination-link join-item btn btn-md border border-gray-600 btn-outline" data-page="<?= $currentPage + 1 ?>">>></a>
        <?php endif; ?>
    </div>
</div>

