/*

This Is Main Tasks For Gulp

*/

/* ----- basic diff for all using staff ----- */

var gulp 			= require('gulp'),
	runSeq 			= require('run-sequence');
	uglify 			= require('gulp-uglify'),
	cleanCss 		= require('gulp-clean-css'),
	livereload 		= require('gulp-livereload'),
	plumber 		= require('gulp-plumber');
	sass 			= require('gulp-sass'),
	sourcemaps 		= require('gulp-sourcemaps');

/*--------------*/

/* ----- bath for everything ----- */

// js minify
gulp.task('js_min', function() {
	gulp.src('layout/js/main.js')
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest('layout/js/mainify_js'))
		.pipe(livereload());
});

// js Ajax minify
gulp.task('js__ajax_min', function() {
	gulp.src('layout/js/Ajax_JQuery.js')
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest('layout/js/mainify_js'))
		.pipe(livereload());
});

// compile To Sass
gulp.task('sass', function() {
	return gulp.src('layout/scss/**/*.scss')
		//.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		//.pipe(sourcemaps.write())
		.pipe(gulp.dest('layout/css/mainify_css'))
		.pipe(livereload());
});

// Watch HTML
gulp.task('html_watch', function() {
	gulp.src('*.php')
		.pipe(livereload());
});

// Watch Task
gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('*.php', ['html_watch']);
	gulp.watch('layout/scss/**/*.scss', ['sass']);
	gulp.watch('layout/js/main.js', ['js_min']);
	gulp.watch('layout/js/Ajax_JQuery.js', ['js__ajax_min']);
});

/*--------------*/

/* ----- gulp basic task ----- */

gulp.task('default', function() {
	runSeq('watch');
});

/*--------------*/
