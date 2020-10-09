function getProductInfo(id){
    return new Promise(resolve => {
        $.get(urlGetProductInfo, {id: id}, res => resolve(res.code === 200 ? res.data : null));
    });
}
function calcLineTotal(trDOM) {
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
    let discountType = $('#order-discount_type').val(),
        discountValue = formatToRawNumber($('#order-discount_value').val()),
        discount = 0;

    if (discountType === GIAM_GIA_TRUC_TIEP) {
        discount = discountValue;
    } else {
        discount = calcTotal() * discountValue / 100;
    }

    $('#discount').html(formatAsCurrency(discount));
    return discount;
}
function calcTotal () {
    let total = 0;

    $('.line_item').each(function() {
        let temp = formatToRawNumber($(this).find('.lineitem-total').text());
        if (isNaN(temp)) temp = 0;

        total += temp;
    });

    $('#total').html(formatAsCurrency(total));

    return total;
}
function calcGrandTotal() {
    let grandTotal = 0,
        total = calcTotal();

    grandTotal = total - calcDiscount();

    $('#final_total').html(formatAsCurrency(grandTotal));

    return grandTotal;
}
function handleDiscountValue(maxPrice, discountType, self) {
    debugger;
    let discountValue = formatToRawNumber(self.val());

    if (discountType === GIAM_GIA_TRUC_TIEP) {
        if (discountValue > maxPrice) discountValue = maxPrice;
    } else {
        if (discountValue > 100) discountValue = 100;
        if (discountValue < 0) discountValue = 0;
    }

    self.val(formatAsDecimal(discountValue));
}

$(function () {
    $('body')
        .on('change', '.product-price, .product-qty', function(e) {
            calcLineTotal($(this).closest('tr'));
        })
        .on('change', '.discount-value, .discount-type', function () {
            handleDiscountValue(formatToRawNumber($(this).closest('tr').find('.product-price').val()), $(this).closest('tr').find('.discount-type').val(), $(this));
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
        .on('change', '#order-discount_type, #order-discount_value', function () {
            handleDiscountValue(calcTotal(), $('#order-discount_type').val(), $(this));
            calcGrandTotal();
        })
        .on('change', '.discount-type', function () {
            $(this).closest('tr').find('.discount-value').trigger('keyup').trigger('change');
        })
        .on('keyup', '.discount-value', function () {
            handleDiscountValue(formatToRawNumber($(this).closest('tr').find('.product-price').val()), $(this).closest('tr').find('.discount-type').val(), $(this));
        })
        .on('change', '#order-discount_type', function () {
            $('#order-discount_value').trigger('keyup').trigger('change');
        })
        .on('keyup', '#order-discount_value', function () {
            handleDiscountValue(calcTotal(), $('#order-discount_type').val(), $(this));
        });
})