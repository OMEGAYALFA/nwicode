const n={ipad:function(n){return u(n,/iPad/i)},iphone:function(n){return u(n,/iPhone/i)},ios:function(n){return u(n,/iPad|iPhone|iPod/i)},android:function(n){return u(n,/android|sink/i)},phablet:function(n){const t=n.innerWidth,i=n.innerHeight,e=Math.min(t,i),o=Math.max(t,i);return e>390&&e<520&&o>620&&o<800},tablet:function(n){const t=n.innerWidth,i=n.innerHeight,e=Math.min(t,i),o=Math.max(t,i);return e>460&&e<820&&o>780&&o<1400},cordova:a,capacitor:c,electron:function(n){return u(n,/electron/)},pwa:function(n){return n.matchMedia("(display-mode: standalone)").matches||n.navigator.standalone},mobile:o,mobileweb:function(n){return o(n)&&!r(n)},desktop:function(n){return!o(n)},hybrid:r};function t(n){return e(n)}function i(n,i){return t(n).includes(i)}function e(t){t.Ionic=t.Ionic||{};let i=t.Ionic.platforms;if(null==i){i=t.Ionic.platforms=function(t){return Object.keys(n).filter(i=>n[i](t))}(t);const e=t.document.documentElement.classList;i.forEach(n=>e.add(`plt-${n}`))}return i}function o(n){return function(n,t){return n.matchMedia("(any-pointer:coarse)").matches}(n)}function r(n){return a(n)||c(n)}function a(n){return!!(n.cordova||n.phonegap||n.PhoneGap)}function c(n){const t=n.Capacitor;return!(!t||!t.isNative)}function u(n,t){return t.test(n.navigator.userAgent)}export{i as a,n as b,t as c,e as d,u as e};