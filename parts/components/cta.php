<?php if(!empty($cta)) :  ?>
<a href="<?php echo $cta['url']; ?>" title="<?php echo $cta['title']; ?>" <?php echo $cta['target']? 'target="_blank" rel="noopener noreferrer"' : ''; ?> class="cta cta_<?php echo $cta_color; ?>">
  <?php echo $cta['title']; ?> 

  <svg xmlns="http://www.w3.org/2000/svg" class="cta_arrow" width="16" height="14" fill="none">
    <path d="M7.65 12.214l-5.653-5.41 4.33-4.524M2.529 6.773l12.47.084" stroke-width="2" stroke-linecap="round" />
  </svg>
</a>
<?php endif; ?>