var gulp = require('gulp'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify'),
	watch = require('gulp-watch'),
	jshint = require('gulp-jshint'),
	minifycss = require('gulp-minify-css'),
	concat = require('gulp-concat'),
	notify = require('gulp-notify'),
	rename = require('gulp-rename'),
	livereload = require('gulp-livereload'),
	autoprefixer = require('gulp-autoprefixer');

gulp.task('styles', function() {
  return gulp.src('public/sass/style.scss')
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('public/css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('public/css'))
    .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
  return gulp.src('public/js/**/*.js')
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(concat('app.js'))
    .pipe(gulp.dest('public/app'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('public/app'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('public/sass/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('public/js/**/*.js', ['scripts']);

  // Create LiveReload server
  livereload.listen();

  // Watch any files in app/ or css/, reload on change
  gulp.watch(['public/app/**', 'public/css/**']).on('change', livereload.changed);

});


// Default task
gulp.task('dev', ['styles', 'scripts', 'watch']);