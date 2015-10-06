<form accept-charset="utf-8" method="POST" id="addCartForm-15" class="product js-recalculate" action="/">
    <div style="display:none;">
        <input type="hidden" value="POST" name="_method">
    </div>
    <div class="product-fields">
        <div class="product-field product-field-type-S">
            <div class="product-fields-title-group">
                            <span title="" rel="tooltip" class="product-fields-title title-tip"
                                  data-original-title="Please choose Color">Color:</span>
            </div>
            <div class="product-field-display">
                <ul>
                    <li class="cart-options active">
                        <input type="radio" name="pcolor" value="11" data-id="11" class="sel-color" id="11">
                        <label
                            class="other-customfield" for="32">
                            <span class="option-cost"> </span>
                            <p class="active btn">
                                Đỏ
                            </p>
								<span class="option-cost">No additional charge</span>
                        </label>
                    </li>
                    <li class="cart-options">
                        <input type="radio" name="pcolor" value="12" data-id="12"
                               class="sel-color" id="12">
                        <label class="other-customfield" for="32"><span class="option-cost"></span>
                            <p class="btn">
                                Đen
                            </p>
								<span class="option-cost">No additional charge</span></label>
                    </li>
                    <li class="cart-options">
                        <input type="radio" name="pcolor" value="13" data-id="13" class="sel-color" id="13">
                        <label class="other-customfield" for="32">
                            <span class="option-cost"></span>
                            <p class="btn">
                                Trắng
                            </p>
								<span class="option-cost">
								No additional charge</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="addtocart-bar">
        <div class="input-prepend input-append hide" id="qaunity-selector">
            <input type="hidden" value="15" name="pid">
            <input type="hidden" value="4" name="pcontinent">
            <input type="hidden" value="US" name="pdestination">
            <input type="text" value="1" name="pquantity" id="appendedPrependedInput"
                   class="quantity-input js-recalculate">
        </div>
        <a onclick="addCart('15');" class="addtocart-button btn btn-inverse submit-15"
           id="submit-15">Submit</a>

        <div class="clear">
        </div>
    </div>
</form>
<form accept-charset="utf-8" method="POST" id="addCartForm-16" class="product js-recalculate" action="/">
    <div style="display:none;">
        <input type="hidden" value="POST" name="_method">
    </div>
    <div class="product-fields">
        <div class="product-field product-field-type-S">
            <div class="product-fields-title-group">
                            <span title="" rel="tooltip" class="product-fields-title title-tip"
                                  data-original-title="Please choose Color">Color:</span>
            </div>
            <div class="product-field-display">
                <ul>
                    <li class="cart-options active">
                        <input type="radio" name="pcolor" value="11" data-id="11" class="sel-color" id="11">
                        <label
                            class="other-customfield" for="32">
                            <span class="option-cost"> </span>
                            <p class="active btn">
                                Đỏ
                            </p>
								<span class="option-cost">No additional charge</span>
                        </label>
                    </li>
                    <li class="cart-options">
                        <input type="radio" name="pcolor" value="12" data-id="12"
                               class="sel-color" id="12">
                        <label class="other-customfield" for="32"><span class="option-cost"></span>
                            <p class="btn">
                                Đen
                            </p>
								<span class="option-cost">No additional charge</span></label>
                    </li>
                    <li class="cart-options">
                        <input type="radio" name="pcolor" value="13" data-id="13" class="sel-color" id="13">
                        <label class="other-customfield" for="32">
                            <span class="option-cost"></span>
                            <p class="btn">
                                Trắng
                            </p>
								<span class="option-cost">
								No additional charge</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="addtocart-bar">
        <div class="input-prepend input-append hide" id="qaunity-selector">
            <input type="hidden" value="16" name="pid">
            <input type="hidden" value="4" name="pcontinent">
            <input type="hidden" value="US" name="pdestination">
            <input type="text" value="1" name="pquantity" id="appendedPrependedInput"
                   class="quantity-input js-recalculate">
        </div>
        <a onclick="addCart('16');" class="addtocart-button btn btn-inverse submit-16"
           id="submit-16">Submit</a>

        <div class="clear">
        </div>
    </div>
</form>
<script type="text/javascript"> 

 function addCart(product_id) {
        //alert(product_id);
        var $items = $('.sel-color');
        $items.click(function () {
           $items.attr('checked', true);
            //$items.prop("checked", true)
        });
        var color = $( "input:radio[name=pcolor]" ).attr('data-id');
        alert(color);
        console.log(color);

        var arr_data = $('form#addCartForm-' + product_id).serialize();
        alert(arr_data);
        console.log(arr_data);
        var quantity = $('#pquantity').val();
        /*$("#ordels_tatus").html('<img src="/theme/Dx/img/loader.gif" align="absmiddle">&nbsp;Checking...');
        $.ajax({
            url: '/products/add_to_cart',
            type: 'POST',
            data: $('form#addCartForm-' + product_id).serialize(),
            //dataType: json,
            success: function (msg_data) {
                console.log(msg_data);
                var obj = jQuery.parseJSON(msg_data);
                if (obj.message === "ok") {
                    alert('Item added to cart!');
                    $("#total-cart-mini").html('<strong>' + obj.amount + '</strong>');
                }
                else if (obj.message === "false") {
                    alert('ERROR');
                }
                *//* if (msg_data != "") {
                 var str = '<div class="con">';
                 str += '<p class="title">';
                 str += '<i class="icon_success_27x27"></i> ' + quantity + ' item added to cart';
                 str += '</p>';
                 str += '<p class="subtitle">';
                 str += '<b>' + msg_data + '</b> total items in your Cart';
                 str += '</p>';
                 str += '</div>';
                 $("#ordels_tatus").html(str);
                 }*//*

                //$("#cart_detail").html(msg_data);
            }

        });*/
        //console.log(arr_data);


    }
</script>