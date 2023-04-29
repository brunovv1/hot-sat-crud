<?php if($paginator->hasPages()): ?>
    <div class="pagination">
        <?php if($paginator->onFirstPage()): ?>
            <a href="#" disabled>&laquo;</a>
        <?php else: ?>
            <a class="active-page" href="<?php echo e($paginator->previousPageUrl()); ?>">&laquo;</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <a class="<?php echo e($paginator->currentPage() == $i ? 'active-page' : ''); ?>" href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
        <?php endfor; ?>

        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>">&raquo;</a>
        <?php else: ?>
            <a href="#" disabled>&laquo;</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\bruno\Desktop\hotsat\minigestor\resources\views/layouts/pagination.blade.php ENDPATH**/ ?>