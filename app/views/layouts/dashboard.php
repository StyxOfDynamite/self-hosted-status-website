<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Status Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.2/css/bootstrap-colorpicker.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.2/js/bootstrap-colorpicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.9/ace.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.2.0/Sortable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/1.18.18/jquery.autosize.min.js"></script>

        <link rel="shortcut icon" href="about:blank">

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
    </head>
    <body style="margin-top:50px;margin-bottom:50px;background-color:#F5EFE6;">

        <?php if (DEMO) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="alert alert-danger">
                            Currently in DEMO mode. No changes will be saved.
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?= $this->section('content'); ?>

        <script type="text/javascript">
            $(document).on('click', '.bootbox', function(event) {
                var target = event.target;
                while (target !== this) {
                    target = target.parentNode;

                    if (target.className.indexOf('modal-dialog') !== -1) {
                      return;
                    }
                }
                bootbox.hideAll();
            });
        </script>
    </body>
</html>