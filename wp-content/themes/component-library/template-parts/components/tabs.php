<div class="section tab__wrapper">
  <ul class="nav nav-underlined__wrapper" role="tablist">
    <?php
      $i = 0;
      foreach($tab_array as $key => $val){
        $title = $val['tab_title'];
        $formattedTitle = convert_string_to_slug($title);
        $content = $val['tab_content'];
        $active = '';
        $true = '';
        if($i === 0){
          $active = 'active';
          $true = 'true';
        }

        
        $html = '
        <li class="nav-item">
          <a class="nav-link ' . $active . ' nav-underlined" id="' . $formattedTitle . '-' . $tab_type . '" data-toggle="tab" href="#' . $formattedTitle . '" role="tab" aria-controls="' . $formattedTitle . '-' . $tab_type . '" aria-selected="' . $true . '">' . $title .'</a>
        </li>
      ';
        $i++;
       echo $html;
      }
    ?>
  </ul>
  <div class="tab-content">
  <?php
      $i = 0;
      foreach($tab_array as $key => $val){
        $title = $val['tab_title'];
        $formattedTitle = convert_string_to_slug($title);
        $content = $val['tab_content'];
        $active = '';
        $show = '';
        if($i === 0){
          $active = 'active';
          $show = 'show';
        }
      
        $html = '
        <div class="tab-pane fade ' . $show . ' ' . $active .'" id="' . $formattedTitle . '" role="tabpanel" aria-labelledby="' . $formattedTitle . '-nav-underlined">'. $content .'</div>
      ';
        $i++;
       echo $html;
      }
    ?>
  </div>
</div>