<div class="banner-breadcrumb">
    <div class="container">
        <div class="inner-wrap">
            <div class="pathway row-fluid">
                <ul class="breadcrumb span12">
                    <li><a href="/en/" class="pathway">Home</a></li>
                    <img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif"
                         class="breadcrumbs-separator" alt="separator">
                    <li><a href="/" class="pathway">My Account</a></li>
                    <span class="divider"><img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif"
                                               class="breadcrumbs-separator" alt="separator"></span>
                    <li class="active">Your account details</li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">


<div class="row-fluid">

<div class="span12 main-column">
<div class="compare-mod visible-desktop">


    <div class="vmCompareModule " id="vmCompareModule">
        <div id="compare_hiddencontainer" style=" display: none; ">
            <li class="products">
                <div class="product_image"></div>
                <div class="texts">
                    <div class="product_name"></div>
                    <div class="price"></div>
                </div>
            </li>
        </div>
        <div class="vm_compare_products">
            <ul class="container slides">
                <li class="products">
                    <div class="product_image"></div>
                    <div class="texts">
                        <div class="product_name"></div>
                        <div class="price"></div>
                    </div>
                </li>
            </ul>
        </div>


        <div class="total_products">
            <a href="/en/compare-products" title="Compare">
                Compare <span class="total">0</span> Products </a>
        </div>
        <a class="hide-compare-module" href="#" title="Hide"><i class="icon-close"></i></a>

        <noscript>
            MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT
        </noscript>
    </div>


</div>


<div id="system-message-container">
</div>
<h1 class="user-page-title">Your account details</h1>
<section class="vm-login-panel">
    <form action="/en/account-maintenance" method="post" name="login" id="form-login">
        Hello Test <input type="submit" name="Submit" class="button btn" value="Logout"/>
        <input type="hidden" name="option" value="com_users"/>
        <input type="hidden" name="task" value="user.logout"/>
        <input type="hidden" name="99f65108abf27e54f4ae3ac47fb743aa" value="1"/> <input type="hidden" name="return"
                                                                                        value="L2VuL2NhcnQvY2hlY2tvdXQ="/>
    </form>
</section>

<script language="javascript">
    function myValidator(f, t) {
        f.task.value = t; //this is a method to set the task of the form on the fTask.
        if (document.formvalidator.isValid(f)) {
            f.submit();
            return true;
        } else {
            var msg = 'Required field is missing';
            alert(msg + ' ');
        }
        return false;
    }

    function callValidatorForRegister(f) {

        var elem = jQuery('#username_field');
        elem.attr('class', "required");

        var elem = jQuery('#name_field');
        elem.attr('class', "required");

        var elem = jQuery('#password_field');
        elem.attr('class', "required");

        var elem = jQuery('#password2_field');
        elem.attr('class', "required");

        var elem = jQuery('#userForm');

        return myValidator(f, 'registercheckoutuser');

    }


</script>

<fieldset>
<h2 class="register-title">Add/Edit shipment address </h2>

<form method="post" id="userForm" name="userForm" class="form-validate">
<!--<form method="post" id="userForm" name="userForm" action="/en/account-maintenance" class="form-validate">-->


<table class="adminForm user-details">

<tr>
    <td class="key" title="">
        <label class="shipto_address_type_name" for="shipto_address_type_name_field">
            Address Nickname * </label>
    </td>
    <td>
        <input type="text" id="shipto_address_type_name_field" name="shipto_address_type_name" size="30" value=""
               class="required" maxlength="32"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_company" for="shipto_company_field">
            Company Name </label>
    </td>
    <td>
        <input type="text" id="shipto_company_field" name="shipto_company" size="30" value="" maxlength="64"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_first_name" for="shipto_first_name_field">
            First Name * </label>
    </td>
    <td>
        <input type="text" id="shipto_first_name_field" name="shipto_first_name" size="30" value="" class="required"
               maxlength="32"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_middle_name" for="shipto_middle_name_field">
            Middle Name </label>
    </td>
    <td>
        <input type="text" id="shipto_middle_name_field" name="shipto_middle_name" size="30" value="" maxlength="32"/>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_last_name" for="shipto_last_name_field">
            Last Name * </label>
    </td>
    <td>
        <input type="text" id="shipto_last_name_field" name="shipto_last_name" size="30" value="" class="required"
               maxlength="32"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_1" for="shipto_address_1_field">
            Address 1 * </label>
    </td>
    <td>
        <input type="text" id="shipto_address_1_field" name="shipto_address_1" size="30" value="" class="required"
               maxlength="64"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_2" for="shipto_address_2_field">
            Address 2 </label>
    </td>
    <td>
        <input type="text" id="shipto_address_2_field" name="shipto_address_2" size="30" value="" maxlength="64"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_zip" for="shipto_zip_field">
            Zip / Postal Code * </label>
    </td>
    <td>
        <input type="text" id="shipto_zip_field" name="shipto_zip" size="30" value="" class="required" maxlength="32"/>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_city" for="shipto_city_field">
            City * </label>
    </td>
    <td>
        <input type="text" id="shipto_city_field" name="shipto_city" size="30" value="" class="required"
               maxlength="32"/></td>
</tr>
<tr>
<td class="key" title="">
    <label class="shipto_virtuemart_country_id" for="shipto_virtuemart_country_id_field">
        Country * </label>
</td>
<td>
<select id="shipto_virtuemart_country_id" name="shipto_virtuemart_country_id" class="virtuemart_country_id required">
<option value="" selected="selected">-- Select --</option>
<option value="1">Afghanistan</option>
<option value="2">Albania</option>
<option value="3">Algeria</option>
<option value="4">American Samoa</option>
<option value="5">Andorra</option>
<option value="6">Angola</option>
<option value="7">Anguilla</option>
<option value="8">Antarctica</option>
<option value="9">Antigua and Barbuda</option>
<option value="10">Argentina</option>
<option value="11">Armenia</option>
<option value="12">Aruba</option>
<option value="13">Australia</option>
<option value="14">Austria</option>
<option value="15">Azerbaijan</option>
<option value="16">Bahamas</option>
<option value="17">Bahrain</option>
<option value="18">Bangladesh</option>
<option value="19">Barbados</option>
<option value="20">Belarus</option>
<option value="21">Belgium</option>
<option value="22">Belize</option>
<option value="23">Benin</option>
<option value="24">Bermuda</option>
<option value="25">Bhutan</option>
<option value="26">Bolivia</option>
<option value="27">Bosnia and Herzegovina</option>
<option value="28">Botswana</option>
<option value="29">Bouvet Island</option>
<option value="30">Brazil</option>
<option value="31">British Indian Ocean Territory</option>
<option value="32">Brunei Darussalam</option>
<option value="33">Bulgaria</option>
<option value="34">Burkina Faso</option>
<option value="35">Burundi</option>
<option value="36">Cambodia</option>
<option value="37">Cameroon</option>
<option value="38">Canada</option>
<option value="244">Canary Islands</option>
<option value="39">Cape Verde</option>
<option value="40">Cayman Islands</option>
<option value="41">Central African Republic</option>
<option value="42">Chad</option>
<option value="43">Chile</option>
<option value="44">China</option>
<option value="45">Christmas Island</option>
<option value="46">Cocos (Keeling) Islands</option>
<option value="47">Colombia</option>
<option value="48">Comoros</option>
<option value="49">Congo</option>
<option value="50">Cook Islands</option>
<option value="51">Costa Rica</option>
<option value="53">Croatia</option>
<option value="54">Cuba</option>
<option value="55">Cyprus</option>
<option value="56">Czech Republic</option>
<option value="52">C&ocirc;te d'Ivoire</option>
<option value="57">Denmark</option>
<option value="58">Djibouti</option>
<option value="59">Dominica</option>
<option value="60">Dominican Republic</option>
<option value="240">East Timor</option>
<option value="61">East Timor</option>
<option value="62">Ecuador</option>
<option value="63">Egypt</option>
<option value="64">El Salvador</option>
<option value="65">Equatorial Guinea</option>
<option value="66">Eritrea</option>
<option value="67">Estonia</option>
<option value="68">Ethiopia</option>
<option value="69">Falkland Islands (Malvinas)</option>
<option value="70">Faroe Islands</option>
<option value="71">Fiji</option>
<option value="72">Finland</option>
<option value="73">France</option>
<option value="75">French Guiana</option>
<option value="76">French Polynesia</option>
<option value="77">French Southern Territories</option>
<option value="78">Gabon</option>
<option value="79">Gambia</option>
<option value="80">Georgia</option>
<option value="81">Germany</option>
<option value="82">Ghana</option>
<option value="83">Gibraltar</option>
<option value="84">Greece</option>
<option value="85">Greenland</option>
<option value="86">Grenada</option>
<option value="87">Guadeloupe</option>
<option value="88">Guam</option>
<option value="89">Guatemala</option>
<option value="90">Guinea</option>
<option value="91">Guinea-Bissau</option>
<option value="92">Guyana</option>
<option value="93">Haiti</option>
<option value="94">Heard and McDonald Islands</option>
<option value="95">Honduras</option>
<option value="96">Hong Kong</option>
<option value="97">Hungary</option>
<option value="98">Iceland</option>
<option value="99">India</option>
<option value="100">Indonesia</option>
<option value="101">Iran, Islamic Republic of</option>
<option value="102">Iraq</option>
<option value="103">Ireland</option>
<option value="104">Israel</option>
<option value="105">Italy</option>
<option value="106">Jamaica</option>
<option value="107">Japan</option>
<option value="241">Jersey</option>
<option value="108">Jordan</option>
<option value="109">Kazakhstan</option>
<option value="110">Kenya</option>
<option value="111">Kiribati</option>
<option value="112">Korea, Democratic People's Republic of</option>
<option value="113">Korea, Republic of</option>
<option value="114">Kuwait</option>
<option value="115">Kyrgyzstan</option>
<option value="116">Lao People's Democratic Republic</option>
<option value="117">Latvia</option>
<option value="118">Lebanon</option>
<option value="119">Lesotho</option>
<option value="120">Liberia</option>
<option value="121">Libya</option>
<option value="122">Liechtenstein</option>
<option value="123">Lithuania</option>
<option value="124">Luxembourg</option>
<option value="125">Macau</option>
<option value="126">Macedonia, the former Yugoslav Republic of</option>
<option value="127">Madagascar</option>
<option value="128">Malawi</option>
<option value="129">Malaysia</option>
<option value="130">Maldives</option>
<option value="131">Mali</option>
<option value="132">Malta</option>
<option value="133">Marshall Islands</option>
<option value="134">Martinique</option>
<option value="135">Mauritania</option>
<option value="136">Mauritius</option>
<option value="137">Mayotte</option>
<option value="138">Mexico</option>
<option value="139">Micronesia, Federated States of</option>
<option value="140">Moldova, Republic of</option>
<option value="141">Monaco</option>
<option value="142">Mongolia</option>
<option value="143">Montserrat</option>
<option value="144">Morocco</option>
<option value="145">Mozambique</option>
<option value="146">Myanmar</option>
<option value="147">Namibia</option>
<option value="148">Nauru</option>
<option value="149">Nepal</option>
<option value="150">Netherlands</option>
<option value="151">Netherlands Antilles</option>
<option value="152">New Caledonia</option>
<option value="153">New Zealand</option>
<option value="154">Nicaragua</option>
<option value="155">Niger</option>
<option value="156">Nigeria</option>
<option value="157">Niue</option>
<option value="158">Norfolk Island</option>
<option value="159">Northern Mariana Islands</option>
<option value="160">Norway</option>
<option value="161">Oman</option>
<option value="162">Pakistan</option>
<option value="163">Palau</option>
<option value="248">Palestinian Territory, Occupied</option>
<option value="164">Panama</option>
<option value="165">Papua New Guinea</option>
<option value="166">Paraguay</option>
<option value="167">Peru</option>
<option value="168">Philippines</option>
<option value="169">Pitcairn</option>
<option value="170">Poland</option>
<option value="171">Portugal</option>
<option value="172">Puerto Rico</option>
<option value="173">Qatar</option>
<option value="175">Romania</option>
<option value="176">Russian Federation</option>
<option value="177">Rwanda</option>
<option value="174">R&eacute;union</option>
<option value="197">Saint Helena</option>
<option value="178">Saint Kitts and Nevis</option>
<option value="179">Saint Lucia</option>
<option value="246">Saint Martin (French part)</option>
<option value="198">Saint Pierre and Miquelon</option>
<option value="180">Saint Vincent and the Grenadines</option>
<option value="181">Samoa</option>
<option value="182">San Marino</option>
<option value="183">Sao Tome And Principe</option>
<option value="184">Saudi Arabia</option>
<option value="185">Senegal</option>
<option value="245">Serbia</option>
<option value="186">Seychelles</option>
<option value="187">Sierra Leone</option>
<option value="188">Singapore</option>
<option value="247">Sint Maarten (Dutch part)</option>
<option value="189">Slovakia</option>
<option value="190">Slovenia</option>
<option value="191">Solomon Islands</option>
<option value="192">Somalia</option>
<option value="193">South Africa</option>
<option value="194">South Georgia and the South Sandwich Islands</option>
<option value="195">Spain</option>
<option value="196">Sri Lanka</option>
<option value="242">St. Barthelemy</option>
<option value="243">St. Eustatius</option>
<option value="199">Sudan</option>
<option value="200">Suriname</option>
<option value="201">Svalbard and Jan Mayen</option>
<option value="202">Swaziland</option>
<option value="203">Sweden</option>
<option value="204">Switzerland</option>
<option value="205">Syrian Arab Republic</option>
<option value="206">Taiwan</option>
<option value="207">Tajikistan</option>
<option value="208">Tanzania, United Republic of</option>
<option value="209">Thailand</option>
<option value="237">The Democratic Republic of Congo</option>
<option value="210">Togo</option>
<option value="211">Tokelau</option>
<option value="212">Tonga</option>
<option value="213">Trinidad and Tobago</option>
<option value="214">Tunisia</option>
<option value="215">Turkey</option>
<option value="216">Turkmenistan</option>
<option value="217">Turks and Caicos Islands</option>
<option value="218">Tuvalu</option>
<option value="219">Uganda</option>
<option value="220">Ukraine</option>
<option value="221">United Arab Emirates</option>
<option value="222">United Kingdom</option>
<option value="223">United States</option>
<option value="224">United States Minor Outlying Islands</option>
<option value="225">Uruguay</option>
<option value="226">Uzbekistan</option>
<option value="227">Vanuatu</option>
<option value="228">Vatican City State (Holy See)</option>
<option value="229">Venezuela</option>
<option value="230">Viet Nam</option>
<option value="231">Virgin Islands, British</option>
<option value="232">Virgin Islands, U.S.</option>
<option value="233">Wallis and Futuna</option>
<option value="234">Western Sahara</option>
<option value="235">Yemen</option>
<option value="238">Zambia</option>
<option value="239">Zimbabwe</option>
</select>
</td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_virtuemart_state_id" for="shipto_virtuemart_state_id_field">
            State / Province / Region * </label>
    </td>
    <td>
        <select class="inputbox multiple" id="virtuemart_state_id" size="1" name="shipto_virtuemart_state_id" required>
            <option value="">-- Select --</option>
        </select></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_phone_1" for="shipto_phone_1_field">
            Phone </label>
    </td>
    <td>
        <input type="text" id="shipto_phone_1_field" name="shipto_phone_1" size="30" value="" maxlength="32"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_phone_2" for="shipto_phone_2_field">
            Mobile Phone </label>
    </td>
    <td>
        <input type="text" id="shipto_phone_2_field" name="shipto_phone_2" size="30" value="" maxlength="32"/></td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_fax" for="shipto_fax_field">
            Fax </label>
    </td>
    <td>
        <input type="text" id="shipto_fax_field" name="shipto_fax" size="30" value="" maxlength="32"/></td>
</tr>

</table>
</fieldset>


</fieldset>


<fieldset class="edit-shipping-info">
    <legend class="userfields_info">Ship To</legend>
    <a href="/en/account-maintenance/editaddressST?new=1&amp;virtuemart_user_id[0]=935"><span
            class="vmicon vmicon-16-editadd"></span> Add/Edit shipment address </a>
    <ul></ul>
</fieldset>

<div class="control-buttons">

    <button class="default btn" type="submit" onclick="javascript:return myValidator(userForm, 'saveAddressST');">Save
    </button>
    <button class="default btn" type="reset" onclick="window.location.href='/en/account-maintenance'">Cancel</button>

</div>
<input type="hidden" name="option" value="com_virtuemart"/>
<input type="hidden" name="view" value="user"/>
<input type="hidden" name="controller" value="user"/>
<input type="hidden" name="task" value="saveAddressST"/>
<input type="hidden" name="layout" value="edit_address"/>
<input type="hidden" name="address_type" value="ST"/>
<input type="hidden" name="99f65108abf27e54f4ae3ac47fb743aa" value="1"/></form>


</div>


</div>


</div>
</div>
</div>