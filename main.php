<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="<?php echo $conf['lang'] ?>"
      lang="<?php echo $conf['lang'] ?>"
      dir="<?php echo $lang['direction'] ?>">

<head>
    <meta charset="UTF-8"/>
    <link rel="manifest" href="/manifest.json">
    <title>
        <?php echo ucfirst(tpl_pagetitle(null, true)) ?> |
        <?php echo hsc($conf['title']) ?>
    </title>


    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

    <?php tpl_metaheaders() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- Search -->
    <meta name="robots" content="noimageindex"/>
    <meta name="googlebot" content="noimageindex"/>

    <!-- Styling -->
    <meta name="theme-color" content="#1a237e">

    <meta name="apple-mobile-web-app-status-bar-style" content="#1a237e">
    <?php echo tpl_favicon(array('favicon')) ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
<div class="mdl-layout mdl-js-layout <?php if($conf["sidebar"] != "") echo "mdl-layout--fixed-drawer" ?>
             <?php echo tpl_classes(); ?> mdl-layout--fixed-header" id="dokuwiki__top">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title content-title"><?php echo hsc($conf['title']) ?></span>
            <div class="mdl-layout-spacer"></div>
            <form action="<?php echo DOKU_BASE . "doku.php"; ?>" accept-charset="utf-8" class="search" id="dw__search"
                  role="search">
                <input type="hidden" name="do" value="search">
                <div class="content-search">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input edit" id="qsearch__in" accesskey="f" name="id"
                               title="[F]" autocomplete="off">
                        <label class="mdl-textfield__label" for="qsearch__in">Search</label>
                    </div>
                </div>
                <div id="qsearch__out" class="ajax_qsearch JSpopup content-search__popup" style="display: none;"></div>
            </form>
            <?php
            if ($INFO['userinfo'] == null) {
                $type = 'login';
            } else $type = 'profile';
            tpl_action($type, true, false, false, '', '', "
                        <button class=\"mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored\">
                            <i class=\"material-icons\">perm_identity</i>
                        </button>");
            if ($INFO['userinfo'] != null){
                tpl_action('login', true, false, false, '', '', "
                <button class=\"mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored\">
                  <i class=\"material-icons\">exit_to_app</i>
                </button>");
            }?>
            <?php
            tpl_action('admin', true, false, false, '', '', "
                        <button class=\"mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored\">
                        <i class=\"material-icons\">settings</i>
                        </button>") ?>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <section class="drawer-top">
            <span class="mdl-logo"><?php tpl_link(wl(), '<img src="' . tpl_getMediaFile(array(':wiki:logo.svg', ':logo.svg', 'images/logo.svg')) . '" alt="' . $conf['title'] . '" />', 'id="dokuwiki__top" accesskey="h" title="[H]"'); ?></span>
            <br>
            <?php if ($conf['tagline']): ?>
                <p class="drawer-tagline">
                    <?php echo $conf['tagline'] ?>
                </p>
            <?php endif ?>
        </section>
        <nav class="mdl-navigation mdl-layout-spacer">
            <?php
            if($conf["sidebar"] != "") include("sidebar.php");?>
            <div class="mdl-layout-spacer" style="max-height: 20px"></div>
            <a class="mdl-navigation__link" href="<?php echo DOKU_BASE . "doku.php?do=media" ?>">
                <i class="material-icons" role="presentation">perm_media</i>
                Media Manager</a>
            <?php if($feedbackForm): ?>
                <a id="feedback" class="mdl-navigation__link" href="<?php echo $feedbackLink ?>" rel="external" target="_blank">
                    <i class="material-icons" role="presentation">feedback</i>
                    Feedback</a>
              <script>
                    var check = false;
                      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
                      if(check) document.querySelector("#feedback").target = "_top";
                </script>
            <?php endif; ?>
        </nav>
        <?php//TODO work on registration: tpl_action('register');?>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class="content-notif">
                <?php html_msgarea() ?>
            </div>
            <div class="content-youarehere">
                <?php if ($conf['breadcrumbs']): ?>
                    <p><?php tpl_breadcrumbs() ?></p>
                <?php endif ?>
                <?php if ($conf['youarehere']): ?>
                    <p><?php tpl_youarehere() ?></p>
                <?php endif ?>
            </div>
            <article class="content-card">
                <div class="content-actions" <?php if (!($ACT == "search" || $ACT == "edit" || $ACT == "show" || $ACT == "revisions") || $INFO['writable'] == false) echo "hidden=\"hidden\""?>>
                    <div class="content-actions__container">
                        <div class="content-actions__action">
                            <?php
                            if ($ACT == 'show' || $ACT == 'search') {
                                if (!$INFO['exists']) {
                                    $txt = "add";
                                } else $txt = "edit";
                            } else $txt = "arrow_back";
                            tpl_action('edit', true, false, false, '', '', "
                                <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored content-actions__action-button\">
                                    <i class=\"material-icons\" id=\"tpl_editBtn\">" . $txt . "</i>
                                </button>") ?>
                        </div>
                        <div class="content-actions__action" <?php if ($ACT == "search" ) echo "hidden=\"hidden\""; ?>>
                            <?php tpl_action('revisions', true, false, false, '', '', "
                                <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored content-actions__action-button\">
                                    <i class=\"material-icons\">history</i>
                                </button>") ?>
                        </div>
                    </div>
                </div>
                <?php if ($ACT == "show"): ?>
                    <div class="content-card__title">
                        <h1><?php
                            if ($conf["youarehere"]) {
                                echo ucfirst(tpl_pagetitle(null, true));
                            }else echo ucfirst($ID);
                            ?></h1>
                    </div>
                <?php endif?>
                <div class="content-card__text">
                    <?php
                    /*  Do you see the heading twice because you have 'useheading' enabled?
                        You can use one of these two plugins to elegantly hide the redudant second title
                            -https://www.dokuwiki.org/plugin:pagetitle
                            -https://www.dokuwiki.org/plugin:hiddenheader
                    */
                    tpl_content(); ?>
                </div>
            </article>
        </div>
        <div class="mdl-layout-spacer"></div>
        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer__left-section">
                <div class="mdl-logo"><?php echo hsc($conf['title']) ?> | <?php tpl_action('index', true) ?></div>
                <ul class="mdl-mini-footer__link-list">
                    <li><?php tpl_pageinfo(); ?></li>
                    <li><a href="#"><?php tpl_license() ?></a></li>
                </ul>
            </div>
        </footer>
    </main>
</div>
<?php tpl_indexerWebBug(); ?>
</body>
</html>
