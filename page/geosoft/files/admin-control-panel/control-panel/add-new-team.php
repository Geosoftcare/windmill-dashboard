<?php include('header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add new team</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- prject ,team member start -->
            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Team - Kindly fill in the form correctly.</h5>
                    </div>
                    <div class="card-body p-0">
                        <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
                            Team details already exist!!!
                        </div>
                        <div class="table-responsive">
                            <div class="client-form-body" style="width:100%; height:auto; padding:22px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="POST" action="./processing-add-team-form" enctype="multipart/form-data" name="addClient-form" autocomplete="off">
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
                                                    <div class="col-md-7 col-7">
                                                        <label for="exampleFormControlSelect1">Prefers to be referred to as<span style="color: red;">*</span></label>
                                                        <select name="txtGenderBased" required class="form-control" id="exampleFormControlSelect1">
                                                            <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                            <option value="He/Him">He/Him</option>
                                                            <option value="She/Her">She/Her</option>
                                                            <option value="They/Them">They/Them</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5 col-5">
                                                        <label for="exampleforbirthday">Date of birth<span style="color: red;">*</span></label>
                                                        <input name="txtDateofBirth" min="1925-01-01" max="2030-12-31" required type="date" class="form-control" id="exampleInputPassword1" placeholder="Date of birth">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCoounty1">Nationality<span style="color: red;">*</span></label>
                                                <select name="txtNationality" required id="exampleFormControlSelect1" class="form-control">
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
                                                    <input type="tel" class="form-control" name="txtPrimaryPhoneNumber" placeholder="000 000 0000" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="12" minlength="10" title="Ten digits code" required />
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
                                                        <label for="exampleInputPassword1">Culture and Religion<span style="color: red;"></span></label>
                                                        <select name="txtCultureReligion" class="form-control" id="exampleFormControlSelect1">
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
                                                            <option value="Other">None</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <label for="exampleInputPassword1">Gender<span style="color: red;">*</span></label>
                                                        <select name="txtSexuality" required class="form-control" id="exampleFormControlSelect1">
                                                            <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5 col-6">
                                                    <label for="exampleInputCity">DBS<span style="color: red;">*</span></label>
                                                    <input name="txtDBS" required type="text" class="form-control" id="exampleInputCity" placeholder="DBS">
                                                </div>
                                                <div class="col-md-7 col-6">
                                                    <label for="exampleInputCoounty1">NI<span style="color: red;">*</span></label>
                                                    <input name="txtNIN" required type="text" class="form-control" id="exampleInputCounty" placeholder="NI">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Address line 1(Door no)<span style="color: red;">*</span></label>
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
                                                    <select name="txtCity" required type="text" class="form-control" id="exampleFormControlSelect1" placeholder="City">
                                                        <optgroup label="England">England
                                                            <option value="Bath">Bath</option>
                                                            <option value="Birmingham">Birmingham</option>
                                                            <option value="Bradford">Bradford</option>
                                                            <option value="Brighton & Hove">Brighton & Hove</option>
                                                            <option value="Bristol">Bristol</option>
                                                            <option value="Cambridge">Cambridge</option>
                                                            <option value="Canterbury">Canterbury</option>
                                                            <option value="Carlisle">Carlisle</option>
                                                            <option value="Chelmsford">Chelmsford</option>
                                                            <option value="Chester">Chester</option>
                                                            <option value="Chichester">Chichester</option>
                                                            <option value="Colchester">Colchester</option>
                                                            <option value="Coventry">Coventry</option>
                                                            <option value="Derby">Derby</option>
                                                            <option value="Dudley">Dudley</option>
                                                            <option value="Doncaster">Doncaster</option>
                                                            <option value="Durham">Durham</option>
                                                            <option value="Ely">Ely</option>
                                                            <option value="Exeter">Exeter</option>
                                                            <option value="Gloucester">Gloucester</option>
                                                            <option value="Hereford">Hereford</option>
                                                            <option value="Kingston-upon-Hull">Kingston-upon-Hull</option>
                                                            <option value="Lancaster">Lancaster</option>
                                                            <option value="Leeds">Leeds</option>
                                                            <option value="Leicester">Leicester</option>
                                                            <option value="Lichfield">Lichfield</option>
                                                            <option value="Lincoln">Lincoln</option>
                                                            <option value="Liverpool">Liverpool</option>
                                                            <option value="London">London</option>
                                                            <option value="Manchester">Manchester</option>
                                                            <option value="Milton Keynes">Milton Keynes</option>
                                                            <option value="Newcastle-upon-Tyne">Newcastle-upon-Tyne</option>
                                                            <option value="Norwich">Norwich</option>
                                                            <option value="Nottingham">Nottingham</option>
                                                            <option value="Oxford">Oxford</option>
                                                            <option value="Peterborough">Peterborough</option>
                                                            <option value="Plymouth">Plymouth</option>
                                                            <option value="Portsmouth">Portsmouth</option>
                                                            <option value="Preston">Preston</option>
                                                            <option value="Ripon">Ripon</option>
                                                            <option value="Salford">Salford</option>
                                                            <option value="Salisbury">Salisbury</option>
                                                            <option value="Sheffield">Sheffield</option>
                                                            <option value="Southampton">Southampton</option>
                                                            <option value="Southend-on-Sea">Southend-on-Sea</option>
                                                            <option value="St Albans">St Albans</option>
                                                            <option value="Stoke on Trent">Stoke on Trent</option>
                                                            <option value="Sunderland">Sunderland</option>
                                                            <option value="Truro">Truro</option>
                                                            <option value="Walsall">Walsall</option>
                                                            <option value="Wakefield">Wakefield</option>
                                                            <option value="Wells">Wells</option>
                                                            <option value="Westminster">Westminster</option>
                                                            <option value="Winchester">Winchester</option>
                                                            <option value="Wolverhampton">Wolverhampton</option>
                                                            <option value="Worcester">Worcester</option>
                                                            <option value="York">York</option>
                                                        </optgroup>

                                                        <optgroup label="Northern Ireland">Northern Ireland
                                                            <option value="Armagh">Armagh</option>
                                                            <option value="Bangor">Bangor</option>
                                                            <option value="Belfast">Belfast</option>
                                                            <option value="Lisburn">Lisburn</option>
                                                            <option value="Londonderry">Londonderry</option>
                                                            <option value="Newry">Newry</option>
                                                        </optgroup>


                                                        <optgroup label="Scotland">Scotland
                                                            <option value="Aberdeen">Aberdeen</option>
                                                            <option value="Dundee">Dundee</option>
                                                            <option value="Dunfermline">Dunfermline</option>
                                                            <option value="Edinburgh">Edinburgh</option>
                                                            <option value="Glasgow">Glasgow</option>
                                                            <option value="Inverness">Inverness</option>
                                                            <option value="Perth">Perth</option>
                                                            <option value="Stirling">Stirling</option>
                                                        </optgroup>

                                                        <optgroup label="Wales">Wales
                                                            <option value="Bangor">Bangor</option>
                                                            <option value="Cardiff">Cardiff</option>
                                                            <option value="Newport">Newport</option>
                                                            <option value="St Asaph">St Asaph</option>
                                                            <option value="St Davids">St Davids</option>
                                                            <option value="Swansea">Swansea</option>
                                                            <option value="Wrexham">Wrexham</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-md-7 col-6">
                                                    <label for="exampleInputCoounty1">County<span style="color: red;">*</span></label>
                                                    <select name="txtCounty" required type="text" class="form-control" id="exampleFormControlSelect1" placeholder="County">
                                                        <optgroup label="England">
                                                            <option value="Bedfordshire">Bedfordshire</option>
                                                            <option value="Berkshire">Berkshire</option>
                                                            <option value="Bristol">Bristol</option>
                                                            <option value="Buckinghamshire">Buckinghamshire</option>
                                                            <option value="Cambridgeshire">Cambridgeshire</option>
                                                            <option value="Cheshire">Cheshire</option>
                                                            <option value="City of London">City of London</option>
                                                            <option value="Cornwall">Cornwall</option>
                                                            <option value="Cumbria">Cumbria</option>
                                                            <option value="Derbyshire">Derbyshire</option>
                                                            <option value="Devon">Devon</option>
                                                            <option value="Dorset">Dorset</option>
                                                            <option value="Durham">Durham</option>
                                                            <option value="East Riding of Yorkshire">East Riding of Yorkshire</option>
                                                            <option value="East Sussex">East Sussex</option>
                                                            <option value="Essex">Essex</option>
                                                            <option value="Gloucestershire">Gloucestershire</option>
                                                            <option value="Greater London">Greater London</option>
                                                            <option value="Greater Manchester">Greater Manchester</option>
                                                            <option value="Hampshire">Hampshire</option>
                                                            <option value="Herefordshire">Herefordshire</option>
                                                            <option value="Hertfordshire">Hertfordshire</option>
                                                            <option value="Isle of Wight">Isle of Wight</option>
                                                            <option value="Kent">Kent</option>
                                                            <option value="Lancashire">Lancashire</option>
                                                            <option value="Leicestershire">Leicestershire</option>
                                                            <option value="Lincolnshire">Lincolnshire</option>
                                                            <option value="Merseyside">Merseyside</option>
                                                            <option value="Norfolk">Norfolk</option>
                                                            <option value="North Yorkshire">North Yorkshire</option>
                                                            <option value="Northamptonshire">Northamptonshire</option>
                                                            <option value="Northumberland">Northumberland</option>
                                                            <option value="Nottinghamshire">Nottinghamshire</option>
                                                            <option value="Oxfordshire">Oxfordshire</option>
                                                            <option value="Rutland">Rutland</option>
                                                            <option value="Shropshire">Shropshire</option>
                                                            <option value="Somerset">Somerset</option>
                                                            <option value="South Yorkshire">South Yorkshire</option>
                                                            <option value="Staffordshire">Staffordshire</option>
                                                            <option value="Suffolk">Suffolk</option>
                                                            <option value="Surrey">Surrey</option>
                                                            <option value="Tyne and Wear">Tyne and Wear</option>
                                                            <option value="Warwickshire">Warwickshire</option>
                                                            <option value="West Midlands">West Midlands</option>
                                                            <option value="West Sussex">West Sussex</option>
                                                            <option value="West Yorkshire">West Yorkshire</option>
                                                            <option value="Wiltshire">Wiltshire</option>
                                                            <option value="Worcestershire">Worcestershire</option>
                                                        </optgroup>

                                                        <optgroup label="Northern Ireland">
                                                            <option value="Antrim">Antrim</option>
                                                            <option value="Armagh">Armagh</option>
                                                            <option value="Down">Down</option>
                                                            <option value="Fermanagh">Fermanagh</option>
                                                            <option value="Londonderry">Londonderry</option>
                                                            <option value="Tyrone">Tyrone</option>
                                                        </optgroup>

                                                        <optgroup label="Scotland">
                                                            <option value="Aberdeenshire">Aberdeenshire</option>
                                                            <option value="Angus">Angus</option>
                                                            <option value="Argyllshire">Argyllshire</option>
                                                            <option value="Ayrshire">Ayrshire</option>
                                                            <option value="Banffshire">Banffshire</option>
                                                            <option value="Berwickshire">Berwickshire</option>
                                                            <option value="Buteshire">Buteshire</option>
                                                            <option value="Cromartyshire">Cromartyshire</option>
                                                            <option value="Caithness">Caithness</option>
                                                            <option value="Clackmannanshire">Clackmannanshire</option>
                                                            <option value="Dumfriesshire">Dumfriesshire</option>
                                                            <option value="Dunbartonshire">Dunbartonshire</option>
                                                            <option value="East Lothian">East Lothian</option>
                                                            <option value="Fife">Fife</option>
                                                            <option value="Inverness-shire">Inverness-shire</option>
                                                            <option value="Kincardineshire">Kincardineshire</option>
                                                            <option value="Kinross">Kinross</option>
                                                            <option value="Kirkcudbrightshire">Kirkcudbrightshire</option>
                                                            <option value="Lanarkshire">Lanarkshire</option>
                                                            <option value="Midlothian">Midlothian</option>
                                                            <option value="Morayshire">Morayshire</option>
                                                            <option value="Nairnshire">Nairnshire</option>
                                                            <option value="Orkney">Orkney</option>
                                                            <option value="Peeblesshire">Peeblesshire</option>
                                                            <option value="Perthshire">Perthshire</option>
                                                            <option value="Renfrewshire">Renfrewshire</option>
                                                            <option value="Ross-shire">Ross-shire</option>
                                                            <option value="Roxburghshire">Roxburghshire</option>
                                                            <option value="Selkirkshire">Selkirkshire</option>
                                                            <option value="Shetland">Shetland</option>
                                                            <option value="Stirlingshire">Stirlingshire</option>
                                                            <option value="Sutherland">Sutherland</option>
                                                            <option value="West Lothian">West Lothian</option>
                                                            <option value="Wigtownshire">Wigtownshire</option>
                                                        </optgroup>

                                                        <optgroup label="Wales">
                                                            <option value="Anglesey">Anglesey</option>
                                                            <option value="Brecknockshire">Brecknockshire</option>
                                                            <option value="Caernarfonshire">Caernarfonshire</option>
                                                            <option value="Carmarthenshire">Carmarthenshire</option>
                                                            <option value="Cardiganshire">Cardiganshire</option>
                                                            <option value="Denbighshire">Denbighshire</option>
                                                            <option value="Flintshire">Flintshire</option>
                                                            <option value="Glamorgan">Glamorgan</option>
                                                            <option value="Merioneth">Merioneth</option>
                                                            <option value="Monmouthshire">Monmouthshire</option>
                                                            <option value="Montgomeryshire">Montgomeryshire</option>
                                                            <option value="Pembrokeshire">Pembrokeshire</option>
                                                            <option value="Radnorshire">Radnorshire</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-6">
                                                    <label for="exampleInputCity">Postal Code<span style="color: red;">*</span></label>
                                                    <input name="txtPosterCode" required type="text" class="form-control" id="exampleInputCity" placeholder="Postal Code">
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <label for="exampleInputCoounty1">Country<span style="color: red;">*</span></label>
                                                    <select name="txtCountry" required id="exampleFormControlSelect1" class="form-control">
                                                        <option style="background-color:rgba(52, 152, 219,1.0); color:white;" value="United Kingdom" selected="selected">--United Kingdom--</option>
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

                                                <br>

                                                <div style="margin-top: 22px;" class="form-group">
                                                    <div class="row">
                                                        <h4>Transport</h4>
                                                        <div class="col-md-7 col-6">
                                                            <label for="exampleFormControlSelect1">Carer transportation means? <span style="color: red;">*</span></label>
                                                            <select name="txtTransportMeans" required class="form-control" id="exampleFormControlSelect1">
                                                                <option value="Null" selected="selected" disabled="disabled">--Select Option--</option>
                                                                <option value="Car">Car</option>
                                                                <option value="Motorcycles">Motorcycles</option>
                                                                <option value="Bycycle">Bycycle</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 col-6">
                                                            <label for="Employment type">Employment type? <span style="color: red;">*</span></label>
                                                            <select style="height: 50px; font-size:19px;" type="text" placeholder="Employment type" required name="txtEmploymentType" class="form-control">
                                                                <option value="Null">--Select Option--</option>
                                                                <option value='N/A'>N/A</option>
                                                                <option value='Permanent employment'>Permanent employment</option>
                                                                <option value='Full-time employment'>Full-time employment</option>
                                                                <option value='Part-time employment'>Part-time employment</option>
                                                                <option value='Temporary employment'>Temporary employment</option>
                                                                <option value='Agency worker'>Agency worker</option>
                                                                <option value='Zero hours contract'>Zero hours contract</option>
                                                                <option value='Voluntary worker'>Voluntary worker</option>
                                                                <option value='Other'>Other</option>
                                                                <?php
                                                                //$result = mysqli_query($conn, "SELECT * FROM tbl_pay_rate WHERE col_company_Id ='" . $_SESSION['usr_compId'] . "' ");
                                                                //while ($row = mysqli_fetch_array($result)) {
                                                                //echo "
                                                                //<option value='" . $row['col_name'] . "'>" . $row['col_name'] . "</option>
                                                                //";
                                                                //}
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>

                                                <div style=" margin-top: 12px;" class="col-md-12 col-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="Select Care location">Carer service location<span style="color: red;">*</span></label>
                                                            <select name="txtCompanyCity" required type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Select Care location">
                                                                <optgroup label="England">England
                                                                    <option value="Bath">Bath</option>
                                                                    <option value="Birmingham">Birmingham</option>
                                                                    <option value="Bradford">Bradford</option>
                                                                    <option value="Brighton & Hove">Brighton & Hove</option>
                                                                    <option value="Bristol">Bristol</option>
                                                                    <option value="Cambridge">Cambridge</option>
                                                                    <option value="Canterbury">Canterbury</option>
                                                                    <option value="Carlisle">Carlisle</option>
                                                                    <option value="Chelmsford">Chelmsford</option>
                                                                    <option value="Chester">Chester</option>
                                                                    <option value="Chichester">Chichester</option>
                                                                    <option value="Colchester">Colchester</option>
                                                                    <option value="Coventry">Coventry</option>
                                                                    <option value="Derby">Derby</option>
                                                                    <option value="Dudley">Dudley</option>
                                                                    <option value="Doncaster">Doncaster</option>
                                                                    <option value="Durham">Durham</option>
                                                                    <option value="Ely">Ely</option>
                                                                    <option value="Exeter">Exeter</option>
                                                                    <option value="Gloucester">Gloucester</option>
                                                                    <option value="Hereford">Hereford</option>
                                                                    <option value="Kingston-upon-Hull">Kingston-upon-Hull</option>
                                                                    <option value="Lancaster">Lancaster</option>
                                                                    <option value="Leeds">Leeds</option>
                                                                    <option value="Leicester">Leicester</option>
                                                                    <option value="Lichfield">Lichfield</option>
                                                                    <option value="Lincoln">Lincoln</option>
                                                                    <option value="Liverpool">Liverpool</option>
                                                                    <option value="London">London</option>
                                                                    <option value="Manchester">Manchester</option>
                                                                    <option value="Milton Keynes">Milton Keynes</option>
                                                                    <option value="Newcastle-upon-Tyne">Newcastle-upon-Tyne</option>
                                                                    <option value="Norwich">Norwich</option>
                                                                    <option value="Nottingham">Nottingham</option>
                                                                    <option value="Oxford">Oxford</option>
                                                                    <option value="Peterborough">Peterborough</option>
                                                                    <option value="Plymouth">Plymouth</option>
                                                                    <option value="Portsmouth">Portsmouth</option>
                                                                    <option value="Preston">Preston</option>
                                                                    <option value="Ripon">Ripon</option>
                                                                    <option value="Salford">Salford</option>
                                                                    <option value="Salisbury">Salisbury</option>
                                                                    <option value="Sheffield">Sheffield</option>
                                                                    <option value="Southampton">Southampton</option>
                                                                    <option value="Southend-on-Sea">Southend-on-Sea</option>
                                                                    <option value="St Albans">St Albans</option>
                                                                    <option value="Stoke on Trent">Stoke on Trent</option>
                                                                    <option value="Sunderland">Sunderland</option>
                                                                    <option value="Truro">Truro</option>
                                                                    <option value="Walsall">Walsall</option>
                                                                    <option value="Wakefield">Wakefield</option>
                                                                    <option value="Wells">Wells</option>
                                                                    <option value="Westminster">Westminster</option>
                                                                    <option value="Winchester">Winchester</option>
                                                                    <option value="Wolverhampton">Wolverhampton</option>
                                                                    <option value="Worcester">Worcester</option>
                                                                    <option value="York">York</option>
                                                                </optgroup>

                                                                <optgroup label="Northern Ireland">Northern Ireland
                                                                    <option value="Armagh">Armagh</option>
                                                                    <option value="Bangor">Bangor</option>
                                                                    <option value="Belfast">Belfast</option>
                                                                    <option value="Lisburn">Lisburn</option>
                                                                    <option value="Londonderry">Londonderry</option>
                                                                    <option value="Newry">Newry</option>
                                                                </optgroup>


                                                                <optgroup label="Scotland">Scotland
                                                                    <option value="Aberdeen">Aberdeen</option>
                                                                    <option value="Dundee">Dundee</option>
                                                                    <option value="Dunfermline">Dunfermline</option>
                                                                    <option value="Edinburgh">Edinburgh</option>
                                                                    <option value="Glasgow">Glasgow</option>
                                                                    <option value="Inverness">Inverness</option>
                                                                    <option value="Perth">Perth</option>
                                                                    <option value="Stirling">Stirling</option>
                                                                </optgroup>

                                                                <optgroup label="Wales">Wales
                                                                    <option value="Bangor">Bangor</option>
                                                                    <option value="Cardiff">Cardiff</option>
                                                                    <option value="Newport">Newport</option>
                                                                    <option value="St Asaph">St Asaph</option>
                                                                    <option value="St Davids">St Davids</option>
                                                                    <option value="Swansea">Swansea</option>
                                                                    <option value="Wrexham">Wrexham</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleforstartdate">Start date<span style="color: red;">*</span></label>
                                                            <input name="txtStartDate" min="1925-01-01" max="2031-12-31" required type="date" class="form-control" id="exampleInputPassword1" placeholder="Start Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>


                                        <?php
                                        require_once('dbconnections.php');

                                        for ($a = 1; $a <= 50; $a++) {
                                            $usdd = "0";
                                            $rand = rand(0000, 9999);
                                            $rand1 = rand(0000, 9999);
                                            $rand2 = rand(0000, 9999);
                                            $rand3 = rand(0000, 9999);
                                            $rand4 = rand(0000, 9999);
                                            $randpx = rand(00000000, 99999999);
                                            $randpx1 = rand(00000000, 99999999);
                                            $randpx2 = rand(00000000, 99999999);
                                            $randpx3 = rand(00000000, 99999999);
                                            $rand5 = rand(0000, 9999);
                                            $rand6 = rand(0000, 9999);
                                            $rand7 = rand(0000, 9999);
                                            $rand8 = rand(0000, 9999);
                                            $rand9 = rand(00000000, 99999999);
                                            $rand0 = rand(000000000, 999999999);
                                            $ud = "45";
                                            $udsep = "-";
                                            $udsep1 = "45-";
                                            $udsep2 = "cl10-";
                                            $udsep3 = "i94-";
                                            $id = "$usdd$rand$ud$rand1$rand2$udsep1$rand3$rand4$rand5$udsep2$rand6$rand7$randpx$udsep3$rand8$rand9$rand0$udsep1$randpx1$randpx2$randpx3";
                                        }
                                        // Return current date from the remote server
                                        ?> <input type="hidden" value="<?php echo $id; ?>" name="mysocialId" />


                                        <?php
                                        require_once('dbconnections.php');

                                        for ($a = 1; $a <= 50; $a++) {
                                            $rand = rand(0, 9);
                                            $idEncrypt = "$rand";
                                        }

                                        // Return current date from the remote server
                                        ?> <input type="hidden" value="<?php echo $idEncrypt; ?>" name="mysocialIdEncrypt" />

                                        <?php
                                        $result = mysqli_query($conn, "SELECT col_company_Id FROM tbl_goesoft_users WHERE user_email_address='" . $_SESSION['usr_email'] . "' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                            <input type="hidden" name="txtCompanyId" value="<?php echo "" . $row['col_company_Id'] . "";
                                                                                        } ?>">


                                            <?php
                                            require_once('dbconnections.php');

                                            for ($a = 1; $a <= 50; $a++) {
                                                $usdd = "0";
                                                $rand = rand(0000, 9999);
                                                $id = "$usdd$rand";
                                            }

                                            // Return current date from the remote server
                                            ?> <input type="hidden" value="<?php echo $id; ?>" name="txtTeamResource" />

                                            <div class="form-group">
                                                <button type="submit" id="exampleFormControlSelect1" name="btnSubmitAddNewTeam" class="btn btn-primary">Add new team</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <?php include('bottom-panel-block.php'); ?>








        </div>
        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>


<?php include('footer-contents.php'); ?>