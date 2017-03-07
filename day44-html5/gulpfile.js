var gulp = require('gulp');

var autoprefixer = require('autoprefixer');
var browserSync = require('browser-sync').create();
var clean = require('gulp-clean');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var watch = require('gulp-watch');


gulp.task('cssclean', function(){
	return gulp.src('dist/*.css', { read: false }).pipe(clean());
});

gulp.task('csscompile', ['cssclean'], function(){
	return gulp
		.src('src/index.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(postcss([autoprefixer()]))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('dist'))
		.pipe(browserSync.stream());
});

gulp.task('develop', function(){
	browserSync.init({
		proxy: {
			target: 'http://www.cbp-exercises.local'
		},
		open: false,
		port: 4050,
		files: [
			'**/*.html',
			'**/*.js'
		]
	});
	gulp.watch('src/*.scss', ['csscompile']);
});

gulp.task('distprep', ['csscompile']);

gulp.task('default', ['develop']);
