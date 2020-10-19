<template>
  <div id="main_container">
    <Header />

    <section class="payment-container">
      <div class="bg-cover"></div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form
            method="POST"
            action=""
            id="registration_form"
            class="payment-form"
            @submit.prevent="submitForm"
          >
            <h1 class="payment">No hassel filling!</h1>
            <h2 class="payment">
              The only full service boat registration online with guarenteed
              satisfaction.
            </h2>

            <h1 class="cost"><span>$</span>100</h1>

            <hr />
            <p class="text-center">
              <strong> This quote includes: </strong>
            </p>
            <ul type="disc">
              <li>1 Boat Registration</li>
              <li>Boat Title Fee</li>
              <li>State Sales Tax</li>
              <li>New Residence Fee</li>
            </ul>

            <div class="user-details">
              <p>
                <strong>Full Name: </strong>{{ $route.query.full_name }}<br />
                <strong>Email: </strong>{{ $route.query.email }}<br />
                <strong>Phone: </strong>{{ $route.query.phone }}<br />
                <strong>State: </strong>{{ $route.query.state }}
              </p>
            </div>

            <!-- Stripe Error -->
            <p class="stripeError" v-if="stripeError">
              {{ stripeError }}
            </p>

            <div class="form-group">
              <label>Name on Card</label>
              <input
                type="text"
                class="form-control"
                placeholder="Name on Card"
                v-model.trim="$v.form.name_on_card.$model"
                v-on:input="$v.form.name_on_card.$touch"
                v-bind:class="{
                  error: $v.form.name_on_card.$error,
                  valid:
                    $v.form.name_on_card.$dirty &&
                    !$v.form.name_on_card.$invalid,
                }"
              />
            </div>
            <div class="form-group">
              <label>Card Number</label>
              <input
                type="text"
                class="form-control"
                placeholder="Card Number"
                v-model.trim="$v.form.card_number.$model"
                v-on:input="$v.form.card_number.$touch"
                v-bind:class="{
                  error: $v.form.card_number.$error,
                  valid:
                    $v.form.card_number.$dirty && !$v.form.card_number.$invalid,
                }"
              />
              <!-- if card number error -->
              <span class="help-block" v-if="cardNumberError">
                {{ cardNumberError }}
              </span>
            </div>

            <div class="form-group">
              <label>CVC</label>
              <input
                type="text"
                class="form-control"
                placeholder="CVC Code"
                v-model.trim="$v.form.cvc_code.$model"
                v-on:input="$v.form.cvc_code.$touch"
                v-bind:class="{
                  error: $v.form.cvc_code.$error,
                  valid: $v.form.cvc_code.$dirty && !$v.form.cvc_code.$invalid,
                }"
              />

              <span class="help-block" v-if="cardCvcError">
                {{ cardCvcError }}
              </span>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Expiration Month</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="MM"
                  v-model.trim="$v.form.exp_month.$model"
                  v-on:input="$v.form.exp_month.$touch"
                  v-bind:class="{
                    error: $v.form.exp_month.$error,
                    valid:
                      $v.form.exp_month.$dirty && !$v.form.exp_month.$invalid,
                  }"
                />
              </div>
              <div class="form-group col-md-6">
                <label>Expiration Year</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="YYYY"
                  v-model.trim="$v.form.exp_year.$model"
                  v-on:input="$v.form.exp_year.$touch"
                  v-bind:class="{
                    error: $v.form.exp_year.$error,
                    valid:
                      $v.form.exp_year.$dirty && !$v.form.exp_year.$invalid,
                  }"
                />
              </div>

              <span class="help-block" v-if="cardExpiryError">
                {{ cardExpiryError }}
              </span>
            </div>

            <div class="form-group">
              <label>Zip Code</label>
              <input
                type="text"
                class="form-control"
                placeholder="Zip Code"
                v-model.trim="$v.form.zip_code.$model"
                v-on:input="$v.form.zip_code.$touch"
                v-bind:class="{
                  error: $v.form.zip_code.$error,
                  valid: $v.form.zip_code.$dirty && !$v.form.zip_code.$invalid,
                }"
              />
            </div>

            <button
              type="submit"
              class="my_button d-block width_fill"
              :disabled="$v.form.$invalid"
            >
              REGISTERED
            </button>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </section>

    <!-- <Footer /> -->
  </div>
</template>

<style scoped>
.user-details {
  padding: 10px;
  background-color: #d6e7f3;
  border: dotted 1px #0c4559;
  margin: 15px 0;
}
.user-details p {
  padding: 0;
  margin: 0;
}
.payment-form h1.payment {
  font-family: Montserrat;
  font-style: normal;
  font-weight: 500;
  font-size: 32px !important;
  line-height: 22px;
  color: #000000;
}

.payment-form h2.payment {
  font-family: Montserrat;
  font-style: normal;
  font-weight: 500;
  font-size: 18px !important;
  line-height: 22px !important;
  color: #000000;
}

h1.cost {
  font-family: Lora !important;
  font-style: normal !important;
  font-weight: bold !important;
  font-size: 54px !important;
  line-height: 69px !important;
  text-align: center !important;
  color: #000000 !important;
}

h1.cost span {
  font-family: Lora !important;
  font-style: normal !important;
  font-weight: bold !important;
  font-size: 33px !important;
  line-height: 42px !important;
  text-align: center !important;
  color: #000000 !important;
}
</style>

<script>
import {
  required,
  minLength,
  maxLength,
  between,
  withParams,
} from "vuelidate/lib/validators";
const isInteger = (value) => /^\+?\d+$/.test(value);



export default {
  data() {
    return {
      form: {
        name_on_card: null,
        card_number: null,
        cvc_code:null,
        exp_month: null,
        exp_year: null,
        zip_code: null,
      },
    };
  },
  validations: {
    form: {
      name_on_card: {
        required,
        minLength: minLength(5),
      },
      card_number: {
        required,
        integerValid: isInteger,
      },
      cvc_code: {
        required,
        integerValid: isInteger,
      },
      exp_month: {
        required,
        maxLength: maxLength(2),
        integerValid: isInteger,
      },
      exp_year: {
        required,
        maxLength: maxLength(4),
        integerValid: isInteger,
      },
      zip_code: {
        required,
        integerValid: isInteger,
      },
    },
  },
  methods: {
    setUpStripe() {
        if (window.Stripe === undefined) {
          alert('Stripe V3 library not loaded!');
        } else {
          const stripe = window.Stripe('pk_test_GZYfG6M52r52tEHYj4G5mUkz');
          this.stripe = stripe;

          const elements = stripe.elements();
          this.cardCvc = elements.create('cardCvc');
          this.cardExpiry = elements.create('cardExpiry');
          this.cardNumber = elements.create('cardNumber');

          this.cardCvc.mount('#card-cvc');
          this.cardExpiry.mount('#card-expiry');
          this.cardNumber.mount('#card-number');

          this.listenForErrors();
        }
      },

      listenForErrors() {
        const vm = this;

        this.cardNumber.addEventListener('change', (event) => {
          vm.toggleError(event);
          vm.cardNumberError = ''
          vm.card.number = event.complete ? true : false
        });
				
        this.cardExpiry.addEventListener('change', (event) => {
          vm.toggleError(event);
          vm.cardExpiryError = ''
          vm.card.expiry = event.complete ? true : false
        });
        
				this.cardCvc.addEventListener('change', (event) => {
          vm.toggleError(event);
          vm.cardCvcError = ''
          vm.card.cvc = event.complete ? true : false
        });
      },

      toggleError (event) {
        if (event.error) {
          this.stripeError = event.error.message;
        } else {
          this.stripeError = '';
        }
      },

      submitFormToCreateToken() {
        this.clearCardErrors();
        let valid = true;

        if (!this.card.number) {
          valid = false;
          this.cardNumberError = "Card Number is Required";
        }
        if (!this.card.cvc) {
          valid = false;
          this.cardCvcError = "CVC is Required";
        }
        if (!this.card.expiry) {
          valid = false;
          this.cardExpiryError = "Month is Required";
        }
        if (this.stripeError) {
          valid = false;
        }
        if (valid) {
          this.createToken()
        }
      },

      createToken() {
        this.stripe.createToken(this.cardNumber).then((result) => {
            if (result.error) {
              this.stripeError = result.error.message;
            } else {
              const token = result.token.id
              alert('Thanks for donating.')
                //send the token to your server
                //clear the inputs
            }
          })
      },

      clearElementsInputs() {
        this.cardCvc.clear()
        this.cardExpiry.clear()
        this.cardNumber.clear()
      },

      clearCardErrors() {
        this.stripeError = ''
        this.cardCvcError = ''
        this.cardExpiryError = ''
        this.cardNumberError = ''
      },
			
			reset() {
				this.clearElementsInputs()
				this.clearCardErrors()
			},

    submitForm() {
      this.$v.$touch(); //it will validate all fields
      if (!this.$v.form.$invalid) {
        //console.log(this.$route.query.email);
        console.log("submitted", this.form);
      } else {
        console.log("invalid form");
      }
    },
  },

  mounted() {

this.setUpStripe();
    if (
      !this.$route.query.full_name ||
      !this.$route.query.email ||
      !this.$route.query.phone ||
      !this.$route.query.state
    ) {
      this.$router.back();
    }
  },
  
};
</script>

<style>
</style>
