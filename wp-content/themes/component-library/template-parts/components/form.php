<form action="" class="gform_wrapper">
  <div class="gform_body">
    <?php
        foreach($form_arr as $label){
            $formattedLabel = convert_string_to_slug($label);
            $html = '
                <div class="form-group">
                    <label for="' . $formattedLabel . '" class="gfield_label">'. $label .'</label>
                    <input name="'. $formattedLabel . '" type="text" placeholder="'. $label .'" />
                    ';
            echo $html;
        }
    ?>
    <textarea type="" placeholder="Comments" autofocus>Comments</textarea>
    <label></label><input type="checkbox">Terms & Conditions
    <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
