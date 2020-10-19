<template>
  <div id="main_container">
    <Header />

    <section id="form_container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-8">
            <form method="POST" action="" id="registration_form" @submit.prevent="submitForm">
              <span class="award_wining">Award Winning</span>

              <h1>Get Registered, <br />then get out there!</h1>
              <h2>
                Fast & Easy full service boat registration for as little as
                <strong>$100!</strong>
              </h2>

              <div
                class="feedback d-flex justify-content-between align-items-center"
              >
                <img src="~/assets/img/review.png" />
                <span class="feedback_text">
                  <span class="white_arrow"
                    ><img src="~/assets/img/white-arrow.png"
                  /></span>
                  <p>
                    "This service was so easy and fast! Could not be happier."
                  </p></span
                >
              </div>

              <div class="form-group">
                <label class="form__label">Full Name</label>
                <input
                  type="text"
                  class="form-control form__input"
                  placeholder="First Last"
                  v-model.trim="form.full_name"
                  v-on:input="$v.form.full_name.$touch"
                  v-bind:class="{error: $v.form.full_name.$error}"
                />
                <div class="error" v-if="$v.form.full_name.$error">
                  The full name is invalid.
                </div>

                
                
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" />
              </div>

              <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" placeholder="Phone" />
              </div>

              <div class="form-group">
                <label>State</label>
                <select class="form-control" id="">
                  <option>Select state</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>

              <button type="submit" class="my_button d-block width_fill" :disabled="$v.form.$invalid">
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
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
            nulla cursus feugiat aliquet volutpat."
          </p>
          <img src="~/assets/img/today.png" class="img-fluid" />
        </li>
        <li>
          <p>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
            nulla cursus feugiat aliquet volutpat."
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
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
            nulla cursus feugiat aliquet volutpat."
          </p>
          <img src="~/assets/img/vogue.png" class="img-fluid" />
        </li>
        <li>
          <p>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
            nulla cursus feugiat aliquet volutpat."
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
      <ul class="process_list d-flex justify-content-around flex-wrap">
        <li>
          <span class="box">
            <img src="~/assets/img/pick_your_service.png" />
          </span>
          <p>Pick your Service</p>
        </li>
        <li>
          <img src="~/assets/img/double-arrow.png" class="double-arrow" />
        </li>

        <li>
          <span class="box">
            <img src="~/assets/img/provide_information.png" />
          </span>
          <p>Provide information</p>
        </li>
        <li>
          <img src="~/assets/img/double-arrow.png" class="double-arrow" />
        </li>

        <li>
          <span class="box">
            <img src="~/assets/img/file_with_your_state.png" />
          </span>
          <p>We file with your state</p>
        </li>
        <li>
          <img src="~/assets/img/double-arrow.png" class="double-arrow" />
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
import { required, minLength, between } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      form: {
        full_name: null,
      },
    };
  },
  validations: {
    form: {
      full_name: {
        required,
        minLength: minLength(5),
      },
    },
  },
  methods: {
    submitForm() {
      this.$v.$touch(); //it will validate all fields
      if (!this.$v.form.$invalid) {
        console.log("submitted", this.form);
      }else{
        console.log('invalid form');
      }
    },
  },
};
</script>

<style>
</style>
