export default {
  // Target (https://go.nuxtjs.dev/config-target)
  target: 'static',

  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    __dangerouslyDisableSanitizers: ['script'],
    title: 'US Boat Registration',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ],
    script: [
      {
        src: 'https://js.stripe.com/v3'
      },
      {
        hid: 'fullstory-script',
        innerHTML: `
        window['_fs_debug'] = false; window['_fs_host'] = 'fullstory.com'; window['_fs_script'] = 'edge.fullstory.com/s/fs.js'; window['_fs_org'] = 'YZ473'; window['_fs_namespace'] = 'FS'; (function(m,n,e,t,l,o,g,y){ if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;} g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[]; o=n.createElement(t);o.async=1;o.crossOrigin='anonymous';o.src='https://'+_fs_script; y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y); g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)}; g.anonymize=function(){g.identify(!!0)}; g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)}; g.log = function(a,b){g("log",[a,b])}; g.consent=function(a){g("consent",!arguments.length||a)}; g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)}; g.clearUserCookie=function(){}; g.setVars=function(n, p){g(n, p);}; g._w={};y='XMLHttpRequest';g._w[y]=m[y];y='fetch';g._w[y]=m[y]; if(m[y])m[y]=function(){return g._w[y].apply(this,arguments)}; g._v="1.3.0"; })(window,document,window['_fs_namespace'],'script','user'); 
        `,
        type: 'text/javascript',
        charset: 'utf-8'
      },
      {
        hid:'chat-script',
        innerHTML:`
        <!-- begin olark code -->
(function(o,l,a,r,k,y){if(o.olark)return; r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0]; y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r); y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)}; y.extend=function(i,j){y("extend",i,j)}; y.identify=function(i){y("identify",k.i=i)}; y.configure=function(i,j){y("configure",i,j);k.c[i]=j}; k=y._={s:[],t:[+new Date],c:{},l:a}; })(window,document,"static.olark.com/jsclient/loader.js");
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('5865-209-10-4526');
<!-- end olark code -->
        `
,
        type: 'text/javascript',
        charset: 'utf-8',
        async: true
      }
    ],
  },

 

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: ['~/assets/css/style.css'],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
    {src: '~/plugins/Vuelidate'},
    // {src: '~/plugins/axios'}
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
  ],

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  },

  env: {
    apiBaseUrl: process.env.API_BASE_URL,
    stripeKey:process.env.STRIPE_KEY
  },
  ssr: false,
}
