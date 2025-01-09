<?php $mg_product = mc_get_product(get_the_ID()); ?>

<?php if(count($mg_product->variants)) : ?>
    <div class="mg-variants mb-4">
        <?php foreach($mg_product->variants as $i => $v) : ?>
            <div class="mg-variant <?= $mg_product->only_variants && !$i ? 'selected' : '' ?>" onclick="setVariant(<?= $v->id ?>)">
                <?php if($v->img) : ?>
                    <img src="<?= $v->img ?>">
                <?php endif; ?>
                <span class="v-name me-2"><?= $v->name ?></span>
                <span class="v-price">€<?= number_format($v->price, 2, ',', '.') ?></span>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>