var gulp = require('gulp');
var stylus = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var livereload = require('gulp-livereload');

gulp.task('default', ['css', 'js', 'watch']);

gulp.task('css', function () {
    gulp.src('webroot/css/main.styl')
      .pipe(stylus({compress: false, paths: ['webroot/css', 'webroot/css/pages']}))
        .pipe(autoprefixer())
        .pipe(minifyCSS())
        .pipe(rename('style.css'))
        .pipe(gulp.dest('webroot/css'))
        .pipe(livereload());
});

gulp.task('js', function() {
  gulp.src([
  	'webroot/js/redepga.js',
  	'webroot/js/controllers.js',
  	'webroot/js/directives.js',
  	'webroot/js/services.js',
  ])
    .pipe( concat('main.js') ) // concat pulls all our files together before minifying them
    .pipe(uglify())
    .pipe(gulp.dest('webroot/js'))
});

gulp.task('watch', function () {
<<<<<<< Updated upstream
  livereload.listen({
    host: null
  });

  gulp.watch('webroot/css/*.styl', ['css']);
  gulp.watch('webroot/css/pages/*.styl', ['css']);
  gulp.watch('webroot/js/redepga.js', ['js']);
  gulp.watch('webroot/js/controllers.js', ['js']);
  gulp.watch('webroot/js/directives.js', ['js']);
  gulp.watch('webroot/js/services.js', ['js']);
=======
   gulp.watch('webroot/css/*.styl', ['css']);
   gulp.watch('webroot/css/pages/*.styl', ['css']);
   gulp.watch('webroot/js/redepga.js', ['js']);
   gulp.watch('webroot/js/controllers.js', ['js']);
   gulp.watch('webroot/js/directives.js', ['js']);
   gulp.watch('webroot/js/services.js', ['js']);
>>>>>>> Stashed changes
});