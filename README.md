# Material Design Template for DokuWiki

This Material template is very easy to install and use, whilst offering a multitude of customization options.

You can begin by choosing between several color themes in the style.ini file. From there on, you can fully customize the sidebar, making use of the entire material icon pack.

Visit the template page on the [DokuWiki forums](https://www.dokuwiki.org/template:material)

It is based off [Material Design Lite](https://getmdl.io/) with some minor changes and adjustements.


## Design

![Screenshot of the template on two devices](https://i.imgur.com/1QibmKg.jpg)

## Beautiful themes

![There are 8 unique themes to choose from](https://i.imgur.com/bnWd8k3.png)

## Elegant Editor

![Screenshot of editor](https://i.imgur.com/e9TqMB2.png)

The material template now sports an elegant looking editor. You can further improve it by replacing the toolbar icons found in `DOKUWIKI_ROOT/lib/images/toolbar` with those found in the `copy these icons to the toolbar` folder. Alternatively, you can choose your own, for example from [the Material Icons page](https://material.io/icons/).

The toolbar can then looking like the following:

![Image of toolbar with material icons](https://i.imgur.com/XSyhyPU.png)

## Installation

Use the following URL to download this template:

  * [Link to ZIP file on GitHub](https://github.com/LeonStaufer/material-dokuwiki/zipball/master) 

Refer to [this guide](https://www.dokuwiki.org/template) on how to install and use templates in DokuWiki.

## Upgrading

Regularly visit the installed templates via the configuration manager in order to update this template to the latest version.

**WARNING**: updating overrides all changed files. That means if you edited the `main.php` or `sidebar.php` you will need to backup these or any others before upgrading.

## Configuration

1. install the template
2. navigate to the `DOKUWIKI ROOT/lib/tpl/material` folder
3. open the `style.ini` file and scroll to the "replacements" section
4. follow the instructions there to change the colors
5. if you wish you can now open the `sidebar.php` file and change its contents to your liking
6. and you're set! 

The template also comes with several configuration options, which you can set via the Configuration Manager.

| Key                   | Description                                                  | Default |
| --------------------- | ------------------------------------------------------------ | ------- |
| `dokuwikiSidebar`     | use the sidebar page within the wiki instead of the `sidebar.php` file | `false` |
| `feedbackForm`        | add a button that allows users to give feedback              | `true`  |
| `technicalFeedbackForm` | technical information is included in the feedback email          | `true`  |
| `feedbackEmail`       | the recipient Email address for the feedback | `address@domain.com` |
| `feedbackSubjectLine` | subject line of the Email | `Feedback for Website` |
| `feedbackBody`       | body of the Email | `Thank you so much for taking the time to write feedback. We really appreciate it :) \n\n [your message] \n\n\n You can ignore all the technical information below. It only helps us track down what the problem might be.` |
| `hiddenActions`      | DokuWiki actions that are hidden | `backlink,top` |
| `protrudingDrawer`   | if the drawer should stick out on the left | `true` |
| `subtlePagename`     | if the title of the page should not be the focus | `false` |


## Feedback

If you encounter any problems or would like to see functionality added, please head over to the issue page on GitHub and submit your bug/request.
