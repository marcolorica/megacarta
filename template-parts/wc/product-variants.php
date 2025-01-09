<?php $mg_product = mc_get_product(get_the_ID()); ?>

<?php if(count($mg_product->variants)) : ?>
    <div class="mg-variants">
        <?php foreach($mg_product->variants as $i => $v) : ?>
            <div class="mg-variant" onclick="setVariant(<?= $v->id ?>)">
                <?php if($v->img) : ?>
                    <img src="<?= $v->img ?>">
                <?php endif; ?>
                <span class="v-name"><?= $v->name ?></span>
                <span class="v-price"><?= $v->price ?></span>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>