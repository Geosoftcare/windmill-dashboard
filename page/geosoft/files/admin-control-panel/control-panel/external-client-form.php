<form method="POST" action="./add-new-client" enctype="multipart/form-data" name="addClient-form" autocomplete="off">

    <div class="modal-body">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Title<span style="color: red;">*</span></label>
            <select name="txtTitle" required class="form-control" id="exampleFormControlSelect1">
                <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Master.">Master.</option>
                <option value="Miss.">Miss.</option>
                <option value="Ms.">Ms.</option>
                <option value="Sir.">Sir.</option>
                <option value="Lady.">Lady.</option>
                <option value="Lord.">Lord.</option>
                <option value="Dame.">Dame.</option>
                <option value="Doctor.">Doctor.</option>
                <option value="Prof.">Prof.</option>
            </select>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 col-6">
                    <label for="exampleInputPassword1">First name<span style="color: red;">*</span></label>
                    <input name="txtFirstName" required type="text" class="form-control" id="exampleInputPassword1" placeholder="First name">
                </div>
                <div class="col-md-6 col-6">
                    <label for="exampleInputPassword1">Last name<span style="color: red;">*</span></label>
                    <input name="txtLastName" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Last name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8 col-6">
                    <label for="exampleInputPassword1">Middle name</label>
                    <input name="txtMiddleName" type="text" class="form-control" id="exampleInputPassword1" placeholder="Middle name">
                </div>
                <div class="col-md-4 col-6">
                    <label for="exampleInputPassword1">Preferred name</label>
                    <input name="txtPreferredName" type="text" class="form-control" id="exampleInputPassword1" placeholder="Preferred name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email Address<span style="color: red;">*</span></label>
            <input name="txtEmailAddress" required type="email" class="form-control" id="exampleInputPassword1" placeholder="Email address">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5 col-6">
                    <label for="exampleFormControlSelect1">Prefers to be referred to as<span style="color: red;">*</span></label>
                    <select name="txtGenderBased" required class="form-control" id="exampleFormControlSelect1">
                        <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                        <option value="He/Him">He/Him</option>
                        <option value="She/Her">She/Her</option>
                        <option value="They/Them">They/Them</option>
                    </select>
                </div>
                <div class="col-md-7 col-6">
                    <label for="exampleInputPassword1">Date of birth<span style="color: red;">*</span></label>
                    <input name="txtDateofBirth" required type="date" class="form-control" id="exampleInputPassword1" placeholder="Date of birth">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlClientailment">Describe client's ailment!<span style="color: red;">*</span></label>
            <input name="txtClientailment" required type="text" class="form-control" id="exampleInputClientailment" placeholder="Describe client ailment!">
        </div>


        <hr>
        <br>


        <h4>Contact details</h4>
        <br>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone number<span style="color: red;">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <img src="assets/images/icons/united-kingdom-flag-png-xl.png" style="width: 20px; height:20px;" alt="">
                    </span>
                </div>
                <input type="tel" required name="txtPrimaryPhoneNumber" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Phone number">
                <div class="invalid-tooltip">

                </div>
            </div>
        </div>
        <!--<div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                                            <img src="assets/images/icons/united-kingdom-flag-png-xl.png" style="width: 20px; height:20px;" alt="">
                                                        </span>
                                                    </div>
                                                    <input type="tel" required name="txtOtherPhoneNumber" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Other phone number">
                                                    <div class="invalid-tooltip">
                                                    </div>
                                                </div>
                                            </div>-->

        <div class="form-group">
            <div class="row">
                <div class="col-md-6 col-6">
                    <label for="exampleInputPassword1">Culture and Religion<span style="color: red;">*</span></label>
                    <select name="txtCultureReligion" required class="form-control" id="exampleFormControlSelect1">
                        <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                        <option value="African Traditional &amp; Diasporic">African Traditional &amp; Diasporic</option>
                        <option value="Agnostic">Agnostic</option>
                        <option value="Atheist">Atheist</option>
                        <option value="Baha'i">Baha'i</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Cao Dai">Cao Dai</option>
                        <option value="Chinese traditional religion">Chinese traditional religion</option>
                        <option value="Christianity">Christianity</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Islam">Islam</option>
                        <option value="Jainism">Jainism</option>
                        <option value="Juche">Juche</option>
                        <option value="Judaism">Judaism</option>
                        <option value="Neo-Paganism">Neo-Paganism</option>
                        <option value="Nonreligious">Nonreligious</option>
                        <option value="Rastafarianism">Rastafarianism</option>
                        <option value="Secular">Secular</option>
                        <option value="Shinto">Shinto</option>
                        <option value="Sikhism">Sikhism</option>
                        <option value="Spiritism">Spiritism</option>
                        <option value="Tenrikyo">Tenrikyo</option>
                        <option value="Unitarian-Universalism">Unitarian-Universalism</option>
                        <option value="Zoroastrianism">Zoroastrianism</option>
                        <option value="primal-indigenous">primal-indigenous</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 col-6">
                    <label for="exampleInputPassword1">Sexuality<span style="color: red;">*</span></label>
                    <select name="txtSexuality" required class="form-control" id="exampleFormControlSelect1">
                        <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleInputPassword1">Post Code</label>
            <input name="txtPostCode" type="text" class="form-control" id="exampleInputPostCode1" placeholder="Post Code">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Address line 1(House no)<span style="color: red;">*</span></label>
            <input name="txtAddressLine1" required type="text" class="form-control" id="exampleInputAddressLine1" placeholder="Address line 1">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Address line 2(Street name)<span style="color: red;">*</span></label>
            <input name="txtAddressLine2" required type="text" class="form-control" id="exampleInputAddressLine2" placeholder="Address line 2">
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-5 col-6">
                    <label for="exampleInputCity">City<span style="color: red;">*</span></label>
                    <input name="txtCity" required type="text" class="form-control" id="exampleInputCity" placeholder="City">
                </div>
                <div class="col-md-7 col-6">
                    <label for="exampleInputCoounty1">County<span style="color: red;">*</span></label>
                    <input name="txtCounty" required type="text" class="form-control" id="exampleInputCounty" placeholder="County">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-6">
                    <label for="exampleInputCity">Poster Code<span style="color: red;">*</span></label>
                    <input name="txtPosterCode" required type="text" class="form-control" id="exampleInputCity" placeholder="Poster Code">
                </div>
                <div class="col-md-8 col-6">
                    <label for="exampleInputCoounty1">Country<span style="color: red;">*</span></label>
                    <select name="txtCountry" required id="exampleInputCounty" class="form-control">
                        <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>

                </div>
            </div>
        </div>


        <hr>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Access details<span style="color: red;">*</span></label>
            <textarea name="txtAccessDetails" class="form-control" required placeholder="Access details" id="exampleFormControlAccessdetails" rows="5"></textarea>
        </div>

        <br>
        <hr>
        <h4>Highlights</h4>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Highlights<span style="color: red;">*</span></label>
            <textarea name="txtHighlights" class="form-control" placeholder="Highlights" required id="exampleFormControlHighlights" rows="5"></textarea>
        </div>


        <?php
        require_once('dbconnections.php');

        for ($a = 1; $a <= 50; $a++) {
            $usdd = "0";
            $rand = rand(0000, 9999);
            $ud = "45";
            $id = "$usdd$rand$ud";
        }

        // Return current date from the remote server

        ?> <input type="hidden" value="<?php echo $id; ?>" name="mysocialId" />

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save details</button>
    </div>
</form>