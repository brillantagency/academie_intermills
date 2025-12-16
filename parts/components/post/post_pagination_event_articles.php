
<div class="pagination">
    <div class="nav-links">
        <?php 
        echo paginate_links([
            'total'   => $query->max_num_pages,
            'current' => $paged,
            'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18" fill="none">
                        <path d="M1 1L9 9L1 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>',
            'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18" fill="none">
                        <path d="M1 1L9 9L1 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>',
        ]);
        ?>
    </div>
</div>