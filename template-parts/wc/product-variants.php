<?php $mg_product = mc_get_product(get_the_ID()); ?>

<input type="hidden" name="only_variants" value="<?= $mg_product->only_variants ?>">

<?php if(count($mg_product->variants)) : ?>
    <div class="mg-variants mb-4">
        <?php foreach($mg_product->variants as $i => $v) : ?>
            <div class="mg-variant <?= $mg_product->only_variants && !$i ? 'selected' : '' ?>" onclick="setVariant(this, '<?= $v->id ?>')">
                <?php if($v->img) : ?>
                    <img src="<?= $v->img ?>">
                <?php endif; ?>
                <span class="v-name me-2"><?= $v->name ?></span>
                <span class="v-price">€<?= number_format($v->price, 2, ',', '.') ?></span>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script>
    function setVariant(el, vid) {
        let only_variants = parseInt(jQuery('input[name=only_variants]').val());

        let $thisV = jQuery(el);
        let $inp = jQuery('input[name=mc_variant_id]');

        if($thisV.hasClass('selected')) {
            if(!only_variants) {
                $thisV.removeClass('selected');
                $inp.val('');
            }
        }
        else {
            jQuery('.mg-variant').removeClass('selected');
            $thisV.addClass('selected');
            
            console.log($inp, vid)
            $inp.val(id);
        }
    }
</script>