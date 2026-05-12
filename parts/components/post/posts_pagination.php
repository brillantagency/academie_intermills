<div class="pagination">
    <div class="nav-links">
        <?php

        $big = 999999999;

        echo paginate_links([
            'base' => str_replace(
                $big,
                '%#%',
                esc_url(get_pagenum_link($big))
            ),

            'format'   => '',
            'current'  => $paged,
            'total'    => $query->max_num_pages,

            'mid_size' => 2,
            'end_size' => 1,

            'prev_text' => '‹',
            'next_text' => '›',
        ]);
        ?>
    </div>
</div>