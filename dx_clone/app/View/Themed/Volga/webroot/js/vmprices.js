if("undefined"==typeof Virtuemart){var Virtuemart={setproducttype:function(t,i){t.view=null;var r=jQuery,e=t.serialize(),n=t.parents(".productdetails").find(".product-price");return 0==n.length&&(n=r("#productPrice"+i)),e=e.replace("&view=cart",""),n.fadeTo("fast",.75),!1},cartEffect:function(){},product:function(t){t.each(function(){var t=jQuery(this),i=t.find('input[name="quantity"]'),r=t.find("input.addtocart-button1"),e=t.find(".quantity-plus"),n=t.find(".quantity-minus"),u=t.find("select"),a=t.find("input:radio"),c=t.find('input[name="virtuemart_product_id[]"]').val(),d=t.find(".quantity-input"),o=parseInt(i.val());isNaN(o)&&(o=1),r.click(function(){return Virtuemart.sendtocart(t),!1}),e.click(function(){var i=parseInt(d.val());isNaN(i)||(d.val(i+o),Virtuemart.setproducttype(t,c))}),n.click(function(){var i=parseInt(d.val());d.val(!isNaN(i)&&i>o?i-o:o),Virtuemart.setproducttype(t,c)}),u.change(function(){Virtuemart.setproducttype(t,c)}),a.change(function(){Virtuemart.setproducttype(t,c)}),d.keyup(function(){Virtuemart.setproducttype(t,c)})})}};jQuery.noConflict(),jQuery(document).ready(function(t){Virtuemart.product(t("form.product")),t("form.js-recalculate").each(function(){if(t(this).find(".product-fields").length){var i=t(this).find('input[name="virtuemart_product_id[]"]').val();Virtuemart.setproducttype(t(this),i)}})})}