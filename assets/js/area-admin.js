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