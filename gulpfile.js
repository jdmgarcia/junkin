// ## Globals
const gulp         = require('gulp');
const argv         = require('minimist')(process.argv.slice(2));
const browserSync  = require('browser-sync').create();
const changed      = require('gulp-changed');
const concat       = require('gulp-concat');
const flatten      = require('gulp-flatten');
const gulpif       = require('gulp-if');
const lazypipe     = require('lazypipe');
const merge        = require('merge-stream');
const plumber      = require('gulp-plumber');
const rev          = require('gulp-rev');
const runSequence  = require('run-sequence');
const sourcemaps   = require('gulp-sourcemaps');
const clean        = require('gulp-clean');
const debug        = require('gulp-debug');
const buffer       = require('vinyl-buffer');
const streamify    = require('gulp-streamify');

// Scripts
const uglify       = require('gulp-uglify');
const eslint       = require('gulp-eslint');
const rollup       = require('rollup-stream');
const source       = require('vinyl-source-stream');
const babel        = require('gulp-babel');

// Styles
const sass         = require('gulp-sass');
const stylelint    = require('stylelint');
const autoprefixer = require('gulp-autoprefixer');
const postcss      = require('gulp-postcss');
const reporter     = require('postcss-reporter');
const syntax_scss  = require('postcss-scss');
const minifyCss    = require('gulp-clean-css');
const bless        = require('gulp-bless');

// Images
const imagemin     = require('gulp-imagemin');
const svgSprite    = require('gulp-svg-sprite');


// See https://github.com/austinpray/asset-builder
var theme_dir = '/';
var manifest = require('asset-builder')('manifest.json');
console.log(manifest.paths);
// `path` - Paths to base asset directories. With trailing slashes.
// - `path.source` - Path to the source files. Default: `assets/`
// - `path.dist` - Path to the build directory. Default: `dist/`
var path = manifest.paths;


// `config` - Store arbitrary configuration values here.
var config = manifest.config || {};

// `globs` - These ultimately end up in their respective `gulp.src`.
// - `globs.js` - Array of asset-builder JS dependency objects. Example:
//   ```
//   {type: 'js', name: 'main.js', globs: []}
//   ```
// - `globs.css` - Array of asset-builder CSS dependency objects. Example:
//   ```
//   {type: 'css', name: 'main.css', globs: []}
//   ```
// - `globs.fonts` - Array of font path globs.
// - `globs.images` - Array of image path globs.
// - `globs.bower` - Array of all the main Bower files.
var globs = manifest.globs;

// `project` - paths to first-party assets.
// - `project.js` - Array of first-party JS assets.
// - `project.css` - Array of first-party CSS assets.
var project = manifest.getProjectGlobs();

// CLI options
var enabled = {
  // Enable static asset revisioning when `--production`
  rev: argv.production,
  // Disable source maps when `--production`
  // maps: !argv.production,
  maps: false, // disabled in both dev and production because theyre slow!
  minifyCss: argv.production, // only minify css in production
  uglifyJS: argv.production,
  // Fail styles task on error when `--production`
  failStyleTask: argv.production
};

// Path to the compiled assets manifest in the dist directory
var revManifest = path.dist + 'assets.json';


// ### Scripts
// `gulp scripts` - Runs eslint then compiles, combines
// and project JS.
gulp.task('scripts', function() {
  var merged = merge();
  var deppipe;
  manifest.forEachDependency('js', function(dep) {
    //console.log(dep.name);
    if (dep.name == 'main.min.js') {
      deppipe = rollup({entry: path.source + 'js/_main.js', format: 'es'})
        .pipe(source('_main.js', path.source + 'js'))
        .pipe(
          streamify(
            babel({
              presets: ['es2015'],
              ignore: ['js/vendor/**']
            })
          )
        )
    } else {
      deppipe = gulp.src(dep.globs, {base: path.source + 'scripts'})
    }
    deppipe.pipe(streamify(concat(dep.name)))
      // .pipe(streamify(debug({title: 'concat: '})))
      .pipe(streamify(function() {
        return gulpif(enabled.uglifyJS, uglify());
      }))
      .pipe(streamify(function() {
        return gulpif(enabled.rev, rev());
      }))
      .pipe(streamify(function() {
        return gulpif(enabled.maps, sourcemaps.write('.'));
      }))
      // .pipe(streamify(debug({title: 'vendor: '})))
      .pipe(gulp.dest(path.dist + 'scripts'))
      .pipe(writeToManifest('scripts'));
  });
});

// ### eslint
// `gulp eslint` - Lints configuration JSON and project JS.
gulp.task('eslint', function() {
  // ESLint ignores files with "node_modules" paths.
  // So, it's best to have gulp ignore the directory as well.
  // Also, Be sure to return the stream from the task;
  // Otherwise, the task may end before the stream has finished.
  return gulp.src([path.source + 'js/*.js', '!plugins/**', '!vendor/**', '!node_modules/**'])
      // eslint() attaches the lint output to the "eslint" property
      // of the file object so it can be used by other modules.
      .pipe(eslint())
      // eslint.format() outputs the lint results to the console.
      // Alternatively use eslint.formatEach() (see Docs).
      .pipe(eslint.format())
      // To have the process exit with an error code (1) on
      // lint error, return the stream and pipe to failAfterError last.
      .pipe(eslint.failAfterError());
});


// ### Styles
// `gulp styles` - Compiles, combines, and optimizes Bower CSS and project CSS.
// By default this task will only log a warning if a precompiler error is
// raised. If the `--production` flag is set: this task will fail outright.
// gulp.task('styles', ['wiredep'], function() {
gulp.task('styles', ['scss-lint'], function() {
  var merged = merge();
  manifest.forEachDependency('css', function(dep) {
    var cssTasksInstance = cssTasks(dep.name);
    if (!enabled.failStyleTask) {
      cssTasksInstance.on('error', function(err) {
        console.error(err.message);
        this.emit('end');
      });
    }
    merged.add(gulp.src(dep.globs, {base: 'styles'})
      .pipe(cssTasksInstance));
  });
  return merged
    .pipe(writeToManifest('styles'));
});

// ## Reusable Pipelines
// See https://github.com/OverZealous/lazypipe

// ### CSS processing pipeline
// Example
// ```
// gulp.src(cssFiles)
//   .pipe(cssTasks('main.css')
//   .pipe(gulp.dest(path.dist + 'styles'))
// ```
var cssTasks = function(filename) {
  return lazypipe()
    .pipe(function() {
      return gulpif(!enabled.failStyleTask, plumber());
    })
    .pipe(function() {
      return gulpif(enabled.maps, sourcemaps.init());
    })
    .pipe(function() {
      return gulpif('*.scss', sass({
        outputStyle: 'nested', // libsass doesn't support expanded yet
        precision: 10,
        includePaths: ['.'],
        errLogToConsole: !enabled.failStyleTask
      }));
    })
    .pipe(concat, filename)
    .pipe(autoprefixer, {
      browsers: [
        'last 3 versions',
        'ie 8',
        'ie 9',
        'android 2.3',
        'android 4',
        'opera 12'
      ]
    })
    .pipe(bless)
    .pipe(function() {
      return gulpif(enabled.minifyCss, minifyCss({
        advanced: false,
        rebase: false,
        processImport: false
      }));
    })
    .pipe(function() {
      return gulpif(enabled.rev, rev());
    })
    .pipe(function() {
      return gulpif(enabled.maps, sourcemaps.write('.', {sourceRoot: '/sass/'}));
    })();
};

// ## Gulp tasks
// Run `gulp -T` for a task summary

gulp.task("scss-lint", function() {

  // Stylelint config rules
  var stylelintConfig = {
    "rules": {
      "block-no-empty": true,
      "block-closing-brace-newline-after": "always",
      "color-no-invalid-hex": true,
      "declaration-colon-space-after": "always",
      "declaration-colon-space-before": "never",
      "declaration-bang-space-after": "never",
      "declaration-block-semicolon-newline-after": "always",
      "function-comma-space-after": "always",
      "media-feature-colon-space-after": "always",
      "media-feature-colon-space-before": "never",
      "media-feature-name-no-vendor-prefix": true,
      "max-empty-lines": 8,
      "no-unknown-animations": true,
      "number-leading-zero": "never",
      "number-no-trailing-zeros": true,
      "number-zero-length-no-unit": true,
      "property-no-vendor-prefix": true,
      "declaration-block-no-duplicate-properties": true,
      "block-no-single-line": true,
      "declaration-block-trailing-semicolon": "always",
      "rule-non-nested-empty-line-before": "always",
      "selector-list-comma-space-before": "never",
      "selector-combinator-space-before": "always",
      "selector-combinator-space-after": "always",
      "selector-no-id": true,
      "value-no-vendor-prefix": true
    }
  };

  var processors = [
    stylelint(stylelintConfig),
    // Pretty reporting config
    reporter({
      clearMessages: true,
      throwError: true
    })
  ];

  return gulp.src([path.source + '/sass/**/*.scss',
    '!' + path.source + '/node_modules/susy/sass/**/*.scss',
    '!' + path.source + '/sass/base/_roots_base.scss',
    '!' + path.source + '/sass/utils/_mixin.scss',
    '!' + path.source + '/sass/utils/_variables.scss'])
    .pipe(postcss(processors), {syntax: syntax_scss});
});

// ### Fonts
// `gulp fonts` - Grabs all the fonts and outputs them in a flattened directory
// structure. See: https://github.com/armed/gulp-flatten
gulp.task('fonts', function() {
  return gulp.src(globs.fonts)
    .pipe(flatten())
    .pipe(gulp.dest(path.dist + 'fonts'))
    .pipe(browserSync.stream());
});

// ### Images
// `gulp images` - Run lossless compression on all the images.
gulp.task('images', function() {
  return gulp.src(globs.images)
    .pipe(imagemin({
      progressive: true,
      interlaced: true,
      svgoPlugins: [{removeUnknownsAndDefaults: false}, {cleanupIDs: false}]
    }))
    .pipe(gulp.dest(path.dist + 'img'))
    .pipe(browserSync.stream());
});

gulp.task('susy', function() {
  console.log('heello');
  return gulp.src('sass/*.scss')
      .pipe(sass({
          outputStyle: 'compressed',
          includePaths: ['node_modules/susy/sass']
      }).on('error', sass.logError))
      .pipe(gulp.dest('dist/css'));
});


// var svgSpriteConfig = {
//   mode: {
//     symbol: {
//       dest: 'images',
//       sprite: 'icons.svg'
//     }
//   },
//   shape: {
//     // Titles and descriptions
//     meta: path.source + 'img/svg-icons/icons.yaml'
//   }
// };

// gulp.task('icons', function () {
//   return gulp.src(path.source + 'img/svg-icons/**/*.svg')
//     .pipe(svgSprite(svgSpriteConfig))
//     .pipe(gulp.dest(theme_dir + '/dist/'));
// });

// gulp.task('rollup', function() {
//   return rollup({
//       entry: path.source + 'js/_main.js'
//     })

//     // give the file the name you want to output with
//     .pipe(source('main.js'))

//     // and output to ./dist/app.js as normal.
//     .pipe(gulp.dest('dist'));
// });


// ### Write to rev manifest
// If there are any revved files then write them to the rev manifest.
// See https://github.com/sindresorhus/gulp-rev
var writeToManifest = function(directory) {
  return lazypipe()
    .pipe(gulp.dest, path.dist + directory)
    .pipe(browserSync.stream, {match: '**/*.{js,css}'})
    .pipe(rev.manifest, revManifest, {
      base: path.dist,
      merge: true
    })
    .pipe(gulp.dest, path.dist)();
};



// ### Clean
// `gulp clean` - Deletes the build folder entirely.
gulp.task('clean', require('del').bind(null, [path.dist]));

// ### Watch
// `gulp watch` - Use BrowserSync to proxy your dev server and synchronize code
// changes across devices. Specify the hostname of your dev server at
// `manifest.config.devUrl`. When a modification is made to an asset, run the
// build step for that asset and inject the changes into the page.
// See: http://www.browsersync.io
gulp.task('watch', function() {
  // browserSync.init({
  //   files: ['{lib,templates}/**/*.php', '*.php'],
  //   proxy: config.devUrl,
  //   snippetOptions: {
  //     whitelist: ['/wp-admin/admin-ajax.php'],
  //     blacklist: ['/wp-admin/**']
  //   }
  // });
  gulp.watch([path.source + 'sass/**/*'], ['styles']);
  gulp.watch([path.source + 'js/**/*'], ['scripts']);
  // gulp.watch([path.source + 'plugins/**/*.css'], ['styles']);
  // gulp.watch([path.source + 'plugins/**/*.js'], ['scripts']);
  // gulp.watch([path.source + 'fonts/**/*'], ['fonts']);
  // gulp.watch([path.source + 'img/**/*'], ['images']);
  gulp.watch([path.source + 'manifest.json'], ['build']);
});

// ### Build
// `gulp build` - Run all the build tasks but don't clean up beforehand.
// Generally you should be running `gulp` instead of `gulp build`.
gulp.task('build', function(callback) {
  runSequence('styles',
              'scripts',
              ['fonts', 'images'],
              callback);
});

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', ['clean'], function() {
  gulp.start('build');
});
