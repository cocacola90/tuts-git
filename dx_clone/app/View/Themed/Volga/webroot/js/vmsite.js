!function(t){var e,r={list:function(e){var a=e.dest,i=e.ids;r.update(this,a,i),t(this).change(function(){r.update(this,a)})},update:function(a,i,n){var o=t(a),d=o.val()||[],u=[];t.isArray(d)||(d=jQuery.makeArray(d)),"undefined"!=typeof oldValues&&t.each(oldValues,function(e,r){t.inArray(r,d)<0&&t("#group"+r).remove()}),t.each(d,function(t,r){o.data("d"+r)===e&&u.push(r)}),u.length>0?t.getJSON("index.php?option=com_virtuemart&view=state&format=json&virtuemart_country_id="+u,function(e){var a=t("#virtuemart_state_id"),s=a.attr("required");if("required"==s&&(e[u].length>0?a.attr("required","required"):a.removeAttr("required")),t.each(e,function(t,e){e.length>0?o.data("d"+t,e):o.data("d"+t,0)}),r.addToList(o,d,i),"undefined"!=typeof n){var p=n.length?n.split(","):[];t.each(p,function(e,r){t(i).find("[value="+r+"]").attr("selected","selected")})}t(i).trigger("liszt:updated")}):(r.addToList(o,d,i),t(i).trigger("liszt:updated")),oldValues=d},addToList:function(e,r,a){t.each(r,function(r,i){var n=t("#group"+i).size();if(!n){var o=e.data("d"+i);if(o.length>0){var d=e.find("option[value='"+i+"']").text(),u='<optgroup id="group'+i+'" label="'+d+'">';t.each(o,function(t,e){e&&(u+='<option value="'+e.virtuemart_state_id+'">'+e.state_name+"</option>")}),u+="</optgroup>",t(a).append(u)}}})}};t.fn.vm2front=function(e){return r[e]?r[e].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof e&&e?void t.error("Method "+e+" does not exist on Vm2 front jQuery library"):r.init.apply(this,arguments)}}(jQuery);