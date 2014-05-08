<textarea id="raw_html_content" style="width:100%; min-height:200px" name="meta[raw_html]">
    <?= htmlentities (get_post_meta( get_the_ID(), "raw_html", true ),ENT_COMPAT , 'UTF-8'); ?>
</textarea>
