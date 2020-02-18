<div id="<?php echo $accordion_name; ?>" class="section accordion__wrapper">
  <?php 
    $i = 0;

    foreach($accordion_arr as $key => $val){
      $title = $val['accordion_panel_header'];
      $formattedTitle = convert_string_to_slug($title);
      $content = $val['accordion_panel_content'];
      $desc = $val['accordion_panel_desc'];
      $btn_txt = $val['accordion_panel_btn_txt'];
      $btn_url = $val['accordion_panel_btn_url'];
      $two_column = $val['two_column'];
      $show = '';
      $true = '';
      $collapsed = '';

      if($i === 0){
        $show = 'show';
        $true = 'true';
      }else{
        $collapsed = 'collapsed';
      }
    if($two_column){
      $html = '
      <section class="accordion-card">
      <div class="card-header">
        <h5 class="accordion-title">
        <button class="accordion-btn-header '. $collapsed .'" data-toggle="collapse" data-target="#' . $formattedTitle .'" aria-expanded="' . $true .'" aria-controls="' . $formattedTitle .'">'
          . $title .
        '</button>
        </h5>
      </div>
      <div id="' . $formattedTitle .'" class="collapse ' . $show . ' accordion_content" aria-labelledby="' . $formattedTitle .'" data-parent="#'. $accordion_name .'">
        <div class="card-body flex-grid">
          <div class="flex-2 accordion-desc flex-grid">
            <h5>' 
             . $desc .
          '</h5>
          <hr class="short-hr"/>
           <a href="' . $btn_url .'" class="btn btn-primary" >'. $btn_txt .'</a>
          </div>
          <div class="flex-2 accordion-content-right">'
           . $content .
          '</div>
        </div>
      </div>
    </section>
      ';
    }else{
      $html = '
      <section class="accordion-card">
        <div class="card-header">
          <h5 class="accordion-title">
          <button class="accordion-btn-header '. $collapsed .'" data-toggle="collapse" data-target="#' . $formattedTitle .'" aria-expanded="' . $true .'" aria-controls="' . $formattedTitle .'">'
            . $title .
          '</button>
          </h5>
        </div>
        <div id="' . $formattedTitle .'" class="collapse ' . $show . ' accordion_content" aria-labelledby="' . $formattedTitle .'" data-parent="#'. $accordion_name .'">
          <div class="card-body">'
          . $content . 
          '</div>
        </div>
      </section>
    ';
    }
      
      $i++;
      echo $html;
    };

  ?>
</div>