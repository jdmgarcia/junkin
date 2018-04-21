/**
 * This is the main js file. Use this for things that are global
 * or things that you want to happen before everything else.
 * In general everything should be in a component as much as possible
 */
import exampleHomeComponent from './components/example-home.component';
import cookieNoticeComponent from './components/cookie-notice.component';

$(document).ready(function() {
  exampleHomeComponent();
  cookieNoticeComponent();
});
