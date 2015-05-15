<?php
/**
 * Created by PhpStorm.
 * User: anita
 * Date: 5/14/15
 * Time: 5:38 PM
 */

?>
<div class="gwp-set-languages postbox  hide-if-js" style="display: block">
    <div class="handlediv" title="Click to toggle"><br></div>
    <h3 class="hndle ui-sortable-handle">
        <strong><?php _e('Set the languages for the site','gwp'); ?></strong>
    </h3>

    <div class="inside">
        <form action="">

            <?php
            $star_point = 0;
            $main_languages = 3;
            foreach($all_languages as $id=>$data)
            {
                $style = '';
                if($star_point < $main_languages)
                {
                    $style = 'font-weight: bold';
                }
                ?>
                <input type="checkbox" name="site-languages" id="<?php echo $id; ?>" value="<?php echo $id; ?>"/>
                <label style="<?php echo $style; ?>" for="<?php echo $id; ?>"><?php echo $data['name']; ?></label>&nbsp;|
                <?php
                $star_point++;
            }
            ?>
        </form>
    </div>
</div>
