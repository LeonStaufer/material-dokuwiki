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
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
             <?php echo tpl_classes(); ?> mdl-layout--fixed-header" id="dokuwiki__top">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title content-title"><?php echo hsc($conf['title']) ?></span>
            <div class="mdl-layout-spacer"></div>
            <form action="<?php echo DOKU_BASE . "doku.php"; ?>" accept-charset="utf-8" class="search" id="dw__search"
                  role="search">
                <div class="mdl-textfield mdl-js-textfield content-search">
                    <input type="hidden" name="do" value="search">
                    <input class="mdl-textfield__input edit" id="qsearch__in" accesskey="f" name="id"
                           title="[F]" autocomplete="off">
                    <label class="mdl-textfield__label" for="qsearch__in">Search...</label>
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
                        </button>") ?>
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
            <?php include("sidebar.php");?>
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
                <div class="content-actions" <?php if ($ACT != null && $ACT != "show" && $ACT != "edit" && $ACT != "revisions" || $INFO['writable'] == false) {
                    echo "hidden=\"hidden\"";;
                } ?>>
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
                        <div class="content-actions__action">
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
                    if ($conf['useheading'] == 1){
                        //TODO: find out what to with the title
                    }
                    tpl_content(); ?>
                </div>
            </article>
        </div>
        <!-- TODO: fix, footer at bottom -->
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