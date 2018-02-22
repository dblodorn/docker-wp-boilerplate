// BROWSERIFY
var browserify = require('browserify');
var babelify = require('babelify');
// GULP
var gulp = require('gulp');
var clean = require('gulp-clean');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifycss  = require('gulp-minify-css');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var util = require('gulp-util');
var runSequence = require('run-sequence');
var uglify = require('gulp-uglify');
var fs = require('fs');
var sftp = require('gulp-sftp');
var sync = require('gulp-npm-script-sync');

// CONFIG VALUES FOR PUTTING STUFF IN THE RIGHT PLACE
var config = require('./config.json');
var wp = {
  local_directory: './wp/',
  local_theme_folder: './wp/docker-wp-boilerplate/**/*'
}
var output = {
  assets: wp.local_directory + config.theme_name + '/assets/'
}
var deploy = {
  staging:  config.sftp_staging_server_directory + '/wp-content/themes/' + config.theme_name,
  production: config.sftp_production_server_directory + '/wp-content/themes/' + config.theme_name
}

// Bundle Sass
gulp.task('sass-dev', function() {
  gulp.src('./src/sass/style.sass')
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions','last 3 iOS versions','> 1%'],
      cascade: true
    }))
    .pipe(gulp.dest('./src/_temp'))
    .pipe(gulp.dest(output.assets + 'css/'));
});

gulp.task('sass-prod', function() {
  gulp.src('./src/sass/style.sass')
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions','last 3 iOS versions','> 1%'],
      cascade: true
    }))
    .pipe(gulp.dest('./src/_temp'))
    .pipe(minifycss())
    .pipe(gulp.dest(output.assets + 'css/'));
});

// Bundle JS with Browserify - DEV
gulp.task('js', function() {
  browserify({
    entries: './src/js/app.js',
    debug: true
  })
  .bundle()
  .on('error', err => {
    util.log("Browserify Error", util.colors.red(err.message))
  })
  .pipe(source('bundle.js'))
  .pipe(buffer())
  .pipe(gulp.dest(output.assets + 'js/'));
});

// Bundle JS with Browserify - PROD
gulp.task('js-prod', function() {
  browserify({
    entries: './src/js/app.js',
    debug: false
  })
  .bundle()
  .pipe(source('bundle.js'))
  .pipe(buffer())
  .pipe(uglify())
  .pipe(gulp.dest(output.assets + 'js/'));
});

// Watch All
gulp.task('watch', function() {
  gulp.watch('./src/js/**/*.js', ['js']);
  gulp.watch(['./src/sass/**/*.sass'], ['sass-dev']);
});

/* Task Library - SFTP */
gulp.task('sftp-stage', require('./gulp-tasks/sftp-deploy')(gulp, sftp, wp, config, config.staging));
gulp.task('sftp-production', require('./gulp-tasks/sftp-deploy')(gulp, sftp, wp, config, config.staging));

// DEFAULT TASK
gulp.task('default', function(cb) {
  runSequence('sass-dev','js','watch');
})

gulp.task('dev', function(cb) {
  runSequence('sass-dev','js','watch');
})

gulp.task('build', function(cb) {
  runSequence('sass-prod','js-prod');
})

// DEPLOY TASKS
gulp.task('deploy-staging', function(cb) {
  runSequence('build', 'sftp-stage');
})

gulp.task('deploy-production', function(cb) {
  runSequence('build', 'sftp-production');
})

// NPM SYNC
sync(gulp, {
  path: './package.json',
  excluded: ['default', 'sftp-stage', 'sftp-production', 'watch', 'js-prod', 'js', 'sass-dev', 'sass-prod']
});
