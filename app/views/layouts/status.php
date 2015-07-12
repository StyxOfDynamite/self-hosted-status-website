<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= $this->e($template['headline']); ?></title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="about:blank">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.0/chartist.min.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            a { color:<?= $this->e($template['link_color']); ?>; line-height: 1.4; }
            a:hover { color:<?= $this->e($template['link_color']); ?>; }
            .alert { font-weight: 700; font-size: 18px; line-height:26px; padding:20px; }
            body { font-family:'Open Sans'; font-size:16px; background-color:<?= $this->e($template['body_background_color']); ?>; color:<?= $this->e($template['font_color']); ?>; }
            .box { border:1px solid #ddd; border-top:none; background-color: #fff; border-bottom-right-radius: 4px; border-bottom-left-radius: 4px; padding:15px; padding-bottom:15px; padding-top: 0px; }
            .ct-label { fill: rgba(0,0,0,.4); color: rgba(0,0,0,.4); font-size: 11px; line-height: 1.25; font-weight: bold;}
            .ct-line { stroke-width:2px; }
            .ct-point { stroke-width:0; }
            .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut { stroke: <?= $this->e($template['graph_color']); ?>; }
            .center { text-align: center; }
            .form-control { max-width: 500px; }
            .form-group { margin-bottom: 30px; }
            .full-width { max-width: 100%; width: 100%; }
            .graph { margin-top:20px; }
            .graph-container {border: 1px solid <?= $this->e($template['border_color']); ?>; border-radius: 4px; padding:20px; margin-bottom: 20px;}
            .greens { color:<?= $this->e($template['greens']); ?>; }
            .greens_bg { background-color:<?= $this->e($template['greens']); ?>; color:#ffffff; }
            h1, h2, h3, h4, h5, h6 { margin-top: 5px; margin-bottom: 0px; font-weight: 700; }
            h1, .h1 { font-size: 41px; }
            h2, .h2 { font-size: 34px; }
            h3, .h3 { font-size: 28px; }
            h4, .h4 { font-size: 20px; }
            h4.radio-button { margin-top: 3px; }
            h5, .h5 { font-size: 16px; }
            h6, .h6 { font-size: 14px; }
            .incident-name { padding-bottom:10px; }
            .incident-title { padding-bottom:20px; }
            input[type="radio"], input[type="checkbox"] { display:inline-block; margin-right: 10px; }
            .left { text-align: left; }
            .left-0 { margin-left: 0px !important; }
            .light_font_color { color:<?= $this->e($template['light_font_color']); ?>; }
            .list-group-item { padding:20px; border:1px solid <?= $this->e($template['border_color']); ?>; }
            .name { padding-top:15px; padding-bottom: 15px; font-weight: bold; }
            .nav-tabs>li>a { font-weight: bold; margin-right:0px; }
            .nav-tabs>li>a:hover { background-color: #ddd; }
            .oranges { color:<?= $this->e($template['oranges']); ?>; }
            .oranges_bg { background-color:<?= $this->e($template['oranges']); ?>; color:#ffffff; }
            .page-header { border-bottom: 1px solid <?= $this->e($template['border_color']); ?>; }
            .panel { -webkit-box-shadow: none; box-shadow: none; border-color: <?= $this->e($template['border_color']); ?>; }
            .panel-default > .panel-heading.yellows_bg { background-color:<?= $this->e($template['yellows']); ?>; color:#ffffff; border:none; }
            .panel-default > .panel-heading.yellows_bg a { color:#ffffff; }
            .panel-default>.panel-heading { border-color: <?= $this->e($template['border_color']); ?>; }
            .radio-button { display: inline-block; margin: 0; margin-right: 20px; font-size: 16px; }
            .radio-button label { font-weight: normal; }
            .reds { color:<?= $this->e($template['reds']); ?>; }
            .reds_bg { background-color:<?= $this->e($template['reds']); ?>; color:#ffffff; }
            .right { text-align: right; }
            .section { text-align:center; padding-top:50px; padding-bottom: 30px; }
            .status { text-align: right; }
            .well { background-color: #fff; box-shadow: none; border-color: <?= $this->e($template['border_color']); ?>; }
            .yellows { color:<?= $this->e($template['yellows']); ?>; } 
            .yellows_bg { background-color:<?= $this->e($template['yellows']); ?>; color:#ffffff; }
            .panel.yellows_border { border: 1px solid <?= $this->e($template['yellows']); ?>; }
        </style>
        <?= '<style type="text/css">' . $template['custom_css'] . '</style>'; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.0/chartist.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
        <script type="text/javascript">!function(a,b,c){"use strict";function d(a,b){this._defaults=e,this.element=a,this.setOptions(b),this.init()}var e={tagName:"a",newLine:"\n",target:"_blank",linkClass:null,linkClasses:[],linkAttributes:null};d.prototype={constructor:d,init:function(){1===this.element.nodeType?d.linkifyNode.call(this,this.element):this.element=d.linkify.call(this,this.element.toString())},setOptions:function(a){this.settings=d.extendSettings(a,this.settings)},toString:function(){return this.element.toString()}},d.extendSettings=function(a,b){var c;b=b||{};for(c in e)b[c]||(b[c]=e[c]);for(c in a)b[c]=a[c];return b},d.linkMatch=new RegExp(["(",'\\s|[^a-zA-Z0-9.\\+_\\/"\\>\\-]|^',")(?:","(","[a-zA-Z0-9\\+_\\-]+","(?:","\\.[a-zA-Z0-9\\+_\\-]+",")*@",")?(","http:\\/\\/|https:\\/\\/|ftp:\\/\\/",")?(","(?:(?:[a-z0-9][a-z0-9_%\\-_+]*\\.)+)",")(","(?:com|ca|co|edu|gov|net|org|dev|biz|cat|int|pro|tel|mil|aero|asia|coop|info|jobs|mobi|museum|name|post|travel|local|[a-z]{2})",")(","(?::\\d{1,5})",")?(","(?:","[\\/|\\?]","(?:","[\\-a-zA-Z0-9_%#*&+=~!?,;:.\\/]*",")*",")","[\\-\\/a-zA-Z0-9_%#*&+=~]","|","\\/?",")?",")(",'[^a-zA-Z0-9\\+_\\/"\\<\\-]|$',")"].join(""),"g"),d.emailLinkMatch=/(<[a-z]+ href=\")(http:\/\/)([a-zA-Z0-9\+_\-]+(?:\.[a-zA-Z0-9\+_\-]+)*@)/g,d.linkify=function(a,b){var c,e,f,g=[];this.constructor===d&&this.settings?(e=this.settings,b&&(e=d.extendSettings(b,e))):e=d.extendSettings(b),f=e.linkClass?e.linkClass.split(/\s+/):[],f.push.apply(f,e.linkClasses),a=a.replace(/</g,"&lt;").replace(/(\s)/g,"$1$1"),g.push("$1<"+e.tagName,'href="http://$2$4$5$6$7"'),g.push('class="linkified'+(f.length>0?" "+f.join(" "):"")+'"'),e.target&&g.push('target="'+e.target+'"');for(c in e.linkAttributes)g.push([c,'="',e.linkAttributes[c].replace(/\"/g,"&quot;").replace(/\$/g,"&#36;"),'"'].join(""));return g.push(">$2$3$4$5$6$7</"+e.tagName+">$8"),a=a.replace(d.linkMatch,g.join(" ")),a=a.replace(d.emailLinkMatch,"$1mailto:$3"),a=a.replace(/(\s){2}/g,"$1"),a=a.replace(/\n/g,e.newLine)},d.linkifyNode=function(a){var b,e,f,g,h;if(a&&"object"==typeof a&&1===a.nodeType&&"a"!==a.tagName.toLowerCase()&&!/[^\s]linkified[\s$]/.test(a.className)){for(b=[],g=d._dummyElement||c.createElement("div"),e=a.firstChild,f=a.childElementCount;e;){if(3===e.nodeType){for(;g.firstChild;)g.removeChild(g.firstChild);for(g.innerHTML=d.linkify.call(this,e.textContent||e.innerText||e.nodeValue),b.push.apply(b,g.childNodes);g.firstChild;)g.removeChild(g.firstChild)}else b.push(1===e.nodeType?d.linkifyNode.call(this,e):e);e=e.nextSibling}for(;a.firstChild;)a.removeChild(a.firstChild);for(h=0;h<b.length;h++)a.appendChild(b[h])}return a},d._dummyElement=c.createElement("div"),a.fn.linkify=function(b){return this.each(function(){var c;(c=a.data(this,"plugin-linkify"))?(c.setOptions(b),c.init()):a.data(this,"plugin-linkify",new d(this,b))})},a.fn.linkify.Constructor=d,a(b).on("load",function(){a("[data-linkify]").each(function(){var b,c=a(this),d=c.attr("data-linkify"),e={tagName:c.attr("data-linkify-tagname"),newLine:c.attr("data-linkify-newline"),target:c.attr("data-linkify-target"),linkClass:c.attr("data-linkify-linkclass")};for(var f in e)"undefined"==typeof e[f]&&delete e[f];b="this"===d?c:c.find(d),b.linkify(e)})}),a("body").on("click",".linkified",function(){var c=a(this),d=c.attr("href"),e=/^mailto:/i.test(d),f=c.attr("target");return e?b.location.href=d:b.open(d,f),!1})}(jQuery,window,document);</script>
    </head>
    <body>
    
        <?= $this->section('content'); ?>
        
        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('body').linkify({ tagName: 'a', target: '_blank', newLine: '\n', linkClass: null, linkAttributes: null });
            });
        </script>

        <?php if (PREMIUM) : ?>
            <?= '<script type="text/javascript">' . $template['custom_js'] . '</script>'; ?>
        <?php endif; ?>
    </body>
</html>