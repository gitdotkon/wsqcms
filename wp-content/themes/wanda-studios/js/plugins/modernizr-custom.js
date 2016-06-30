/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-bgpositionxy-bgsizecover-borderradius-boxshadow-canvas-checked-contextmenu-cssall-cssanimations-cssfilters-cssgradients-csshyphens_softhyphens_softhyphensfind-cssmask-csspointerevents-csstransforms-csstransforms3d-csstransitions-cssvhunit-cssvwunit-customevent-ellipsis-flash-flexbox-flexboxlegacy-flexboxtweener-fontface-geolocation-history-htmlimports-json-lastchild-nthchild-preserve3d-rgba-svg-svgasimg-textshadow-userselect-webaudio-setclasses !*/
!function(e,t,n){function i(e,t){return typeof e===t}function o(){var e,t,n,o,r,s,a;for(var d in x)if(x.hasOwnProperty(d)){if(e=[],t=x[d],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(o=i(t.fn,"function")?t.fn():t.fn,r=0;r<e.length;r++)s=e[r],a=s.split("."),1===a.length?Modernizr[a[0]]=o:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=o),y.push((o?"":"no-")+a.join("-"))}}function r(e){var t=k.className,n=Modernizr._config.classPrefix||"";if(T&&(t=t.baseVal),Modernizr._config.enableJSClass){var i=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(i,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),T?k.className.baseVal=t:k.className=t)}function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):T?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function a(){var e=t.body;return e||(e=s(T?"svg":"body"),e.fake=!0),e}function d(e,t){if("object"==typeof e)for(var n in e)E(e,n)&&d(n,e[n]);else{e=e.toLowerCase();var i=e.split("."),o=Modernizr[i[0]];if(2==i.length&&(o=o[i[1]]),"undefined"!=typeof o)return Modernizr;t="function"==typeof t?t():t,1==i.length?Modernizr[i[0]]=t:(!Modernizr[i[0]]||Modernizr[i[0]]instanceof Boolean||(Modernizr[i[0]]=new Boolean(Modernizr[i[0]])),Modernizr[i[0]][i[1]]=t),r([(t&&0!=t?"":"no-")+i.join("-")]),Modernizr._trigger(e,t)}return Modernizr}function l(e,n,i,o){var r,d,l,u,c="modernizr",f=s("div"),p=a();if(parseInt(i,10))for(;i--;)l=s("div"),l.id=o?o[i]:c+(i+1),f.appendChild(l);return r=s("style"),r.type="text/css",r.id="s"+c,(p.fake?p:f).appendChild(r),p.appendChild(f),r.styleSheet?r.styleSheet.cssText=e:r.appendChild(t.createTextNode(e)),f.id=c,p.fake&&(p.style.background="",p.style.overflow="hidden",u=k.style.overflow,k.style.overflow="hidden",k.appendChild(p)),d=n(f,e),p.fake?(p.parentNode.removeChild(p),k.style.overflow=u,k.offsetHeight):f.parentNode.removeChild(f),!!d}function u(e,t){return!!~(""+e).indexOf(t)}function c(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function f(e,t){return function(){return e.apply(t,arguments)}}function p(e,t,n){var o;for(var r in e)if(e[r]in t)return n===!1?e[r]:(o=t[e[r]],i(o,"function")?f(o,n||t):o);return!1}function h(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(t,i){var o=t.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(h(t[o]),i))return!0;return!1}if("CSSSupportsRule"in e){for(var r=[];o--;)r.push("("+h(t[o])+":"+i+")");return r=r.join(" or "),l("@supports ("+r+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function g(e,t,o,r){function a(){l&&(delete q.style,delete q.modElem)}if(r=i(r,"undefined")?!1:r,!i(o,"undefined")){var d=m(e,o);if(!i(d,"undefined"))return d}for(var l,f,p,h,g,b=["modernizr","tspan","samp"];!q.style&&b.length;)l=!0,q.modElem=s(b.shift()),q.style=q.modElem.style;for(p=e.length,f=0;p>f;f++)if(h=e[f],g=q.style[h],u(h,"-")&&(h=c(h)),q.style[h]!==n){if(r||i(o,"undefined"))return a(),"pfx"==t?h:!0;try{q.style[h]=o}catch(v){}if(q.style[h]!=g)return a(),"pfx"==t?h:!0}return a(),!1}function b(e,t,n,o,r){var s=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+A.join(s+" ")+s).split(" ");return i(t,"string")||i(t,"undefined")?g(a,t,o,r):(a=(e+" "+N.join(s+" ")+s).split(" "),p(a,t,n))}function v(e,t,i){return b(e,n,n,t,i)}var y=[],x=[],w={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){x.push({name:e,fn:t,options:n})},addAsyncTest:function(e){x.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr,Modernizr.addTest("customevent","CustomEvent"in e&&"function"==typeof e.CustomEvent),Modernizr.addTest("geolocation","geolocation"in navigator),Modernizr.addTest("history",function(){var t=navigator.userAgent;return-1===t.indexOf("Android 2.")&&-1===t.indexOf("Android 4.0")||-1===t.indexOf("Mobile Safari")||-1!==t.indexOf("Chrome")||-1!==t.indexOf("Windows Phone")?e.history&&"pushState"in e.history:!1}),Modernizr.addTest("json","JSON"in e&&"parse"in JSON&&"stringify"in JSON),Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),Modernizr.addTest("webaudio",function(){var t="webkitAudioContext"in e,n="AudioContext"in e;return Modernizr._config.usePrefixes?t||n:n});var k=t.documentElement;Modernizr.addTest("contextmenu","contextMenu"in k&&"HTMLMenuItemElement"in e),Modernizr.addTest("cssall","all"in k.style);var T="svg"===k.nodeName.toLowerCase();Modernizr.addTest("canvas",function(){var e=s("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("csspointerevents",function(){var e=s("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents}),Modernizr.addTest("rgba",function(){var e=s("a").style;return e.cssText="background-color:rgba(150,255,150,.5)",(""+e.backgroundColor).indexOf("rgba")>-1}),Modernizr.addTest("preserve3d",function(){var e=s("a"),t=s("a");e.style.cssText="display: block; transform-style: preserve-3d; transform-origin: right; transform: rotateY(40deg);",t.style.cssText="display: block; width: 9px; height: 1px; background: #000; transform-origin: right; transform: rotateY(40deg);",e.appendChild(t),k.appendChild(e);var n=t.getBoundingClientRect();return k.removeChild(e),n.width&&n.width<4});var C=w._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];w._prefixes=C,Modernizr.addTest("cssgradients",function(){for(var e,t="background-image:",n="gradient(linear,left top,right bottom,from(#9f9),to(white));",i="",o=0,r=C.length-1;r>o;o++)e=0===o?"to ":"",i+=t+C[o]+"linear-gradient("+e+"left top, #9f9, white);";Modernizr._config.usePrefixes&&(i+=t+"-webkit-"+n);var a=s("a"),d=a.style;return d.cssText=i,(""+d.backgroundImage).indexOf("gradient")>-1});var S="CSS"in e&&"supports"in e.CSS,_="supportsCSS"in e;Modernizr.addTest("supports",S||_);var E;!function(){var e={}.hasOwnProperty;E=i(e,"undefined")||i(e.call,"undefined")?function(e,t){return t in e&&i(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),w._l={},w.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},w._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,i;for(e=0;e<n.length;e++)(i=n[e])(t)},0),delete this._l[e]}},Modernizr._q.push(function(){w.addTest=d}),Modernizr.addAsyncTest(function(){var n,i,o=function(e){k.contains(e)||k.appendChild(e)},r=function(e){e.fake&&e.parentNode&&e.parentNode.removeChild(e)},l=function(e,t){var n=!!e;if(n&&(n=new Boolean(n),n.blocked="blocked"===e),d("flash",function(){return n}),t&&h.contains(t)){for(;t.parentNode!==h;)t=t.parentNode;h.removeChild(t)}};try{i="ActiveXObject"in e&&"Pan"in new e.ActiveXObject("ShockwaveFlash.ShockwaveFlash")}catch(u){}if(n=!("plugins"in navigator&&"Shockwave Flash"in navigator.plugins||i),n||T)l(!1);else{var c,f,p=s("embed"),h=a();if(p.type="application/x-shockwave-flash",h.appendChild(p),!("Pan"in p||i))return o(h),l("blocked",p),void r(h);c=function(){return o(h),k.contains(h)?(k.contains(p)?(f=p.style.cssText,""!==f?l("blocked",p):l(!0,p)):l("blocked"),void r(h)):(h=t.body||h,p=s("embed"),p.type="application/x-shockwave-flash",h.appendChild(p),setTimeout(c,1e3))},setTimeout(c,10)}}),d("htmlimports","import"in s("link"));var P=w.testStyles=l;Modernizr.addTest("checked",function(){return P("#modernizr {position:absolute} #modernizr input {margin-left:10px} #modernizr :checked {margin-left:20px;display:block}",function(e){var t=s("input");return t.setAttribute("type","checkbox"),t.setAttribute("checked","checked"),e.appendChild(t),20===t.offsetLeft})});var z=function(){var e=navigator.userAgent,t=e.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=e.match(/w(eb)?osbrowser/gi),i=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9,o=533>t&&e.match(/android/gi);return n||o||i}();z?Modernizr.addTest("fontface",!1):P('@font-face {font-family:"font";src:url("https://")}',function(e,n){var i=t.getElementById("smodernizr"),o=i.sheet||i.styleSheet,r=o?o.cssRules&&o.cssRules[0]?o.cssRules[0].cssText:o.cssText||"":"",s=/src/i.test(r)&&0===r.indexOf(n.split(" ")[0]);Modernizr.addTest("fontface",s)}),P("#modernizr div {width:100px} #modernizr :last-child{width:200px;display:block}",function(e){Modernizr.addTest("lastchild",e.lastChild.offsetWidth>e.firstChild.offsetWidth)},2),P("#modernizr div {width:1px} #modernizr div:nth-child(2n) {width:2px;}",function(e){for(var t=e.getElementsByTagName("div"),n=!0,i=0;5>i;i++)n=n&&t[i].offsetWidth===i%2+1;Modernizr.addTest("nthchild",n)},5),P("#modernizr { height: 50vh; }",function(t){var n=parseInt(e.innerHeight/2,10),i=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).height,10);Modernizr.addTest("cssvhunit",i==n)}),P("#modernizr { width: 50vw; }",function(t){var n=parseInt(e.innerWidth/2,10),i=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).width,10);Modernizr.addTest("cssvwunit",i==n)});var j="Moz O ms Webkit",A=w._config.usePrefixes?j.split(" "):[];w._cssomPrefixes=A;var N=w._config.usePrefixes?j.toLowerCase().split(" "):[];w._domPrefixes=N;var O={elem:s("modernizr")};Modernizr._q.push(function(){delete O.elem});var q={style:O.elem.style};Modernizr._q.unshift(function(){delete q.style});var B=w.testProp=function(e,t,i){return g([e],n,t,i)};Modernizr.addTest("textshadow",B("textShadow","1px 1px")),w.testAllProps=b,w.testAllProps=v,Modernizr.addTest("cssanimations",v("animationName","a",!0)),Modernizr.addTest("bgpositionxy",function(){return v("backgroundPositionX","3px",!0)&&v("backgroundPositionY","5px",!0)}),Modernizr.addTest("bgsizecover",v("backgroundSize","cover")),Modernizr.addTest("borderradius",v("borderRadius","0px",!0)),Modernizr.addTest("boxshadow",v("boxShadow","1px 1px",!0)),Modernizr.addTest("ellipsis",v("textOverflow","ellipsis")),Modernizr.addTest("cssfilters",function(){if(Modernizr.supports)return v("filter","blur(2px)");var e=s("a");return e.style.cssText=C.join("filter:blur(2px); "),!!e.style.length&&(t.documentMode===n||t.documentMode>9)}),Modernizr.addTest("flexbox",v("flexBasis","1px",!0)),Modernizr.addTest("flexboxlegacy",v("boxDirection","reverse",!0)),Modernizr.addTest("flexboxtweener",v("flexAlign","end",!0)),Modernizr.addAsyncTest(function(){function n(){function o(){try{var e=s("div"),n=s("span"),i=e.style,o=0,r=0,a=!1,d=t.body.firstElementChild||t.body.firstChild;return e.appendChild(n),n.innerHTML="Bacon ipsum dolor sit amet jerky velit in culpa hamburger et. Laborum dolor proident, enim dolore duis commodo et strip steak. Salami anim et, veniam consectetur dolore qui tenderloin jowl velit sirloin. Et ad culpa, fatback cillum jowl ball tip ham hock nulla short ribs pariatur aute. Pig pancetta ham bresaola, ut boudin nostrud commodo flank esse cow tongue culpa. Pork belly bresaola enim pig, ea consectetur nisi. Fugiat officia turkey, ea cow jowl pariatur ullamco proident do laborum velit sausage. Magna biltong sint tri-tip commodo sed bacon, esse proident aliquip. Ullamco ham sint fugiat, velit in enim sed mollit nulla cow ut adipisicing nostrud consectetur. Proident dolore beef ribs, laborum nostrud meatball ea laboris rump cupidatat labore culpa. Shankle minim beef, velit sint cupidatat fugiat tenderloin pig et ball tip. Ut cow fatback salami, bacon ball tip et in shank strip steak bresaola. In ut pork belly sed mollit tri-tip magna culpa veniam, short ribs qui in andouille ham consequat. Dolore bacon t-bone, velit short ribs enim strip steak nulla. Voluptate labore ut, biltong swine irure jerky. Cupidatat excepteur aliquip salami dolore. Ball tip strip steak in pork dolor. Ad in esse biltong. Dolore tenderloin exercitation ad pork loin t-bone, dolore in chicken ball tip qui pig. Ut culpa tongue, sint ribeye dolore ex shank voluptate hamburger. Jowl et tempor, boudin pork chop labore ham hock drumstick consectetur tri-tip elit swine meatball chicken ground round. Proident shankle mollit dolore. Shoulder ut duis t-bone quis reprehenderit. Meatloaf dolore minim strip steak, laboris ea aute bacon beef ribs elit shank in veniam drumstick qui. Ex laboris meatball cow tongue pork belly. Ea ball tip reprehenderit pig, sed fatback boudin dolore flank aliquip laboris eu quis. Beef ribs duis beef, cow corned beef adipisicing commodo nisi deserunt exercitation. Cillum dolor t-bone spare ribs, ham hock est sirloin. Brisket irure meatloaf in, boudin pork belly sirloin ball tip. Sirloin sint irure nisi nostrud aliqua. Nostrud nulla aute, enim officia culpa ham hock. Aliqua reprehenderit dolore sunt nostrud sausage, ea boudin pork loin ut t-bone ham tempor. Tri-tip et pancetta drumstick laborum. Ham hock magna do nostrud in proident. Ex ground round fatback, venison non ribeye in.",t.body.insertBefore(e,d),i.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;",o=n.offsetHeight,r=n.offsetWidth,i.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;"+C.join("hyphens:auto; "),a=n.offsetHeight!=o||n.offsetWidth!=r,t.body.removeChild(e),e.removeChild(n),a}catch(l){return!1}}function r(e,n){try{var i=s("div"),o=s("span"),r=i.style,a=0,d=!1,l=!1,u=!1,c=t.body.firstElementChild||t.body.firstChild;return r.cssText="position:absolute;top:0;left:0;overflow:visible;width:1.25em;",i.appendChild(o),t.body.insertBefore(i,c),o.innerHTML="mm",a=o.offsetHeight,o.innerHTML="m"+e+"m",l=o.offsetHeight>a,n?(o.innerHTML="m<br />m",a=o.offsetWidth,o.innerHTML="m"+e+"m",u=o.offsetWidth>a):u=!0,l===!0&&u===!0&&(d=!0),t.body.removeChild(i),i.removeChild(o),d}catch(f){return!1}}function a(n){try{var i,o=s("input"),r=s("div"),a="lebowski",d=!1,l=t.body.firstElementChild||t.body.firstChild;r.innerHTML=a+n+a,t.body.insertBefore(r,l),t.body.insertBefore(o,r),o.setSelectionRange?(o.focus(),o.setSelectionRange(0,0)):o.createTextRange&&(i=o.createTextRange(),i.collapse(!0),i.moveEnd("character",0),i.moveStart("character",0),i.select());try{e.find?d=e.find(a+a):(i=e.self.document.body.createTextRange(),d=i.findText(a+a))}catch(u){d=!1}return t.body.removeChild(r),t.body.removeChild(o),d}catch(u){return!1}}return t.body||t.getElementsByTagName("body")[0]?(d("csshyphens",function(){if(!v("hyphens","auto",!0))return!1;try{return o()}catch(e){return!1}}),d("softhyphens",function(){try{return r("&#173;",!0)&&r("&#8203;",!1)}catch(e){return!1}}),void d("softhyphensfind",function(){try{return a("&#173;")&&a("&#8203;")}catch(e){return!1}})):void setTimeout(n,i)}var i=300;setTimeout(n,i)}),Modernizr.addTest("cssmask",v("maskRepeat","repeat-x",!0)),Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&v("transform","scale(1)",!0)}),Modernizr.addTest("csstransforms3d",function(){var e=!!v("perspective","1px",!0),t=Modernizr._config.usePrefixes;if(e&&(!t||"webkitPerspective"in k.style)){var n,i="#modernizr{width:0;height:0}";Modernizr.supports?n="@supports (perspective: 1px)":(n="@media (transform-3d)",t&&(n+=",(-webkit-transform-3d)")),n+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",P(i+n,function(t){e=7===t.offsetWidth&&18===t.offsetHeight})}return e}),Modernizr.addTest("csstransitions",v("transition","all",!0)),Modernizr.addTest("userselect",v("userSelect","none",!0)),Modernizr.addTest("svgasimg",t.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")),o(),r(y),delete w.addTest,delete w.addAsyncTest;for(var R=0;R<Modernizr._q.length;R++)Modernizr._q[R]();e.Modernizr=Modernizr}(window,document);