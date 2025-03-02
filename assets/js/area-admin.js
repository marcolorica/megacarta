function changeImg(el, noTitle) {
    let $input = jQuery(el);
    let file = $input.get(0).files[0];
    
    if(file) {
        let reader = new FileReader();

        reader.onload = (e) => {
            let $img = $input.next();
            
            if(!noTitle)
                $img = $img.next();

            $img.removeClass('ph')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    }
}

function adminDeleteProduct(product_id) {
    Swal.fire({
        title: 'Attenzione!',
        text: 'Sei sicuro di voler eliminare definitivamente questo prodotto?',
        icon: 'alert',
        showCancelButton: true,
        cancelButtonText: 'Indietro',
        confirmButtonText: 'Elimina',
    }).then((result) => {
        if(result.isConfirmed) {
            jQuery.ajax({
                url: args_mc.ajax_url,
                method: "POST",
                dataType: 'json',
                data: {
                    action: 'admin_delete_product',
                    product_id
                },
                success: (data) => {
                    Swal.fire({
                        title: 'Prodotto eliminato!',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                    })
                }
            });
        }
    });
}

function adminDeletCategory(cat_id, has_children) {
    Swal.fire({
        title: 'Attenzione!',
        text: 'Sei sicuro di voler eliminare definitivamente questa categoria' + (has_children ? ' e le sue sottocategorie?' : '?'),
        icon: 'alert',
        showCancelButton: true,
        cancelButtonText: 'Indietro',
        confirmButtonText: 'Elimina',
    }).then((result) => {
        if(result.isConfirmed) {
            jQuery.ajax({
                url: args_mc.ajax_url,
                method: "POST",
                dataType: 'json',
                data: {
                    action: 'admin_delete_category',
                    cat_id
                },
                success: (data) => {
                    Swal.fire({
                        title: 'Categoia eliminata!',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                    })
                }
            });
        }
    });
}

function addProductVariant(el) {
    let html_template = jQuery('.template-row-product-variant').html();

    let $newRow = jQuery('<div class="row row-product-variant mb-3"></div>');
    $newRow.html(html_template);

    $newRow.insertBefore(jQuery(el))

    calculateArrayNameIndexVariants();
}

function removeVariantRow(el) {
    jQuery(el).parent().parent().remove();
    calculateArrayNameIndexVariants();
}

function calculateArrayNameIndexVariants() {
    jQuery('.row-product-variant').each((i, el) => {
        jQuery(el).find('.product-variant-id').attr('name', 'product_variants[' + i + '][id]').attr('form', 'form-product');
        jQuery(el).find('.product-variant-name').attr('name', 'product_variants[' + i + '][name]').attr('required', true).attr('form', 'form-product');
        jQuery(el).find('.product-variant-file-img').attr('name', 'product_variants[' + i + '][img]').attr('form', 'form-product');
        jQuery(el).find('.product-variant-price').attr('name', 'product_variants[' + i + '][price]').attr('required', true).attr('form', 'form-product');
    });
}

function statusOrderRangeChanged(el) {
    let $input = jQuery(el);
    let statusValue = $input.val();
    
    jQuery('.label-status').removeClass('actual');
    jQuery('.label-status[data-status-value=' + statusValue + ']').addClass('actual');
}