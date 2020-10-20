<template>
  <div id="main_container">
    <Header />

    <section id="form_container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-8">
            <form
              method="POST"
              action=""
              id="registration_form"
              @submit.prevent="submitForm"
            >
              <span class="award_wining">Award Winning</span>

              <h1>Get Registered, <br />then get out there!</h1>
       
              <h2>
                Fast & Easy full service boat registration for as little as
                <strong>$100!</strong>
              </h2>

              <div
                class="feedback d-flex justify-content-between align-items-center"
              >
                <img src="~/assets/img/review.svg" />
                <span class="feedback_text">
                  <span class="white_arrow"
                    ><img src="~/assets/img/white-arrow.png"
                  /></span>
                  <p>
                    "This service was so easy and fast! Could not be happier."
                  </p></span
                >
                
                
              </div>
              <img src="~/assets/img/trustpilot.svg" width="302" class="transpilot"/>

              <div class="form-group">
                <label>Full Name</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Full Name"
                  v-model.trim="$v.form.full_name.$model"
                  v-on:input="$v.form.full_name.$touch"
                  v-bind:class="{
                    error: $v.form.full_name.$error,
                    valid:
                      $v.form.full_name.$dirty && !$v.form.full_name.$invalid,
                  }"
                />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email"
                  v-model.trim="$v.form.email.$model"
                  v-on:input="$v.form.email.$touch"
                  v-bind:class="{
                    error: $v.form.email.$error,
                    valid: $v.form.email.$dirty && !$v.form.email.$invalid,
                  }"
                />
              </div>

              <div class="form-group">
                <label>Phone</label>
                <input
                  type="tel"
                  class="form-control"
                  placeholder="Phone"
                  v-model.trim="$v.form.phone.$model"
                  v-on:input="$v.form.phone.$touch"
                  v-bind:class="{
                    error: $v.form.phone.$error,
                    valid: $v.form.phone.$dirty && !$v.form.phone.$invalid,
                  }"
                />
              </div>

              <div class="form-group">
                <label>State</label>
                <select
                  class="form-control"
                  id=""
                  v-model.trim="$v.form.state.$model"
                  
                  v-bind:class="{
                    error: $v.form.state.$error,
                    valid: $v.form.state.$dirty && !$v.form.state.$invalid,
                  }"
                >
                  <option value=''>Select state</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>

              <button
                type="submit"
                class="my_button d-block width_fill"
                :disabled="$v.form.$invalid"
              >
                Get Started
              </button>
            </form>
          </div>
          <div class="col-lg-5 col-sm-4 display-md-none"></div>
        </div>
      </div>
    </section>

  <section id="review_container">
        <ul class="d-flex justify-content-around flex-wrap">
          <li>
            <p>
              "Renewing my boat registration online was quick and easy! No lost time waiting in long lines."
            </p>
            <img src="~/assets/img/today.png" class="img-fluid" />
          </li>
          <li>
            <p>
              "I just used the website for my registration. Loved the ease in placing the order online. Now I'll wait for my renewal tags. Thank you!!”"
            </p>
            <img src="~/assets/img/fast_company.png" class="img-fluid" />
          </li>
          <li>
            <p>
              Customer Reviews<br /><img
                src="~/assets/img/five-star.png"
                class="img-fluid"
              />
            </p>
            <img src="~/assets/img/google.png" class="img-fluid" />
          </li>
          <li>
            <p>
              "This just saved me the several hours of time it would have taken to drive to the TPWD, wait in those notorious long-lines and then drive home! I highly recommend this online payment option for those who wish to save time and money!"
            </p>
            <img src="~/assets/img/vogue.png" class="img-fluid" />
          </li>
          <li>
            <p>
              "It is very helpful not to have to visit in person. It is convenient to register this way.Thank You!"
            </p>
            <img src="~/assets/img/cbs.png" class="img-fluid" />
          </li>
        </ul>
      </section>

    <section id="registered_boat_container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 d-md-none d-lg-none d-xl-none">
            <img src="~/assets/img/jordan.png" class="img-fluid" />
          </div>

          <div class="col-md-6">
            <h1>Everything you need to get your boat registered.</h1>
            <p class="para">
              Renewing my boat registration online was quick and easy! No lost
              time waiting in long lines.” “I just used the website for my
              registration. Loved the ease in placing the order online. Now I'll
              wait for my renewal tags. Thank you!!” This just saved me the
              several hours of time it would have taken to drive to the TPWD,
              wait in those notorious long-lines and then drive home! I highly
              recommend this online payment option for those who wish to save
              time and money!” It is very helpful not to have to visit in
              person. It is convenient to register this way. Thank You!”
            </p>
            <div class="boat_registered">
              <div class="row">
                <div class="col-md-4">
                  <p class="size">
                    <img src="~/assets/img/folder_heart.png" /> Easy Filing
                  </p>
                </div>
                <div class="col-md-4">
                  <p class="size">
                    <img src="~/assets/img/guarenteed_quality.png" />
                    Guarenteed <br />quality
                  </p>
                </div>
                <div class="col-md-4">
                  <p class="size">
                    <img src="~/assets/img/fast_return.png" />Fast Returns
                  </p>
                </div>
              </div>
            </div>
            <button type="submit" class="my_button">Register Now</button>
          </div>
          <div class="col-md-6 d-none d-sm-block">
            <img src="~/assets/img/jordan.png" class="img-fluid" />
          </div>
        </div>
      </div>
    </section>

    <section id="process_container">
      <h1>Our Process</h1>
      <ul class="process_list d-flex justify-content-lg-around justify-content-xl-around justify-content-md-around justify-content-start flex-wrap">
        <li>
          <span class="box">
            <img src="~/assets/img/pick_your_service.png" />
          </span>
          <p>Pick your Service</p>
        </li>
        <li>
          <img src="~/assets/img/double-arrow.png" class="double-arrow" width="25"/>
        </li>

        <li>
          <span class="box">
            <img src="~/assets/img/provide_information.png" />
          </span>
          <p>Provide information</p>
        </li>
        <li>
          <img src="~/assets/img/double-arrow.png" class="double-arrow" width="25"/>
        </li>

        <li>
          <span class="box">
            <img src="~/assets/img/file_with_your_state.png" />
          </span>
          <p>We file with your state</p>
        </li>
        <li>
          <img src="~/assets/img/double-arrow.png" class="double-arrow" width="25"/>
        </li>

        <li>
          <span class="box">
            <img src="~/assets/img/files_folder.png" />
          </span>
          <p>Return it back to you</p>
        </li>
      </ul>
    </section>

    <section id="pricing_container">
      <h1>Worried about Filing Fees?</h1>
      <p>
        We have the best pricing for our online packages in the state of Texas.
      </p>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <form method="POST" action="" id="">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" />
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="my_button">See Pricing</button>
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import {
  required,
  minLength,
  between,
  withParams,
} from "vuelidate/lib/validators";
const isPhone = (value) => /^\+?[0-9]+$/.test(value);
const isEmail = (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
export default {
  data() {
    return {
      form: {
        full_name: null,
        email: null,
        phone: null,
        state: null,
      },
    };
  },
  validations: {
    form: {
      full_name: {
        required,
        minLength: minLength(5),
      },
      email: {
        required,
        emailValid: isEmail,
      },
      phone: {
        required,
        phoneValid: isPhone,
      },
      state: {
        required,
      },
    },
  },
  methods: {
    submitForm() {
      this.$v.$touch(); //it will validate all fields
      if (!this.$v.form.$invalid) {
        //this.$store.state.full_name=this.full_name;
        this.$router.push({path: '/payment', query:{full_name: this.form.full_name, email: this.form.email, phone: this.form.phone, state: this.form.state}})
        //console.log("submitted", this.form);
      } else {
        console.log("invalid form");
      }
    },
  },
  mounted() {
    this.form.state='';
    //console.log(process.env.apiBaseUrl);
  },
};
</script>

<style  scoped>
img.transpilot{
    margin:7px 0 25px 0;
}
</style>
