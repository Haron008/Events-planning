!(function(root,factory){if(typeof define==='function'&&define.amd){define(['jquery'],factory);}else if(typeof exports==='object'){factory(require('jquery'));}else{factory(root.jQuery);}})(this,function($){'use strict';var PLUGIN_NAME='vidbg';var DEFAULTS={volume:1,playbackRate:1,muted:true,loop:true,autoplay:true,position:'50% 50%',overlay:false,resizing:true};var NOT_IMPLEMENTED_MSG='Not implemented';function parseOptions(str){var obj={};var delimiterIndex;var option;var prop;var val;var arr;var len;var i;arr=str.replace(/\s*:\s*/g,':').replace(/\s*,\s*/g,',').split(',');for(i=0,len=arr.length;i<len;i++){option=arr[i];if(option.search(/^(http|https|ftp):\/\//)!==-1||option.search(':')===-1){break;}
delimiterIndex=option.indexOf(':');prop=option.substring(0,delimiterIndex);val=option.substring(delimiterIndex+1);if(!val){val=undefined;}
if(typeof val==='string'){val=val==='true'||(val==='false'?false:val);}
if(typeof val==='string'){val=!isNaN(val)?+val:val;}
obj[prop]=val;}
if(prop==null&&val==null){return str;}
return obj;}
function parsePosition(str){str=''+str;var args=str.split(/\s+/);var x='50%';var y='50%';var len;var arg;var i;for(i=0,len=args.length;i<len;i++){arg=args[i];if(arg==='left'){x='0%';}else if(arg==='right'){x='100%';}else if(arg==='top'){y='0%';}else if(arg==='bottom'){y='100%';}else if(arg==='center'){if(i===0){x='50%';}else{y='50%';}}else{if(i===0){x=arg;}else{y=arg;}}}
return{x:x,y:y};}
function Vidbg(element,path,options){this.$element=$(element);if(typeof path==='string'){path=parseOptions(path);}
if(!options){options={};}else if(typeof options==='string'){options=parseOptions(options);}
this.settings=$.extend({},DEFAULTS,options);this.path=path;try{this.init();}catch(e){if(e.message!==NOT_IMPLEMENTED_MSG){throw e;}}}
Vidbg.prototype.init=function(){var vidbg=this;var path=vidbg.path;var poster=path;var sources='';var $element=vidbg.$element;var settings=vidbg.settings;var position=parsePosition(settings.position);var $video;var $wrapper;$wrapper=vidbg.$wrapper=$('<div class="vidbg-container">').css({position:'absolute','z-index':-1,top:0,left:0,bottom:0,right:0,overflow:'hidden','-webkit-background-size':'cover','-moz-background-size':'cover','-o-background-size':'cover','background-size':'cover','object-fit':'cover','background-repeat':'no-repeat','background-position':position.x+' '+position.y});if(typeof path==='object'){if(path.poster){poster=path.poster;}else{if(path.mp4){poster=path.mp4;}else if(path.webm){poster=path.webm;}}}
$wrapper.css('background-image','url('+poster+')');if($element.css('position')==='static'){$element.css('position','relative');}
$element.css('z-index','1');if($element.is("body")){$wrapper.css({position:'fixed'});}
$element.prepend($wrapper);if(typeof path==='object'){if(path.mp4){sources+='<source src="'+path.mp4+'" type="video/mp4">';}
if(path.webm){sources+='<source src="'+path.webm+'" type="video/webm">';}
$video=vidbg.$video=$('<video>'+sources+'</video>');}else{$video=vidbg.$video=$('<video>'+'<source src="'+path+'" type="video/mp4">'+'<source src="'+path+'" type="video/webm">'+'</video>');}
try{$video.prop({autoplay:settings.autoplay,loop:settings.loop,volume:settings.volume,muted:settings.muted,defaultMuted:settings.muted,playbackRate:settings.playbackRate,defaultPlaybackRate:settings.playbackRate});}catch(e){throw new Error(NOT_IMPLEMENTED_MSG);}
$video.css({margin:'auto',position:'absolute','z-index':-1,top:position.y,left:position.x,'-webkit-transform':'translate(-'+position.x+', -'+position.y+')','-ms-transform':'translate(-'+position.x+', -'+position.y+')','-moz-transform':'translate(-'+position.x+', -'+position.y+')',transform:'translate(-'+position.x+', -'+position.y+')',visibility:'hidden',opacity:0}).one('canplaythrough.'+PLUGIN_NAME,function(){vidbg.resize();}).one('playing.'+PLUGIN_NAME,function(){$video.css({visibility:'visible',opacity:1});$wrapper.css('background-image','none');});$element.on('resize.'+PLUGIN_NAME,function(){if(settings.resizing){vidbg.resize();}});$wrapper.append($video);if(settings.overlay){$("<div class='vidbg-overlay' style='position:absolute;top:0;right:0;left:0;bottom:0;z-index:-1;background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1IiBoZWlnaHQ9IjUiPgo8cmVjdCB3aWR0aD0iNSIgaGVpZ2h0PSI1IiBmaWxsPSJ0cmFuc3BhcmVudCI+PC9yZWN0Pgo8cGF0aCBkPSJNMCA1TDUgMFpNNiA0TDQgNlpNLTEgMUwxIC0xWiIgc3Ryb2tlPSIjMjkyNzI3IiBzdHJva2Utd2lkdGg9IjMuMjUiIG9wYWNpdHk9Ii4yNSI+PC9wYXRoPgo8L3N2Zz4=);'></div>").insertAfter($(".vidbg-container > video"));}};Vidbg.prototype.getVideoObject=function(){return this.$video[0];};Vidbg.prototype.resize=function(){if(!this.$video){return;}
var $wrapper=this.$wrapper;var $video=this.$video;var video=$video[0];var videoHeight=video.videoHeight;var videoWidth=video.videoWidth;var wrapperHeight=$wrapper.height();var wrapperWidth=$wrapper.width();if(wrapperWidth/videoWidth>wrapperHeight/videoHeight){$video.css({width:wrapperWidth+2,height:'auto'});}else{$video.css({width:'auto',height:wrapperHeight+2});}};Vidbg.prototype.destroy=function(){delete $[PLUGIN_NAME].lookup[this.index];this.$video&&this.$video.off(PLUGIN_NAME);this.$element.off(PLUGIN_NAME).removeData(PLUGIN_NAME);this.$wrapper.remove();};$[PLUGIN_NAME]={lookup:[]};$.fn[PLUGIN_NAME]=function(path,options){var instance;this.each(function(){instance=$.data(this,PLUGIN_NAME);instance&&instance.destroy();instance=new Vidbg(this,path,options);instance.index=$[PLUGIN_NAME].lookup.push(instance)-1;$.data(this,PLUGIN_NAME,instance);});return this;};$(document).ready(function(){var $window=$(window);$window.on('resize.'+PLUGIN_NAME,function(){for(var len=$[PLUGIN_NAME].lookup.length,i=0,instance;i<len;i++){instance=$[PLUGIN_NAME].lookup[i];if(instance&&instance.settings.resizing){instance.resize();}}});$window.on('unload.'+PLUGIN_NAME,function(){return false;});$(document).find('[data-'+PLUGIN_NAME+'-bg]').each(function(i,element){var $element=$(element);var options=$element.data(PLUGIN_NAME+'-options');var path=$element.data(PLUGIN_NAME+'-bg');$element[PLUGIN_NAME](path,options);});});});