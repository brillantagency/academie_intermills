<?php 
if(!is_post_type_archive()) :

    if (have_rows('page_builder')) :
        while (have_rows('page_builder')) : the_row();

            $layout = get_row_layout();

            // Chemin du dossier du bloc
            $folder_path = get_template_directory() . '/parts/acf/blocks/' . $layout;

            // Si le dossier existe, inclut tous les fichiers PHP dedans
            if (is_dir($folder_path)) {
                foreach (glob($folder_path . '/*.php') as $file) {
                    include $file;
                }
            } else {
                // Sinon, vérifie si le fichier existe directement dans blocks/
                get_template_part('parts/acf/blocks/' . $layout);
            }

        endwhile; wp_reset_postdata();
    endif;

else :

    $blocs = get_field('page_builder', 'option');
    if( $blocs ):
        // Boucle sur tous les blocs
        foreach( $blocs as $bloc ):
            // Si c'est un tableau ACF (Options Page)
            if( is_array($bloc) && isset($bloc['acf_fc_layout']) ):
                $layout = $bloc['acf_fc_layout'];
            else:
                continue;
            endif;

            // Chemin du dossier du bloc
            $folder_path = get_template_directory() . '/parts/acf/blocks/' . $layout;

            // Inclut les fichiers PHP du bloc
            if( is_dir($folder_path) ):
                foreach( glob($folder_path . '/*.php') as $file ):
                    include $file;
                endforeach;
            else:
                get_template_part('parts/acf/blocks/' . $layout);
            endif;

        endforeach;
    endif;
endif;
?>
