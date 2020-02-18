<?php
  $slider = '';
  $slide_wrapper_start = '';
  $slide_wrapper_end = '';
  $slide_attr = 'class="modal-content__wrapper"';
  $slide_controls = '';

  if(count($modal_arr) > 1){
    $slider = 'js-modal-slider';
    $slide_wrapper_start = '<div class="modal-slider" ' . $slider . '>';
    $slide_wrapper_end = '</div>';
    $slide_controls = '<button class="slide-control slide-next btn btn-primary btn-lg btn-white">Next</button>';
  }

  if($modal_button['include_button'] === true){
    $modal_trigger = '
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'. $modal_name . '">'
        . $modal_button['button_text'] .
      '</button>
    ';

    echo $modal_trigger;
  }

?>

<div class="traina_wp-modal__wrapper modal fade" id="<?php echo $modal_name; ?>" tabindex="-1"  aria-labelledby="<?php $modal_name.'Label'; ?>" aria-hidden="true" >
  <div class="modal-dialog" style="--bg-color:<?php echo color_generator()[0]?>">
    <?php echo $slide_wrapper_start ?>
      <?php
        $slide_index = 0;
        $i = 0;
        // var_dump($modal_arr);

        foreach($modal_arr as $key => $val){
          $header = $val[$i]["header"];
          $subheader = $val[$i]["subheader"];
          $left_column_content = $val[$i]["left_column_content"];
          $right_column_content = $val[$i]["right_column_content"];

          if(count($modal_arr) > 1){
            $slide_attr = 'class="modal-slide__wrapper" data-slide-index="' . $slide_index . '"';
          }

          $html = '
              <div ' . $slide_attr . ' ">
                <div class="modal-header flex-grid">
                  <h2 class="header">'. $header .'</h2>
                  <h4 class="subheader">'. $subheader  .'</h4>
                  <button data-dismiss="modal">X</button>
                </div>
                <div class="modal-content flex-grid">
                  <div class="left-column">'
                  . $left_column_content .
                  '</div>
                  <div class="right-column flex-grid column">'
                    . $right_column_content . ' ' . $slide_controls .
                  '</div>
                </div>
              </div>
          ';
          $slide_index++;
          if(count($modal_arr) > 1){
            $index++;
          };
          echo $html;
        }
      ?>
    <?php echo $slide_wrapper_end ?>
  </div>
</div>
