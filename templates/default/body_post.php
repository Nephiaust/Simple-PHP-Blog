<article class="blog-post">
    <h2 class="display-5 link-body-emphasis mb-1"><?php echo $title; ?></h2>
    <p class="blog-post-meta"><?php echo $time; ?> by <a href="#"><?php echo $createdby; ?></a></p>

    <p><?php echo $shortDesc; ?></p>
    <a href="<?php echo $permalink; ?>" class="icon-link gap-1 icon-link-hover stretched-link">
        Continue reading
        <svg class="bi">
            <use xlink:href="#chevron-right"></use>
        </svg>
    </a>
</article>