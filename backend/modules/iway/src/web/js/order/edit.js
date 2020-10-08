function getProductInfo(id){
    return new Promise(resolve => {
        $.get(urlGetProductInfo, {id: id}, res => resolve(res.code === 200 ? res.data : null));
    });
}
function calcLineTotal(trDOM) {
    debugger;
    let qty = parseFloat(trDOM.find('.product-qty').val()),
        price = parseFloat(formatToRawNumber(trDOM.find('.product-price').val())),
        discountValue = parseFloat(formatToRawNumber(trDOM.find('.discount-value').val())),
        discountType = trDOM.find('.discount-type').val(),
        total = qty * price;

    if (isNaN(discountValue)) discountValue = 0;

    if (discountType === GIAM_GIA_TRUC_TIEP) {
        total -= discountValue;
    } else {
        total -= (discountValue * total / 100);
    }

    trDOM.find('.lineitem-total').html(formatAsDecimal(total)).attr('data-value', total);

    calcGrandTotal();

    return total;
}

function calcDiscount() {
    return 0;
}

function calcTotal () {
    let total = 0;

    $('.line_item').each(function() {
        let temp = parseFloat($(this).find('.lineitem-total').attr('data-value'));
        if (isNaN(temp)) temp = 0;
        total += temp;
    });

    $('#total').html(formatAsDecimal(total) + ' ₫');

    return total;
}

function calcGrandTotal() {
    let grandTotal = 0,
        total = calcTotal();

    grandTotal = total - calcDiscount();

    $('#final_total').html(formatAsDecimal(grandTotal) + ' ₫');

    return grandTotal;
}

$(function () {
    $('#salesorder_detail')
        .on('change', '.product-price, .product-qty, .discount-value, .discount-type', function(e) {
            calcLineTotal($(this).closest('tr'));
        })
        .on('change', '.product-id', function(e){
            let productId = $(this).val(),
                trDOM = $(this).closest('tr');

            if (productId) {
                getProductInfo(productId).then((data)=>{
                    if (data) {
                        trDOM.find('.product-price').val(formatAsDecimal(data.price)).trigger('change');
                    }
                    else {
                        trDOM.find('.product-price').val(0).trigger('change');
                    }
                });
            }
            else {
                trDOM.find('.product-price').val(0).trigger('change');
            }
        }).on('afterDeleteRow', function(){
            calcGrandTotal();
        })
        .on('change', '.discount-type', function () {
            $(this).closest('tr').find('.discount-value').trigger('keyup').trigger('change');
        })
        .on('keyup', '.discount-value', function () {
            let productPrice = formatToRawNumber($(this).closest('tr').find('.product-price').val()),
                discountValue = formatToRawNumber($(this).val()),
                discountType = $(this).closest('tr').find('.discount-type').val();

            if (discountType === GIAM_GIA_TRUC_TIEP) {
                if (discountValue > productPrice) discountValue = productPrice;
            } else {
                if (discountValue > 100) discountValue = 100;
                if (discountValue < 0) discountValue = 0;
            }


            $(this).val(formatAsDecimal(discountValue));
        });
})