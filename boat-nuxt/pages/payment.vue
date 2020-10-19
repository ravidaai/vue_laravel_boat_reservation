<template>

  <div id="main_container">
    <Header />

    <section class="payment-container">
      <div class="bg-cover"></div>
      <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-sm-3 col-xs-1"></div>
        <div class="col-md-4 col-lg-6 col-xl-6 col-sm-6 col-xs-10">
          <form
            method="POST"
            action=""
            id="registration_form"
            class="payment-form"
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

            <div class="">
              <p class="stripeError" v-if="card.stripeError">
                {{ card.stripeError }}
              </p>
            </div>

            <div class="form-group">
              <label>Name on Card</label>
              <input
                type="text"
                class="form-control"
                placeholder="Name on Card"
                id="name-on-card"
                v-model="card.name_on_card"
              />

              <span class="help-block" v-if="card.nameOnCardError">
                {{ card.nameOnCardError }}
              </span>
            </div>

            <div class="form-group">
              <label> Card Number </label>

              <div
                id="card-number"
                class="form-control"
                :class="{ 'uk-form-danger': card.cardNumberError }"
                placeholder="Card Number"
              ></div>
              <span class="help-block" v-if="card.cardNumberError">
                {{ card.cardNumberError }}
              </span>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>CVC</label>
                <div
                  id="card-cvc"
                  class="form-control"
                  :class="{ 'uk-form-danger': card.cardCvcError }"
                ></div>
                <span class="help-block" v-if="card.cardCvcError">
                  {{ card.cardCvcError }}
                </span>
              </div>

              <div class="form-group col-md-6">
                <label>Expiry</label>
                <div
                  id="card-expiry"
                  class="form-control"
                  :class="{ 'uk-form-danger': card.cardCvcError }"
                ></div>
                <span class="help-block" v-if="card.cardExpiryError">
                  {{ card.cardExpiryError }}
                </span>
              </div>
            </div>

            <div class="form-group">
              <label>Zip Code</label>
              <input
                type="text"
                class="form-control"
                placeholder="Zip Code"
                id="zip-code"
                v-model="card.zip_code"
              />
              <span class="help-block" v-if="card.zipCodeError">
                {{ card.zipCodeError }}
              </span>
            </div>

            <div class="uk-margin uk-margin-remove-bottom uk-text-right">
              <button
                type="submit"
                class="my_button d-block width_fill"
                @click.prevent="submitFormToCreateToken()" :disabled="card.loading"
              >
                REGISTERED
              </button>

              <div class="loading-page" v-if="card.loading">
    <p>Please wait to complete process ...</p>
  </div>


  <div class="loading-page success" v-if="card.success">
    <p>Successfully registered.</p>
  </div>


            </div>
          </form>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 col-sm-3 col-xs-1"></div>
      </div>
    </section>

    <!-- <Footer /> -->
  </div>
</template>

<style scoped>
.loading-page {
    
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    padding: 10px;
    text-align: center;
    font-size: 15px;
    font-family: sans-serif;
  }

  .success{
    color: rgb(4, 63, 139);
  }

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

.help-block {
  color: red;
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
import axios from "axios";

const axiosConfig = {
  headers: {
    "Content-Type": "application/json;charset=UTF-8",
    "Access-Control-Allow-Origin": "*",
  },
};

const isInteger = (value) => /^\+?\d+$/.test(value);

export default {
  data() {
    return {
      card: {
        name_on_card: "",
        cvc: "",
        number: "",
        expiry: "",
        zip_code: "",

        cardNumber: "",
        cardExpiry: "",
        cardCvc: "",
        stripe: null,

        stripeError: "",
        cardCvcError: "",
        cardExpiryError: "",
        cardNumberError: "",

        nameOnCardError: "",
        zipCodeError: "",

        loading: false,
        success: false,
      },
    };
  },

  mounted() {
    this.setUpStripe();
  },

  methods: {
    setUpStripe() {
      if (window.Stripe === undefined) {
        alert("Stripe V3 library not loaded!");
      } else {
        const stripe = window.Stripe(
          "pk_test_51HMO5LLCtCRFVzfpRThDM6j97O6xvnarOkHd7H1wrhX6wu0CAdSQf4NviGVWGVqUadAG3Hv1nzmTPPNh0XdPhyjT00QgSGYLsD"
        );
        this.card.stripe = stripe;

        const elements = stripe.elements();
        this.card.cardCvc = elements.create("cardCvc");
        this.card.cardExpiry = elements.create("cardExpiry");
        this.card.cardNumber = elements.create("cardNumber");

        this.card.cardCvc.mount("#card-cvc");
        this.card.cardExpiry.mount("#card-expiry");
        this.card.cardNumber.mount("#card-number");

        // this.card.name_on_card = window.document.getElementById("name-on-card");
        // this.card.zip_code = window.document.getElementById("zip-code");

        this.listenForErrors();
      }
    },

    listenForErrors() {
      const vm = this;

      this.card.cardNumber.addEventListener("change", (event) => {
        vm.toggleError(event);
        vm.card.cardNumberError = "";
        vm.card.number = event.complete ? true : false;
      });

      this.card.cardExpiry.addEventListener("change", (event) => {
        vm.toggleError(event);
        vm.card.cardExpiryError = "";
        vm.card.expiry = event.complete ? true : false;
      });

      this.card.cardCvc.addEventListener("change", (event) => {
        vm.toggleError(event);
        vm.card.cardCvcError = "";
        vm.card.cvc = event.complete ? true : false;
      });

      // this.card.name_on_card.addEventListener("change", (event) => {
      //   vm.toggleError(event);
      //   vm.card.nameOnCardError = "";
      //   vm.card.name_on_card = event.complete ? true : false;
      // });

      // this.card.zip_code.addEventListener("change", (event) => {
      //   vm.toggleError(event);
      //   vm.card.zipCodeError = "";
      //   vm.card.zip_code = event.complete ? true : false;
      // });
    },

    toggleError(event) {
      if (event.error) {
        this.card.stripeError = event.error.message;
      } else {
        this.card.stripeError = "";
      }
    },

    submitFormToCreateToken() {
      this.clearCardErrors();
      let valid = true;
      this.card.loading=false;
      if (!this.card.number) {
        valid = false;
        this.card.cardNumberError = "Card Number is Required";
      }
      if (!this.card.cvc) {
        valid = false;
        this.card.cardCvcError = "CVC is Required";
      }
      if (!this.card.expiry) {
        valid = false;
        this.card.cardExpiryError = "Expiry is Required";
      }

      if (!this.card.name_on_card) {
        valid = false;
        this.card.nameOnCardError = "Name on card is Required";
      }

      if (!this.card.zip_code) {
        valid = false;
        this.card.zipCodeError = "Zip code is Required";
      }

      if (this.card.stripeError) {
        valid = false;
      }
      if (valid) {
        this.createToken();
      }
    },

    createToken() {
      //alert(1);
      this.card.success=false;
      this.card.stripe.createToken(this.card.cardNumber).then((result) => {
        this.card.loading=true;
        if (result.error) {
          this.card.loading=false;
          this.card.stripeError = result.error.message;
        } else {
          const token = result.token.id;
          var postData = {
            name: this.$route.query.full_name,
            email: this.$route.query.email,
            state: this.$route.query.state,
            phone: this.$route.query.phone,
            name_on_card: this.card.name_on_card,
            cvc: this.card.cvc,
            expiry: this.card.expiry,
            zip_code: this.card.zip_code,
            stripeToken: token,
          };
          axios
            .post("https://boat-online-registration.com/api/register", postData, axiosConfig)
            .then((res) => {
              //console.log(res.data.success);
              this.card.loading=false;
              this.card.success=res.data.success;
              this.reset();
              //return { title: res.data.title };
            })
            .catch((err) => {
              this.card.loading=false;
              console.log(err);
            });
          //send the token to your server
          //clear the inputs
        }
      });
    },

    clearElementsInputs() {
      this.card.cardCvc.clear();
      this.card.cardExpiry.clear();
      this.card.cardNumber.clear();
      this.card.name_on_card=null;
      this.card.zip_code=null;
    },

    clearCardErrors() {
      this.card.stripeError = "";
      this.card.cardCvcError = "";
      this.card.cardExpiryError = "";
      this.card.cardNumberError = "";

      this.card.nameOnCardError = "";
      this.card.zipCodeError = "";

    },

    reset() {
      this.clearElementsInputs();
      this.clearCardErrors();
    },
  },
};
</script>

<style>
</style>
