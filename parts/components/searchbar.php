<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Recherche pour: ', 'brillant'); ?></span>
        <input type="search" class="search-field"
            placeholder="<?php esc_attr_e('Trouvez ce que vous cherchez...', 'brillant'); ?>"
            value="<?php echo get_search_query(); ?>" 
            name="s"
            title="<?php esc_attr_e('Recherche pour: ', 'brillant'); ?>" />
    </label>
    <button type="submit" class="search-submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
        <path d="M9.00098 0C13.9721 0 18.0019 3.85771 18.002 8.61621L17.9902 9.05957C17.87 11.33 16.8308 13.3675 15.2227 14.8408L21.1641 20.4717C21.5647 20.8516 21.582 21.484 21.2021 21.8848C20.8223 22.2855 20.1899 22.3025 19.7891 21.9229L13.5771 16.0361C12.2362 16.7956 10.6719 17.2324 9.00098 17.2324L8.53809 17.2207C3.93567 16.9974 0.245096 13.4651 0.0117188 9.05957L0 8.61621C7.33921e-06 3.85779 4.02998 0.000131193 9.00098 0ZM9.00098 2C5.05126 2.00013 2.00001 5.04385 2 8.61621C2.0001 12.1885 5.05132 15.2323 9.00098 15.2324C12.9508 15.2324 16.0019 12.1886 16.002 8.61621C16.0019 5.04377 12.9508 2 9.00098 2Z" fill="#3D3D3D"/>
        </svg>
    </button>
</form>
