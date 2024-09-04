# CSS Editor

CSS Editor is a module for Omeka S that allows you to provide custom CSS overriding theme styles. You can also include URLs for external CSS, like those used for webfonts. CSS Editor is used on a site-by-site basis.

The first large text area is where you write your individual styles. Use that text area as you would a stylesheet file. This will load a line in every public page of your chosen Omeka S site, in the head, that looks like this:

`<link href="/yoursiteslug/css-editor" media="screen" rel="stylesheet" type="text/css">`

This line will appear after the stylesheets that come from Omeka's defaults and from your chosen theme. So, entries here should override other styles set in those files, unless they have been marked as !important. There may be other custom CSS loading in the header below this line, particularly from theme configurations such as the main accent color or banner height, that may override your custom CSS in turn.

CSS Editor also allows you to include external stylesheets by entering their URLs. There is no limit to the number of external stylesheet URLs you can enter. Each text input can take a single URL, and additional inputs can be created by clicking the "Add another stylesheet" button.

See the [Omeka S user manual](http://omeka.org/s/docs/user-manual/modules/csseditor/) for user documentation.

# Copyright
CSSEditor is Copyright © 2019-present Corporation for Digital Scholarship, Vienna, Virginia, USA http://digitalscholar.org

The Corporation for Digital Scholarship distributes the Omeka source code
under the GNU General Public License, version 3 (GPLv3). The full text
of this license is given in the license file.

The Omeka name is a registered trademark of the Corporation for Digital Scholarship.

Third-party copyright in this distribution is noted where applicable.

All rights not expressly granted are reserved.
