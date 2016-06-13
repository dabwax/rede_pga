var gulp = require('gulp');
var stylus = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var livereload = require('gulp-livereload');
var plumber = require('gulp-plumber');

gulp.task('default', ['css', 'js', 'watch']);

gulp.task('css', function () {
    gulp.src('webroot/stylesheets/application.styl')
      .pipe(plumber())
      .pipe(stylus({compress: false, paths: [
        'webroot/stylesheets',
        'webroot/stylesheets/pages',
        'webroot/stylesheets/sections']}))
        .pipe(autoprefixer())
        // .pipe(minifyCSS())
        .pipe(rename('application.css'))
        .pipe(gulp.dest('webroot/'))
        .pipe(livereload());
});

gulp.task('js', function() {
  gulp.src([
  	'webroot/js/redepga.js',
  	'webroot/js/controllers.js',
  	'webroot/js/directives.js',
    'webroot/js/services.js',
  	'webroot/js/cms.js',
  ])
    .pipe(plumber())
    .pipe( concat('main.js') ) // concat pulls all our files together before minifying them
    .pipe(uglify())
    .pipe(gulp.dest('webroot/js'))
});

gulp.task('watch', function () {
  livereload.listen({
    host: null
  });

  gulp.watch('webroot/stylesheets/*.styl', ['css']);
  gulp.watch('webroot/stylesheets/pages/*.styl', ['css']);
  gulp.watch('webroot/stylesheets/sections/*.styl', ['css']);
  gulp.watch('webroot/js/redepga.js', ['js']);
  gulp.watch('webroot/js/controllers.js', ['js']);
  gulp.watch('webroot/js/directives.js', ['js']);
  gulp.watch('webroot/js/services.js', ['js']);
  gulp.watch('webroot/js/cms.js', ['js']);
  
});