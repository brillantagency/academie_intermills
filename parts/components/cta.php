<?php if(!empty($cta)) :  
    // Si on est sur une single page et que $cta['url'] est vide, fallback sur get_permalink()
    $cta_url = !empty($cta['url']) ? $cta['url'] : ($page_single ? get_permalink() : '#');
    $cta_title = !empty($cta['title']) ? $cta['title'] : __('Lire la suite', 'brillant');
    $cta_target = !empty($cta['target']) ? 'target="_blank" rel="noopener noreferrer"' : '';
?>

<a href="<?php echo esc_url($cta_url); ?>" title="<?php echo esc_attr($cta_title); ?>" <?php echo $cta_target; ?> class="cta cta_<?php echo esc_attr($cta_color); ?>">
  
  <?php if($page_single) : ?>
    <?php // SVG flèche pour page single ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="15" viewBox="0 0 37 15" fill="none">
        <path d="M0.292893 8.07113C-0.0976295 7.6806 -0.0976296 7.04744 0.292892 6.65691L6.65685 0.292951C7.04738 -0.0975733 7.68054 -0.0975734 8.07107 0.292951C8.46159 0.683475 8.46159 1.31664 8.07107 1.70716L2.41422 7.36402L8.07107 13.0209C8.46159 13.4114 8.46159 14.0446 8.07107 14.4351C7.68055 14.8256 7.04738 14.8256 6.65686 14.4351L0.292893 8.07113ZM37 7.36401L37 8.36401L1 8.36402L1 7.36402L1 6.36402L37 6.36401L37 7.36401Z" fill="#BCBCBC"/>
    </svg>
  <?php endif; ?>

  <?php echo esc_html($cta_title); ?> 

  <?php if(($cta_color === 'link' && !$page_single) ) : //or isset($page_single_carriere) ?>
    <?php // SVG flèche up ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="cta_arrow_up" width="21" height="13" viewBox="0 0 21 17" fill="none">
      <path d="M0.407872 14.5173C-0.042911 14.8376 -0.133838 15.4502 0.204781 15.8856C0.5434 16.321 1.18334 16.4143 1.63412 16.0941L1.021 15.3057L0.407872 14.5173ZM20.3285 2.45317C20.4078 1.91881 20.0196 1.41962 19.4614 1.33821L10.3652 0.011512C9.80696 -0.0699002 9.29016 0.297286 9.21085 0.831646C9.13154 1.36601 9.51974 1.86519 10.0779 1.9466L18.1635 3.12589L17.0146 10.8662C16.9353 11.4006 17.3235 11.8998 17.8817 11.9812C18.4399 12.0626 18.9567 11.6954 19.036 11.1611L20.3285 2.45317ZM1.021 15.3057L1.63412 16.0941L19.9309 3.09415L19.3178 2.30576L18.7047 1.51736L0.407872 14.5173L1.021 15.3057Z" stroke-width="2" stroke-linecap="round"/>
    </svg>
  <?php else: ?>
    <?php // SVG flèche normale ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="cta_arrow" width="22" height="22" fill="none">
      <path d="M7.65 12.214l-5.653-5.41 4.33-4.524M2.529 6.773l12.47.084" stroke-width="2" stroke-linecap="round" />
    </svg>
  <?php endif; ?>
</a>

<?php endif; ?>
