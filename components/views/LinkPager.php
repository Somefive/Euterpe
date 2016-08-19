<?php
/* @var array $array */
/* @var string $url */
/* @var int $previous */
/* @var int $next */
?>

<style>
    .link-pager{
        padding-left: 10px;
    }
</style>
<div class="link-pager">
    <nav>
        <ul class="pagination">
            <li>
                <a href="<?=$url.'&page='.$previous?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php foreach($array as $page): ?>
                <li><a href="<?=$url.'&page='.$page?>"><?=$page?></a></li>
            <?php endforeach?>
            <li>
                <a href="<?=$url.'&page='.$next?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>