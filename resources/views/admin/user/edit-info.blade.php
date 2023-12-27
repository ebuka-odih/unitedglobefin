@extends('admin.layout.app')
@section('content')

    <main id="main-container">
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('/assets/media/photos/photo17@2x.jpg');">
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" > <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('files/'.$user->avatar) }}" alt=""> </a>
                        <h1 class="fw-bold my-2 text-white">{{ $user->first_name." ".$user->last_name }}</h1>
                        <h2 class="h4 fw-bold text-white-75">
                            {{ $user->email }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <div class="content">

            <div class="block block-rounded h-100 mb-0">

                <div class="block-content">
                    <ul class="nav nav-pills push">
                        <li class="nav-item me-1">
                            <a class="nav-link  d-flex align-items-center" href="{{ route('admin.viewUser', $user->id) }}">
                                User Details
                            </a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link d-flex align-items-center" href="{{ route('admin.userSetting', $user->id) }}">
                                User Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" href="{{ route('admin.editInfo', $user->id) }}">
                                Edit Personal Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('admin.editAccountSetup', $user->id) }}">
                                Edit Account Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('admin.userChangePassword', $user->id) }}">
                                Change Password
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="block block-rounded">

                <div class="block-content tab-content overflow-hidden">
                    <div class="tab-pane fade fade-left active show" id="btabs-animated-slideleft-home" role="tabpanel" aria-labelledby="btabs-animated-slideleft-home-tab">
                        <div class="card">
                            <!-- Page Content -->
                            <br>
                            <div class="content content-full content-boxed">
                                <form method="POST" action="{{ route('admin.updateUser', $user->id) }}" class="row g-3" >
                                    @method('PATCH')
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <h4 style="color: #123771">Personal</h4>
                                    <span class="text-danger">* required</span>
                                    <div class="row mt-3 mb-4">
                                        <div class="col-md-4 mb-3">
                                            <label for="inputEmail4" class="form-label">First Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputEmail4" name="first_name" value="{{ old('first_name', optional($user)->first_name) }}" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputPassword4" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="inputPassword4" name="middle_name" value="{{ old('middle_name', optional($user)->middle_name) }}" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputPassword4" class="form-label">Last Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputPassword4" name="last_name" value="{{ old('last_name', optional($user)->last_name) }}" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <select name="title" id="suffix" class="form-control">
                                                <option selected disabled>Suffix...</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Prof.">Prof.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="suffix" class="form-label">Gender<span class="text-danger">*</span></label>
                                            <select name="gender" id="suffix" class="form-control">
                                                <option selected disabled>Gender...</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="non-binary">Non-binary</option>
                                                <option value="transgender">Transgender</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Date Of Birth<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="inputPassword4" name="date_of_birth" value="{{ old('date_of_birth', optional($user)->date_of_birth) }}" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="marital_status" class="form-label">Marital Status<span class="text-danger">*</span></label>
                                            <select name="marital_status" id="marital_status" class="form-control">
                                                <option selected disabled>Marital Status...</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 style="color: #123771">Contact Info</h4>
                                    <div class="row mb-4 mt-3">
                                        <div class="col-md-12 col-lg-4 mb-3">
                                            <label for="inputAddress" class="form-label">Address<span class="text-danger">*</span></label>
                                            <input type="text" name="address" class="form-control" id="inputAddress" value="{{ old('address', optional($user)->address) }}" >
                                        </div>
                                        <div class="col-md-12 col-lg-4 mb-3">
                                            <label for="inputAddress" class="form-label">Zipcode<span class="text-danger">*</span></label>
                                            <input type="text" name="zipcode" class="form-control" id="inputAddress" value="{{ old('zipcode', optional($user)->zipcode) }}" >
                                        </div>
                                        <div class="col-md-12 col-lg-4 mb-3">
                                            <label for="inputAddress" class="form-label">City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" class="form-control" id="inputAddress" value="{{ old('city', optional($user)->city) }}" >
                                        </div>
                                        <div class="col-md-12 col-lg-4 mb-3">
                                            <label for="inputAddress" class="form-label">State<span class="text-danger">*</span></label>
                                            <input type="text" name="state" class="form-control" id="inputAddress" value="{{ old('state', optional($user)->state) }}" >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4 mb-3">
                                                <label for="inputAddress" class="form-label">Phone<span class="text-danger">*</span></label>
                                                <input type="tel" name="phone" class="form-control" id="inputAddress" value="{{ old('phone', optional($user)->phone) }}" >
                                            </div>
                                            <div class="col-md-12 col-lg-4 mb-3">
                                                <label for="inputAddress" class="form-label">Email<span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" id="inputAddress" value="{{ old('email', optional($user)->email) }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 style="color: #123771">Residency</h4>
                                    <div class="row mt-3">
                                        <div class="col-4 mb-3">
                                            <div class="mb-4">
                                                <label class="form-label">Are you a US Citizen?<span class="text-danger">*</span></label>
                                                <div class="space-x-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="yes" name="citizenship" value="Yes" >
                                                        <label class="form-check-label" for="example-radios-inline1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="no" name="citizenship" value="No" >
                                                        <label class="form-check-label" for="example-radios-inline2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="yesFields" style="display: none;" >
                                            <div class="col-md-12 col-lg-4 mb-3" >
                                                <label for="inputAddress" class="form-label">Social Security number<span class="text-danger">*</span></label>
                                                <input type="password" name="ss_code" class="form-control" id="beneficiaryField1" value="{{ old('ss_code', optional($user)->ss_code) }}">
                                            </div>
                                            <div class="col-md-12 col-lg-4 mb-3" >
                                                <label for="inputAddress" class="form-label">Confirm Social Security number<span class="text-danger">*</span></label>
                                                <input type="password" name="confirm_ss_code" class="form-control" id="inputAddress" value="{{ old('confirm_ss_code', optional($user)->confirm_ss_code) }}">
                                            </div>
                                        </div>

                                        <div id="noField" style="display: none;" class="col-md-12 col-lg-4 mb-3" >
                                            <label for="inputAddress" class="form-label">Country of Citizenship<span class="text-danger">*</span></label>
                                            <select id="country" name="country" class="form-control">
                                                <option selected disabled>Country...</option>
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
                                    <hr>
                                    <h4 style="color: #123771">Employment & finances</h4>
                                    <div class="row mt-3">
                                        <div class="col-6 mb-3">
                                            <label for="employment" class="form-label">Employment Status<span class="text-danger">*</span></label>
                                            <select name="employment" id="employment" class="form-control">
                                                <option selected disabled>Employment Status...</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Retired">Retired</option>
                                                <option value="Self-Employed">Self-Employed</option>
                                                <option value="Student">Student</option>
                                                <option value="Not employed">Not employed</option>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="source_of_income" class="form-label">Source Of Income<span class="text-danger">*</span></label>
                                            <select name="source_of_income" id="source_of_income" class="form-control">
                                                <option selected disabled>Source Of Income...</option>
                                                <option value="Employment Income">Employment Income</option>
                                                <option value="Inheritance or Trust">Inheritance or Trust</option>
                                                <option value="Investment Income">Investment Income</option>
                                                <option value="Retirement Income">Retirement Income</option>
                                                <option value="Social Security">Social Security</option>
                                                <option value="Unemployment">Unemployment</option>
                                                <option value="Household Income / Other">Household Income / Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4 mb-5">
                                        <button type="submit" class="btn btn-primary">Update Info</button>
                                    </div>
                                </form>


                            </div>
                            <!-- END Page Content -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </main>

@endsection
